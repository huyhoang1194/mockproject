<!-- Sidebar -->
  <ul class="nav navbar-nav side-nav" id="sidebar">
              
    <li class="collapsed-content"> 
      <ul>
        <li class="search"><!-- Collapsed search pasting here at 768px --></li>
      </ul>
    </li>
    <!-- Navigation -->
    <li class="navigation" id="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="#navigation">Navigation <i class="fa fa-angle-up"></i></a>
      <!-- Navigation Menu -->   
      <ul class="menu">
        <!-- Dashboard -->    
        <li class="dropdown">
          <a href="{!!asset('admin')!!}">
            <i class="fa fa-tachometer"></i> Dashboard
          </a>
        </li>
        <!-- End Dashboard -->

        <!-- Manage Users -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user"></i> Users <b class="fa fa-plus dropdown-plus"></b>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="{!!asset('admin/users/list')!!}">
                <i class="fa fa-caret-right"></i> All Users
              </a>
            </li>
            <li>
              <a href="{!!asset('admin/users/add')!!}">
                <i class="fa fa-caret-right"></i> Create New User
              </a>
            </li>
          </ul>
        </li>
        <!-- End Manage Users -->

        <!-- Manage Categories -->
        <li class="dropdown">
          <a href="{!!asset('admin/categories/list')!!}">
            <i class="fa fa-list"></i> Categories
          </a>
        </li>
        <!-- End Manage Categories -->

        <!-- Manage Product -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-diamond"></i> Product <b class="fa fa-plus dropdown-plus"></b>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="{!!asset('admin/products/list')!!}">
                <i class="fa fa-caret-right"></i> All Product
              </a>
            </li>
            <li>
              <a href="{!!asset('admin/products/add')!!}">
                <i class="fa fa-caret-right"></i> Upload New Product
              </a>
            </li>
          </ul>
        </li>
        <!-- End Manage Product -->

        <!-- Manage Orders -->
        <li class="dropdown">
          <a href="{!!asset('admin/orders/list')!!}">
            <i class="fa fa-shopping-cart"></i> Orders
          </a>
        </li>
        <!-- End Manage Orders -->
      </ul>
      <!-- End Navigation Menu -->
    </li>
    <!-- End Navigation -->            
  </ul>
<!-- End Sidebar -->