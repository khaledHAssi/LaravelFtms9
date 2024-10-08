<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASH-SUPERVISOR | @yield('title', env('APP_NAME'))</title>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminassets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminassets/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    @yield('styles')

    <style>
        .main-header .navbar-nav .nav-item.lang img {
            opacity: .5;
            width: 20px
        }

        .main-header .navbar-nav .nav-item.lang .active img {
            opacity: 1;
            width: 23px;
            box-shadow: 0 0 10px rgba(27, 27, 27, 0.732);
        }

        .table .th,
        .table td {
            vertical-align: middle
        }
    </style>


    @if (app()->getLocale() == 'ar')
        <style>
            body {
                direction: rtl;
                text-align: right;
            }

            body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper,
            body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer,
            body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
                margin-right: 250px;
                margin-left: 0;
            }

            .nav-sidebar {
                padding: 0
            }

            .nav-sidebar .nav-link>.right,
            .nav-sidebar .nav-link>p>.right {
                left: 1rem;
                right: unset;
                transform: rotate(180deg)
            }

            .nav-sidebar .menu-is-opening>.nav-link i.right,
            .nav-sidebar .menu-is-opening>.nav-link svg.right,
            .nav-sidebar .menu-open>.nav-link i.right,
            .nav-sidebar .menu-open>.nav-link svg.right {
                -webkit-transform: rotate(270deg);
                transform: rotate(270deg);
            }

            .ml-auto,
            .mx-auto {
                margin-left: unset !important;
                margin-right: auto !important;
            }
        </style>
    @endif



</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                {{-- __________________________________________________________________________ --}}
                {{-- Commented not all time --}}
                {{-- __________________________________________________________________________ --}}

                {{-- {{ app()->getLocale() }} --}}
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="nav-item lang">
                        <a class="nav-link {{ app()->getLocale() == $localeCode ? 'active' : '' }}" rel="alternate"
                            hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <img width="25" src="{{ asset('adminassets/dist/img/' . $properties['flag']) }}"
                                alt="">
                            {{-- __________________________________________________________________________ --}}
                            {{-- Commented not all time --}}
                            {{-- __________________________________________________________________________ --}}


                            {{--
         @if ($localeCode == 'pt')
                    <img width="30" src="{{ asset('adminassets/dist/img/pt.png') }}" alt="">
                  @elseif ($localeCode == 'en')
                    <img width="30" src="{{ asset('adminassets/dist/img/uk.png') }}" alt="">
                  @else
                    <img width="30" src="{{ asset('adminassets/dist/img/ps.png') }}" alt="">
                  @endif --}}
                            {{-- {{ $properties['native'] }} --}}
                            {{-- __________________________________________________________________________
                  {{-- Commented not all time --}}
                            {{-- __________________________________________________________________________ --}}

                        </a>
                    </li>
                @endforeach
                {{-- __________________________________________________________________________ --}}
                {{-- Commented not all time --}}
                {{-- __________________________________________________________________________ --}}


                <!-- Notifications Dropdown Menu -->

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right" style="overflow: hidden">
                        <span class="dropdown-header">5 Notifications</span>

                        {{-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a> --}}
                        @yield('notification')
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('ReadNotification') }}" class="dropdown-item dropdown-footer">See All
                            Notifications</a>
                    </div>
                </li>

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    @php
                        $name = Auth::user()->name ?? '';
                        $src = 'https://ui-avatars.com/api/?background=random&name=' . $name;
                    @endphp
                    <a class="nav-link" data-toggle="dropdown" href="#">

                        <img class="img-circle img-bordered-sm elevation-2" height="38" width="38"
                            style="margin-top: -5px; " src="{{ Storage::url(Auth::user()->image) }}" alt="user image">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{route('site.site_profile')}}" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>

                        {{-- <a href="#" class="dropdown-item"> --}}
                        <a href="{{ route('admin.settings') }}" class="dropdown-item">
                            <i class="fas fa-cog mr-2"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}"
                            onclick="
                    event.preventDefault();
                    document.getElementById('logout-form').submit()
                    "
                            class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            {{-- <button class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i> Logout</button> --}}
                        </form>

                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
               <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('adminassets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!--Menu-->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('user_dash.supervisor.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    {{ __('main.Dashboard') }}
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('user_dash.supervisor.sCourses') }}" class="nav-link">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    {{ __('Courses') }}
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('user_dash.supervisor.sApplications.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    {{ __('Applications') }}
                                </p>
                            </a>
                        </li>



                <!--SidebarMenu -->
            </div>
            <!--Sidebar -->
        </aside>

        <!-- Content Wrapper - page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- End -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- wanna make it to the setting controller  -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->


    <!-- jQuery -->
    <script src="{{ asset('adminassets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminassets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminassets/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        let userId = '{{ Auth::id() }}';
    </script>
    @vite(['resources/js/app.js'])
    @yield('scripts')
</body>

</html>
