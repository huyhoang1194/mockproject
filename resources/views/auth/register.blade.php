@extends('includes.shop.layout')
@section('content')
@include('errors.errors')
<div class="row margin-bottom-40">
  <div class="col-xs-12 col-md-6 col-lg-6 col-lg-offset-3">
    <h1>Create an account</h1>
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
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
              <legend>Your personal details</legend>
              <div class="form-group">
                <label for="lastname" class="col-lg-4 control-label">Name <span class="require">*</span></label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" id="lastname" name="name">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" id="email" name="email">
                </div>
              </div>
            </fieldset>
            <fieldset>
              <legend>Your password</legend>
              <div class="form-group">
                <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                <div class="col-lg-8">
                  <input type="password" class="form-control" id="password" name="password">
                </div>
              </div>
              <div class="form-group">
                <label for="confirm-password" class="col-lg-4 control-label">Confirm password <span class="require">*</span></label>
                <div class="col-lg-8">
                  <input type="password" class="form-control" id="confirm-password" name="password_confirmation">
                </div>
              </div>
<!--               {!! Recaptcha::render() !!}
              <div class="g-recaptcha" data-sitekey="6LdL7QoTAAAAAPSISVs9FyZfrPe4Lc9xX2j6zV5u"></div> -->
            </fieldset>
            <div class="row">
              <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                <button type="submit" class="btn btn-primary">Create an account</button>
                <button type="reset" class="btn btn-default">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection