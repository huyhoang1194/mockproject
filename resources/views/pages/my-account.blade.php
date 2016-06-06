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
                    <li class="active">My Account</li>
                </ul>
                <!-- BEGIN SIDEBAR & CONTENT -->
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
                <div class="row margin-bottom-40">
                    <!-- BEGIN CONTENT -->
                    {!! Form::open([
                            'method' => 'POST', 
                            'action' =>  'AccountController@postMyAccount'
                            ]) 
                    !!}
                    <div class="col-md-12 col-sm-12">
                        <h1>My Account</h1>
                        <!-- BEGIN ACCOUNT PAGE -->
                        <div class="panel-group checkout-page accordion scrollable" id="checkout-page">
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
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{!!Auth::user()->name!!}">
                                </div>
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="text" class="form-control" name="email" value="{!!Auth::user()->email!!}">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{!!Auth::user()->phone!!}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" value="{!!Auth::user()->address!!}">
                                </div>
                                 <div class="form-group">
                                    <label>Fax</label>
                                    <input type="text" class="form-control" name="fax" value="{!!Auth::user()->fax!!}">
                                </div>
                                <div class="form-group">
                                    <label>Post Code </label>
                                    <input type="text" class="form-control" name="post_code" value="{!!Auth::user()->post_code!!}">
                                </div>
                            </div>
                        </div>
                        <!-- END ACCOUNT PAGE -->
                    </div>
                    <button class="btn btn-primary pull-right" type="submit" id="button-confirm">Update Info</button>
                    <button type="button" class="btn btn-default pull-right margin-right-20" type="reset">Cancel</button>
                    {!!Form::close()!!}
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