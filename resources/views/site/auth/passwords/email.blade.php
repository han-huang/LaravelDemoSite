@extends('site.layouts.master')

@section('meta')
<meta name="description" content="">
<meta name="author" content="Han Huang">
<!-- Open Graph Protocol  -->
<meta property="og:url"         content="{{ Request::url() }}" />
<meta property="og:type"        content="website" />
<meta property="og:title"       content="LaravelDemoSite" />
<meta property="og:description" content="LaravelDemoSite" />
<meta property="og:image"       content="" />
<meta property="og:site_name"   content="LaravelDemoSite" />
@stop

@section('pageTitle')
<title>LaravelDemoSite</title>
@stop

@section('javascript')
<script type="text/javascript" src=""></script>
@stop

@section('css')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
<!-- font-awesome -->
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
@stop

@section('content')
<style>
.container-margin-top {
  margin-top: 100px;
}
</style>

<script type="text/javascript">
</script>

<div class="container container-margin-top">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading">LaravelDemoSite 重新設定密碼</div>
          <div class="panel-body">
              @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif
          
              <form role="form" action="{{ url('/password/email') }}" method="POST">
                  {{ csrf_field() }}

                  <div class="form-group div-margin-top{{ $errors->has('email') ? ' has-error' : '' }}">
                      <div class="input-group col-md-8 col-md-offset-2">
                          <span class="input-group-addon"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i></span>
                          <input type="text" class="form-control input-lg" name="email" id="email" placeholder="請輸入您的電子郵件" value="{{ old('email') }}" autofocus required />
                      </div>
                      @if ($errors->has('email'))
                      <div class="col-md-8 col-md-offset-2">      
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      </div>
                      @endif
                  </div>

                  <div class="row form-group col-md-offset-2 col-sm-offset-3 col-xs-offset-2{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                      <label class=""></label>
                      <div class="col-md-8">
                          {!! app('captcha')->display(); !!}
                      </div>
                      @if ($errors->has('g-recaptcha-response'))
                      <div class="col-md-8 ">      
                          <span class="help-block">
                              <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                          </span>
                      </div>
                      @endif
                  </div>

                  <div class="form-group">
                      <div class="row col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
                          <button type="submit" class="btn btn-primary btn-lg">寄送重設密碼連結</button>
                      </div>
                  </div>

              </form>
          </div>

        </div>
    </div>
</div>

@stop
