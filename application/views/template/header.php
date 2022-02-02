<html>
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Midas by MNC GUI Syariah
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/font.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url() ?>/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
</head>
<body class="">
  <div class="wrapper">
    <div class="sidebar" data-color="green" data-background-color="black" data-image="">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="" class="simple-text logo-normal">
        <img src="<?php echo base_url(); ?>assets/img/homelogo.png"/>
      <h5>Aplikasi Kemitraan</h5></a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li id="home"  class="nav-item" >
            <a class="nav-link" href="<?php echo base_url("home") ?>">
              <i class="material-icons">home</i>
              <p>Home</p>
            </a>
          </li>
          <li id="prospect" class="nav-item" >
            <a class="nav-link"  href="<?php echo base_url("prospect") ?>">
              <i class="material-icons">content_paste</i>
              <p>Buat Pengajuan Baru</p>
            </a>
          </li>
          <li id="prosinquiry" class="nav-item ">
            <a class="nav-link" href="<?php echo base_url("prospect/prosinquiry") ?>">
              <i class="material-icons">assessment</i>
              <p>Lihat pengajuan saya</p>
            </a>
          </li>
          <li id="mitra"  class="nav-item " hidden="true">
            <a class="nav-link" href="<?php echo base_url("submitra") ?>">
              <i class="material-icons">person</i>
              <p>Sub Mitra</p>
            </a>
          </li>
          <li id="insentif" class="nav-item " hidden="true">
            <a class="nav-link" href="<?php echo base_url("insentif") ?>">
              <i class="material-icons">library_books</i>
              <p>Insentif</p>
            </a>
          </li>
        </ul>

      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top  ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"></a>
          </div>
          <button  class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div  class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
             <!-- <li hidden class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div  class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>-->
              <div><?php echo( 'Selamat datang, '. $_SESSION['userinfo']->nama);?> </div>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="<?php echo base_url("home/logout") ?>">Log out</a>
				  <a class="dropdown-item" href="<?php echo base_url("home/cpass") ?>">Ubah Password</a>
                </div>

              </li>
            </ul>
          </div>
        </div>
      </nav>
</body>
</html>
