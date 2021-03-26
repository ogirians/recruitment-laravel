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
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/lowongan">
        <div class="sidebar-brand-icon rotate-n-0">
          <img width="70px" height="55px" src="kuning/img/logo_ibi.png"><!--<i class="fas fa-laugh-wink"></i>-->
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
            <a class="collapse-item" href="/tambah">Tambah</a>
          </div>

        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
   

       <!-- Nav Item - Charts -->
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
                            <button class="btn btn-info" type="submit" >
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
        <div class="container-fluid" style="min-height: 500px">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="padding-top: 50px;">Selamat datang di ibi E-rekrutmen</h1>
            <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center"  style="padding-bottom: 60px; height: 150px;">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Lowongan</div>
                      <div class="h8 mb-0 font-weight-bold text-gray-800">Untuk memasukkan atau menambahkan lowongan kerja yang dibuka
              

                      </div>
                          
                    </div>
                  </div>

                           <a href="/inputlow" class="btn btn-primary btn-icon-split">
                              <span class="icon text-white-50">
                              <i class="fas fa-arrow-right"></i>
                              </span>
                              <span class="text">Daftar Lowongan</span>
                          </a>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center" style="padding-bottom: 60px; height: 150px;">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pelamar</div>
                      <div class="h8 mb-0 font-weight-bold text-gray-800" >Untuk melihat daftar pelamar
                      
                      </div> 
                    </div>
                  </div>
                     <a href="/pelamar" class="btn btn-success btn-icon-split">
                              <span class="icon text-white-50">
                              <i class="fas fa-arrow-right"></i>
                              </span>
                              <span class="text">Daftar Pelamar</span>
                      </a>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center" style="padding-bottom: 30px; height: 150px;">
                    <div class="col mr-1">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tambahkan Lowongan</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h8 mb-0 mr-3 font-weight-bold text-gray-800" style="padding-bottom: 30px;">Untuk menambahkan Lowongan Baru
                          
                          </div>
                       
                        </div>

                        
                        </div>
                      </div>
                    </div>
                             <a href="/tambah" class="btn btn-warning btn-icon-split">
                              <span class="icon text-white-50">
                              <i class="fas fa-arrow-right"></i>
                              </span>
                              <span class="text">tambah lowongan</span>
                          </a>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center" style="padding-bottom: 30px; height: 150px;">
                    <div class="col mr-1">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">On-Proses List</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h8 mb-0 mr-3 font-weight-bold text-gray-800" style="padding-bottom: 30px;">Untuk melihat daftar pelamar yang sedang dalam proses pemanggilan interview
                          
                          </div>
                       
                        </div>

                        
                        </div>
                      </div>
                    </div>
                             <a href="/OnProgres" class="btn btn-info btn-icon-split">
                              <span class="icon text-white-50">
                              <i class="fas fa-arrow-right"></i>
                              </span>
                              <span class="text">Daftar On proses</span>
                          </a>
                  </div>
                </div>
              </div>


              <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center" style="padding-bottom: 30px; height: 150px;">
                    <div class="col mr-1">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Finish list</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h8 mb-0 mr-3 font-weight-bold text-gray-800" style="padding-bottom: 30px;">Untuk melihat daftar pelamar memenuhi kriteria dan dapat diterima menjadi karyawan baru
                          
                          </div>
                       
                        </div>

                        
                        </div>
                      </div>
                    </div>
                             <a href="/finish" class="btn btn-danger btn-icon-split">
                              <span class="icon text-white-50">
                              <i class="fas fa-arrow-right"></i>
                              </span>
                              <span class="text">qualified list</span>
                          </a>
                  </div>
                </div>
              </div>
            

            </div>

            
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

</body>

</html>
