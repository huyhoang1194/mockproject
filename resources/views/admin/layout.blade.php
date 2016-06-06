<!DOCTYPE html>
<html>
  <head>
  @include('includes.admin.head')
  </head>
  <body class="bg-1">
    <!-- Preloader -->
    <!-- <div class="mask"><div id="loader"></div></div> -->
    <!--End Preloader -->

    <!-- Wrap All Page Content -->
    <div id="wrap">
      <!-- Page Fluid-->
      <div class="row">
        <!-- Fixed Navbar-->
        @include('includes.admin.navbar')
        <!-- End Fixed Navbar-->
        
        <!-- Page Content -->
        <div id="content" class="col-md-12">

          <!-- page header -->
          <div class="pageheader">
            

            <h2>@yield('title')</h2>
            
          </div>
          <!-- /page header -->

          <!-- content main container -->
          <div class="main">

            <!-- row -->
            <div class="row">
            @yield('content')
            </div>
            <!-- /row -->

          </div>
          <!-- /content container -->

        </div>
        <!-- Page content end -->

      </div>
      <!-- End Page Fluid-->

    </div>
    <!-- End Wrap All Page Content -->
  </body>
</html>
      
