<!DOCTYPE html>
<html lang="zh-Hant">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Han Huang">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <!-- Favicon -->
    <link rel="icon" href="favicon.ico">

    @yield('title')

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
    <script>window.jQuery || document.write('<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"><\/script>')</script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script type="text/javascript" src="js/ie10-viewport-bug-workaround.js"></script>  

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    @yield('javascript')
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="css/master.css" rel="stylesheet" type="text/css">
    
    @yield('css')

    @yield('head')
  </head>
  <body>

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
      </div>
    </nav>

    @yield('content')
        
    <footer class="footer text-center">
      <div class="container">
        <p class="text-muted">Copyright <span class="glyphicon glyphicon glyphicon-copyright-mark"></span> 2016 LaravelDemoSite</p>
        <ol class="breadcrumb">
            <li><a href="#">網站地圖</a></li>
            <li><a href="#">隱私權條款</a></li>
            <li><a href="#">服務條款</a></li>
            <li><a href="#">人力招聘</a></li>
            <li><a href="#">聯絡我們</a></li>
        </ol>
      </div>
    </footer>

  </body>
</html>
