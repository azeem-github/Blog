<title>Blog Post | Project</title>
<?php include('extra/header.php');?>
<?php include('extra/connect.php');?>
<?php include('extra/navbar.php');?>
<?php
    $post_id=$_GET['id'];
    $postQuery= "SELECT * FROM blog WHERE id=$post_id";
    $runPQ=mysqli_query($conn,$postQuery);
    $row=mysqli_fetch_assoc($runPQ);
  ?>
<div>
    <div class="container m-auto mt-3 row">
        <div class="col-8">
            <div class="card mb-3">
                <!-- Card Body begin -->
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['title'];?></h5><br>
                  <span class="badge bg-primary ">Posted on <?=date('F jS, Y', strtotime($row['date']))?></span>
                  <span class="badge bg-danger"><?=getCategory($conn,$row['category_id'])?></span>
                  <div class="border-bottom mt-3"></div>
                  <?php
                    $post_images=getImagesByPost($conn,$row['id']);
                  ?>
                  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                     <!-- <img src="https://images.moneycontrol.com/static-mcnews/2020/04/stock-in-the-news-770x433.jpg" class="img-fluid mb-2 mt-2" alt="Responsive image"> -->
                      <?php
                          $c=1;
                          foreach($post_images as $image){
                            if($c>1){
                              $sw = "";
                            }else{
                              $sw="active";
                            }
                          }
                      ?>
                    </div>
                  </div>
                  <p class="card-text"></p>
                  <a href="#" class="btn btn-primary">Share this post</a>
                  <a href="#" class="btn btn-primary">Comment on this</a>
                </div>
                <!-- Card Body End -->
              </div>
        
              <div>
                  <h4>Related Posts</h4>
                <div class="card mb-3" style="max-width: 700px;">
                    <div class="row g-0">
                      <div class="col-md-5" style="background-image: url('https://images.moneycontrol.com/static-mcnews/2020/04/stock-in-the-news-770x433.jpg');background-size: cover">
                        <!-- <img src="https://images.moneycontrol.com/static-mcnews/2020/04/stock-in-the-news-770x433.jpg" alt="..."> -->
                      </div>
                      <div class="col-md-7">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                  </div>  
                  <div class="card mb-3" style="max-width: 700px;">
                    <div class="row g-0">
                      <div class="col-md-5" style="background-image: url('https://images.moneycontrol.com/static-mcnews/2020/04/stock-in-the-news-770x433.jpg');background-size: cover">
                        <!-- <img src="https://images.moneycontrol.com/static-mcnews/2020/04/stock-in-the-news-770x433.jpg" alt="..."> -->
                      </div>
                      <div class="col-md-7">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                  </div>  
                  <div class="card mb-3" style="max-width: 700px;">
                    <div class="row g-0">
                      <div class="col-md-5" style="background-image: url('https://images.moneycontrol.com/static-mcnews/2020/04/stock-in-the-news-770x433.jpg');background-size: cover">
                        <!-- <img src="https://images.moneycontrol.com/static-mcnews/2020/04/stock-in-the-news-770x433.jpg" alt="..."> -->
                      </div>
                      <div class="col-md-7">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                  </div>  
              </div>
        
    </div>
   <?php include('extra/sidebar.php');?>
</div>
<?php include('extra/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>    
</body>
</html>