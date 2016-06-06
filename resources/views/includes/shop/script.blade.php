  <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->

    <script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>      
    <script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/rateit/src/jquery.rateit.js')}}" type="text/javascript"></script>
    
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="{{asset('assets/global/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script><!-- pop up -->
    <script src="{{asset('assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js')}}" type="text/javascript"></script><!-- slider for products -->
    <script src="{{asset('assets/global/plugins/zoom/jquery.zoom.min.js')}}" type="text/javascript"></script><!-- product zoom -->
    <script src="{{asset('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js')}}" type="text/javascript"></script><!-- Quantity -->

    <!-- BEGIN LayerSlider -->
    <script src="{{asset('assets/global/plugins/slider-layer-slider/js/greensock.js')}}" type="text/javascript"></script><!-- External libraries: GreenSock -->
    <script src="{{asset('assets/global/plugins/slider-layer-slider/js/layerslider.transitions.js')}}" type="text/javascript"></script><!-- LayerSlider script files -->
    <script src="{{asset('assets/global/plugins/slider-layer-slider/js/layerslider.kreaturamedia.jquery.js')}}" type="text/javascript"></script><!-- LayerSlider script files -->
    <script src="{{asset('assets/frontend/pages/scripts/layerslider-init.js')}}" type="text/javascript"></script>
    <!-- END LayerSlider -->

    <script src="{{asset('assets/frontend/layout/scripts/layout.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            LayersliderInit.initLayerSlider();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initTwitter();
            Layout.initUniform();
            Layout.initSliderRange();
            Layout.initFixHeaderWithPreHeader();
            Layout.initNavScrolling();
            Checkout.init();
        });
    </script>