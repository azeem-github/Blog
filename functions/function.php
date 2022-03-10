<?php
require 'includes/config.php';

function getAllCategory($conn){
   $query="SELECT * FROM category";
   $run=mysqli_query($conn,$query);
   $data = array();
   while($d=mysqli_fetch_assoc($run)){
      $data[]=$d;
   } 
   return $data;
}
function getCategory($conn,$id){
   $query="SELECT * FROM category WHERE id=$id";
   $run=mysqli_query($conn,$query);
   $data = mysqli_fetch_assoc($run);
   return $data['category'];
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

function getMenu($conn){
   $query="SELECT * FROM menu";
   $run=mysqli_query($conn,$query);
   $data = array();
   while($d=mysqli_fetch_assoc($run)){
      $data[]=$d;
   }
   return $data;
}
function getAllMenu($conn){
   $query="SELECT * FROM menu";
   $run=mysqli_query($conn,$query);
   $data = array();
   while($d=mysqli_fetch_assoc($run)){
      $data[]=$d;
   }
   return $data;
}
function getAllSubMenu($conn){
   $query="SELECT * FROM submenu";
   $run=mysqli_query($conn,$query);
   $data = array();
   while($d=mysqli_fetch_assoc($run)){
      $data[]=$d;
   }
   return $data;
}
function getMenuName($conn,$id){
   $query="SELECT * FROM menu WHERE id=$id";
   $run=mysqli_query($conn,$query);
   $data=mysqli_fetch_assoc($run);
   return $data['name'];
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

function getPostThumb($conn,$id){
   $query ="SELECT * FROM images WHERE post_id=$id";
   $run=mysqli_query($conn,$query);
   $data = mysqli_fetch_assoc($run);
   return $data['image'];
}

function getAllPost($conn){
   $query="SELECT * FROM blog";
   $run=mysqli_query($conn,$query);
   $data = array();
   while($d=mysqli_fetch_assoc($run)){
      $data[]=$d;
   } 
   return $data;
}
?>