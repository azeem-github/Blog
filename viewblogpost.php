<?php
session_start();
if($_SESSION['admin_email']){
echo "welcome user " . $_SESSION['admin_email'];
}else{
header("Location: index.php");
}
?>
<?php include_once ('includes/header.php');?>
<?php include_once ('includes/sidebar.php');?>
<?php include_once ('includes/config.php');?>
<?php include_once ('functions/function.php');?>

<?php
  if(isset($_POST['delete_btn']))
  {
    $id= $_POST['delete_id'];
    
    $query1 = "DELETE FROM blog WHERE id='$id'";
    $query_run = mysqli_query($conn,$query1);
    if($query_run)
    {
        echo "<script>alert('Blog Has Been Deleted')</script>";
      echo "<script>window.open('viewblogpost.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('Blog Has Not Been Deleted')</script>";
        echo "<script>window.open('viewblogpost.php','_self')</script>";
    }

  }
?>
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Post Category</th>
                  <th>Date</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $posts = getAllPost($conn);
                $counter = $i++;
                foreach($posts as $post){
                  ?>
                  <tr>
                  <td><?php echo $i++;?>.</td> 
                <td><?=$post['title']?></td>
                <td><?=$post['description']?></td>
                <td><?=getCategory($conn,$post['category_id'])?></td>                
                <td><?=date('F jS, Y', strtotime($post['date']))?></td>
            
                <td>                   
                    <form action="editblog.php" method="POST">
                      <input type="hidden" name="edit_id" value="<?php echo $post['id']; ?>">
                      <button type="submit" name="editid" class="btn btn-warning">Edit</button>
                    </form>       
                    </td>
                    <td>
                      <form action="" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $post['id'];?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                      </form>
                    </td>                             
                </tr>            
                <?php } ?>                 
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 
</div>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
