<?php 
require('extra/connect.php');
if(isset($_POST['addcomment'])){
   $name= mysqli_real_escape_string($conn,$_POST['name']);
   $comment= mysqli_real_escape_string($conn,$_POST['comment']);
   $post_id= mysqli_real_escape_string($conn,$_POST['post_id']);

   $query="INSERT INTO comments(comment,name,post_id)VALUES('$comment','$name','$post_id')";
   if(mysqli_query($conn,$query)){
      header("Location:view.php?id=$post_id");
   }else{
      echo "Comment Is Not Added";
   }
}
?>