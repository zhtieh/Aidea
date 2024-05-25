<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Aidea Group-Back Office</title>
  <link href="../img/favicon.png" rel="icon">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('bo/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('bo/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('bo/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('bo/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('bo/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('bo/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('bo/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('bo/assets/css/style.css') }}" rel="stylesheet">

  <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/c6da8951b2.js" crossorigin="anonymous"></script>
  <style type="text/css">
    .form-bg{
      background: white;
    }
    .deleteConfirmationModal{
      background: #738FA7;
      border: 2px solid #0C4160;
    }
    .modalHeader{
      font-weight: bold;
      font-size: 20px;
      color: #D8DEEC;
      font-family: verdana;
    }
    .modalDesc{
      font-size: 14px;
      color: #F0F8FE;
      text-align: justify;
      font-family: verdana;
    }
    #preview-container {
        display: flex;
        flex-wrap: wrap;
    }
    .preview-image {
        position: relative;
        width: 300px;
        height: 200px;
        object-fit: cover;
        margin: 5px;
    }
    .remove-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: rgba(255, 255, 255, 0.8);
        border: none;
        border-radius: 50%;
        cursor: pointer;
        padding: 5px;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
      }

      .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
      }

      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
      }

      .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
      }

      input:checked + .slider {
        background-color: #2196F3;
      }

      input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
      }

      input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
      }

      /* Rounded sliders */
      .slider.round {
        border-radius: 34px;
      }

      .slider.round:before {
        border-radius: 50%;
      }

       .preview-fileContainer {
        border: 1px solid #ccc;
        padding: 10px;
      }
      .file-name {
        margin-bottom: 5px;
      }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
        <img src="../../img/AIDEA_DESIGN_SOLUTIONS__1__logo.png" alt="">
        <!-- <span class="d-none d-lg-block">Aidea Group</span> -->
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Admin Admin</h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="#">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="fa fa-table"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('products') }}">
              <i class="bi bi-circle"></i><span>Active Products</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#orders-nav" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-money-bill"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="orders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('orders') }}">
              <i class="bi bi-circle"></i><span>Orders</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="fa-regular fa-file"></i><span>Banner</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('activebanners') }}">
              <i class="bi bi-circle"></i><span>Active Banners</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
      @yield('content')
  </main> 
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Vanguard Buffle</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('bo/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('bo/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('bo/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('bo/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('bo/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('bo/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('bo/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('bo/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="https://kit.fontawesome.com/c6da8951b2.js" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('bo/assets/js/main.js') }}"></script>
  <script type="text/javascript">
      var globalURL = "http://127.0.0.1:8000/";
  </script>
</body>

</html>