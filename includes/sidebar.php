<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin  Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
       
        <div class="info">
          <a href="dashboard.php" class="d-block" style="text-align:center;"><b>Welcome  to Dashboard </b> 
        </div>
      </div>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon  fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>                        
          <li class="nav-item">
            <a href="addusers.php" class="nav-link">            
            <i class="fa fa-users"></i>  
            <!-- <i class="fa fa-user"></i>  -->
              <!-- <i class="nav-icon fas fa-edit"></i> -->
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addusers.php" class="nav-link">
                <i class="fa fa-user-plus"></i>  
                <!-- <i class="far fas fa-plus"></i> -->
                  <p>Add Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="viewusers.php" class="nav-link">
                <i class="fa fa-users"></i>  
                <!-- <i class="fa fa-list-ul"></i> -->
                  <p>List Users</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="viewcategory.php" class="nav-link">
            <i class="fa fa-align-left"></i>
            <!-- <i class="fa fa-list-alt"></i> -->
              <p>
                Menus
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addmenu.php" class="nav-link">
                <i class="far fas fa-plus"></i>  
                <!-- <i class="far fas fa-plus"></i> -->
                  <p>Menu</p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="addsubmenu.php" class="nav-link">
                <i class="far fas fa-plus"></i>
                <!-- <i class="far fas fa-plus"></i> -->
                  <p>Sub-Menu</p>
                </a>
              </li>   
              <li class="nav-item">
                <a href="viewmenu.php" class="nav-link">
                <i class="fa fa-list-ul"></i>  
                <!-- <i class="far fas fa-plus"></i> -->
                  <p>View Menu</p>
                </a>
              </li>                 
            </ul>
          </li>
          <li class="nav-item">
            <a href="viewblogpost.php" class="nav-link">
            <i class="fas fa-blog"></i>  
            <!-- <i class="nav-icon fas fa-book"></i> -->
              <p>
                Blogs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addblog.php" class="nav-link">
                  <i class="far fas fa-plus"></i>
                  <p>Add Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="viewblogpost.php" class="nav-link">
                <i class="fas fa-eye"></i>  
                <!-- <i class="far fas fa-table"></i> -->
                  <p>View Blogs</p>
                </a>
              </li>                           
            </ul>
          </li>
          <li class="nav-item">
            <a href="viewcategory.php" class="nav-link">
            <i class="fa fa-align-left"></i>
            <!-- <i class="fa fa-list-alt"></i> -->
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addcategory.php" class="nav-link">
                <i class="far fas fa-plus"></i>  
                <!-- <i class="far fas fa-plus"></i> -->
                  <p>Add Categories</p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="viewcategory.php" class="nav-link">
                <i class="fa fa-list-ul"></i>  
                <!-- <i class="far fas fa-plus"></i> -->
                  <p>List Categories</p>
                </a>
              </li>                 
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-unlock"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <?php include ('includes/footer.php');?>