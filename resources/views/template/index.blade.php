<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    </head>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <span style='background-image:url({{ asset("assets/dist/img/photo1.png") }});padding-top:3em;padding-bottom:3em;' class="dropdown-header text-white">
                            <strong>
                                {{ Auth::user()->name }}
                            </strong>
                        </span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="text-center" style='padding-top:2em;padding-bottom:2em;'>
                                {{ Auth::user()->email }}<br>
                                <small>{{ strtoupper(Auth::user()->level) }}</small>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" onclick='logout()' onclick class="dropdown-item">
                            <div class="text-center">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index3.html" class="brand-link">
                <img src="{{asset('assets/dist/img/sp.jpeg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">UJIAN ONLINE</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>
                
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        @if(Auth::user()->level==='admin')
                            @include("template.menu")
                        @elseif(Auth::user()->level==='dosen')
                            @include("template.menudosen")
                        @else    
                            @include("template.menumahasiswa")
                        @endif
                        <li class="nav-item">
                            <a href="#" onclick="logout()" class="nav-link ">
                                <i class="fas fa-sign-out-alt nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">@yield('title')</h3>
                                        <div class="card-tools">
                                            @yield("tombol")
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @yield("konten")
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <strong>
                Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.
            </strong> All rights reserved.
        </footer>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        <auth></auth>
    </form>
    <form method='post' id='del-form' action="@yield('delaction')">
        <auth></auth>
        <delete></delete>
    </form>
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>    
    
    <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        $(document).ready(()=>{
            window.logout = ()=>{
                if(confirm('Ingin keluar?')){
                    $("#logout-form").submit();
                }
            };
            window.hapus = ()=>{
                if(confirm('Hapus Data?')){
                    $("#del-form").submit();
                }
            };
            window.hapusNio = (action)=>{
                
                    $("#del-form").attr('action',action);
                    hapus();
                
            };

            setInterval(() => {
                $("auth").html(`@csrf`)
                $("delete").html(`
                    <input type='hidden' name="_method" value="delete">
                `)
                $("put").html(`
                    <input type='hidden' name="_method" value="put">
                `)
            }, 1);
        });
    </script>
    </body>
    @yield("js")
</html>
