@role('Admin')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="/Assets/logo/icon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('AdminStyle/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
  <link rel="stylesheet" href="{{ asset('AdminStyle/css/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
  <script src="{{ asset('js/app.js') }}"></script>
  @livewireStyles
  <title>Notice LY</title>
 

  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
    <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Right navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!-- Messages Dropdown Menu -->
       
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link text-center">
            <span class="brand-text font-weight-light ">Admin Notice LY</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">MENU</li>
                    <li class="nav-item">
                        <a href="{{route('admin.dashboard')}}" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            HOME
                        </p>
                        </a>
                    </li>
                    <li class="nav-item dropdown d-sm-block ">
                        <a  class="nav-link accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-2">
                        
                        <span class="sidebar-icon"><i class="nav-icon fa fa-users"></i></span>
                            <p>USERS <i class="fa fa-angle-down" style="text-align: right"></i></p>
                            <b class="caret"></b>
                        </a>
                        <ul id="submenu-2" class="panel-collapse collapse panel-switch" role="menu" style="list-style-type: none;">
                            <li style="padding: 1rem 0 1rem 0;"><a href="{{route('admin.users')}}"><i class="nav-icon fas fa-male"></i>
                            ALL STAFF</a></li>
                            <li style="padding: 0 0 1rem 0;"><a href="{{route('admin.users-supervisor')}}"><i class="nav-icon fas fa-user"></i>ALL SUPERVISOR</a></li>
                            <li style="padding: 0 0 1rem 0;"><a href="{{route('admin.users-manager')}}"><i class="nav-icon fas fa-user-tie"></i>
                            </i>ALL MANAGER</a></li>
                        </ul>
                    </li>
                   
                    <li class="nav-item">
                        <a href="{{route('admin.data-mom')}}" class="nav-link">
                            <i class="nav-icon far fa-file-alt"></i>
                            <p>
                                MINUTE OF MEETING
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.data-notif')}}" class="nav-link">
                            <i class="nav-icon far fa-bell"></i>
                            <p>
                                Notification
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.data-division')}}" class="nav-link">
                            <i class="nav-icon far fa-building"></i>
                            <p>
                                DIVISION
                            </p>
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa fa-outdent mr-1"></i>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <p>
                            LOGOUT
                        </p>
                        </a>
                    </li>
                </ul>
            </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container py-5">
            
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
                
            </div>
                @yield('content')
            @elseif(session()->has('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                    
                </div>
                    @yield('content')
            @else
                @yield('content')
            @endif
        </div>
    </div>
    <!-- /.content-wrapper -->
    <br/>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2020 <a href="">Notice.ly</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>


    @livewireScripts
   
    
    <script src="/AdminStyle/js/jquery.min.js"></script>
    <script src="/AdminStyle/js/bootstrap.bundle.min.js"></script>
    <script src="/AdminStyle/js/adminlte.min.js"></script>
    <script src="/AdminStyle/js/demo.js"></script>
    <script src="/AdminStyle/datatables/jquery.dataTables.min.js"></script>
    <script src="/AdminStyle/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/AdminStyle/daterangepicker/daterangepicker.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
    

</body>
</html>

@else
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Notice LY</title>

    <!-- Scripts -->
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
   
    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-rounded shadow  mb-5 sticky-top" style="background-color: white"  role="navigation" >
            <div class="container">
                <a class="navbar-brand text-light" href="{{ route('post.index') }}">
                    <img src="{{asset('image/logo.png')}}" alt="" width="150px" height="40px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item  pt-3">
                                <p style="display:inline-block">
                                        
                                    <?php
                                        $role = Auth::user()->roles->pluck('name')->first();
                                        
                                           switch($role){
                                               case 'Staff':
                                                   $user = DB::table('staff')->where('id_users',Auth::id())->first();
                                                   break;
                                               case 'Supervisor':
                                                   $user = DB::table('supervisor')->where('id_users',Auth::id())->first();
                                                   
                                                   break;
                                               case 'Manager':
                                                   $user = DB::table('manager')->where('id_users',Auth::id())->first();
                                                   break;
                                                
                                           }
                                    ?>
                                    Hi, {{$user->name}}
                                </p>
                                <a href="{{ route('logout') }}" class="nav-link text" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" style="display:inline-block">
                                   
                                     <i class="nav-icon fas fa-sign-out-alt fa-rotate-180  mr-1"></i>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                            </li>
                           
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" id="scroll">
            <div class="side-menu">
                <div class="side-content">
                    
                    <a href="{{ route('post.index') }}"><i class="fas fa-home" style="margin-right: 10px"></i><p style="margin: 0; padding:0; display:inline-block">HOME</p></a>
                    <a href="{{ route('post.draft-mom') }}"><i class="fas fa-book-open" style="margin-right: 10px"></i><p style="margin: 0; padding:0; display:inline-block">DRAFT MOM</p></a>
                    <a href="{{ route('post.divisi') }}"><i class="fa fa-users" style="margin-right: 10px"></i><p style="margin: 0; padding:0; display:inline-block">DIVISION</p></a>
                    
                </div>
               
            <img src="{{asset('image/meet.svg')}}" class="side-image" alt="">
            </div>
            <main class="container main">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                    
                </div>
                    @yield('content')
                @elseif(session()->has('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                        
                    </div>
                        @yield('content')
                @else
                    @yield('content')
                @endif
            </main>
        </div>
       
    </div>
    @livewireScripts
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>
</html>
@endrole