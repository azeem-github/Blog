<?php
include ('includes/config.php');
// echo '<pre>';
// print_r($_POST);
// exit();
// 1:40pm
$query  = mysqli_query($conn,"UPDATE adminlogin SET status='".$_POST['val']."' WHERE id ='".$_POST['user_id']. "' "); 
 if($query)
 {
 $q = mysqli_query($conn,"SELECT * FROM adminlogin WHERE id ='".$_POST['user_id']."' ");
 $data = mysqli_fetch_assoc($query);
 echo $data['status'];
 }
?>