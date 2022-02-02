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
<style>
.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}

.inputfile + label {
	cursor: pointer; /* "hand" cursor */
}
.inputfile:focus + label {
	outline: 1px dotted #000;
	outline: -webkit-focus-ring-color auto 5px;
}
</style>
</head>
<body>
  <?php $this->load->view('template/header') ?>
  <div class="content">
    <div class="container-fluid">
			<div class="col-md-12">
		    <div class="card">
		      <div class="card-header card-header-text card-header-Primary">
		        <div class="card-text">
		          <h4 class="card-title">Informasi Nasabah</h4>
		        </div>
		      </div>
		      <div class="card-body">
						<div class="col-md-12">
							 <?php echo "Nomor Pengajuan: ". $_SESSION['datapros']['fpp_no'] ; ?><br/>
								<?php echo "Nama Nasabah: ". $_SESSION['datapros']['nama_cust']; ?> <br/>
							  <?php echo "Nomor KTP: ". $_SESSION['datapros']['ktp_cust']; ; ?>

						</div>
						<div class="col-md-12">
						</div>
		      </div>
		    </div>
		  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-text card-header-sucess">
        <div class="card-text">
          <h4 class="card-title">Upload Data</h4>
        </div>
      </div>
			<?php echo form_open_multipart(base_url().'prospect/upload');?>
      <div class="card-body">
        <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Nama Dokumen
												<input type="hidden" value="<?php echo $_SESSION['datapros']['fpp_no'] ; ?>" name ="fppNo"/>
												<input type="hidden" id="cust_prospect_id" name = "cust_prospect_id" value = "<?php echo 	$_SESSION['datapros']['id']  ?>"/>
											</th>
                      <th>
                        Nama File
                      </th>
                      <th>
                        Size
                      </th>
                      <th>
                        Tipe File
                      </th>
                      <th class="text-center">
                        Action
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Fotocopy KTP Calon Nasabah
                        </td>
                        <td>
                          <div id="fileNameKTP"></div>
                        </td>
                        <td>
                        <div id="fileSizeKTP"></div>
                        </td>
                        <td>
                        <div id="fileTypeKTP"></div>
                        </td>
                        <td>
                            <div class="text-center">
                          <input type="file" required class="inputfile"  accept=".pdf,.png,.jpg,.jpeg" id="fileKTP" name="fileKTP" onchange="fileSelected('KTP');">
                          <label for="fileKTP"><i class="material-icons">cloud_upload</i></label>
                        </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Foto Copy KTP Pasangan
                        </td>
                        <td>
                          <div id="fileNameKTPSP"></div>
                        </td>
                        <td>
                        <div id="fileSizeKTPSP"></div>
                        </td>
                        <td>
                        <div id="fileTypeKTPSP"></div>
                        </td>
                        <td>
                            <div class="text-center">
                          <input type="file" class="inputfile" accept=".pdf,.png,.jpg,.jpeg" id="fileKTPSP" name="fileKTPSP" onchange="fileSelected('KTPSP');">
                          <label for="fileKTPSP"><i class="material-icons">cloud_upload</i></label>
                        </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Foto Copy Buku Nikah
                        </td>
                        <td>
                          <div id="fileNameBN"></div>
                        </td>
                        <td>
                        <div id="fileSizeBN"></div>
                        </td>
                        <td>
                        <div id="fileTypeBN"></div>
                        </td>
                        <td>
                            <div class="text-center">
                          <input type="file" class="inputfile" accept=".pdf,.png,.jpg,.jpeg" id="fileBN" name="fileBN" onchange="fileSelected('BN');">
                          <label for="fileBN"><i class="material-icons">cloud_upload</i></label>
                        </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Foto Copy Kartu Keluarga
                        </td>
                        <td>
                          <div id="fileNameKK"></div>
                        </td>
                        <td>
                        <div id="fileSizeKK"></div>
                        </td>
                        <td>
                        <div id="fileTypeKK"></div>
                        </td>
                        <td>
                            <div class="text-center">
                          <input type="file" class="inputfile" accept=".pdf,.png,.jpg,.jpeg" id="fileKK" name="fileKK"  onchange="fileSelected('KK');">
                          <label for="fileKK"><i class="material-icons">cloud_upload</i></label>
                        </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Foto Copy NPWP Nasabah
                        </td>
                        <td>
                          <div id="fileNameNPWP"></div>
                        </td>
                        <td>
                        <div id="fileSizeNPWP"></div>
                        </td>
                        <td>
                        <div id="fileTypeNPWP"></div>
                        </td>
                        <td>
                            <div class="text-center">
                          <input type="file" class="inputfile" accept=".pdf,.png,.jpg,.jpeg" id="fileNPWP" name="fileNPWP" onchange="fileSelected('NPWP');">
                          <label for="fileNPWP"><i class="material-icons">cloud_upload</i></label>
                        </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Fotocopy Slip Gaji
                        </td>
                        <td>
                          <div id="fileNameSG"></div>
                        </td>
                        <td>
                        <div id="fileSizeSG"></div>
                        </td>
                        <td>
                        <div id="fileTypeSG"></div>
                        </td>
                        <td>
                            <div class="text-center">
                          <input type="file" class="inputfile" accept=".pdf,.png,.jpg,.jpeg" id="fileSG" name="fileSG" onchange="fileSelected('SG');">
                          <label for="fileSG"><i class="material-icons">cloud_upload</i></label>
                        </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Fotocopy Rekening Koran
                        </td>
                        <td>
                          <div id="fileNameRK"></div>
                        </td>
                        <td>
                        <div id="fileSizeRK"></div>
                        </td>
                        <td>
                        <div id="fileTypeRK"></div>
                        </td>
                        <td>
                            <div class="text-center">
                          <input type="file" max-size="" class="inputfile" accept=".pdf,.png,.jpg,.jpeg" id="fileRK"  name="fileRK" onchange="fileSelected('RK');">
                          <label for="fileRK"><i class="material-icons">cloud_upload</i></label>
                        </div>
                        </td>
                      </tr>
					  
					  <tr>
                        <td>
                          Fotocopy Tagihan PLN/Telepon/Air/PBB
                        </td>
                        <td>
                          <div id="fileNameTG"></div>
                        </td>
                        <td>
                        <div id="fileSizeTG"></div>
                        </td>
                        <td>
                        <div id="fileTypeTG"></div>
                        </td>
                        <td>
                            <div class="text-center">
                          <input type="file" max-size="" class="inputfile" accept=".pdf,.png,.jpg,.jpeg" id="fileTG"  name="fileTG" onchange="fileSelected('TG');">
                          <label for="fileTG"><i class="material-icons">cloud_upload</i></label>
                        </div>
                        </td>
                      </tr>
					  
                    </tbody>
                  </table>
                </div>
      </div>
			<div class="col-md-12">
			<button type="submit" class="btn btn-primary pull-right">Upload File</button>
			<div class="clearfix"></div>
		</form>
    </div>
  </div>
