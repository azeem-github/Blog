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
<?php
  if(isset($_POST['delete_btn']))
  {
    $id= $_POST['delete_id'];
    
    $query1 = "DELETE FROM adminlogin WHERE id='$id'";
    $query_run = mysqli_query($conn,$query1);
    if($query_run)
    {
        echo "<script>alert('User Has Been Deleted')</script>";
      echo "<script>window.open('viewusers.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('User Has Not Been Deleted')</script>";
        echo "<script>window.open('addusers.php','_self')</script>";
    }

  }
?>
  <!-- Content Wrapper. Contains page content -->
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Current Status</th> 
                    <th>Change Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>     
                <tbody>
                  <?php
                    $qry = mysqli_query($conn, "SELECT * FROM adminlogin");
                    $counter = $i++;
                    while($data = mysqli_fetch_array($qry)){     
                  ?> 
                  <tr>    
                    <td><?php echo $i++;?>.</td>   
                    <td><?php echo $data['firstname'];?></td>   
                    <td><?php echo $data['lastname'];?></td>   
                    <td><?php echo $data['admin_email'];?></td>  
                    <td style="text-align:center">
                      <i data="<?php echo $data['id'];?>" class="status_checks btn
                      <?php echo ($data['status'])?'btn btn-success': 'btn-default'?>">
                      <?php echo ($data['status'])? 'Active' : 'InActive'?>
                      </i>
                    </td> 
                    <td>
                      <select onchange="active_inactive_user(this.value,<?php echo $data['id'];?>)">
                      <option value="1">Active</option>
                      <option value="0">InActive</option>
                      </select>
                    </td>                           
                    <td>
                      <form action="edituser.php" method="POST">
                      <input type="hidden" name="edit_id" value="<?php echo $data['id']; ?>">
                      <button type="submit" name="editid" class="btn btn-warning">Edit</button>
                      </form>
                    </td>
                    <td>
                      <form action="" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $data['id'];?>">
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
<script type="text/javascript">
  function active_inactive_user(val,user_id){
  $.ajax({
    type:"post",
    url:"change.php",
    data:{val:val,user_id:user_id},
    success: function(result){
      location.reload();
    // console.log(result);
    if(result==1){
      $('#str'+id).html('Active').css('color','green');
    }else{
      $('#str'+id).html('InActive').css('color','red');
    }
    }
  });
  }
</script>
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
