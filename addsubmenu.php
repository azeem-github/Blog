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
<?php require ('functions/function.php');?>
<?php //include ('inc/addpost.php');?>
<?php 
// if(isset($_POST['post'])){
//     $title = $_POST['title'];
//     $description = $_POST['description'];

//     $sql3 = "INSERT INTO blog(title,description)VALUES('$title','$description')";
//     $add = mysqli_query($conn, $sql3);
//     if($add){
//             $_SESSION['success'] == "Added Successfully";
//             echo "<script>alert('Blog Has Been Added')</script>";
//             echo "<script>window.open('viewblogpost.php','_self')</script>";

//         }else{
//            echo "not comming";
//         }
//   }

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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Menu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="inc/addsubmenu.php" method="POST">
                <div class="card-body">
                <div class="form-group">
                    <label>Sub Menu Title</label>
                    <input type="text" name="submenu-name" class="form-control" id="exampleInputPassword1" placeholder="Name Of Menu" required>
                  </div> 
                  <div class="form-group">
                    <label>Select Parent Name</label>
                    <select name="parent-id" class="form-control" id="exampleInputPassword1">
                    <?php
                    $mlist = getAllMenu($conn);
                    foreach($mlist as $m){
                       ?>
                    ?><option value="<?=$m['id']?>"
                    ><?=$m['name']?></option>
                    <?php 
                    }
                    ?>
                    </select>
                  </div> 
                  <div class="form-group">
                    <label>Sub Menu Link</label>
                    <input type="text" name="submenu-link" class="form-control" id="exampleInputPassword1" placeholder="Name Of Menu" required>
                  </div> 
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                 <input type="submit" name="addsubmenu" value="Add Post" class="btn btn-primary">
                  <a href="dashboard.php" class="btn btn-default">Back</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- jQuery -->
<?php require_once ('includes/footer.php');?>