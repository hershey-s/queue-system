<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/sticky-footer.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/css/dataTables.tableTools.min.css">
    <link rel="stylesheet" type="text/css" href="/css/custom.css">
    <script type="text/javascript" src="/mains/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/queue.js"></script>
    <!-- <script type="text/javascript" src="/js/alert.js"></script> -->
    <!-- <script type="text/javascript" src="/js/spa.js"></script> -->
    <script src="/js/actions.js"></script>
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                @if(session('userType') == 'admin')
                    <a class="navbar-brand" href="/admin-panel">Admin Panel</a>
                @else
                    <a class="navbar-brand" href="/">Home</a>
                @endif
                @if(session()->has('username'))
                    <ul class="nav navbar-nav">
                        <form action="/logout" method="post">
                            <li><a class="logout" href="/logout">Logout</a></li>
                        </form>
                    </ul>
                @else

                @endif
            </div>
        </div>
    </nav>

    <div class="middle col-sm-12">
        @yield('content')
        <br>
    </div>
</body>
</html>