<?php 
   include('includes/header.php');
   if(isset($_SESSION['admin_email']) && $_SESSION['admin_email'] != '') 
   {
      
   } else
   {
      header('Location: index.php');
   }
   include ('includes/sidebar.php');?>
<?php
//trial code
if(isset($_POST['editid']))
{
   include('includes/config.php'); 
   $id = $_POST['edit_id'];

   $query = "SELECT * FROM blog WHERE id='$id'";
   $query_run = mysqli_query($conn,$query);

   foreach($query_run as $row)
   {

      ?>
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
                <h3 class="card-title">Edit Blog</h3>
              </div>
               <br><br>   
               <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">      
               <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
               <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo $row['title'];?>">
                  </div>                  
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea type="text" name="description" class="form-control" cols="85" rows="5"><?php echo $row['description'];?></textarea>
                    </div>
                    <div class="form-group">
                  <label style="text-decoration:underline">Add Image: </label>
                  <input type="file" name="image">
                  <br>
                  <img  data-enlargeable style="cursor: zoom-in" src="images/<?php echo $row['image'];?>"width="70px" height="70px;">
               </div>   
               <div class="card-footer">
                  <input type="submit" name="submit" value="Update Post" class="btn btn-primary">
                  <a href="dashboard.php" class="btn btn-default">Back</a>
                </div>   
            </form>
         </div>

         <div class="col-md-3 col-sm-12"></div>
      </div>
      </div>
         <?php
   }
}
?>
<?php
if(isset($_POST['submit']))
{
   include('includes/config.php'); 
   $edit_id = $_POST['edit_id'];
   $title = $_POST['title'];
   $description = $_POST['description'];

   $image = $_FILES["image"]["name"];

   $faculty_query = "SELECT * FROM blog WHERE id='$edit_id'";
   $product_run = mysqli_query($conn, $faculty_query);
   foreach($product_run as $prod_row)
   {
      // echo $prod_row['image'];
      if($image == NULL)
      {
         //update with existing image
         $image_data = $prod_row['image'];
      }
      else
      {
         //Update With New Image And Delete with old image
         if($img_path = "images/upload/".$prod_row['image'])
         {
            unlink($img_path);
            $image_data = $image;
         }
      }
   }

   $query = "UPDATE blog SET title='$title',image='$image_data',description='$description' WHERE id='$edit_id'";
   $query_run = mysqli_query($conn,$query);

   if($query_run)
   {
      if($image == NULL)
      {
         //update with existing image
         echo "<script>alert('Blog Has Been Updated with existing image')</script>";
      echo "<script>window.open('viewblogpost.php','_self')</script>";
     
      }
      else
      {
         //Update With New Image And Delete with old image
         move_uploaded_file($_FILES["image"]['tmp_name'], "images/upload/".$_FILES["image"]["name"]);
         // $_SESSION['success'] == "Added Successfully";
         echo "<script>alert('Blog Has Been Updated')</script>";
         echo "<script>window.open('viewblogpost.php','_self')</script>";
      }
   }else{
      $_SESSION['success'] = "not updated" ;
      header("Location : editblog.php");
  }
 }
?>
<?php include('includes/footer.php');?>