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
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">{!!$cate->name!!}</li>
                </ul>
                <!-- BEGIN SIDEBAR & CONTENT -->
                <div class="row margin-bottom-40">
                    <!-- BEGIN SIDEBAR -->
                    <div class="sidebar col-md-3 col-sm-5">
                        @include('includes.shop.cate_sidebar')
                        <div class="sidebar-filter margin-bottom-25">
                            <h2>Filter</h2>
                            <h3>Availability</h3>
                            <div class="checkbox-list">
                                <label><input type="checkbox"> Not Available</label>
                                <label><input type="checkbox"> In Stock</label>
                            </div>
                        </div>
                        <div class="sidebar-products clearfix">
                            <h2>Recommended</h2>
                            @foreach($recommended as $item)
                            <div class="item">
                                <a href="{!!url('product-detail',[$item->id, $item->slug])!!}"><img src="{!!asset('image/products/'.$item->image)!!}" alt="Some Shoes in Animal with Cut Out"></a>
                                <h3><a href="{!!url('product-detail',[$item->id, $item->slug])!!}">{!!$item->name!!}</a></h3>
                                <div class="price">${!!$item->price!!}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- END SIDEBAR -->
                    <!-- BEGIN CONTENT -->
                    <div class="col-md-9 col-sm-7">
                        <div class="row list-view-sorting clearfix">
                            <div class="col-md-2 col-sm-2 list-view">
                                <a href="#"><i class="fa fa-th-large"></i></a>
                                <a href="#"><i class="fa fa-th-list"></i></a>
                            </div>
                            <div class="col-md-10 col-sm-10">
                                <div class="pull-right">
                                    Sort By:
                                    <a href="{!!asset('category/'.$cate->id.'/'.$cate->slug.'/nameAsc')!!}">Name(A-Z)</a>
                                    <a href="{!!asset('category/'.$cate->id.'/'.$cate->slug.'/nameDesc')!!}">Name(Z-A)</a>
                                    <a href="{!!asset('category/'.$cate->id.'/'.$cate->slug.'/priceAsc')!!}">Price(Low&gt;High)</a>
                                    <a href="{!!asset('category/'.$cate->id.'/'.$cate->slug.'/priceDesc')!!}">Price(High&gt;Low)</a>
                                    <a href="{!!asset('category/'.$cate->id.'/'.$cate->slug.'/newest')!!}">Newest</a>
                                </div>
                            </div>
                        </div>
                        <!-- BEGIN PRODUCT LIST -->
                        <div class="row product-list">
                            <!-- PRODUCT ITEM START -->
                            @foreach ($product_cate as $item)
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="product-item">
                                    <div class="pi-img-wrapper">
                                        <img src="{!!asset('image/products/'.$item->image)!!}" class="img-responsive" alt="">
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

                            <!-- PRODUCT ITEM END -->
                        </div>
                        <!-- END PRODUCT LIST -->
                        <!-- BEGIN PAGINATOR -->
                        <div class="row">
                            <div class="col-md-4 col-sm-4 items-info">Tổng số trang {!!$product_cate->lastPage()!!} </div>
                            <div class="col-md-8 col-sm-8">
                                <ul class="pagination pull-right">
                                    @if($product_cate->currentPage() != 1)
                                    <li><a href="{!!str_replace('/?','?',$product_cate->url($product_cate->currentPage() - 1))!!}">&laquo;</a></li>
                                    @endif
                                    @for($i = 1; $i <= $product_cate->lastPage(); $i++ )
                                    <li class="{!!($product_cate->currentPage() == $i ? 'active' : '')!!}">
                                        <a href="{!!str_replace('/?','?',$product_cate->url($i))!!}">{!!$i!!}</a>
                                    </li>
                                    @endfor
                                    @if($product_cate->currentPage() != $product_cate->lastPage())
                                    <li><a href="{!!str_replace('/?','?',$product_cate->url($product_cate->currentPage() + 1))!!}">&raquo;</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <!-- END PAGINATOR -->
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
        @include('includes.shop.script')
        <script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",25666]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>
    </body>
    <!-- END BODY -->
</html>
