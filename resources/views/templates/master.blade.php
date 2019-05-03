<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  
  <link rel="stylesheet" href="{{ asset('asset/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/css/style.css')}}">
  <link rel="shortcut icon" href="{{ asset('asset/images/favicon.png" ')}}"/>
  <link rel="stylesheet" href="{{ asset('asset/vendors/iconfonts/font-awesome/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/dropify.min.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/kt-2.4.0/r-2.2.2/datatables.min.css"/>
  @yield('link')
  <script src="{{ asset('asset/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('dist/js/sw.js') }}"></script>

  <style>
    .navbar.default-layout .navbar-brand-wrapper{
      background: transparent;
    }
    .navbar.default-layout .navbar-brand-wrapper .navbar-brand:hover{
      color: #fff;
    }
    .images_clear{
      border-radius: 0px !important;
      width: 100% !important;
      height: auto !important;
    }
    .navbar.default-layout{
      background: linear-gradient(120deg, #0d6674, #0a505c) !important;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand" href="{{ route('home') }}">
          Ecodev
        </a>
        <a class="navbar-brand brand-logo-mini" href="">
          <img src="{{ asset('asset/images/logo-mini.svg') }}" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, {{ Auth::user()->name }} !</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                Sign Out
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('category.index') }}">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Kategori</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('survey.index') }}">
              <i class="menu-icon mdi mdi-sticker"></i>
              <span class="menu-title">Survey</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('member.index') }}">
              <i class="menu-icon fa fa-user-o"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('slide.index') }}">
              <i class="menu-icon mdi mdi-restart"></i>
              <span class="menu-title">Slider</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('words.index') }}">
              <i class="menu-icon mdi mdi-alarm-light"></i>
              <span class="menu-title">Kata</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('announcement.add') }}">
              <i class="menu-icon mdi mdi-comment"></i>
              <span class="menu-title">Pengumuman</span>
            </a>
          </li>
        </ul>
      </nav>
      
      
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>


        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">Ecology Development</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
              {{-- <i class="mdi mdi-heart text-danger"></i> --}}
            </span>
          </div>
        </footer>
      </div>
    </div>
  </div>
  
  <script src="{{ asset('asset/vendors/js/vendor.bundle.addons.js') }}"></script>s
  <script src="{{ asset('asset/js/off-canvas.js') }}"></script>
  <script src="{{ asset('asset/js/misc.js') }}"></script>
  <script src="{{ asset('dist/js/dropify.min.js')}}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/kt-2.4.0/r-2.2.2/datatables.min.js"></script>
  @include('component.swal_alert')
  <script>
    $(function () {
      $('.dropify').dropify();
      $('#datatable').DataTable()
    })
  </script>
  @yield('script')
</body>

</html>
