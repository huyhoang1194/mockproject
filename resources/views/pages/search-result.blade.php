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
                    <li class="active">Search Result</li>
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
                            <h2>Bestsellers</h2>
                            <div class="item">
                                <a href="shop-item.html"><img src="../../assets/frontend/pages/img/products/k1.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                                <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
                                <div class="price">$31.00</div>
                            </div>
                            <div class="item">
                                <a href="shop-item.html"><img src="../../assets/frontend/pages/img/products/k4.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                                <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
                                <div class="price">$23.00</div>
                            </div>
                            <div class="item">
                                <a href="shop-item.html"><img src="../../assets/frontend/pages/img/products/k3.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                                <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
                                <div class="price">$86.00</div>
                            </div>
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
                                    <label class="control-label">Sort&nbsp;By:</label>
                                    <select class="form-control input-sm">
                                        <option value="#?sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
                                        <option value="#?sort=pd.name&amp;order=ASC">Name (A - Z)</option>
                                        <option value="#?sort=pd.name&amp;order=DESC">Name (Z - A)</option>
                                        <option value="#?sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
                                        <option value="#?sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- BEGIN PRODUCT LIST -->
                        <div class="row product-list">
                            <!-- PRODUCT ITEM START -->
                            @foreach ($product_search as $item)
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
                            <div class="col-md-4 col-sm-4 items-info">Tổng số trang {!!$product_search->lastPage()!!} </div>
                            <div class="col-md-8 col-sm-8">
                                <ul class="pagination pull-right">
                                    @if($product_search->currentPage() != 1)
                                    <li><a href="{!!str_replace('/?','?',$product_search->url($product_search->currentPage() - 1))!!}">&laquo;</a></li>
                                    @endif
                                    @for($i = 1; $i <= $product_search->lastPage(); $i++ )
                                    <li class="{!!($product_search->currentPage() == $i ? 'active' : '')!!}">
                                        <a href="{!!str_replace('/?','?',$product_search->url($i))!!}">{!!$i!!}</a>
                                    </li>
                                    @endfor
                                    @if($product_search->currentPage() != $product_search->lastPage())
                                    <li><a href="{!!str_replace('/?','?',$product_search->url($product_search->currentPage() + 1))!!}">&raquo;</a></li>
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
