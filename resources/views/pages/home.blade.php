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
    <!-- Header END -->
    @include('includes.shop.topslider')
<div class="main">
    <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SALE PRODUCT -->
            <div class="col-md-12 sale-product">
                <h2>Sale</h2>
                <div class="owl-carousel owl-carousel5">
                    @foreach($products as $item)
                     <div>
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img src="{!!asset('image/products/'.$item->image)!!}" class="img-responsive" alt="$item->slug">
                                <div>
                                    <a href="{!!asset('image/products/'.$item->image)!!}" class="btn btn-default fancybox-button">Zoom</a>
                                    <a href="{!!url('product-detail',[$item->id, $item->slug])!!}" class="btn btn-default fancybox-fast-view">View</a>
                                </div>
                            </div>
                            <h3><a href="{!!url('product-detail',[$item->id, $item->slug])!!}">{!!$item->name!!}</a></h3>
                            <div class="pi-price"><strong>${!!$item->price-$item->price*0.2!!}</strong> <del>${!!$item->price!!}</del></div>
                            <a href="{!!url('add2cart',[$item->id, $item->slug])!!}" class="btn btn-default add2cart">Add to cart</a>
                            <div class="sticker sticker-sale"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- END SALE PRODUCT -->
        </div>
        <!-- END SALE PRODUCT & NEW ARRIVALS -->
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40 ">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-4">
                @include('includes.shop.cate_sidebar')
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-8">
                <h2>New Arrivals</h2>
                <div class="owl-carousel owl-carousel3">
                @foreach($new_products as $new_product)
                    <div>
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img src="{!!asset('image/products/'.$new_product->image)!!}" class="img-responsive" alt="$new_product->slug">
                                <div>
                                    <a href="{!!asset('image/products/'.$new_product->image)!!}" class="btn btn-default fancybox-button">Zoom</a>
                                    <a href="{!!url('product-detail',[$new_product->id, $new_product->slug])!!}" class="btn btn-default fancybox-fast-view">View</a>
                                </div>
                            </div>
                            <h3><a href="{!!url('product-detail',[$new_product->id, $new_product->slug])!!}">{!!$new_product->name!!}</a></h3>
                            <div class="pi-price">${!!$new_product->price!!}</div>
                            <a href="{!!url('add2cart',[$item->id, $item->slug])!!}" class="btn btn-default add2cart">Add to cart</a>
                            <div class="sticker sticker-new"></div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
        <!-- BEGIN TWO PRODUCTS & PROMO -->
        <div class="row margin-bottom-35 ">
            <!-- BEGIN TWO PRODUCTS -->
            <div class="col-md-6 two-items-bottom-items">
                <h2>Recommended</h2>
                <div class="owl-carousel owl-carousel2">
                    @foreach($recommended as $item)
                    <div>
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img src="{!!asset('image/products/'.$item->image)!!}" class="img-responsive" alt="$item->slug">
                                <div>
                                    <a href="{!!asset('image/products/'.$item->image)!!}" class="btn btn-default fancybox-button">Zoom</a>
                                    <a href="{!!url('product-detail',[$item->id, $item->slug])!!}" class="btn btn-default fancybox-fast-view">View</a>
                                </div>
                            </div>
                            <h3><a href="{!!url('product-detail',[$item->id, $item->slug])!!}">{!!$item->name!!}</a></h3>
                            <div class="pi-price">${!!$item->price!!}</div>
                            <a href="{!!url('add2cart',[$item->id, $item->slug])!!}" class="btn btn-default add2cart">Add to cart</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- END TWO PRODUCTS -->
            <!-- BEGIN PROMO -->
            <div class="col-md-6 shop-index-carousel">
                <div class="content-slider">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{!!asset('assets/frontend/pages/img/index-sliders/slide1.jpg')!!}" class="img-responsive" alt="Berry Lace Dress">
                            </div>
                            <div class="item">
                                <img src="{!!asset('assets/frontend/pages/img/index-sliders/slide2.jpg')!!}" class="img-responsive" alt="Berry Lace Dress">
                            </div>
                            <div class="item">
                                <img src="{!!asset('assets/frontend/pages/img/index-sliders/slide3.jpg')!!}" class="img-responsive" alt="Berry Lace Dress">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROMO -->
        </div>
        <!-- END TWO PRODUCTS & PROMO -->
    </div>
</div>

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
    @include('includes.shop.script')
    <script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",25666]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>
</body>
<!-- END BODY -->
</html>