<?php
  session_start();
  if($_SESSION['admin_email']){
  echo "welcome user " . $_SESSION['admin_email'];
  }else{
  header("Location: index.php");
  }
?>
<?php include_once ('includes/header.php');?>
<?php include_once ('includes/config.php');?>
<?php include_once ('includes/sidebar.php');?>
<?php include_once ('functions/function.php');?>
?>
<?php
  if(isset($_POST['delete_btn']))
  {
    $id= $_POST['delete_id'];
    
    $query1 = "DELETE FROM menu WHERE id='$id'";
    $query_run = mysqli_query($conn,$query1);
    if($query_run)
    {
        echo "<script>alert('Menu Has Been Deleted')</script>";
      echo "<script>window.open('viewmenu.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('Menu Has Not Been Deleted')</script>";
        echo "<script>window.open('addmenu.php','_self')</script>";
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
                  <th>Menu</th>
                  <th>Link</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                <?php 
                $menus = getMenu($conn);
                $count=1;
                foreach($menus as $menu){
                   ?>
              </thead>
              <tbody>
              
                    <tr>
                    	<td><?=$count?>.</td>  
                        <td><?=$menu['name']?></td> 
                        <td><?=$menu['action']?></td>                        
                        <td>
                      <form action="editcategory.php" method="POST">
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
                    
                <?php
               $count++;
               } ?>               
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    if(isset($_POST['delete_btn']))
  {
    $id= $_POST['delete_id'];
    
    $query1 = "DELETE FROM submenu WHERE id=$id";
    $query_run = mysqli_query($conn,$query1);
    if($query_run)
    {
        echo "<script>alert('SubMenu Has Been Deleted')</script>";
      echo "<script>window.open('viewmenu.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('SubMenu Has Not Been Deleted')</script>";
        echo "<script>window.open('addsubmenu.php','_self')</script>";
    }

  }
  ?>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Sub Menu</th>
                  <th>Parent Menu</th>                  
                  <th>Link</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                <?php 
                $menus = getAllSubMenu($conn);
                $count=1;
                foreach($menus as $menu){
                   ?>
              </thead>
              <tbody>
              
                    <tr>
                    	<td><?=$count?>.</td>  
                        <td><?=$menu['name']?></td> 
                        <td><?=getMenuName($conn,$menu['parent_menu_id'])?></td> 
                        <td><?=$menu['action']?></td>                        
                        <td>
                      <form action="editcategory.php" method="POST">
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
                    
                <?php
               $count++;
               } ?>               
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
