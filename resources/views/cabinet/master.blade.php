<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{asset('img/sova-icon.png')}}" type="image/png">
    <title>Personal page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables.min.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="{{asset('assets/plugins/filepond-master/dist/filepond.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/filepond-plugin-image-preview-master/dist/filepond-plugin-image-preview.min.css')}}">

    @livewireStyles

    @yield('link')

    <style>
        #loading {
            position: fixed;
            top: 35%;
            left: 50%;
            z-index: 1000;
        }

        #loading img {
            height: 55px;
            width: 55px;
        }

        .filepond--credits {
            display: none;
        }

        .firm-border {
            border-top: 5px solid #F8C50E;
        }


    </style>

</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow ">
        <!-- Left navbar links -->
        <ul class="nav ">

            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" data-enable-remember="true" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">Site</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-5">
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
                <a class="nav-link" href="{{route('chat')}}">
                    <i class="far fa-bell"></i>
                    @livewire('note',['navbar' => 1])
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
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
                        <a href="{{route('cabinet')}}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Main page</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('profile')}}" class="nav-link">
                            <i class="nav-icon far fa-address-card"></i>
                            <p>Profile</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a id="clear_id" href="{{route('firms.create')}}" class="nav-link">
                            <i class="nav-icon fas fa-industry"></i>
                            <p>Create new company</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('selectFirm')}}" class="nav-link">
                            <i class="nav-icon fas fa-mobile-alt"></i>
                            <p>Scan documents</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('payment')}}" class="nav-link">
                            <i class="nav-icon fab fa-stripe"></i>
                            <p>Make payment</p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('chat')}}">
                            <i class="far fa-bell">&nbsp;&nbsp;&nbsp;</i>
                            <span>Chat&nbsp;&nbsp;</span>
                             @livewire('note')
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-chart-bar"></i>
                            <p>Statistics<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('reports')}}" class="nav-link">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="font-size: 0.3rem" class="far fa-circle"></i>&nbsp;
                                    <p>list of reports</p>
                                </a>
                            </li>
                        </ul>
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

    <div class="content-wrapper pt-3">

        <div class="container-fluid ">
            <div class="row">
                <div class="col-12">
                    @if($errors->any())
                        <div class="alert alert-danger">
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
                        </div>
                    @endif
                    @if(session()->has('status'))
                        <div class="alert alert-info">
                            {{session('status')}}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @yield('content')

    </div>

</div>

<footer class="main-footer justify-content-around bg-dark">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.5
    </div>
    <strong>Copyright &copy; 2021 <a href="https://webtaxes.ca">WebTaxes</a>.</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All rights
    reserved.
</footer>


<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/adminlte.min.js')}}"></script>
<script src="{{asset('js/aes.js')}}"></script>
<script src="{{asset('assets/js/function.js')}}"></script>
<script src="{{asset('assets/plugins/datatables.min.js')}}"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.js"></script>
<script src="{{asset('assets/plugins/filepond-master/dist/filepond.min.js')}}"></script>
<script src="{{asset('assets/plugins/filepond-plugin-image-preview-master/dist/filepond-plugin-image-preview.min.js')}}"></script>
<script src="{{asset('assets/plugins/filepond-plugin-file-validate-size.min.js')}}"></script>


@livewireScripts

@yield('scripts')

<script>
    $(document).ready(function () {


        $('.nav-sidebar').each(function () {
            let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
            let link = this.href;
            if (link == location) {
                $(this).addClass('active');
                $(this).closest('.has-treeview').addClass('menu-open');
            }
        });

        $('#clear_id').click(function () {
            window.sessionStorage.clear();
            delete localStorage.MainUser;
        });


        $(document).on('collapsed.lte.pushmenu', function () {
            $('.view-badge').addClass('d-none')
        });
        $(document).on('shown.lte.pushmenu', function () {
            $('.view-badge').removeClass('d-none')
        });

    });

</script>

</body>
</html>















