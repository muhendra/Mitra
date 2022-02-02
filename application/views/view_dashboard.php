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

  <div class="content">
    <div class="container-fluid">

      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-text card-header-sucess">
            <div class="card-text">
              <h4 class="card-title">Detail Dashboard</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="table table-hover">
                      <table class="table" id="searchResult" width="100%">
                        <thead style="color:#1f5d99;">
                          <th>
                            Nomor FPP
                          </th>
                          <th>
                            Nama Lengkap
                          </th>
                          <th>
                            Nomor KTP
                          </th>
                          <th>
                            Tanggal Lahir
                          </th>
                          <th>
                            Alamat
                          </th>
                          <th>
                            Status Aplikasi
                          </th>
                          <th class="text-center">
                            Dokumen
                          </th>
                        </thead>
                        <tbody>
                      <?php if(isset($data))
                      {
                        foreach ($data as $value) {
                      ?>
                          <tr>
                            <td>
                              <a href="#" onclick="popupCenter('<?php echo base_url('prospect/viewprospek/'.$value->cust_prospect_id); ?>','xtf',1200,600);"> <?php echo $value->fpp_no ?> </a>
                            </td>
                            <td>
                                <?php echo $value->nama_cust ?>
                            </td>
                            <td>
                                <?php echo $value->ktp_cust ?>
                            </td>
                            <td>
                                <?php echo date('d/m/Y',strtotime($value->tanggal_lahir_cust)) ?>
                            </td>
                            <td>
                                <?php echo $value->alamat_ktp_cust ?>
                            </td>
                            <td>
                                <?php echo $value->status_aplikasi ?>
                            </td>
                            <td>
                                <div class="text-center">
                              <a href="#" onclick="popupCenter('<?php echo base_url('prospect/viewprospectdoc/'.$value->cust_prospect_id); ?>','xtf',1000,500);  "> <i class="material-icons">description</i> </a>
                            </div>
                            </td>
                          </tr>
                      <?php }}?>
                        </tbody>
                      </table>
                    </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
  <?php $this->load->view('template/footer')?>
  <?php $this->load->view('template/core')?>
  <script>

  $( document ).ready(function() {
    changeCss('prosinquiry');
    $('#searchResult').DataTable({
    "pagingType": "simple" // "simple" option for 'Previous' and 'Next' buttons only
  });
  $('.dataTables_length').addClass('bs-select');

});


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
  </script>
</body>

</html>
