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
      <div class="card-header card-header-text card-header-sucess">
        <div class="card-text">
          <h4 class="card-title">Data Konsumen</h4>
        </div>
      </div>
      <div class="card-body">
               <form action="<?php echo base_url().'prospect/saveData';?>" method="post">
								 <div class="row">
									 <div class="col-md-12">
										 <div class="form-group">
											 <label class="bmd-label-floating">Nomor form pengajuan</label>
											 <input name="nama_cust" type="text" class="form-control" readonly  value="<?php echo html_escape($cust[0] ->fpp_no) ?>">
										 </div>
									 </div>
								 </div>
								 <div class="row">
									 <div class="col-md-6">
										 <div class="form-group">
											 <label class="bmd-label-floating">Group MNC</label>
											  <input name="ddlstatgrup" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->group_mnc_cust) ?>">
										 </div>
									 </div>
									 <div class="col-md-6">
										 <div class="form-group">
											 <label class="bmd-label-floating">Tenor</label>
											 <input name="ddltenor" type="text" class="form-control" readonly  value="<?php echo html_escape($cust[0] ->tenor) ?>">
										 </div>
									 </div>
								 </div>
                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label class="bmd-label-floating">Nama Lengkap (tanpa singkatan dan Gelar)*</label>
                       <input name="nama_cust" type="text" class="form-control" readonly  value="<?php echo html_escape($cust[0] ->nama_cust) ?>">
                     </div>
                   </div>
                 </div>
								 <div class="row">
									 <div class="col-md-6">
										 <div class="form-group">
											 <label class="bmd-label-floating">No KTP*</label>
											 <input name="ktpCust" type="text" class="form-control" readonly  value="<?php echo html_escape($cust[0] ->ktp_cust) ?>">
										 </div>
									 </div>
									 <div class="col-md-6">
										<div class="form-group">
											<label class="bmd-label-floating">NPWP</label>
											<input name="npwp_cust" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->npwp_cust) ?>">
										</div>
									</div>
								 </div>
                 <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="bmd-label-floating">Pendidikan Terakhir*</label>
                       <input type="text"  name="ddlLastEdu" class="form-control" readonly value="<?php echo html_escape($cust[0] ->education_cust) ?>" />
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="bmd-label-floating">Jenis Kelamin*</label>
                       <input type="text"  name="ddlJenisKelCust" class="form-control" readonly value="<?php echo html_escape($cust[0] ->gender_cust) ?>">
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-4">
                     <div class="form-group">
                       <label class="bmd-label-floating">Status Perkawinan*</label>
                       <input type="text"  name="ddlStatusKawinCust" class="form-control" id="ddlStatusKawinCust" readonly value="<?php echo html_escape($cust[0] ->marital_stat_cust) ?>" />
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="form-group">
                       <label class="bmd-label-floating">Tempat Lahir*</label>
                       <input name="tempat_lahir_cust" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->tempat_lahir_cust) ?>"/>
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="form-group">
                       <label class="bmd-label-floating">Tanggal Lahir*</label>
                         <input name="tgl_lahir_cust" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->tanggal_lahir_cust) ?>"/>
                      </div>
                     </div>
                   </div>
									 <div class="row">
										 <div class="col-md-8">
											 <div class="form-group">
												 <label class="bmd-label-floating">Alamat tinggal (saat ini) </label>
												 <input name="curr_addr_cust" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->alamat_tinggal_cust) ?>">
											 </div>
										 </div>
										 <div class="col-md-4">
											 <div class="form-group">
												 <label class="bmd-label-floating">Kota / Kabupaten</label>
												 <input name="curr_kota_cust" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->kota_tinggal_cust) ?>">
											 </div>
										 </div>
									 </div>
                 <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="bmd-label-floating">Alamat (Sesuai KTP)</label>
                        <input name="alamat_ktp_cust" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->alamat_ktp_cust) ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">Kota / Kabupaten</label>
                        <input name="kota_ktp_cust" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->kota_ktp_cust) ?>">
                      </div>
                    </div>
                  </div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="bmd-label-floating">Status tempat tinggal*</label>
												<input type="text"  name="cur_addr_stat_cust" class="form-control" readonly value="<?php echo html_escape($cust[0] ->status_tinggal_cust) ?>"/>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="bmd-label-floating">Lama tinggal (tahun)</label>
												<input name="length_stay" type="number" min=0  class="form-control" required value="<?php echo html_escape($cust[0] ->lama_tinggal_cust) ?>">
											</div>
										</div>
										<div class="col-md-4" hidden>
											<div class="form-group">
												<label class="bmd-label-floating">Jarak kantor MNCGUI terdekat (km)*</label>
												<input name="dist_nearest_branch" type="number" min=0 class="form-control">
											</div>
										</div>
									</div>

                 <div class="row">
									 <div class="col-md-4">
										 <div class="form-group">
											 <label class="bmd-label-floating">Nomor HP</label>
											 <input name="hp_cust" type="number" class="form-control" readonly value="<?php echo html_escape($cust[0] ->hp_cust) ?>">
										 </div>
									 </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nomor Telp</label>
                          <input name="tlp_cust" type="number" class="form-control" readonly value="<?php echo html_escape($cust[0] ->no_telp_cust) ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input name="email_cust" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->email_cust) ?>">
                        </div>
                      </div>
                    </div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="bmd-label-floating">Nama Gadis Ibu Kandung</label>
													<input name="mmn_cust" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->mmn_cust) ?>">
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="bmd-label-floating">Nama Ahli Waris*</label>
													<input name="ahliwaris_cust" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->ahliwaris_cust) ?>">
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="bmd-label-floating">Hubungan Ahlis Waris*</label>
													<input name="hub_ahliwaris" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->hub_ahliwaris) ?>">
												</div>
											</div>
										</div>
										
                 <div class="clearfix"></div>
       </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-text card-header-sucess">
        <div class="card-text">
          <h4 class="card-title">Data Pasangan Calon Nasabah</h4>
        </div>
      </div>
      <div class="card-body">
                 <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="bmd-label-floating"><div id="lblNamaLengkapSpouse">Nama Lengkap</div></label>
                       <input name="nama_spouse" type="text" class="form-control" id="nama_spouse" readonly value="<?php echo html_escape($cust[0] ->nama_spouse) ?>">
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="bmd-label-floating"><div id="lblKTPSpouse">No KTP Pasangan</div></label>
                       <input name="ktp_spouse" type="text" class="form-control" id="ktp_spouse" readonly value="<?php echo html_escape($cust[0] ->ktp_spouse) ?>">
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-4">
                     <div class="form-group">
                       <label class="bmd-label-floating">Kewarganegaraan</label>
                       <input type="text"  name="ddlWargaNegaraSpouse" class="form-control" readonly value="<?php echo html_escape($cust[0] ->warga_negara_spouse) ?>">
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="form-group">
                       <label class="bmd-label-floating"><div id="lbltmlSpouse">Tempat Lahir</div></label>
                       <input name="tempat_lahir_spouse" type="text" class="form-control" id="tempat_lahir_spouse" readonly value="<?php echo $cust[0] ->tempat_lahir_spouse ?>"/>
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="form-group">
                       <label class="bmd-label-floating"><div id="lbltlSpouse">Tanggal Lahir</div></label>
                         <input name="tgl_lahir_spouse" type="date" class="form-control" id="tgl_lahir_spouse" readonly value="<?php echo html_escape($cust[0] ->tanggal_lahir_spouse) ?>"/>
                      </div>
                     </div>
                 </div>
                 <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="bmd-label-floating"><div id="lblalamatKTPSpouse">Alamat (Sesuai KTP)</div></label>
                        <input name="alamat_ktp_spouse" type="text" class="form-control" id="alamat_ktp_spouse" readonly value="<?php echo html_escape($cust[0] ->alamat_ktp_spouse) ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating"><div id="lblkotaSpouse">Kabupaten / Kota</div></label>
                        <input name="kota_ktp_spouse" type="text" class="form-control" id="kota_ktp_spouse" readonly value="<?php echo html_escape($cust[0] ->kota_ktp_spouse) ?>">
                      </div>
                    </div>
                  </div>
                 <div class="row">
                   <div class="col-md-4">
                     <div class="form-group">
                       <label class="bmd-label-floating"><div id="lblHPSpouse">No HP</div></label>
                       <input name="hp_spouse" type="text" class="form-control" id="hp_spouse" readonly value="<?php echo html_escape($cust[0] -> hp_spouse) ?>">
                     </div>
                   </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"><div id="lblTlpSpouse">Nomor Telp</div></label>
                          <input name="telp_spouse" type="text" class="form-control" id="telp_spouse" readonly value="<?php echo html_escape($cust[0] ->telp_spouse) ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input name="email_spouse" type="email" class="form-control" readonly value="<?php echo html_escape($cust[0] -> email_spouse) ?>">
                        </div>
                      </div>
                    </div>
                 <div class="clearfix"></div>
             </div>
    </div>
  </div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-text card-header-sucess">
				<div class="card-text">
					<h4 class="card-title">Data Penjamin (Jika Ada)</h4>
				</div>
			</div>
			<div class="card-body">
								 <div class="row">
									 <div class="col-md-12">
										 <div class="form-group">
											 <label class="bmd-label-floating">Nama Lengkap</label>
											 <input name="nama_penjamin" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->nama_penjamin) ?>">
										 </div>
									 </div>
								 </div>
								 <div class="row">
									 <div class="col-md-6">
										 <div class="form-group">
											 <label class="bmd-label-floating">No KTP</label>
											 <input name="ktpPenjamin" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->ktp_penjamin) ?>">
										 </div>
									 </div>
									 <div class="col-md-6">
										<div class="form-group">
											<label class="bmd-label-floating">Kewarganegaraan</label>
													<input  name="ddlWargaNegaraPenjamin" class="form-control" readonly value="<?php echo html_escape($cust[0] ->warga_negara_penjamin) ?>">
										</div>
									</div>
								 </div>
								 <div class="row">
									 <div class="col-md-6">
										 <div class="form-group">
											 <label class="bmd-label-floating">Jenis Kelamin</label>
											 <input  name="ddlJenisKelPenjamin" class="form-control" readonly value="<?php echo html_escape($cust[0] ->gender_penjamin) ?>"/>
											 </select>
										 </div>
									 </div>
									 <div class="col-md-6">
										 <div class="form-group">
											 <label class="bmd-label-floating">Status Perkawinan</label>
											 <input type="text"  name="ddlStatusKawinPenjamin" class="form-control" id="ddlStatusKawinCust" readonly value="<?php echo html_escape($cust[0] ->marital_stat_penjamin) ?>">
										 </div>
									 </div>
								 </div>
								 <div class="row">
									 <div class="col-md-6">
										 <div class="form-group">
											 <label class="bmd-label-floating">Tempat Lahir</label>
											 <input name="tempat_lahir_penjamin" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->tempat_lahir_penjamin) ?>">
										 </div>
									 </div>
									 <div class="col-md-6">
										 <div class="form-group">
											 <label class="bmd-label-floating">Tanggal Lahir</label>
												 <input name="tgl_lahir_penjamin" type="date" class="form-control" readonly value="<?php echo html_escape($cust[0] ->tgl_lahir_penjamin) ?>"/>
											</div>
										 </div>
									 </div>
									 <div class="row">
										 <div class="col-md-8">
											 <div class="form-group">
												 <label class="bmd-label-floating">Alamat tinggal </label>
												 <input name="curr_addr_penjamin" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->curr_addr_penjamin)?>">
											 </div>
										 </div>
										 <div class="col-md-4">
											 <div class="form-group">
												 <label class="bmd-label-floating">Kota / Kabupaten</label>
												 <input name="curr_kota_penjamin" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->curr_kota_penjamin) ?>">
											 </div>
										 </div>
									 </div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="bmd-label-floating">Status tempat tinggal</label>
												<input type="text"  name="cur_addr_stat_penjamin" class="form-control" readonly value="<?php echo html_escape($cust[0] ->curr_addr_penjamin) ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="bmd-label-floating">Lama tinggal (tahun)</label>
												<input name="length_stay_penjamin" type="number" min=0  class="form-control" readonly value="<?php echo html_escape($cust[0] ->length_stay_penjamin) ?>">
											</div>
										</div>
									</div>

								 <div class="row">
									 <div class="col-md-4">
										 <div class="form-group">
											 <label class="bmd-label-floating">Nomor HP</label>
											 <input name="hp_penjamin" type="number" class="form-control" readonly value="<?php echo html_escape($cust[0] ->hp_penjamin) ?>">
										 </div>
									 </div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="bmd-label-floating">Nomor Telp</label>
													<input name="tlp_penjamin" type="number" class="form-control" readonly value="<?php echo html_escape($cust[0] ->tlp_penjamin) ?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="bmd-label-floating">Email</label>
													<input name="email_penjamin" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->email_penjamin) ?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="bmd-label-floating">Nama Pasangan</label>
													<input name="nama_spouse_penjamin" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->nama_spouse_penjamin) ?>">
												</div>
											</div>
										</div>
								 <div class="clearfix"></div>
			 </div>
		</div>
	</div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-text card-header-sucess">
        <div class="card-text">
          <h4 class="card-title">Data Pekerjaan & Pendapatan Nasabah</h4>
        </div>
      </div>
      <div class="card-body">
                 <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="bmd-label-floating">Jenis Pekejaan</label>
                       <input type="text"  name="ddlJenisKerjaCust" id="ddlJenisKerja" class="form-control" readonly value="<?php echo html_escape($cust[0] ->jenis_pekerjaan_cust) ?>"/>
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="bmd-label-floating">Status Pekerjaan</label>
                       <input type="text"  name="ddljobstat" class="form-control" readonly value="<?php echo html_escape($cust[0] ->status_karyawan_cust) ?>"/>
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label class="bmd-label-floating">Nama Perusahaan</label>
                       <input name="nama_perusahaan" type="text" class="form-control" readonly>
                     </div>
                   </div>
                 </div>
                 <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Penghasilan Pemohon Perbulan</label>
                          <input name="penghasilan_nasabah" type="number" min=0 class="form-control" readonly value="<?php echo html_escape($cust[0] ->penghasilan_cust) ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"><div id="lblIncomeSpouse">Penghasilan Pasangan</div></label>
                          <input name="penghasilan_pasangan" type="number" min=0 class="form-control" id="penghasilan_pasangan" readonly value="<?php echo html_escape($cust[0] ->penghasilan_spouse) ?>" />
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Penghasilan Tambahan</label>
                          <input name="penghasilan_tambahan" type="number" min=0 class="form-control" readonly value="<?php echo html_escape($cust[0] ->other_income_cust) ?>"/>
                        </div>
                      </div>
                    </div>
                 <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="bmd-label-floating">Jenis pekerjaan pasangan</label>
                       <input  name="ddlStatKerjaPasangan" class="form-control" readonly value="<?php echo html_escape($cust[0] ->jenis_pekerjaan_spouse) ?>"/>
                     </div>
									 </div>
                   <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Jumlah Tanggungan (termasuk pasangan)</label>
                          <input name="jumlah_tanggungan" type="number" min=0 class="form-control" readonly value="<?php echo html_escape($cust[0] ->jumlah_tanggungan) ?>">
                        </div>
                   </div>
								 </div>
                    <div class="row">
                         <div class="col-md-6">
                           <div class="form-group">
                             <label class="bmd-label-floating">Status Pekerjaan anak 1</label>
                             <input  name="ddlStatKerjaAnak1" class="form-control" readonly value="<?php echo html_escape($cust[0] ->pekerjaan_status_child1) ?>">
                           </div>
                         </div>
                         <div class="col-md-6">
                           <div class="form-group">
                             <label class="bmd-label-floating">Status Pekerjaan anak 2</label>
                             <input  name="ddlStatKerjaAnak2" class="form-control" readonly value="<?php echo html_escape($cust[0] ->pekerjaan_status_child2) ?>">
                           </div>
                         </div>
                    </div>
                    <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="bmd-label-floating">Status Pekerjaan anak 3</label>
                                <input  name="ddlStatKerjaAnak3" class="form-control" readonly value="<?php echo html_escape($cust[0] ->pekerjaan_status_child3) ?>">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="bmd-label-floating">Status Pekerjaan anak 4</label>
                                <input  name="ddlStatKerjaAnak4" class="form-control" readonly value="<?php echo html_escape($cust[0] ->pekerjaan_status_child4) ?>">
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
					<h4 class="card-title">Data Emergency Contact (Saudara Tidak Serumah)</h4>
				</div>
			</div>
			<div class="card-body">
								 <div class="row">
									 <div class="col-md-12">
										 <div class="form-group">
											 <label class="bmd-label-floating"><div id="">Nama Lengkap*</div></label>
											 <input name="nama_ec" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->nama_ec) ?>">
										 </div>
									 </div>
								 </div>
								 <div class="row">
									 <div class="col-md-12">
										 <div class="form-group">
											 <label class="bmd-label-floating"><div id="">Alamat Lengkap*</div></label>
											 <input name="alamat_ec" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->alamat_ec) ?>">
										 </div>
									 </div>
								 </div>
								 <div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="bmd-label-floating"><div>Hubungan*</div></label>
												<input  name="ddlrelationshipEC" class="form-control" readonly value="<?php echo html_escape($cust[0] ->relationship_ec) ?>"/>
											</div>
										</div>
									</div>
								 <div class="row">
									 <div class="col-md-4">
										 <div class="form-group">
											 <label class="bmd-label-floating"><div >No HP</div></label>
											 <input name="hp_ec" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->hp_ec) ?>">
										 </div>
									 </div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="bmd-label-floating"><div>Nomor Telp</div></label>
													<input name="telp_ec" type="text" class="form-control" readonly value="<?php echo html_escape($cust[0] ->telp_ec) ?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="bmd-label-floating">Email</label>
													<input name="email_ec" type="email" class="form-control" readonly value="<?php echo html_escape($cust[0] ->email_ec) ?>">
												</div>
											</div>
										</div>
								 <div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	</form>
  </div>
</div>
  <?php $this->load->view('template/footer')?>
  <?php $this->load->view('template/core')?>
</body>

</html>
