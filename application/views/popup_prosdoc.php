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
<body>
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
							<?php echo "Nomor FPP: ". $fpp_no; ?> <br/>
								<?php echo "Nama Nasabah: ". $nama_cust; ?> <br/>
							  <?php echo "Nomor KTP: ". $ktp_cust; ?>
								<input type="hidden" id="cust_prospect_id" value = "<?php echo $id  ?>"/>
							
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
          <h4 class="card-title">Dokumen Pendukung</h4>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Dokumen
                      </th>
                      <th>
                        File
                      </th>
                      <th>
                        Ukuran (KB)
                      </th>
                      <th>
                        Tipe File
                      </th>
											<th>
												Status Dokumen
											</th>
                      <th class="text-center">
                        Proses
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Fotocopy KTP Calon Nasabah
													<?php
													$row = null;
															foreach($doc as $struct) {
															    if ('KTP' == $struct->file_type) {
															        $row = $struct;
															        break;
															    }
															}

														if(!isset($row))
														{
														$statusdoc 						= "";
														$cust_prospect_doc_id           = "";
														$file_size_kb 				    = "";
														$file_name 						= "";
														$file_type						= "";
														$file_ext 						= "";
														$statusdoc  					= "Not Uploaded";
														}
													else
														{
															$cust_prospect_doc_id = $row->cust_prospect_doc_id;
															$file_size_kb					= $row->file_size_kb;
															$file_name						= $row->file_name;
															$file_type						= $row->file_type;
															$file_ext						  = $row->file_ext;
															$statusdoc					  = $row->doc_stat;
														}
													?>
                        </td>
                        <td>
                          <div id="fileNameKTP"><?php echo $file_name ?></div>
                        </td>
                        <td>
                        <div id="fileSizeKTP"><?php echo $file_size_kb ?></div>
                        </td>
                        <td>
                        <div id="fileTypeKTP"><?php echo $file_ext ?></div>
                        </td>
												<td>
                        <div id="docstat"><?php echo $statusdoc ?></div>
                        </td>
                        <td>
													<?php
													if($statusdoc != 'NEW' && $statusdoc != 'APPROVE')
													{
														?>
                            <div class="text-center">
                            <input type="file" required class="inputfile"  accept=".pdf,.png,.jpg,.jpeg" id="fileKTP" onchange="fileSelected('KTP','KTP','Ktp Nasabah');">
                            <label for="fileKTP"><i class="material-icons">cloud_upload</i></label>
                          </div>
												<?php	} ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Foto Copy KTP Pasangan
                          							<?php
													$row = null;
															foreach($doc as $struct) {
															    if ('KTPSP' == $struct->file_type) {
															        $row = $struct;
															        break;
															    }
															}

														if(!isset($row))
														{
														$statusdoc 						= "";
														$cust_prospect_doc_id = "";
														$file_size_kb 				= "";
														$file_name 						= "";
														$file_type						= "";
														$file_ext 						= "";
														$statusdoc  					= "Not Uploaded";
														}
													else
														{
															$cust_prospect_doc_id = $row->cust_prospect_doc_id;
															$file_size_kb					= $row->file_size_kb;
															$file_name						= $row->file_name;
															$file_type						= $row->file_type;
															$file_ext						  = $row->file_ext;
															$statusdoc					  = $row->doc_stat;
														}
													?>
                        </td>
                        <td>
                          <div id="fileNameKTPSP"><?php echo $file_name ?></div>
                        </td>
                        <td>
                        <div id="fileSizeKTPSP"><?php echo $file_size_kb ?></div>
                        </td>
                        <td>
                        <div id="fileTypeKTPSP"><?php echo $file_ext ?></div>
                        </td>
												<td>
                        <div><?php echo $statusdoc ?></div>
                        </td>
                        <td>
													<?php
													if($statusdoc != 'NEW' && $statusdoc != 'APPROVE')
													{ ?>
													<div class="text-center">
													<input type="file" class="inputfile" accept=".pdf,.png,.jpg,.jpeg" id="fileKTPSP" onchange="fileSelected('KTPSP','KTPSP','Ktp Pasangan');">
													<label for="fileKTPSP"><i class="material-icons">cloud_upload</i></label>
													</div>
											<?php		} ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Foto Copy Buku Nikah
													<?php
															$row = null;
															foreach($doc as $struct) {
															    if ('BUKUNIKAH' == $struct->file_type) {
															        $row = $struct;
															        break;
															    }
															}

														if(!isset($row))
														{
														$statusdoc 						= "";
														$cust_prospect_doc_id = "";
														$file_size_kb 				= "";
														$file_name 						= "";
														$file_type						= "";
														$file_ext 						= "";
														$statusdoc  					= "Not Uploaded";
														}
													else
														{
															$cust_prospect_doc_id = $row->cust_prospect_doc_id;
															$file_size_kb					= $row->file_size_kb;
															$file_name						= $row->file_name;
															$file_type						= $row->file_type;
															$file_ext						  = $row->file_ext;
															$statusdoc					  = $row->doc_stat;
														}
													?>

                        </td>
                        <td>
                          <div id="fileNameBN"><?php echo $file_name ?></div>
                        </td>
                        <td>
                        <div id="fileSizeBN"><?php echo $file_size_kb ?></div>
                        </td>
                        <td>
                        <div id="fileTypeBN"><?php echo $file_ext ?></div>
                        </td>
												<td>
                        <div><?php echo $statusdoc ?></div>
                        </td>
                        <td>
												<?php
													if($statusdoc != 'NEW' && $statusdoc != 'APPROVE')
													{
														?>
													<div class="text-center">
													<input type="file" class="inputfile" accept=".pdf,.png,.jpg,.jpeg" id="fileBN" onchange="fileSelected('BN','BUKUNIKAH','Buku Nikah');">
													<label for="fileBN"><i class="material-icons">cloud_upload</i></label>
													</div>
												<?php	} ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Foto Copy Kartu Keluarga
													<?php
													  	$row = null;
															foreach($doc as $struct) {
															    if ('KK' == $struct->file_type) {
															        $row = $struct;
															        break;
															    }
															}

														if(!isset($row))
														{
														$statusdoc 						= "";
														$cust_prospect_doc_id = "";
														$file_size_kb 				= "";
														$file_name 						= "";
														$file_type						= "";
														$file_ext 						= "";
														$statusdoc  					= "Not Uploaded";
														}
													else
														{
															$cust_prospect_doc_id = $row->cust_prospect_doc_id;
															$file_size_kb					= $row->file_size_kb;
															$file_name						= $row->file_name;
															$file_type						= $row->file_type;
															$file_ext						  = $row->file_ext;
															$statusdoc					  = $row->doc_stat;
														}
													?>
                        </td>
                        <td>
                          <div id="fileNameKK"><?php echo $file_name ?></div>
                        </td>
                        <td>
                        <div id="fileSizeKK"><?php echo $file_size_kb ?></div>
                        </td>
                        <td>
                        <div id="fileTypeKK"><?php echo $file_ext ?></div>
                        </td>
												<td>
                        <div><?php echo $statusdoc ?></div>
                        </td>
                        <td>
													<?php
														if($statusdoc != 'NEW' && $statusdoc != 'APPROVE')
														{
													?>
														<div class="text-center">
														<input type="file" class="inputfile" accept=".pdf,.png,.jpg,.jpeg" id="fileKK" onchange="fileSelected('KK','KK','Kartu Keluarga');">
														<label for="fileKK"><i class="material-icons">cloud_upload</i></label>
														</div>
													<?php	} ?>
                            <div class="text-center" hidden="true">

                          <label for="fileKK"><i class="material-icons">cloud_upload</i></label>
                        </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Foto Copy NPWP Nasabah
													<?php
													 	$row = null;
															foreach($doc as $struct) {
															    if ('NPWP' == $struct->file_type) {
															        $row = $struct;
															        break;
															    }
															}

														if(!isset($row))
														{
														$statusdoc 						= "";
														$cust_prospect_doc_id = "";
														$file_size_kb 				= "";
														$file_name 						= "";
														$file_type						= "";
														$file_ext 						= "";
														$statusdoc  					= "Not Uploaded";
														}
													else
														{
															$cust_prospect_doc_id = $row->cust_prospect_doc_id;
															$file_size_kb					= $row->file_size_kb;
															$file_name						= $row->file_name;
															$file_type						= $row->file_type;
															$file_ext						  = $row->file_ext;
															$statusdoc					  = $row->doc_stat;
														}
													?>
                        </td>
                        <td>
                          <div id="fileNameNPWP"><?php echo $file_name ?></div>
                        </td>
                        <td>
                        <div id="fileSizeNPWP"><?php echo $file_size_kb ?></div>
                        </td>
                        <td>
                        <div id="fileTypeNPWP"><?php echo $file_ext ?></div>
                        </td>
												<td>
                        <div><?php echo $statusdoc ?></div>
                        </td>
                        <td>
													<?php
														if($statusdoc != 'NEW' && $statusdoc != 'APPROVE')
														{
													 ?>
														<div class="text-center">
														<input type="file" class="inputfile" accept=".pdf,.png,.jpg,.jpeg" id="fileNPWP" onchange="fileSelected('NPWP','NPWP','NPWP Nasabah');">
														<label for="fileNPWP"><i class="material-icons">cloud_upload</i></label>
														</div>
												<?php		} ?>
                        </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Fotocopy Slip Gaji
													<?php
													 	$row = null;
															foreach($doc as $struct) {
															    if ('SLIPGAJI' == $struct->file_type) {
															        $row = $struct;
															        break;
															    }
															}

														if(!isset($row))
														{
														$statusdoc 			  = "";
														$cust_prospect_doc_id = "";
														$file_size_kb 		  = "";
														$file_name 						= "";
														$file_type						= "";
														$file_ext 						= "";
														$statusdoc  					= "Not Uploaded";
														}
													else
														{
															$cust_prospect_doc_id = $row->cust_prospect_doc_id;
															$file_size_kb					= $row->file_size_kb;
															$file_name						= $row->file_name;
															$file_type						= $row->file_type;
															$file_ext						  = $row->file_ext;
															$statusdoc					  = $row->doc_stat;
														}
													?>
                        </td>
                        <td>
                          <div id="fileNameSG"><?php echo $file_name ?></div>
                        </td>
                        <td>
                        <div id="fileSizeSG"><?php echo $file_size_kb ?></div>
                        </td>
                        <td>
                        <div id="fileTypeSG"><?php echo $file_ext ?></div>
                        </td>
												<td>
												<div><?php echo $statusdoc ?></div>
												</td>
                        <td>
													<?php
														if($statusdoc != 'NEW' && $statusdoc != 'APPROVE')
														{
														?>
															<div class="text-center">
															<input type="file" class="inputfile" accept=".pdf,.png,.jpg,.jpeg" id="fileSG" onchange="fileSelected('SG','SLIPGAJI','Slip Gaji Nasabah');">
															<label for="fileSG"><i class="material-icons">cloud_upload</i></label>
															</div>
													<?php	} ?>
                        </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Fotocopy Rekening Koran
													<?php
													  	$row = null;
															foreach($doc as $struct) {
															    if ('REKKORAN' == $struct->file_type) {
															        $row = $struct;
															        break;
															    }
															}

														if(!isset($row))
														{
														$statusdoc 						= "";
														$cust_prospect_doc_id = "";
														$file_size_kb 				= "";
														$file_name 						= "";
														$file_type						= "";
														$file_ext 						= "";
														$statusdoc  					= "Not Uploaded";
														}
													else
														{
															$cust_prospect_doc_id = $row->cust_prospect_doc_id;
															$file_size_kb					= $row->file_size_kb;
															$file_name						= $row->file_name;
															$file_type						= $row->file_type;
															$file_ext						  = $row->file_ext;
															$statusdoc					  = $row->doc_stat;
														}
													?>
                        </td>
                        <td>
                          <div id="fileNameRK"><?php echo $file_name ?></div>
                        </td>
                        <td>
                        <div id="fileSizeRK"><?php echo $file_size_kb ?></div>
                        </td>
                        <td>
                        <div id="fileTypeRK"><?php echo $file_ext ?></div>
                        </td>
												<td>
												<div><?php echo $statusdoc ?></div>
												</td>
                        <td>
													<?php
														if($statusdoc != 'NEW' && $statusdoc != 'APPROVE')
														{
														?>
															<div class="text-center">
															<input type="file" max-size="" class="inputfile" accept=".pdf,.png,.jpg,.jpeg" id="fileRK" onchange="fileSelected('RK','REKKORAN','Rekening Koran Nasabah');">
															<label for="fileRK"><i class="material-icons">cloud_upload</i></label>
														 </div>
												<?php		} ?>
                        </div>
                        </td>
                      </tr>
					  
					  
					  <tr>
                        <td>
                          Fotocopy Tagihan PLN/Telepon/Air/PBB
													<?php
													  	$row = null;
															foreach($doc as $struct) {
															    if ('TAGIHAN' == $struct->file_type) {
															        $row = $struct;
															        break;
															    }
															}

														if(!isset($row))
														{
														$statusdoc 						= "";
														$cust_prospect_doc_id = "";
														$file_size_kb 				= "";
														$file_name 						= "";
														$file_type						= "";
														$file_ext 						= "";
														$statusdoc  					= "Not Uploaded";
														}
													else
														{
															$cust_prospect_doc_id = $row->cust_prospect_doc_id;
															$file_size_kb					= $row->file_size_kb;
															$file_name						= $row->file_name;
															$file_type						= $row->file_type;
															$file_ext						  = $row->file_ext;
															$statusdoc					  = $row->doc_stat;
														}
													?>
                        </td>
                        <td>
                          <div id="fileNameTG"><?php echo $file_name ?></div>
                        </td>
                        <td>
                        <div id="fileSizeTG"><?php echo $file_size_kb ?></div>
                        </td>
                        <td>
                        <div id="fileTypeTG"><?php echo $file_ext ?></div>
                        </td>
												<td>
												<div><?php echo $statusdoc ?></div>
												</td>
                        <td>
													<?php
														if($statusdoc != 'NEW' && $statusdoc != 'APPROVE')
														{
														?>
															<div class="text-center">
															<input type="file" max-size="" class="inputfile" accept=".pdf,.png,.jpg,.jpeg" id="fileTG" onchange="fileSelected('TG','TAGIHAN','Tagihan');">
															<label for="fileTG"><i class="material-icons">cloud_upload</i></label>
														 </div>
												<?php		} ?>
                        </div>
                        </td>
                      </tr>
					  
                    </tbody>
                  </table>
                </div>
      </div>
    </div>
  </div>
