<?php
session_start();
if($_SESSION['admin_email']){
echo "welcome user " . $_SESSION['admin_email'];
}else{
header("Location: index.php");
}
?>
<?php include ('includes/header.php');?>
<?php include ('includes/config.php');?>
<?php include ('includes/sidebar.php');?>

<?php
//trial code
if(isset($_POST['editid']))
{
   $id = $_POST['edit_id'];

   $query = "SELECT * FROM adminlogin WHERE id='$id'";
   $user_run = mysqli_query($conn,$query);

   foreach($user_run as $row)
   {

      ?>
<div class="content-wrapper">    
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-9">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Users</h3>
            </div>
            <form action="" method="POST">
              <div class="card-body">
                <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
                <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" value="<?php echo $row['firstname'];?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo $row['lastname'];?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="admin_email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo $row['admin_email'];?>">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $row['password'];?>" onkeypress="return RestrictSpace()">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="c_password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $row['c_password'];?>" onkeypress="return RestrictSpace()">
              </div>
              <div class="form-group">
                <div class="form-check">
                  <span style="width:10px;display:inline-block"></span>
                  <input class="form-check-input" type="radio" name="status" value="1" <?php echo $row['status'];?> checked>
                  <label class="form-check-label"><b>Active</b></label>
                  
                  <span style="width:20px;display:inline-block"></span> 
                  <input class="form-check-input" type="radio" name="status" value="0" <?php echo $row['status'];?>>
                  <label class="form-check-label"><b>  InActive</b></label>
                </div>
              </div>
              <div class="card-footer">
                <input type="submit" name="submit" value="Update" class="btn btn-primary">
                <a href="dashboard.php" class="btn btn-default">Back</a>
              </div>
            </form>
          </div>
          <?php } } ?>
        </div>
      </div>
    </div>
  </section>
</div>
<?php
  if(isset($_POST['submit']))
  {
    include('includes/config.php'); 
    $edit_id = $_POST['edit_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $adminemail = $_POST['admin_email'];
    $password = $_POST['password'];
    $cpassword = $_POST['c_password'];
    $status = $_POST['status'];

    $user_query = "SELECT * FROM adminlogin WHERE id='$edit_id'";
    $user_run = mysqli_query($conn, $user_query);

    if ($_POST["password"] === $_POST["c_password"]) 
    {
      $query = "UPDATE adminlogin SET firstname='$firstname', lastname='$lastname',admin_email='$adminemail',password='$password',c_password='$cpassword',status='$status' WHERE id='$edit_id'";
      $query_run = mysqli_query($conn,$query);
      if($user_run)
      {
        echo "<script>alert('User Has Been Updated')</script>";
        echo "<script>window.open('viewusers.php','_self')</script>";
      }   
    }
    else
    {
        echo "<script>alert('Password Does Not Match With Confirm Password')</script>";
        echo "<script>window.open('edituser.php','_self')</script>";
    }
    
  }
?>
<?php require_once ('includes/footer.php');?>

<!-- javascript disable space key on field -->
<script>
    function RestrictSpace() {
      if (event.keyCode == 32) {
          return false;
      }
  }
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        alert( "Form successful submitted!" );
      }
    });
    $('#quickForm').validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 8         
        },
        terms: {
          required: true
        },
      },
      messages: {
        email: {
          required: "Please enter a email address",
          email: "Please enter a vaild email address"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 8 characters long"
        },
        terms: "Please accept our terms"
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>