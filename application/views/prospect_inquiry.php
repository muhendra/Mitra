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
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-text card-header-Primary">
            <div class="card-text">
              <h4 class="card-title">Masukan kriteria pencarian</h4>
            </div>
          </div>
        <form action="<?php echo base_url().'prospect/getInquiryData';?>" method="post">
          <div class="card-body">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nomor Form Pengajuan Pembiayaan (FPP)</label>
                    <input name="fpp_no" type="text" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nama Nasabah</label>
                    <input name="nama_cust" type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">No KTP</label>
                    <input name="ktpCust" type="text" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Alamat (Sesuai KTP)</label>
                    <input name="alamat_ktp_cust" type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group is-focused">
                    <label class="bmd-label-floating">Tanggal Lahir</label>
                      <input name="tgl_lahir_cust" type="date" class="form-control"/>
                   </div>
                  </div>
                </div>
              <div class="row">
                <div class="col-md-12">
                <button type="submit" class="btn btn-primary pull-right">Cari</button>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-text card-header-sucess">
            <div class="card-text">
              <h4 class="card-title">Hasil pencarian</h4>
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
                              <a href="#" onclick="popupCenter('<?php echo base_url('prospect/viewprospek/'.$value->cust_prospect_id); ?>','xtf',1200,600);"> <?php echo html_escape($value->fpp_no) ?> </a>
                            </td>
                            <td>
                                <?php echo html_escape($value->nama_cust) ?>
                            </td>
                            <td>
                                <?php echo html_escape($value->ktp_cust) ?>
                            </td>
                            <td>
                                <?php echo date('d/m/Y',strtotime($value->tanggal_lahir_cust)) ?>
                            </td>
                            <td>
                                <?php echo html_escape($value->alamat_ktp_cust) ?>
                            </td>
                            <td>
                                <?php echo html_escape($value->status_aplikasi) ?>
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
