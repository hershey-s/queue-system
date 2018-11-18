<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/fontawesome-free-5.4.1-web/css/all.css">
    <link rel="stylesheet" type="text/css" href="/css/custom.css">
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            
            @if(session()->has('username'))

                <div class="navbar-header">
                    @if(session('userType') == 'admin')
                        <a class="navbar-brand" href="/admin-panel"><i class="fas fa-home"></i> Admin Panel</a>
                    @else
                        <a class="navbar-brand" href="/"><i class="fas fa-home"></i> Home</a>
                    @endif
                </div>
                <ul class="nav navbar-nav navbar-right">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user-cog"></i>
                        Account<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/edit-profile"><i class="fas fa-user-edit"></i> Edit Profile</a></li>  
                            <li><a href="/change-password"><i class="fas fa-key"></i> Change Password</a></li>
                            <li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            @else

            @endif
            
        </div>
    </nav>

    <div class="middle col-sm-12">
        @yield('content')
        <br>
    </div>

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.datatables.min.js"></script>
    <script type="text/javascript" src="/axios-master/dist/axios.min.js"></script>
    <script type="text/javascript" src="/js/queue.js"></script>

</body>
</html>