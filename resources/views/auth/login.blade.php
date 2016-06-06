@extends('includes.shop.layout')
@section('content')
@include('errors.errors')
<div class="row margin-bottom-40">
  <div class="col-xs-12 col-md-6 col-lg-6 col-lg-offset-3">
    <h1>Login</h1>
    @if ($alert = Session::get('successMessage'))
    <div class="alert alert-success">
      {{ $alert }}
    </div>
    @endif
    @if ($alert = Session::get('errorMessage'))
    <div class="alert alert-danger">
      {{ $alert }}
    </div>
    @endif
    <div class="content-form-page">
      <div class="row">
        <div class="col-md-12 col-sm-12">
        <form class="form-horizontal form-without-legend" role="form" method="post" action="{{ url('/auth/login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" class="form-control" id="email" name="email">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 col-md-offset-4 padding-left-0">
                <a href="page-forgotton-password.html">Forget Password?</a>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-10 padding-right-30">
                <hr>
                <div class="login-socio">
                  <p class="text-muted">or login using:</p>
                  <ul class="social-icons">
                    <li><a href="#" data-original-title="facebook" class="facebook" title="facebook"></a></li>
                    <li><a href="#" data-original-title="Twitter" class="twitter" title="Twitter"></a></li>
                    <li><a href="#" data-original-title="Google Plus" class="googleplus" title="Google Plus"></a></li>
                    <li><a href="#" data-original-title="Linkedin" class="linkedin" title="LinkedIn"></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection