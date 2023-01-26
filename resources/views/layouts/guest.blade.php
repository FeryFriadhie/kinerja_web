<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/dashforge">
    <meta property="og:title" content="DashForge">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <title>e-Kinerja | SMKN 1 Ciamis</title>

    <!-- vendor css -->
    <link href="lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/prismjs/themes/prism-vs.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="assets/css/dashforge.css">
    <link rel="stylesheet" href="assets/css/dashforge.landing.css">
		<link rel="stylesheet" href="../assets/css/dashforge.demo.css">

    <!-- bootstrap -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> --}}

  </head>
  <body class="home-body">

    <header class="navbar navbar-header navbar-header-fixed bd-b-0">
      <div class="container">
        <a href="" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
        <div class="navbar-brand">
          <a href="/" class="df-logo">e-<span>Kinerja</span></a>
        </div><!-- navbar-brand -->
        <div id="navbarMenu" class="navbar-menu-wrapper">
          <div class="navbar-menu-header">
            <a href="/" class="df-logo">e-<span>Kinerja</span></a>
            <a id="mainMenuClose" href=""><i data-feather="x"></i></a>
          </div><!-- navbar-menu-header -->
          <ul class="nav navbar-menu">
            <li class="nav-label pd-l-15 pd-lg-l-25 d-lg-none">Main Navigation</li>
            <li class="nav-item"><a href="#beranda" class="nav-link"><i data-feather="home"></i> Beranda</a></li>
            <li class="nav-item"><a href="#tentang" class="nav-link"><i data-feather="box"></i> Tentang</a></li>
            <li class="nav-item"><a href="#kontak" class="nav-link"><i data-feather="phone"></i> Kontak</a></li>
          </ul>
        </div><!-- navbar-menu-wrapper -->
        <div class="navbar-right">
          <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary"> <span>Login</span></a>
        </div><!-- navbar-right -->
      </div>
    </header><!-- navbar -->

    <!-- isi -->
    
    @yield('content')

    <!-- end isi -->

    <!-- footer -->
    @include('layouts.partial.footer')
    <!-- end footer -->

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/feather-icons/feather.min.js"></script>
    <script src="lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    
    <script src="../lib/jqueryui/jquery-ui.min.js"></script>
    <script src="../lib/prismjs/prism.js"></script>
    <script src="assets/js/dashforge.js"></script>
    <script>
      $(document).ready(function() {
        'use strict'

        $('[data-toggle="tooltip"]').tooltip()

      });
    </script>

    <script>
      $(function(){
        'use strict'

        // Default functionality
        $('#accordion1').accordion({
          heightStyle: 'content'
        });

        // Collapse content
        $('#accordion2').accordion({
          heightStyle: 'content',
          collapsible: true
        });

        // Custom style
        $('#accordion3').accordion({
          heightStyle: 'content'
        });

        $('#accordion4').accordion({
          heightStyle: 'content'
        });

        // Colored variant
        $('#accordion5').accordion({
          heightStyle: 'content'
        });

        $('#accordion6').accordion({
          heightStyle: 'content'
        });

        $('#accordion7').accordion({
          heightStyle: 'content'
        });

        $('#accordion8').accordion({
          heightStyle: 'content'
        });

      });
    </script>
  </body>
</html>
