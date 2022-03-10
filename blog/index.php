<title>My Blogging Website | Project</title>
<?php include ('extra/header.php');?>
<?php include ('extra/navbar.php');?>
<?php include ('extra/connect.php');?>

<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$post_per_page = 5;
$offset = ($page-1) * $post_per_page; 
?>
    <div class="container m-auto mt-3 row">
        <div class="col-12">
        <?php      
        if(isset($_GET['search'])){
          $keyword = $_GET['search'];
          $postQuery = "SELECT * FROM blog WHERE title LIKE '%$keyword%'"; 
          // echo "<pre>";
          // print_r($_GET['search']);
         }else{
          $postQuery = "SELECT * FROM blog LIMIT $offset, $post_per_page"; 
         }  
        //  $postQuery = "SELECT * FROM blog LIMIT $offset, $post_per_page"; 
        $runPQ=mysqli_query($conn,$postQuery);
        while($row=mysqli_fetch_assoc($runPQ)){
        ?>
          <div class="card mb-3" style="max-width: 1100px;">

          <a href="view.php?id=<?=$row['id']?>" style="text-decoration:none;color:black">
            <div class="row g-0">
              <div class="col-md-5" style="background-image: url('https://images.moneycontrol.com/static-mcnews/2020/04/stock-in-the-news-770x433.jpg');background-size: cover">
                <!-- <img src="https://images.moneycontrol.com/static-mcnews/2020/04/stock-in-the-news-770x433.jpg" alt="..."> -->
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['title'];?></h5>

                  <p class="card-text"><?php echo $row['description'];?></p>
                  <p class="card-text"><small class="text-muted">Posted On <?=date('F jS, Y', strtotime($row['date']))?></small></p>
                </div>
              </div>
            </div>
        </a>
          </div>
        <?php } ?>
          <div class="card mb-3" style="max-width: 1100px;">
          </div>
    </div>
    </div>
<?php
if(isset($_GET['search'])){
  $keyword = $_GET['search'];
  $q="SELECT * FROM blog WHERE title LIKE '$keyword'";
}else{
  $q ="SELECT * FROM blog";
}
// $q="SELECT * FROM blog";
$r=mysqli_query($conn,$q);
$total_posts=mysqli_num_rows($r);
$total_pages=ceil($total_posts/$post_per_page);

?>
       <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
        <?php
        if($page>1){
          $switch="";
        }else{
          $switch="disabled";
        }
        if($page<$total_pages){
          $nswitch="";
        }else{
          $nswitch="disabled";
        }
        ?>
          <li class="page-item disabled <?=$swicth?>">
            <a class="page-link" href="?<?php if(isset($_GET['search'])){
              echo "search=$keyword&";}?>page=<?=$page-1?>" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <?php 

for($opage=1;$opage<=$total_pages;$opage++){
  ?>
  <li class="page-item"><a class="page-link" href="?<?php if(isset($_GET['search'])){
              echo "search=$keyword&";}?>page=<?=$opage?>"><?=$opage?></a></li>
  <?php
}
          ?>
          <li class="page-item <?=$nswitch?>">
            <a class="page-link" href="?<?php if(isset($_GET['search'])){
              echo "search=$keyword&";}?>page=<?=$page+1?>">Next</a>
          </li>
        </ul>
      </nav>
      
      
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-top">
          <div class="container m-auto">
          <!-- Get switch case added -->
           <?php include ('extra/footer.php');?>
          </div>
        </nav>
      
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>     -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6203bb3b156c765f"></script> 
</body>
</html>