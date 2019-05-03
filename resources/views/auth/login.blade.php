<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Application</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('asset/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('asset/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('asset/images/favicon.png') }}" />
  <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
  <style>
    .auth.auth-bg-1{
      background: linear-gradient(120deg, #0d6674, #0a505c) !important;
    }
    .title{
      font-family: 'Righteous', cursive;
      text-align: center;
      font-size: 60px;
      color: #fff;
    }
    .subtitle{
      text-align: center;
      color: #fff;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <h1 class="title">Ecodev</h1>
            <p class="subtitle">Aktivator Wirausaha!</p>
            <div class="auto-form-wrapper">
              <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                  <label class="label">Email</label>
                  <div class="input-group">
                    <input type="email" class="form-control" placeholder="Email" name="email"
                    value="{{ old('email') }}">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-account"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="*********" name="password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block" type="submit">Login</button>
                </div>
                <br><br>
              </form>
            </div>
            <br>
            @if($errors->any())
              <div class="alert alert-danger">
                <p class="text-center" style="margin-top: 15px">Username atau Password salah!</p>
              </div>
            @endif
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © 2018 Ecology Devlopment. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('asset/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{ asset('asset/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('asset/js/off-canvas.js')}}"></script>
  <script src="{{ asset('asset/js/misc.js')}}"></script>
  <!-- endinject -->
</body>

</html>