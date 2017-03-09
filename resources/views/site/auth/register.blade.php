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
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.zh-TW.min.js') }}"></script>
@stop

@section('css')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ config('voyager.assets_path') }}/lib/css/toastr.min.css">
<!-- font-awesome -->
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<!-- bootstrap-datepicker -->
<link href="{{ asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css">
@stop

@section('content')
<style>
.login-margin-top {
  margin-top: 100px;
}

.div-gender {
  margin-top:20px;
  margin-bottom:20px;
}

.lable-gender {
  font-size: 18px;
  background-color: #f5f5f5;
  color: #555;
  border: 1px solid #e3e3e3;
  padding: 9px;
  border-radius: 3px;
  min-height: 20px;
}
</style>

<script type="text/javascript">
$('document').ready(function () {
    
    $('#birthday').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        language: 'zh-TW',
        container:'#birthday-div'
    });
    
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}');
        @endforeach
        {{-- 
        @foreach ($errors->keys() as $key)
            toastr.error('{{ $key }}');
        @endforeach
        --}}
    @endif

    {{-- {!! $errors->has('g-recaptcha-response') ? 'alert("請勾選驗證服務!");' : '' !!} --}}
});
</script>

<div class="container login-margin-top">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading">LaravelDemoSite 註冊會員</div>
          <div class="panel-body">
              <form role="form" action="{{ url('/register') }}" method="POST">
                  {{ csrf_field() }}

                  <div class="form-group div-margin-top{{ $errors->has('name') ? ' has-error' : '' }}">
                      <div class="input-group col-md-8 col-md-offset-2">
                          <span class="input-group-addon"><i class="fa fa-user-circle fa-lg" aria-hidden="true"></i></span>
                          <input type="text" class="form-control input-lg" name="name" id="name" placeholder="請輸入您的姓名" value="{{ old('name') }}" autofocus required />
                      </div>
                      @if ($errors->has('name'))
                      <div class="col-md-8 col-md-offset-2">      
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      </div>
                      @endif
                  </div>

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
                  </div>

                  <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                      <div id="birthday-div" class="input-group col-md-8 col-md-offset-2">
                          <span class="input-group-addon"><i class="fa fa-calendar fa-lg" aria-hidden="true"></i></span>
                          <input type="text" class="form-control input-lg" name="birthday" id="birthday" placeholder="請輸入您的生日" value="{{ old('birthday') }}" required />
                      </div>
                      @if ($errors->has('birthday'))
                      <div class="col-md-8 col-md-offset-2">      
                          <span class="help-block">
                              <strong>{{ $errors->first('birthday') }}</strong>
                          </span>
                      </div>
                      @endif
                  </div>

                  <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                      <div class="input-group col-md-8 col-md-offset-2 div-gender">
                          <span class=" lable-gender">性別</span>&nbsp;
                          <!-- <div class="well well-sm">性別&nbsp;&nbsp;</div> -->
                          <label class="radio-inline">
                            <input type="radio" name="gender" value="M" @if((old('gender')=='M') && !is_null(old('gender'))) checked @endif required>男
                          </label>
                          <label class="radio-inline">
                            <input type="radio" name="gender" value="F" @if((old('gender')=='F') && !is_null(old('gender'))) checked @endif>女
                          </label>
                      </div>
                      @if ($errors->has('gender'))
                      <div class="col-md-8 col-md-offset-2">      
                          <span class="help-block">
                              <strong>{{ $errors->first('gender') }}</strong>
                          </span>
                      </div>
                      @endif
                  </div>

                  <div class="form-group{{ $errors->has('agree_edm') ? ' has-error' : '' }}">
                      <div class="input-group col-md-8 col-md-offset-2">
                          <!-- <p>是否同意獲得本站提供之相關活動訊息&#63;&nbsp;&nbsp;</p> -->
                          <div class="well well-sm">是否同意獲得本站提供之相關活動訊息&#63;</div>
                          <label class="radio-inline">
                            <input type="radio" name="agree_edm" value="1" @if((old('agree_edm')=='0') && !is_null(old('agree_edm'))) @else checked @endif>同意
                          </label>
                          <label class="radio-inline">
                            <input type="radio" name="agree_edm" value="0" @if((old('agree_edm')=='0') && !is_null(old('agree_edm'))) checked @endif>不同意
                          </label>
                      </div>
                      @if ($errors->has('agree_edm'))
                      <div class="col-md-8 col-md-offset-2">      
                          <span class="help-block">
                              <strong>{{ $errors->first('agree_edm') }}</strong>
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
                          <button type="submit" class="btn btn-primary btn-lg">註冊</button>
                      </div>
                  </div>

              </form>
          </div>

        </div>
    </div>
</div>

@stop
