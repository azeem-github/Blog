<?php
session_start();
if($_SESSION['admin_email']){
echo "welcome user " . $_SESSION['admin_email'];
}else{
header("Location: index.php");
}
?>
<?php include_once ('includes/header.php');?>
<?php include_once ('includes/config.php');?>
<?php include_once ('includes/sidebar.php');?>
<?php require ('functions/function.php');?>

<?php
//trial code
if(isset($_POST['editid']))
{
   $id = $_POST['edit_id'];

   $query = "SELECT * FROM category WHERE id=$id";
   $run = mysqli_query($conn,$query);
   foreach($run as $data)
   {
      ?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav"></ul>
  </nav>
  <!-- Main Sidebar Container -->  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"></div>
          <div class="col-sm-6"></div>
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
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
              <div class="form-group"> 
              <input type="hidden" name="edit_id" value="<?php echo $data['id'];?>">
                        <label>Edit Category</label>
                        <select name="parent-id" class="form-control" id="exampleInputPassword1">
                    <?php
                    $mlist = getAllCategory($conn);
                    foreach($mlist as $m){
                       ?>
                    ?><option value="<?=$m['id']?>"
                    ><?=$m['category']?></option>
                    <?php 
                    }
                    ?>
                    </select>           
                      </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  <a href="dashboard.php"class="btn btn-default">Back</a>
                </div>
              </form>
            </div>
            <?php } } ?>
            </div>
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
    $category = $_POST['category'];

    $category_query = "SELECT * FROM category WHERE id='$edit_id'";
   $category_run = mysqli_query($conn, $category_query);

   $query = "UPDATE category SET category='$category' WHERE id='$edit_id'";
   $run = mysqli_query($conn,$query);

   if($run)
   {

         echo "<script>alert('Category Has Been Updated')</script>";
         echo "<script>window.open('viewcategory.php','_self')</script>";
      }
   else{
      $_SESSION['success'] = "not updated" ;
      header("Location : editblog.php");
  }
    
  }
?>
<!-- jQuery -->
<!-- Page specific script -->