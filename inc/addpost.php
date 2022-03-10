<?php
require '../includes/config.php';

if(isset($_POST['addpost'])){
//    echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
$ptitle= mysqli_real_escape_string($conn,$_POST['title']);
$pdescription= mysqli_real_escape_string($conn,$_POST['description']);
$cid= $_POST['post_category'];
$query="INSERT INTO blog(title,description,category_id)VALUES('$ptitle','$pdescription',$cid)";
$run = mysqli_query($conn,$query);
$post_id=mysqli_insert_id($conn);
//echo $post_id;
// echo "<PRE>";
$image_name=$_FILES['post_image']['name'];
$img_tmp = $_FILES['post_image']['tmp_name'];
// print_r($image_name);
// print_r($img_tmp);
foreach($image_name as $index=>$img){
   if(move_uploaded_file($img_tmp[$index],"../images/$img")){
   //echo "img uploaded<br>";
   $queryimg="INSERT INTO images (post_id,image)VALUES($post_id,'$img')";
$runimg = mysqli_query($conn,$queryimg);
   }
}
// $images= $_FILES['image'];
echo "<script>alert('Blog Has Been Added')</script>";
echo "<script>window.open('../viewblogpost.php','_self')</script>";
// header('Location:../viewblogpost.php?viewblogpost');

}
?>