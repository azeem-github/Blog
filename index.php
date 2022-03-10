<?php session_start();?>
<?php include_once('header.php');?>
<?php include('includes/config.php');?>
<?php

?>
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Admin</b>LOGIN</a>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to proceed</p>
        <form action="" method="post">
        <?php
        session_start();
        if(isset($_SESSION['admin_email']))
        // if(isset($_SESSION['email']))
        {
        header('Location: dashboard.php');
        } 
        else
        {                
        // if(!isset($_SESSION['admin_email'])){
        //   echo "<script>alert('Sorry Can't Redirect')</script>";
        // }
        }

        $email = '';
        $pass = '';

        if(isset($_POST['submit']))
        {
        $email = trim($_POST['admin_email']);
        $pass  =  trim($_POST['password']);

        $query1 = "SELECT * FROM adminlogin WHERE admin_email = '$email' and password = '$pass'";
        $check1 = mysqli_query($conn,$query1);
        $info1 = mysqli_fetch_assoc($check1);
        $num_row1 = mysqli_num_rows($check1);
        if($num_row1 == 0)
        {
        ?>
        <div style="color:red";><h5 style="text-align:center;"><?php echo "Email or Password incorrect";?></div>
        <?php }
        else
        {
        // start session and show in admin dashboard
        $_SESSION['admin_email'] = $email;
        echo "<script>alert('Welcome $email')</script>";
        echo "<script>window.open('dashboard.php','_self')</script>";

        }
        }
        ?>
        <div class="input-group mb-3">
        <input type="email" name="admin_email" class="form-control" placeholder="Email">
        <div class="input-group-append">
        <div class="input-group-text">
        <span class="fas fa-envelope"></span>
        </div>
        </div>
        </div>
        <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password" onkeypress="return RestrictSpace()">
        <div class="input-group-append">
        <div class="input-group-text">
        <span class="fas fa-lock"></span>
        </div>
        </div>
        </div>
        <div class="col-4">
         <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
      </div>
      </form> 
    </div>
  </div>
</div>
<?php include ('footer.php'); ?>
<script>
    function RestrictSpace() {
      if (event.keyCode == 32) {
          return false;
      }
  }
  </script>