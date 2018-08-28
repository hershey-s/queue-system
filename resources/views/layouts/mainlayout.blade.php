<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/sticky-footer.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <script src="/mains/js/jquery.min.js"></script>
    <script src="/mains/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="/js/actions.js"></script>
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">Home</a>
                <ul class="nav navbar-nav">
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 2</a></li>
                    <li class="logout"><a href="#">Option</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="left col-sm-3">    
        @yield('nav-pane')
    </div>

    <div class="middle col-sm-9">
        @yield('content')
        <br>
    </div>
</body>
</html>