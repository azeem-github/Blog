<?php
session_start();
if($_SESSION['admin_email']){
echo "welcome user " . $_SESSION['admin_email'];
}else{
header("Location: index.php");
}
?>
<?php include ('includes/header.php');?>
<?php include ('includes/sidebar.php');?>
<?php include ('includes/config.php'); ?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">     
    </ul>
  </nav>
  <!-- Main Sidebar Container -->  
  <?php 
if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['admin_email'];
    $password = $_POST['password'];
    $cpassword = $_POST['c_password'];

    if ($email != '') 
    {
        $sql= "SELECT * FROM adminlogin WHERE admin_email='$email' AND password='$password'";
        $search = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($search);

        if($rows > 0)
        {
            echo "<script>alert('Email Already Exists OR Incorrect Password!');</script>";
        } 
        else 
        {
          if ($_POST["password"] === $_POST["c_password"]) {
    $sql3 = "INSERT INTO adminlogin(firstname, lastname,admin_email,password,c_password)VALUES('$firstname','$lastname','$email','$password','$cpassword')";
    $add = mysqli_query($conn, $sql3);
    if($add){
            $_SESSION['success'] == "Added Successfully";
            echo "<script>alert('User Has Been Added')</script>";
            echo "<script>window.open('viewusers.php','_self')</script>";
    }
        }else{
          echo "<script>alert('Password and confirm Password Does Not Match')</script>";
          echo "<script>window.open('addusers.php','_self')</script>";
        }
      }
    }
  }

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Add Users</h1> -->
          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol> -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-9">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Users</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="" id="quickForm">
                <div class="card-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">First Name</label>
                      <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" placeholder="John">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Last Name</label>
                      <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" placeholder="Doe">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="admin_email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="***********" onkeypress="return RestrictSpace()">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" name="c_password" class="form-control" id="exampleInputPassword1" placeholder="***********" onkeypress="return RestrictSpace()">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  <a href="dashboard.php"class="btn btn-default">Back</a>
                </div>
              </form>
            </div>
            </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>
  </div>
<!-- javascript disable space key on field -->
<script>
  function RestrictSpace() {
    if (event.keyCode == 32) {
        return false;
    }
  }
</script>