<!DOCTYPE html>
<html lang="en">
    <!-- Head BEGIN -->
    @include('includes.shop.head')
    <!-- Head END -->
    <!-- Body BEGIN -->
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=957256091000886";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!-- BEGIN STYLE CUSTOMIZER -->
        @include('includes.shop.stylecus')
        <!-- END BEGIN STYLE CUSTOMIZER --> 
        <!-- BEGIN TOP BAR -->
        @include('includes.shop.topbar')
        <!-- END TOP BAR -->
        <!-- BEGIN HEADER -->
        @include('includes.shop.header')
        <!-- Header END -->
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="">Store</a></li>
                    <li class="active">Men category</li>
                </ul>
                <!-- BEGIN SIDEBAR & CONTENT -->
                <div class="row margin-bottom-40">
                    <!-- BEGIN SIDEBAR -->
                    <div class="sidebar col-md-3 col-sm-5">
                        @include('includes.shop.cate_sidebar')
                        <div class="sidebar-products clearfix">
                            <h2>Recommended</h2>
                            @foreach($recommended as $item)
                            <div class="item">
                                <a href="shop-item.html"><img src="{!!asset('image/products/'.$item->image)!!}"></a>
                                <h3><a href="{!!url('product-detail',[$item->id, $item->slug])!!}">{!!$item->name!!}</a></h3>
                                <div class="price">${!!$item->price!!}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- END SIDEBAR -->
                    <!-- BEGIN CONTENT -->
                    <div class="col-md-9 col-sm-7">
                        <div class="product-page">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="product-main-image">
                                        <img src="{!!asset('/image/products/'.$product_detail->image)!!}" class="img-responsive" data-BigImgsrc="{!!asset('/image/products/'.$product_detail->image)!!}">
                                    </div>
                                    <div class="product-other-images">
                                        @foreach($image_detail as $item)
                                        <a href="{!!asset('/image/products/detail/'.$item->title)!!}" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="{!!asset('/image/products/detail/'.$item->title)!!}"></a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <h1>{!!$product_detail->name!!}</h1>
                                    <div class="price-availability-block clearfix">
                                        <div class="price">
                                            <strong><span>$</span>{!!$product_detail->price!!}</strong>
                                        </div>
                                        <div class="availability">
                                            Availability: <strong>
                                            @if ($product_detail->availability == 1)
                                            In Stock
                                            @else
                                            Out Of Stock
                                            @endif</strong>
                                        </div>
                                    </div>
                                    {!! Form::open([
                                            'method' => 'POST', 
                                            'action' =>  ['PagesController@add2cart', $product_detail->id, $product_detail->slug], 
                                            ]
                                        ) 
                                    !!}
                                    <div class="product-page-options clearfix">
                                        <table>
                                            <tr>
                                                <div class="form-group">
                                                    <td><label class="control-label" >Size:</label></td>
                                                    <td>
                                                        <select class="form-control" name="size" style="width:80px">
                                                            <option value="36">36</option>
                                                            <option value="37">37</option>
                                                            <option value="38">38</option>
                                                            <option value="39">39</option>
                                                            <option value="40">40</option>
                                                            <option value="41">41</option>
                                                            <option value="42">42</option>
                                                            <option value="43">43</option>
                                                        </select>
                                                    </td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="form-group">
                                                    <td><label class="control-label" >Quantity:</label></td>
                                                    <td>
                                                        <input type="number" value="1" name="qty" class="form-control" style="width:80px">
                                                    </td>
                                                </div>
                                            </tr>
                                        </table>
                                    </div>
                                    
                                        <div class="product-page-cart">
                                            <input type="submit" class="btn btn-primary" value="Add to cart">
                                        </div>
                                    {!!Form::close()!!}
                                    
                                </div>
                                <div class="product-page-content">
                                    <ul id="myTab" class="nav nav-tabs">
                                        <li><a href="#Description" data-toggle="tab">Description</a></li>
                                        <li class="active"><a href="#Reviews" data-toggle="tab">Reviews</a></li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div class="tab-pane fade" id="Description">
                                            <p>{!!$product_detail->description!!}</p>
                                        </div>
                                        <div class="tab-pane fade in active" id="Reviews">
                                            <div class="fb-comments" data-href="http://manutdvn.zz.mu/" data-numposts="5"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sticker sticker-sale"></div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT -->
                </div>
                <!-- END SIDEBAR & CONTENT -->
            </div>
        </div>
        <!-- BEGIN BRANDS -->
        @include('includes.shop.brands')
        <!-- END BRANDS -->
        <!-- BEGIN STEPS -->
        @include('includes.shop.step')
        <!-- END STEPS -->
        <!-- BEGIN PRE-FOOTER -->
        @include('includes.shop.prefooter')
        <!-- END PRE-FOOTER -->
        <!-- BEGIN FOOTER -->
        @include('includes.shop.footer')
        <!-- END FOOTER -->

            <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS -->
    <script src="{!!asset('assets/global/plugins/jquery.min.js')!!}" type="text/javascript"></script>
    <script src="{!!asset('assets/global/plugins/jquery-migrate.min.js')!!}" type="text/javascript"></script>
    <script src="{!!asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')!!}" type="text/javascript"></script>      
    <script src="{!!asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')!!}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS -->
    <script src="{!!asset('assets/global/plugins/fancybox/source/jquery.fancybox.pack.js')!!}" type="text/javascript"></script><!-- pop up -->
    <script src="{!!asset('assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js')!!}" type="text/javascript"></script><!-- slider for products -->
    <script src="{!!asset('assets/global/plugins/zoom/jquery.zoom.min.js')!!}" type="text/javascript"></script><!-- product zoom -->
    <script src="{!!asset('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js')!!}" type="text/javascript"></script><!-- Quantity -->
    <script src="{!!asset('assets/global/plugins/uniform/jquery.uniform.min.js')!!}" type="text/javascript"></script>
    <script src="{!!asset('assets/global/plugins/rateit/src/jquery.rateit.js')!!}" type="text/javascript"></script>

    <script src="{!!asset('assets/frontend/layout/scripts/layout.js')!!}" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            Layout.initTwitter();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initUniform();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
    <script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",25666]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>
    </body>
    <!-- END BODY -->
</html>