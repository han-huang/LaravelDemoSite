<!DOCTYPE html>
<html lang="zh-Hant">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('meta')

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    @yield('pageTitle')

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.1.0.min.js') }}"></script>
    <script>window.jQuery || document.write('<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"><\/script>')</script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script type="text/javascript" src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('javascript')

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/master.css') }}" rel="stylesheet" type="text/css">

    @yield('css')
  </head>
  <body id="pagebody">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}">LaravelDemoSite</a>
        </div>
        {!! App\IndexMenu::display(); !!}
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guard('client')->guest())
                    <li><a href="{{ url('login') }}">登入</a></li>
                    <li><a href="{{ url('register') }}">註冊</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::guard('client')->user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    登出
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>

      </div>
    </nav>

    @yield('content')
        
    <footer class="footer text-center">
      <div class="container">
        <p class="text-muted">Copyright <span class="glyphicon glyphicon-copyright-mark"></span> 2016 LaravelDemoSite</p>
        <ol class="breadcrumb">
            <li><a href="#">網站地圖</a></li>
            <li><a href="#">隱私權條款</a></li>
            <li><a href="#">服務條款</a></li>
            <li><a href="#">人力招聘</a></li>
            <li><a href="#">聯絡我們</a></li>
        </ol>
      </div>
    </footer>
  <script type="text/javascript">
  $(document).ready(function(){
      //set current menu item to "active" color
      $(".navbar-nav li a[href='/{{ explode("/",Request::path())[0] }}']:eq(0)").css("color", "#fff").css("background-color", "#337ab7");
      // console.log("{{ url()->current() }}");
      // console.log("{{ Request::url() }}");
      // console.log("{{ Request::path() }}");
      // console.log("{{ explode("/",Request::path())[0] }}");
  });
  </script>
  </body>
</html>