</div>
</div>
  <?php $this->load->view('template/footer')?>
  <?php $this->load->view('template/core')?>
  <script>
  function fileSelected(filetype) {
    var file = document.getElementById('file'+filetype).files[0];
    if (file) {
      var fileSize = 0;
			if(file.size > 2048 * 1024)
			{
				alert('File upload maksimal 2 MB');
				document.getElementById('fileName'+filetype).innerHTML =  "Maksimal file 2 MB";
				document.getElementById('fileSize'+filetype).innerHTML =  "";
				document.getElementById('fileType'+filetype).innerHTML =  "";
				exit();

			}
      if (file.size > 1024 * 1024)
        fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
      else
        fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';

      document.getElementById('fileName'+filetype).innerHTML =  file.name;
      document.getElementById('fileSize'+filetype).innerHTML =  fileSize;
      document.getElementById('fileType'+filetype).innerHTML =  file.type;
    }
  }

  $( document ).ready(function() {
    changeCss('prospect');
    $("#prof").hide();
    $("#wir").hide();
        $("#ddlJenisKerja").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue == "PROFESSIONAL"){
                    $("#prof").show(400);
                    $("#wir").hide(400);
                } else if(optionValue == "WIRASWASTA"){
                  $("#prof").hide(400);
                  $("#wir").show(400);
                }
                else
                {
                  $("#prof").hide(400);
                  $("#wir").hide(400);
                }
            });
        }).change();


});
  </script>
</body>

</html>
