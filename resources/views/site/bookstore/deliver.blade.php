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
<script src="{{ asset('js/jquery.twzipcode.min.js') }}"></script>
<script src="{{ asset('js/jquery.alerts.js') }}"></script>
@stop

@section('css')
<!-- progress-bar -->
<link href="{{ asset('css/progress-bar.css') }}" rel="stylesheet" type="text/css">
<!-- font-awesome -->
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<!-- jssocials -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/jssocials.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/jssocials-theme-classic.css') }}" />

<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/jquery.alerts.css') }}" rel="stylesheet" type="text/css">
@stop

@section('content')
<style>
.bookstore-bar {
  border:1px solid #c3c3c3;
  border-radius:4px;
  padding:10px 5px 0px 5px;
  margin-top: 10px;
  font-size: 16px;
}

.bookstore-bar li a:hover {
  color: #FFA500;
}

.zipcode-select {
  width:120px;
  margin-right:10px;
}

.zipcode-input {
  width:100px;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
    $('#twzipcode').twzipcode({
        'readonly': true,
        'onCountySelect' : function() {
            var county = $('#twzipcode select[name="county"]').val();
            $('#addr_city').val(county);
        },
        'onDistrictSelect' : function() {
            var district = $('#twzipcode select[name="district"]').val();
            $('#addr_area').val(district);
        },
    });

    // for county changes to '縣市'
    $('#twzipcode select[name="county"]').on('change', function(){
        var district = $('#twzipcode select[name="district"]').val();
        $('#addr_area').val(district);
        // console.log('change: ' + district);
    });

    {{--
    @if(!empty(Presenter::showSession("addr_city")) && !empty(Presenter::showSession("addr_area")) && !empty(Presenter::showSession("zipcode")))
        $('#twzipcode').twzipcode('set', {
            'zipcode'  : '{{ Presenter::showSession("zipcode") }}',
            'county'   : '{{ Presenter::showSession("addr_city") }}',
            'district' : '{{ Presenter::showSession("addr_area") }}',
        });
    @endif
    --}}

    {!! Presenter::twzipcode() !!}

    $('#twzipcode input[name="zipcode"]').addClass('form-control').addClass('col-md-3').addClass('zipcode-input');
    $('#twzipcode select').addClass('form-control').addClass('col-md-3').addClass('zipcode-select');
    $('#twzipcode input[name="zipcode"]').on('click', function() {
        jAlert('請選擇縣市資料後會自動填入您的郵遞區號!','注意');
    });
    $('#addr-div').on('click',"input[readonly]", function() {
        jAlert('請選擇郵遞區號後會自動填入您的居住縣市!','注意');
    });
    $("#twzipcode").append('<span style="color:blue">&nbsp;&lpar;請先選擇縣市資料&rpar;</span>');
});
</script>
    <div class="container div-top decoration-none" style="border: 0px solid red;">
        @include('site.bookstore.bar')

        <!-- progressbar -->
        <div class="col-md-12" style="">
            <div class="progressbar-container text-center">
                <ul class="progressbar">
                    <li class="progressbar-done">檢視購物車</li>
                    <li class="progressbar-active">付款方式及寄送資訊</li>
                    <li>確認訂單資料</li>
                    <li>訂單成立</li>
                </ul>
            </div>
        </div><!-- progressbar -->

        <div class="col-md-12" style="margin-top:30px">
            <form id="deliver-form" class="form-horizontal" role="form" action="/bookstore/SaveDeliver" method="POST">
            {{ csrf_field() }}
            <div class=" panel panel-primary">
                <div class="panel-heading">配送方式</div>
                <div class="panel-body"><input type="radio" name="deliver" value="Home_Delivery" checked required>&nbsp;宅配</div>
            </div>

            <div class=" panel panel-primary">
                <div class="panel-heading">付款方式</div>
                <div class="panel-body "><input type="radio" name="payment_methond" value="COD" checked required>&nbsp;貨到付款</div>
            </div>

            <div class=" panel panel-primary">
                <div class="panel-heading">發票資訊</div>
                <div class="panel-body"><input type="radio" name="invoice_type" value="paper" checked required>&nbsp;紙本發票</div>
            </div>

            <div class=" panel panel-primary">
                <div class="panel-heading">訂購人資訊</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="buyer-name" style="">姓名</label>
                        <div class="col-md-10">
                        <!-- <p class="form-control-static">{{ $user["name"] }}</p> -->
                        <p id="buyer-name" class="form-control-static">{{ $client->name }}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2" for="buyer-email" style="">Email</label>
                        <div class="col-md-10">
                        <!-- <p class="form-control-static">{{ $user["email"] }}</p> -->
                        <p id="buyer-email" class="form-control-static">{{ $client->email }}</p>
                        </div>
                    </div>

                </div>
            </div><!-- panel 訂購人資訊 -->

            <div class=" panel panel-primary">
                <div class="panel-heading">收件人資訊</div>
                <div class="panel-body " style="">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="name">收件人</label>
                        <div class="col-md-10">
                        <input type="text" class="form-control input-lg" id="name" name="name" style="width: 300px;" placeholder="請輸入收件人的姓名" value="{{ Presenter::showSession('name') }}" required >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2" for="phone">聯絡電話</label>
                        <div class="col-md-10">
                        <input type="tel" class="form-control input-lg" id="phone" name="phone" style="width: 300px;" placeholder="請輸入收件人的聯絡電話" value="{{ Presenter::showSession('phone') }}" required >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2" for="email">Email</label>
                        <div class="col-md-10">
                        <input type="email" class="form-control input-lg" id="email" name="email" style="width: 300px;" placeholder="請輸入收件人的電子郵件" value="{{ Presenter::showSession('email') }}" required >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2" for="twzipcode">郵遞區號</label>
                        <div class="col-md-10" id="twzipcode" data-required="true">
                        
                        </div>
                    </div>

                    <div class="form-group" id="addr-div">
                        <label class="control-label col-md-2" for="address">地址</label>
                        <div id="address" class="col-md-10">
                        <input type="text" class="form-control input-lg col-md-3" id="addr_city" name="addr_city" style="width: 100px;margin-right:10px;" placeholder="" readonly>
                        <input type="text" class="form-control input-lg col-md-3" id="addr_area" name="addr_area" style="width: 100px;margin-right:10px;" placeholder="" readonly>
                        <input type="text" class="form-control input-lg col-md-6" id="addr_street" name="addr_street" style="width: 450px;" placeholder="請輸入街道名稱" required value="{{ Presenter::showSession('addr_street') }}">
                        </div>
                    </div>

                </div>
            </div><!-- panel 收件人資訊 -->

            <div class="text-right" style="margin:20px">
                <button type="button" class="btn btn-primary btn-lg" onclick="location.href='/bookstore/shoppingcart'"><i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;上一步</button>
                <button type="submit" form="deliver-form" class="btn btn-primary btn-lg" >下一步&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></button>
            </div>

            </form>
        </div>

    </div>

@stop
