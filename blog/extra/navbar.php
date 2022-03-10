<?php include('extra/connect.php');?>
<?php include('extra/functions.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Blog</title>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="#">_Zeembo_ Blogs</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <?php
            $navQuery = "SELECT * FROM menu";
            $runNav = mysqli_query($conn,$navQuery);
            while($menu=mysqli_fetch_assoc($runNav)){
                $no = getSubMenuNo($conn,$menu['id']);
                if(!$no){
                    ?>
                       <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?=$menu['action']?>"><?=$menu['name']?></a>
              </li>
                    <?php
                } else{
                    ?>
                          <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="<?=$menu['action']?>" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?=$menu['name']?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                 
              <?php 
                $submenus = getSubMenu($conn,$menu['id']);
                foreach($submenus as $sm){
              ?>
     <li><a class="dropdown-item" href="<?=$sm['action']?>"><?=$sm['name']?></a></li>
    <?php
    }
    ?>
                </ul>
              </li>
                    <?php
                }
                ?>             
                <?php
            }
            ?>
            </ul>
            <!-- <form action="search.php" method="GET" class="d-flex"> -->
            <form class="d-flex">
              <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>  
