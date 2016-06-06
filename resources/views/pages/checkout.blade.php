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
                    <li class="active">Checkout</li>
                </ul>
                <!-- BEGIN SIDEBAR & CONTENT -->
                <div class="row margin-bottom-40">
                    <!-- BEGIN CONTENT -->
                    <div class="col-md-12 col-sm-12">
                        <h1>Checkout</h1>
                        <!-- BEGIN CHECKOUT PAGE -->
                        <div class="row">
                            <div class="col-xs-12">
                                @if ($alert = Session::get('successMessage'))
                                    <div class="alert alert-success">
                                        <h4>{{ $alert }}</h4>
                                    </div>
                                @endif
                                @if ($alert = Session::get('errorMessage'))
                                    <div class="alert alert-danger">
                                        <h4>{{ $alert }}</h4>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if (Auth::guest())
                        <div class="panel-group checkout-page accordion scrollable" id="checkout-page">
                            {!! Form::open([
                            'method' => 'POST', 
                            'action' =>  'OrdersController@postCheckout'
                            ]) 
                            !!}
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Customer Name <span class="require">*</span></label>
                                    <input type="text" class="form-control" name="customer_name">
                                </div>
                                <div class="form-group">
                                    <label>E-Mail <span class="require">*</span></label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label>Phone <span class="require">*</span></label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                                <div class="form-group">
                                    <label>Fax</label>
                                    <input type="text" class="form-control" name="fax">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Address 1 <span class="require">*</span></label>
                                    <input type="text" class="form-control" name="address_1">
                                </div>
                                <div class="form-group">
                                    <label>Address 2</label>
                                    <input type="text" class="form-control" name="address_2">
                                </div>
                                <div class="form-group">
                                    <label>Post Code </label>
                                    <input type="text" class="form-control" name="post_code">
                                </div>
                                <div class="form-group">
                                    <label>Required Date <span class="require">*</span></label>
                                    <input type="date" class="form-control" name="required_date">
                                </div>
                            </div>
                            <div class="panel-body row">
                                <div class="col-md-12 clearfix">
                                    <div class="table-wrapper-responsive">
                                        <table>
                                            <tr>
                                                <th class="goods-page-image">Image</th>
                                                <th class="goods-page-description">Product Name</th>
                                                <th class="goods-page-quantity">Quantity</th>
                                                <th class="goods-page-quantity">Size</th>
                                                <th class="goods-page-total" colspan="2">Action</th>
                                                <th class="goods-page-price">Unit price</th>
                                                <th class="goods-page-total">Total</th>
                                            </tr>
                                            <form action="" method="post">
                                                <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                                                @foreach($contentCart as $item)
                                                <tr>
                                                    <td class="goods-page-image">
                                                        <a href="{!!url('product-detail',[$item->id, $item->slug])!!}"><img src="{!!asset('image/products/'.$item['options']['img'])!!}" alt="Berry Lace Dress"></a>
                                                    </td>
                                                    <td class="goods-page-description">
                                                        <h3><a href="{!!url('product-detail',[$item->id, $item['options']['slug']])!!}">{!!$item['name']!!}</a></h3>
                                                    </td>
                                                    <td class="goods-page-quantity">
                                                        <input type="number" value="{!!$item['qty']!!}" class="qty form-control" style="width:80px;">
                                                    </td>
                                                    <td>
                                                        <select class="size form-control" name="size" style="width:80px;">
                                                            <option value="{{$item['options']['size']}}" selected="selected">{{$item['options']['size']}}</option>
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
                                                    <td class="del-goods-col">
                                                        <a href="javascript:void(0)" class="updatecart" id="{!!$item['rowid']!!}"><i class="glyphicon glyphicon-refresh"></i></a>
                                                    </td>
                                                    <td class="del-goods-col">
                                                        <a href="{!!url('del-product-cart-2',['id'=>$item['rowid']])!!}" onClick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="glyphicon glyphicon-trash"></i></a>
                                                    </td>
                                                    <td class="goods-page-price">
                                                        <strong><span>$</span>{!!$item['price']!!}</strong>
                                                    </td>
                                                    <td class="goods-page-total">
                                                        <strong><span>$</span>{!!$item['qty']*$item['price']!!}</strong>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </form>
                                        </table>
                                    </div>
                                    <div class="checkout-total-block">
                                        <ul>
                                            <li class="checkout-total-price">
                                                <em>Total</em>
                                                <strong class="price"><span>$</span>{{$total}}</strong>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button class="btn btn-primary pull-right" type="submit" id="button-confirm">Confirm Order</button>
                                    <button type="button" class="btn btn-default pull-right margin-right-20">Cancel</button>
                                </div>
                            </div>
                            {!!Form::close()!!}
                        </div>
                        @else
                        <div class="panel-group checkout-page accordion scrollable" id="checkout-page">
                            {!! Form::open([
                            'method' => 'POST', 
                            'action' =>  'OrdersController@postCheckout'
                            ]) 
                            !!}
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Customer Name <span class="require">*</span></label>
                                    <input type="text" class="form-control" name="customer_name" value="{!!Auth::user()->name!!}">
                                </div>
                                <div class="form-group">
                                    <label>E-Mail <span class="require">*</span></label>
                                    <input type="text" class="form-control" name="email" value="{!!Auth::user()->email!!}">
                                </div>
                                <div class="form-group">
                                    <label>Phone <span class="require">*</span></label>
                                    <input type="text" class="form-control" name="phone" value="{!!Auth::user()->phone!!}">
                                </div>
                                <div class="form-group">
                                    <label>Fax</label>
                                    <input type="text" class="form-control" name="fax" value="{!!Auth::user()->fax!!}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Address 1 <span class="require">*</span></label>
                                    <input type="text" class="form-control" name="address_1" value="{!!Auth::user()->address!!}">
                                </div>
                                <div class="form-group">
                                    <label>Address 2</label>
                                    <input type="text" class="form-control" name="address_2">
                                </div>
                                <div class="form-group">
                                    <label>Post Code </label>
                                    <input type="text" class="form-control" name="post_code" value="{!!Auth::user()->post_code!!}">
                                </div>
                                <div class="form-group">
                                    <label>Required Date <span class="require">*</span></label>
                                    <input type="date" class="form-control" name="required_date">
                                </div>
                            </div>
                            <div class="panel-body row">
                                <div class="col-md-12 clearfix">
                                    <div class="table-wrapper-responsive">
                                        <table>
                                            <tr>
                                                <th class="goods-page-image">Image</th>
                                                <th class="goods-page-description">Product Name</th>
                                                <th class="goods-page-quantity">Quantity</th>
                                                <th class="goods-page-quantity">Size</th>
                                                <th class="goods-page-total" colspan="2">Action</th>
                                                <th class="goods-page-price">Unit price</th>
                                                <th class="goods-page-total">Total</th>
                                            </tr>
                                            <form action="" method="post">
                                                <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                                                @foreach($contentCart as $item)
                                                <tr>
                                                    <td class="goods-page-image">
                                                        <a href="{!!url('product-detail',[$item->id, $item->slug])!!}"><img src="{!!asset('image/products/'.$item['options']['img'])!!}" alt="Berry Lace Dress"></a>
                                                    </td>
                                                    <td class="goods-page-description">
                                                        <h3><a href="{!!url('product-detail',[$item->id, $item['options']['slug']])!!}">{!!$item['name']!!}</a></h3>
                                                    </td>
                                                    <td class="goods-page-quantity">
                                                        <input type="number" value="{!!$item['qty']!!}" class="qty form-control" style="width:80px;">
                                                    </td>
                                                    <td>
                                                        <select class="size form-control" name="size" style="width:80px;">
                                                            <option value="{{$item['options']['size']}}" selected="selected">{{$item['options']['size']}}</option>
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
                                                    <td class="del-goods-col">
                                                        <a href="javascript:void(0)" class="updatecart" id="{!!$item['rowid']!!}"><i class="glyphicon glyphicon-refresh"></i></a>
                                                    </td>
                                                    <td class="del-goods-col">
                                                        <a href="{!!url('del-product-cart-2',['id'=>$item['rowid']])!!}" onClick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="glyphicon glyphicon-trash"></i></a>
                                                    </td>
                                                    <td class="goods-page-price">
                                                        <strong><span>$</span>{!!$item['price']!!}</strong>
                                                    </td>
                                                    <td class="goods-page-total">
                                                        <strong><span>$</span>{!!$item['qty']*$item['price']!!}</strong>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </form>
                                        </table>
                                    </div>
                                    <div class="checkout-total-block">
                                        <ul>
                                            <li class="checkout-total-price">
                                                <em>Total</em>
                                                <strong class="price"><span>$</span>{{$total}}</strong>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button class="btn btn-primary pull-right" type="submit" id="button-confirm">Confirm Order</button>
                                    <button type="button" class="btn btn-default pull-right margin-right-20">Cancel</button>
                                </div>
                            </div>
                            {!!Form::close()!!}
                        </div>
                        @endif
                        <!-- END CHECKOUT PAGE -->
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
        <script src="{!!asset('assets/global/plugins/jquery.min.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/global/plugins/jquery-migrate.min.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')!!}" type="text/javascript"></script>      
        <script src="{!!asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')!!}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
        <script src="{!!asset('assets/global/plugins/fancybox/source/jquery.fancybox.pack.js')!!}" type="text/javascript"></script><!-- pop up -->
        <script src="{!!asset('assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js')!!}" type="text/javascript"></script><!-- slider for products -->
        <script src="{!!asset('assets/global/plugins/zoom/jquery.zoom.min.js')!!}" type="text/javascript"></script><!-- product zoom -->
        <script src="{!!asset('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js')!!}" type="text/javascript"></script><!-- Quantity -->
        <script src="{!!asset('assets/global/plugins/uniform/jquery.uniform.min.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/frontend/layout/scripts/layout.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/frontend/pages/scripts/checkout.js')!!}" type="text/javascript"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                Layout.init();    
                Layout.initOWL();
                Layout.initTwitter();
                Layout.initImageZoom();
                Layout.initTouchspin();
                Layout.initUniform();
                Checkout.init();
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.updatecart').click(function(){
                    var id = $(this).attr('id');
                    var qty = $(this).parent().parent().find(".qty").val();
                    var size = $(this).parent().parent().find(".size").val();
                    var _token = $("input[name='_token']").val();
                    $.ajax({
                        url:'update_cart/'+id+'/'+qty+'/'+size,
                        type:'GET',
                        cache:false,
                        data:{"_token":_token,"id":id,"qty":qty,"size":size},
                        success:function(data){
                            if(data == "ok"){
                                window.location = "checkout";
                            }
                        }
                    });
                });
            });
        </script>
        <script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",25666]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>
    </body>
    <!-- END BODY -->
</html>