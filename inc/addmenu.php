<?php
require '../includes/config.php';

if(isset($_POST['addmenu'])){
$menu_name= mysqli_real_escape_string($conn,$_POST['menu-name']);
$menu_link= mysqli_real_escape_string($conn,$_POST['menu-link']);
//$cid= $_POST['post_category'];
$query="INSERT INTO menu(name,action)VALUES('$menu_name','$menu_link')";
//$run = mysqli_query($conn,$query);
mysqli_query($conn,$query);
// $post_id=mysqli_insert_id($conn);
echo "<script>alert('Menu Has Been Added')</script>";
echo "<script>window.open('../viewmenu.php','_self')</script>";
// header('Location:../viewblogpost.php?viewblogpost');

}

if(isset($_POST['addsubmenu'])){

   $menu_name= mysqli_real_escape_string($conn,$_POST['submenu-name']);
   $parent_id= mysqli_real_escape_string($conn,$_POST['parent-id']);
   $menu_link= mysqli_real_escape_string($conn,$_POST['submenu-link']);
   $cid= $_POST['post_category'];
   $query="INSERT INTO submenu(name,action,parent_menu_id)VALUES('$menu_name','$menu_link',$parent_id)";
   //$run = mysqli_query($conn,$query);
      mysqli_query($conn,$query);
   //$post_id=mysqli_insert_id($conn);
   //echo $post_id;
   // echo "<PRE>";
   // $images= $_FILES['image'];
   echo "<script>alert('Sub Menu Has Been Added')</script>";
   echo "<script>window.open('../viewmenu.php','_self')</script>";
   // header('Location:../viewblogpost.php?viewblogpost');
   
   }

?>