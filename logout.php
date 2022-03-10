<?php
// session_start();
// session_destroy();
// //unset($_SESSION["admin_email"]);
//  header("Location:index.php");
session_start();
unset($_SESSION['admin_email']);
header("Location: index.php");
?>
