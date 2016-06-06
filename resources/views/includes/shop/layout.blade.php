<!DOCTYPE html>

<html lang="en">

<!-- Head BEGIN -->
@include('includes.shop.head')
<!-- Head END -->

<!-- Body BEGIN -->
<body>
    <!-- BEGIN STYLE CUSTOMIZER -->
    @include('includes.shop.stylecus')
    <!-- END BEGIN STYLE CUSTOMIZER --> 

    <!-- BEGIN TOP BAR -->
    @include('includes.shop.topbar')
    <!-- END TOP BAR -->
    
    <!-- BEGIN HEADER -->
    @include('includes.shop.header')
    <!-- END HEADER -->

  	<!-- BEGIN CONTENT -->
  	@yield('content')
  	<!-- END CONTENT -->

    @include('includes.shop.brands')

    <!-- BEGIN STEPS -->
    @include('includes.shop.step')
    <!-- END STEPS -->

    <!-- BEGIN PRE-FOOTER -->
    @include('includes.shop.prefooter')
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    @include('includes.shop.footer')
    <!-- END FOOTER -->
    <!-- BEGIN FOOTER -->
    @include('includes.shop.script')
    <!-- END FOOTER -->
    
</body>
<!-- END BODY -->
</html>