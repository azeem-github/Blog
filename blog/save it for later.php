<?php include ('extra/header.php');?>
<?php include ('extra/connect.php');?>
<?php include ('extra/navbar.php');?>

<div class="container m-auto mt-3 row">
  <div class="col-8">
  <?php
  $post_id=$_GET['id'];
  $postQuery= "SELECT * FROM blog WHERE id=$post_id";
  $runPQ=mysqli_query($conn,$postQuery);
  $row=mysqli_fetch_assoc($runPQ);
  ?>

  <div class="card mb-3">
  <div class="card-body">
  <h5 class="card-title"><?php echo $row['title'];?></h5><br>
  <span class="badge bg-primary">Posted On <?=date('F jS, Y', strtotime($row['date']))?></span>
  <span class="badge bg-danger"><?=getCategory($conn,$row['category_id'])?></span>
  <div class="border-bottom mt-3"></div>
  <?php
  $post_images=getImagesByPost($conn,$row['id']);
  ?>
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
  <?php
  $c=1;
  foreach($post_images as $image){
  if($c>1){
  $sw = "";
  }else{
  $sw="active";
  }
  ?>
  <div class="carousel-item <?=$sw?>">
    <img src="images/<?=$image['image']?>" class="d-block w-100" alt="">
    </div>
    <?php
    $c++;
    }
    ?>
  </div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span>
</button>
</div>

<p class="card-text"><?php echo $row['description'];?>
</p>
<div class="addthis_inline_share_toolbox"></div>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Comment On This Page
</button>

</div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add Your Comment to this Post</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form action="add_comment.php" method="POST">
<div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Name</label>
<input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
<div class="mb-3">
<label for="exampleInputPassword1" class="form-label">Comment</label>
<input type="text" name="comment" class="form-control" id="exampleInputPassword1">
</div>
<input type="hidden" name="post_id" value="<?=$post_id?>">
<button type="submit" name="addcomment" class="btn btn-primary">Add Comment</button>
</form>
</div>     
</div>
</div>
</div>




<div>
<h4>Related Posts</h4>
<?php 

$pquery = "SELECT * FROM blog WHERE category_id={$row['category_id']} ORDER BY id DESC";
$prun = mysqli_query($conn,$pquery);
while($rpost=mysqli_fetch_assoc($prun)){
if($rpost['id']== $post_id){
continue;
}
?>
<a href="view.php?id=<?=$rpost['id']?>" style="text-decoration:none;color:black;">
<div class="card mb-3" style="max-width: 700px;">
<div class="row g-0">
<div class="col-md-5" style="background-image: url('https://images.moneycontrol.com/static-mcnews/2020/04/stock-in-the-news-770x433.jpg');background-size: cover">
<!-- <img src="https://images.moneycontrol.com/static-mcnews/2020/04/stock-in-the-news-770x433.jpg" alt="..."> -->
</div>
<div class="col-md-7">
<div class="card-body">
<h5 class="card-title"><?php echo $rpost['title']?></h5>
<p class="card-text"><?php echo $rpost['description']?></p>
<p class="card-text"><small class="text-muted">Last updated<?=date('F jS, Y', strtotime($row['date']))?> </small></p>
</div>
</div>
</div>
</div>  
<?php
}
?>

</div>        
</div>
<?php
if(isset($_GET['id'])){
?>

<div class="card mb-3">
<h5 class="card-header">Comments</h5>

<?php
$comments = getComments($conn,$post_id);
if(count($comments)<1){
echo '<div class="card-body"><p class="text-center card-text">No Comments</p></div>';
}
foreach($comments as $comment){
?>
<div class="card-body">
<h5 class="card-title"><?=$comment['name']?> <br>
<small><?=date('F jS, Y', strtotime($comment['created_at']))?></small></h5>
<p class="card-text"><?=$comment['comment']?></p>
<a href="#" class="btn btn-primary">Go somewhere</a>
<?php
}
?>

</div>

<?php
}
?> 
</div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-top">
<div class="container m-auto">
<?php include("extra/footer.php");?>
</div>
</nav>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>     -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6203bb3b156c765f"></script> 
</body>
</html>