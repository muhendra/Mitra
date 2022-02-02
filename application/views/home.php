<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>

</head>
<body class="">
  <?php $this->load->view('template/header') ?>
      <div class="content">
        <div class="container-fluid">
         <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-text card-header-sucess">
            <div class="card-text">
              <h4 class="card-title">Profil anda</h4>
            </div>
          </div>
          <div class="card-body">
          <div class="row col-md-12">
            <div class="row col-md-6">

              Kode Mitra : <?php echo $_SESSION['userinfo']->mcode ?>
          </div>
          <div class="row col-md-6">
            Cabang : <?php echo $_SESSION['userinfo']->branch ?>
        </div>
          </div>
          <div class="row col-md-12">
            <div class="row col-md-6">
              Nama Lengkap : <?php echo $_SESSION['userinfo']->nama ?>

          </div>
          <div class="row col-md-6">
            Jenis Kemitraan : <?php echo $_SESSION['userinfo']->jenismitra ?>
        </div>
          </div>
          <div class="row col-md-12">
            <div class="row col-md-6">
            Status : <?php echo $_SESSION['userinfo']->isactive == 'T' ? 'Aktif' : 'Tidak Aktif' ?>
          </div>
          <div class="row col-md-6">
            Email : <?php echo $_SESSION['userinfo']->email ?>
        </div>
          </div>
          <div class="row col-md-12">
            <div class="row col-md-6">
               Tempat & Tanggal Lahir : <?php echo $_SESSION['userinfo']->tempatlahir ?>, <?php echo $_SESSION['userinfo']->tanggallahir ?>
          </div>
          <div class="row col-md-6">
              NPWP : <?php echo $_SESSION['userinfo']->npwp ?>
        </div>
          </div>
            <div class="row col-md-12">
              Mobilephone (HP) : <?php echo $_SESSION['userinfo']->hp ?>
          </div>
          <div class="row col-md-12">
            <div class="row col-md-12">
              Telepon : <?php echo $_SESSION['userinfo']->notlp ?>
          </div>
            <div class="row col-md-12">
              Alamat Lengkap : <?php echo $_SESSION['userinfo']->address ?>
          </div>
          </div>
        </div>
        </div>
      </div>
        </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <p class="card-category"><a href="#" onclick="popupCenter('<?php echo base_url('prospect/ViewDashBoard/NEW'); ?>','xtf',1200,600);">Aplikasi baru</a></p>
                  <?php $row = null;
                      foreach($dashboard as $struct) {
                          if ('NEW' == $struct->status_aplikasi) {
                              $row = $struct;
                              break;
                          }
                      } ?>
                  <h3 class="card-title"><?php if(isset($row)){ echo $row->jumlah;} else { echo "0";} ?>
                  </h3>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">hourglass_full</i>
                  </div>
                  <p class="card-category"><a href="#" onclick="popupCenter('<?php echo base_url('prospect/ViewDashBoard/ON PROGRESS'); ?>','xtf',1200,600);">Aplikasi proses</a></p>
                  <?php $row = null;
                      foreach($dashboard as $struct) {
                          if ('ON PROGRESS' == $struct->status_aplikasi) {
                              $row = $struct;
                              break;
                          }
                      } ?>
                  <h3 class="card-title"><?php if(isset($row)) { echo $row->jumlah;} else { echo "0";} ?></h3>
                </div>
                <div class="card-footer">
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">done_outline</i>
                  </div>
                  <p class="card-category"><a href="#" onclick="popupCenter('<?php echo base_url('prospect/ViewDashBoard/APPROVE'); ?>','xtf',1200,600);">Aplikasi setuju</a></p>
                  <?php $row = null;
                      foreach($dashboard as $struct) {
                          if ('APPROVE' == $struct->status_aplikasi) {
                              $row = $struct;
                              break;
                          }
                      } ?>
                  <h3 class="card-title"><?php if(isset($row)) { echo $row->jumlah;} else { echo "0";} ?></h3>
                </div>
                <div class="card-footer">
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                        <i class="material-icons">payments</i>
                  </div>
                  <p class="card-category"><a href="#" onclick="popupCenter('<?php echo base_url('prospect/ViewDashBoard/REJECT'); ?>','xtf',1200,600);">Aplikasi ditolak</a></p>
                  <?php $row = null;
                      foreach($dashboard as $struct) {
                          if ('REJECT' == $struct->status_aplikasi) {
                              $row = $struct;
                              break;
                          }
                      } ?>
                  <h3 class="card-title"><?php if(isset($row)) { echo $row->jumlah;} else { echo "0";} ?></h3>
                </div>
                <div class="card-footer">
                </div>
              </div>
            </div>
          </div>
        </div>

  <?php $this->load->view('template/footer')?>
  <?php $this->load->view('template/core')?>
  <script>
  function popupCenter(url, title, w, h)
   {
      // Fixes dual-screen position                             Most browsers      Firefox
      const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
      const dualScreenTop = window.screenTop !==  undefined   ? window.screenTop  : window.screenY;

      const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
      const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

      const systemZoom = width / window.screen.availWidth;
      const left = (width - w) / 2 / systemZoom + dualScreenLeft
      const top = (height - h) / 2 / systemZoom + dualScreenTop
      const newWindow = window.open(url, title,
        `
        scrollbars=yes,
        width=${w / systemZoom},
        height=${h / systemZoom},
        top=${top},
        left=${left}
        `
      )

      if (window.focus) newWindow.focus();
  }

  $( document ).ready(function() {
    changeCss('home');


});

  </script>
</body>

</html>
