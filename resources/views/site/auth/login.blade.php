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
<script type="text/javascript" src="{{ config('voyager.assets_path') }}/lib/js/toastr.min.js"></script>
@stop

@section('css')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ config('voyager.assets_path') }}/lib/css/toastr.min.css">
<!-- font-awesome -->
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
@stop

@section('content')
<style>
.login-margin-top {
  margin-top: 100px;
}

.remember-font {
  font-weight: normal;
  font-size: 15px;
}
</style>

<script type="text/javascript">
$('document').ready(function () {    
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}');
        @endforeach
    @endif

    {!! $errors->has('g-recaptcha-response') ? 'alert("請勾選驗證服務!");' : '' !!}
});
</script>

<div class="container login-margin-top">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading">LaravelDemoSite 會員登入</div>
          <div class="panel-body">
              <form role="form" action="{{ url('/login') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group div-margin-top{{ $errors->has('email') ? ' has-error' : '' }}">
                      <div class="input-group col-md-8 col-md-offset-2">
                          <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="email" id="email" placeholder="請輸入您的電子郵件" value="{{ old('email') }}" autofocus required />
                      </div>
                      @if ($errors->has('email'))
                      <div class="col-md-8 col-md-offset-2">      
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      </div>
                      @endif
                  </div>

                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <div class="input-group col-md-8 col-md-offset-2">
                          <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                          <input type="password" class="form-control" name="password" id="password" placeholder="請輸入您的密碼" required />
                      </div>
                      @if ($errors->has('password'))
                      <div class="col-md-8 col-md-offset-2">      
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      </div>
                      @endif
                  </div>

                  <div class="row form-group col-md-offset-2{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                      <label class=""></label>
                      <div class="col-md-8">
                          {!! app('captcha')->display(); !!}
                      </div>
                      @if ($errors->has('g-recaptcha-response'))
                      <div class="col-md-8 col-md-offset-2">      
                          <span class="help-block">
                              <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                          </span>
                      </div>
                      @endif
                  </div>

                  <div class="form-group">
                      <div class="col-md-offset-2 ">
                          <div class="">
                              <label class="remember-font">
                                  <input type="checkbox" name="remember"> 記住我
                              </label>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-offset-4 col-sm-offset-5 col-xs-offset-4">
                          <button type="submit" class="btn btn-primary">登入</button>
                          <a class="btn btn-default" href="{{ url('/password/reset') }}">忘記密碼&#63;</a>                                                       
                      </div>
                  </div>

              </form>
          </div>
          <div class="panel-footer decoration-none text-center">還不是會員&#63;&nbsp;<a href="{{ url('/register') }}">加入會員</a></div>
        </div>
    </div>
</div>

@stop
