    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+84 0962 645 303</span></li>
                        <!-- BEGIN CURRENCIES -->
                        <li class="shop-currencies">
                            <a href="javascript:void(0);">€</a>
                            <a href="javascript:void(0);">£</a>
                            <a href="javascript:void(0);" class="current">$</a>
                        </li>
                        <!-- END CURRENCIES -->
                        <!-- BEGIN LANGS -->
                        <li class="langs-block">
                            <a href="javascript:void(0);" class="current">English </a>
                            <div class="langs-block-others-wrapper"><div class="langs-block-others">
                              <a href="javascript:void(0);">Vietnamese</a>
                              <a href="javascript:void(0);">French</a>
                              <a href="javascript:void(0);">Germany</a>
                            </div></div>
                        </li>
                        <!-- END LANGS -->
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                        @if (Auth::guest())
                            <li><a href="{!!asset('auth/login')!!}">Login</a></li>
                            <li><a href="{!!asset('auth/register')!!}">Register</a></li>
                        @else
                            @if (Auth::user()->role_id == 1)
                                <li><a href="{!!asset('admin')!!}"> Admin</a></li>
                                <li><a href="{!!asset('my-account')!!}">My Account</a></li>
                                <li><a href="{!!asset('auth/logout')!!}">Logout</a></li>
                            @else
                                <li><a href="{!!asset('my-account')!!}">My Account</a></li>
                                <li><a href="{!!asset('auth/logout')!!}">Logout</a></li>
                            @endif
                        @endif
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->
