<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HRD IBI - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" type="text/css" href="/kuning/vendor/fontawesome-free/css/all.min.css" >
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link rel="stylesheet" type="text/css" href="/kuning/css/sb-admin-2.css" >
  <link rel="stylesheet" type="text/css" href="/kuning/css/sb-admin-2.min.css" >
  <script src="/kuning/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <link href="/kuning/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    


<style>
  .containe-isi {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    margin-top: 10px;
    background: white; 
    box-shadow: 10px 5px 15px 4px #888888; 
    border-radius: 10px;
    margin-bottom: 30px;
  }

  .data-pribadi p {
    font-size: 20px;

  }

  .data-pribadi td {
    padding-right: 70px;
    padding-bottom: 10px;
  }

  .RIWAYAT th {
    text-align: center;
  }

  .KEMAMPUAN td {
    padding-right: 70px;
    padding-bottom: 10px;
  }

  .KEMAMPUAN p {
    text-align: left;
  }

  .INFORMASI p{
    text-align: left;


  }

  .ttd p{
    text-align: right;
  }

  .wrapper {
            width: 850px;
            margin: auto;
            border: 2px solid #444;
            padding: 20px;
        }
        #konvert {
            background: #444;
            border: 2px solid #444;
            border-radius: 1px;
            padding: 10px;
            color: #fff;
            font-weight: bold;
        }
        #konvert:hover {
            background: #fff;
            color: #444;
        }

  </style>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/lowongan">
        <div class="sidebar-brand-icon rotate-n-0">
          <img width="70px" height="55px" src="/kuning/img/logo_ibi.png"><!--<i class="fas fa-laugh-wink"></i>-->
        </div>
        <div class="sidebar-brand-text mx-3"><sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/lowongan">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Lowongan Kerja IBI
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
          <span>Lowongan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           
            <a class="collapse-item" href="/inputlow">Daftar</a>
             <a class="collapse-item" href="/tambah">tambah</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->

       <!-- Nav Item - Charts -->
        <li class="nav-item">
        <a class="nav-link" href="/pelamar">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          <span>Pelamar</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/seen">
          <i class="fas fa-eye fa-2x text-gray-300"></i>
          <span>seen</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/OnProgres" >
          <i class="fas fa-comments fa-2x text-gray-300"></i>
          <span>On Process</span></a>
      </li>
       </li>
          <li class="nav-item">
          <a class="nav-link" href="/finish">
          <i class="fas fa-check-circle fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>finish process</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">
      </li>
          <li class="nav-item">
          <a class="nav-link" href="/unqualified">
          <i class="fas fa-times-circle fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>unqualified</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Log Out</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>  

      </ul>
      <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
          <div class="container" style="padding-left:0px; ">
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="/join/cari" method="GET" >
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Masukkan nama pelamar..."   aria-label="Search" aria-describedby="basic-addon2" name="cari">
                            <div class="input-group-append">
                            <button class="btn btn-info" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                            </button>
                          </div>
                          </div>
                </form>
            </div>

            <div class="container">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" style="min-height: 500px; padding-top: 50px;">

          <!-- Page Heading -->
          
            <!--<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>-->
          

          <!-- Content Row -->
          

            <!-- Earnings (Monthly) Card Example -->
            

                        @yield('edit')

          
            
        <!-- /.container-fluid -->

          </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Indoberkainvestama 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="/kuning/vendor/jquery/jquery.min.js"></script>
  <script src="/kuning/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/kuning/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/kuning/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/kuning/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/kuning/js/demo/chart-area-demo.js"></script>
  <script src="/kuning/js/demo/chart-pie-demo.js"></script>
   

   <script src="/kuning/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/kuning/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/kuning/js/demo/datatables-demo.js"></script>



</body>

</html>
