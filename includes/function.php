<?php

function getCategory($conn,$id){
   $query="SELECT * FROM category WHERE id=$id";
   $run=mysqli_query($conn,$query);
   $data = mysqli_fetch_assoc($run);
   return $data['category'];
}
function getAllCategory($conn){
   $query="SELECT * FROM category";
   $run=mysqli_query($conn,$query);
   $data = array();
   while($d=mysqli_fetch_assoc($run)){
      $data[]=$d;
   }
   return $data;
}

function getImagesByPost($conn,$post_id){
   $query="SELECT * FROM images WHERE  post_id=$post_id";
   $run=mysqli_query($conn,$query);
   $data = array();
   while($d=mysqli_fetch_assoc($run)){
      $data[]=$d;
   }
   return $data;
}

function getSubMenu($conn,$menu_id){
   $query="SELECT * FROM submenu WHERE  parent_menu_id=$menu_id";
   $run=mysqli_query($conn,$query);
   $data = array();
   while($d=mysqli_fetch_assoc($run)){
      $data[]=$d;
   }
   return $data;
}
function getSubMenuNo($conn,$menu_id){
   $query="SELECT * FROM submenu WHERE  parent_menu_id=$menu_id";
   $run=mysqli_query($conn,$query);
 return mysqli_num_rows($run);
}
function getComments($conn,$post_id){
   $query="SELECT * FROM comments WHERE  post_id=$post_id ORDER BY id DESC";
   $run=mysqli_query($conn,$query);
   $data = array();
   while($d=mysqli_fetch_assoc($run)){
      $data[]=$d;
   }
   return $data;
}
?>