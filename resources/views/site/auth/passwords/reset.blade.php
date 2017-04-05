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
$('document').ready(function () {
    {{--
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}');
        @endforeach
    @endif

    @if (count($errors) > 0)
        @foreach ($errors->keys() as $key)
            toastr.error('{{ $key }}');
        @endforeach
    @endif
    --}}

    {{-- {!! $errors->has('g-recaptcha-response') ? 'alert("請勾選驗證服務!");' : '' !!} --}}
});
</script>

<div class="container container-margin-top">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading">LaravelDemoSite 重設密碼</div>
          <div class="panel-body">
              @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif

              <form role="form" action="{{ url('/password/reset') }}" method="POST">
                  {{ csrf_field() }}

                  <input type="hidden" name="token" value="{{ $token }}">

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

                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <div class="input-group col-md-8 col-md-offset-2">
                          <span class="input-group-addon"><i class="fa fa-lock fa-2x" aria-hidden="true"></i></span>
                          <input type="password" class="form-control input-lg" name="password" id="password" placeholder="請輸入至少6個字元的密碼" required />
                      </div>
                      @if ($errors->has('password'))
                      <div class="col-md-8 col-md-offset-2">
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      </div>
                      @endif
                  </div>

                  <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                      <div class="input-group col-md-8 col-md-offset-2">
                          <span class="input-group-addon"><i class="fa fa-lock fa-2x" aria-hidden="true"></i></span>
                          <input type="password" class="form-control input-lg" name="password_confirmation" id="password-confirm" placeholder="請再次確認您的密碼" required />
                      </div>

                      @if ($errors->has('password_confirmation'))
                      <div class="col-md-8 col-md-offset-2">
                          <span class="help-block">
                              <strong>{{ $errors->first('password_confirmation') }}</strong>
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
                      <div class="row col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
                          <button type="submit" class="btn btn-primary btn-lg">重設密碼</button>
                      </div>
                  </div>

              </form>
          </div>

        </div>
    </div>
</div>

@stop