</div>
</div>
  <?php $this->load->view('template/footer')?>
  <?php $this->load->view('template/core')?>
  <script>
  function fileSelected(filetype,filename,desc="") {

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
				if(confirm('Anda yakin akan upload file ' +desc + '?'))
				{
		        fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
						var fd = new FormData();
        		fd.append('file',file);
						fd.append('fpp_no','<?php echo $fpp_no; ?>');
						fd.append('cust_prospect_id', '<?php echo $id; ?>');
						fd.append('session_id','<?php echo $_SESSION['session_id']; ?>');
						fd.append('mitra_id','<?php echo $_SESSION['userinfo']->mcode; ?>');
						fd.append('filename',filename);
						
						$.ajax({
											url: '<?php echo base_url()."prospect/uploadinq";?>',
											type: 'post',
											data: fd,
											contentType: false,
											processData: false,
											success: function(response){
												//alert(response);
												alert('upload file '+desc+' berhasil');
												location.reload();
															//alert(response);
											},
											error: function (request, x) {
											console.log(arguments);
											alert(" Can't do because: " + x);
										}
									});

		      document.getElementById('fileName'+filetype).innerHTML =  file.name.replace('<','_').replace('"','_').replace('onload','_').replace('=','_').replace('\'','_');
		      document.getElementById('fileSize'+filetype).innerHTML =  fileSize;
		      document.getElementById('fileType'+filetype).innerHTML =  file.type;
				}
				else {
					alert('upload dibatalkan');
				}
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
