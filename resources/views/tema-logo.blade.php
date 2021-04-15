<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>IBI recruitment</title>

  <!-- Bootstrap Core CSS -->
  <link href="/kuning/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="/kuning/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="/kuning/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('/kuning/css/stylish-portfolio.min.css') }}" rel="stylesheet">
  <link src="/kuning/css/jquery.steps.css" rel="stylesheet">

  <script src="/kuning/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="/kuning/css/datepicker.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <!--<script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
-->

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

  <!-- Navigation -->
  <a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="sidebar-brand">
        <a class="js-scroll-trigger" href="#page-top">Selamat datang</a>
      </li>
      <!--
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#page-top">Home</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#about">About</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#services">Services</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#portfolio">Portfolio</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#contact">Contact</a>
      </li>-->
    </ul>
  </nav>

  <!-- Header -->
  <header class="masthead d-flex">
    <div class="container">
      <div class="text-center">





    @yield('form')



    <div class="overlay"></div>
  </div>
</div>
</header>



  <!-- Footer -->
<div class="container">
  <footer class="footer text-center">
    <div class="container">
      <ul class="list-inline mb-5">
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="https://www.facebook.com/indoberka.investama">
            <i class="icon-social-facebook"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="https://www.instagram.com/ibi_truss/?hl=id">
            <i class="icon-social-instagram"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white" href="https://www.youtube.com/channel/UCVizPa3znJh6KUzim7kkRaw">
            <i class="icon-social-youtube"></i>
          </a>
        </li>
      </ul>
      <p class="text-muted small mb-0">Copyright &copy;PT INDOBERKA INVESTAMA 2020</p>
    </div>
  </footer>
</div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="/kuning/js/stylish-portfolio.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>

</body>

</html>
