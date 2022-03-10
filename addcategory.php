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
<?php include ('includes/config.php');?>
<?php include ('functions/function.php');?>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">     
    </ul>
  </nav>
  <!-- Main Sidebar Container -->  
<?php
// if(isset($_POST['upload'])){
//    include('includes/config.php');
//     $category = $_POST['category'];

//     if ($category != '') 
//     {
//         $sql= "SELECT * FROM category WHERE category='$category'";
//         $search = mysqli_query($conn, $sql);
//         $rows = mysqli_num_rows($search);

//         if($rows > 0)
//         {
//             echo "<script>alert('Category Already Exists in Database');</script>";
//         } 
//         else 
//         {

//     $sql3 = "INSERT INTO category(category)VALUES('$category')";
//     $add = mysqli_query($conn, $sql3);

//     if($add){
//             $_SESSION['success'] == "Added Successfully";
//             echo "<script>alert('Category Has Been Added')</script>";
//             echo "<script>window.open('viewcategory.php','_self')</script>";

        
//     }
//     else{
//         $_SESSION['success'] = "added " ;
//         header("Location : addcategory.php");
//     }
//    }
// }

// }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
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
          <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="inc/addcat.php" method="post">
              <div class="col-sm-8">
              <div class="form-group">
                    <label>Add Category</label>
                    <input type="text" name="category" class="form-control" id="exampleInputPassword1" placeholder="Category Name" required>
                  </div>       
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="upload" class="btn btn-primary">Add</button>
                  <a href="dashboard.php"class="btn btn-default">Back</a>
                </div>
              </form>
            </div>
            </div>
            </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>

  </div>
<!-- jQuery -->
<!-- Page specific script -->