    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="{{asset('home')}}"><strong>HP</strong>Shop</a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN CART -->
        <?php $i = 0; ?>
        @foreach($contentCart as $item)
        <?php $i++; ?>
        @endforeach
        <div class="top-cart-block">
          <div class="top-cart-info">
            <a href="javascript:void(0);" class="top-cart-info-count">{!!$i!!} <?php if($i == 0 || $i == 1){echo "item";}else{echo "items";}?></a>
            <a href="javascript:void(0);" class="top-cart-info-value">${!!$total!!}</a>
          </div>
          <i class="fa fa-shopping-cart"></i>
                        
          <div class="top-cart-content-wrapper">
            <div class="top-cart-content">
              <table width="100%">
              @foreach($contentCart as $item)
                  <tr>
                    <td width="10%"><img src="{!!asset('image/products/'.$item['options']['img'])!!}" width="50px"></td>
                    <td width="10%">x {!!$item['qty']!!}</td>
                    <td width="60%" align="center"><a href="{!!url('product-detail',[$item['id'], $item['options']['slug']])!!}">{!!$item['name']!!}</a></td>
                    <td width="10%">${!!$item['price']*$item['qty']!!}</td>
                    <td width="10%"><a href="{!!url('del-product-cart',['id'=>$item['rowid']])!!}" onClick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="glyphicon glyphicon-trash"></i></a></td>
                  </tr>
              @endforeach
              </table>            
              <div class="text-right">
                <a href="{{asset('del-cart')}}" class="btn btn-default">Clear Cart</a>
                <a href="{{asset('shopping-cart')}}" class="btn btn-success">View Cart</a>
                <a href="{{asset('checkout')}}" class="btn btn-primary">Checkout</a>
              </div>
            </div>
          </div>            
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
          <ul>
            <?php 
                $cate_lv1 = DB::table('categories')->where('parent_id', 0)->get();
            ?>
            @foreach($cate_lv1 as $cate_lv1)
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="{!!URL('category',[$cate_lv1->id,$cate_lv1->slug])!!}">{!!$cate_lv1->name!!}</a>
                
              <!-- BEGIN DROPDOWN MENU -->
              <ul class="dropdown-menu">
                <?php 
                    $cate_lv2 = DB::table('categories')->where('parent_id', $cate_lv1->id)->get();
                    show_cate_header($cate_lv2, $cate_lv1->id); //app/MyFunction/function.php
                ?>
              </ul>
              <!-- END DROPDOWN MENU -->
            </li>
            @endforeach
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">Pages</a>
                
              <ul class="dropdown-menu">
                <li><a href="{{asset('home')}}">Home</a></li>
                <li><a href="{{asset('shopping-cart')}}">Shopping Cart</a></li>
                <li><a href="{{asset('checkout')}}">Checkout</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">My Wish List</a></li>
                <li><a href="">FAQ</a></li>
                <li><a href="">Privacy Policy</a></li>
              </ul>
            </li>
            
            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                {!! Form::open([
                            'method' => 'POST', 
                            'action' =>  'SearchController@postSearch'
                            ]) 
                !!}
                  <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control" name="search">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                {!!Form::close()!!}
              </div> 
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->