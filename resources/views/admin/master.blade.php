<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{asset('img/sova0.png')}}" type="image/png">
    <title>Admin Taxes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/filepond-master/dist/filepond.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/filepond-plugin-image-preview-master/dist/filepond-plugin-image-preview.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
{{--    <link rel="stylesheet" href="{{'css/dataTables.bootstrap4.min.css'}}">--}}

    @livewireStyles

    @yield('links')

    <style>
        /*.i {*/
        /*    font-family: fontawesome !important;*/
        /*}*/
        .firm-border {
            border-top: 5px solid #F8C50E;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini  layout-fixed ">

<div class="wrapper ">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" data-enable-remember="true" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('/') }}" class="nav-link">Site</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                document.getElementById('logout-form-admin').submit();">Logout</a>

                <form id="logout-form-admin" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <ul class="navbar-nav ml-auto">

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                {{--                <a class="nav-link" href="{{route('adminNotification')}}">--}}
                {{--                    <i class="far fa-bell"></i>--}}
                {{--                    @if(\Illuminate\Support\Facades\Auth::user()->unreadNotifications->count()!==0)--}}
                {{--                        <span class="badge badge-danger navbar-badge">{{\Illuminate\Support\Facades\Auth::user()->unreadNotifications->count()}}</span>--}}
                {{--                    @endif--}}
                {{--                </a>--}}
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" target="_blank" class="brand-link">
            <img src="{{asset('img/sova-logo.png')}}"
                 alt=" Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-bold">WEB Taxes</span>
        </a>


        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="{{route('admin.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Main page</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.profile')}}" class="nav-link">
                            <i class="nav-icon fas fa-chess-queen"></i>
                            <p>Admin profile</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-money-bill-alt"></i>
                            <p>
                                Tariff
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('tariff.index')}}" class="nav-link">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="font-size: 0.3rem" class="far fa-circle"></i>&nbsp;
                                    <p>list of tariffs</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('tariff.create')}}" class="nav-link">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="font-size: 0.3rem" class="far fa-circle"></i>&nbsp;
                                    <p>Create tariffs</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('tariff.create',['constructor' => '1'])}}" class="nav-link">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="font-size: 0.3rem" class="far fa-circle"></i>&nbsp;
                                    <p>Create constructor</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-industry"></i>
                            <p>Company<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('firm.index')}}" class="nav-link">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="font-size: 0.3rem" class="far fa-circle"></i>&nbsp;
                                    <p>list of companies</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('deletedFirmIndex')}}" class="nav-link">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="font-size: 0.3rem" class="far fa-circle"></i>&nbsp;
                                    <p>Deleted companies</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Clients
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('user.index')}}" class="nav-link">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="font-size: 0.3rem" class="far fa-circle"></i>&nbsp;
                                    <p>list of clients</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Articles
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('post.index')}}" class="nav-link">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="font-size: 0.3rem" class="far fa-circle"></i>&nbsp;
                                    <p>List of articles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('post.create')}}" class="nav-link">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="font-size: 0.3rem" class="far fa-circle"></i>&nbsp;
                                    <p>New article</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{route('admin.stat')}}" class="nav-link">
                            <i class="fas fa-running" style="font-size: 24px;">&nbsp;&nbsp;</i>
                            <p>Visits</p>
                        </a>
                    </li>
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('admin.chat')}}">
                            <i class="far fa-bell">&nbsp;&nbsp;&nbsp;</i>
                            <p>Chat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('showContact')}}" class="nav-link">
                            <i class="far fa-bell">&nbsp;&nbsp;&nbsp;</i>
                            <p>Show contact list</p>
                            @if(\App\Contact::all()->count()!==0)
                                &nbsp;<span class="badge badge-danger view-badge ">{{\App\Contact::all()->count()}}</span>
                            @endif
                        </a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form-menu').submit();">

                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>

                        </a>

                        <form id="logout-form-menu" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>

                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(session()->has('info'))
                        <div class="alert alert-info">
                            {{session('info')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @yield('content')

    </div>

    <footer class="main-footer bg-dark">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0.5
        </div>
        <strong>Copyright &copy; 2021 <a href="https://webtaxes.ca">WebTaxes</a>.</strong> All rights
        reserved.
    </footer>


</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
{{--<script src="{{asset('assets/admin/js/demo.js')}}"></script>--}}
<script src="{{asset('assets/plugins/datatables.min.js')}}"></script>
{{--<script src="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.js"></script>--}}
<script src="{{asset('assets/plugins/filepond-master/dist/filepond.min.js')}}"></script>
<script src="{{asset('assets/plugins/filepond-plugin-image-preview-master/dist/filepond-plugin-image-preview.min.js')}}"></script>
<script src="{{asset('assets/plugins/filepond-plugin-file-validate-size.min.js')}}"></script>

@livewireScripts

@yield('scripts')

<script>

    $('.nav-sidebar').each(function () {
        let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let link = this.href;

        if (link == location) {
            $(this).addClass('active');
            $(this).closest('.has-treeview').addClass('menu-open');
        }

        $('#clear_id').click(function () {
            window.sessionStorage.clear();
            delete localStorage.MainUser;
        });


    });
</script>


</body>
</html>















