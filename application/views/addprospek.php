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
      <div class="card-header card-header-text card-header-sucess">
        <div class="card-text">
          <h4 class="card-title">Isi Data Konsumen</h4>
        </div>
      </div>
      <div class="card-body">
               <form action="<?php echo base_url().'prospect/saveData';?>" method="post" onsubmit="return(validateSubmit());">
								 <div class="row">
									 <div class="col-md-6">
										 <div class="form-group">
											 <label class="bmd-label-floating">Group MNC*</label>
											 <select  name="ddlstatgrup" class="form-control" required>
                        <option value="">Pilih Grup</option>
												 <option value="NONGROUP">Non MNC Group</option>
												 <option value="GROUP">MNC Group</option>
											 </select>
										 </div>
									 </div>
									 <div class="col-md-6">
										 <div class="form-group">
											 <label class="bmd-label-floating">Tenor*</label>
											 <select  name="ddltenor" class="form-control">
												 <option value="">Pilih Tenor</option>
												 <option value="12">1 Tahun</option>
												 <option value="24">2 Tahun</option>
												 <option value="36" >3 Tahun</option>
												 <option value="48">4 Tahun</option>
												 <option value="60">5 Tahun</option>
											 </select>
										 </div>
									 </div>
								 </div>
                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label class="bmd-label-floating">Nama Lengkap (tanpa singkatan dan Gelar)*</label>
                       <input name="nama_cust" type="text" class="form-control" required maxlength="50">
                     </div>
                   </div>
                 </div>
								 <div class="row">
									 <div class="col-md-6">
										 <div class="form-group">
											 <label class="bmd-label-floating">No KTP*</label>
											 <input name="ktpCust" id="ktpCust" onblur="validate('ktp')"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="16" type="text" class="form-control" required>
										 </div>
									 </div>
									 <div class="col-md-6">
										<div class="form-group">
											<label class="bmd-label-floating">NPWP</label>
											<input name="npwp_cust" type="text" class="form-control" maxlength="15" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
										</div>
									</div>
								 </div>
                 <div class="row">
				  <div class="col-md-4">
                     <div class="form-group">
                       <label class="bmd-label-floating">Status Perkawinan*</label>
                       <select  name="ddlStatusKawinCust" class="form-control" id="ddlStatusKawinCust" required>
                        <option value="">- Pilih -</option>
                         <option value="SINGLE">Lajang</option>
                         <option value="MENIKAH">Menikah</option>
                         <option value="CERAIH">Cerai Hidup</option>
												 <option value="CERAIM">Cerai Mati</option>
                       </select>
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="form-group">
                       <label class="bmd-label-floating">Pendidikan Terakhir*</label>
                       <select  name="ddlLastEdu" class="form-control" required>
                        <option value="">- Pilih -</option>
                         <option value="SD">SD</option>
                         <option value="SMP">SMA</option>
												 <option value="D3">Diploma</option>
												 <option value="S1">S1</option>
												 <option value="S2">S2</option>
												 <option value="S3">S3</option>
                       </select>
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="form-group">
                       <label class="bmd-label-floating">Jenis Kelamin*</label>
                       <select  name="ddlJenisKelCust" class="form-control" required>
                        <option value="">- Pilih -</option>
                         <option value="Pria">Pria</option>
                         <option value="Wanita">Wanita</option>
                       </select>
                     </div>
                   </div>
                 </div>
                 <div class="row">

                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="bmd-label-floating">Tempat Lahir*</label>
                       <input name="tempat_lahir_cust" type="text" class="form-control" required maxlength="50">
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="">Tanggal Lahir*</label>
                         <input name="tgl_lahir_cust" id="tgl_lahir_cust"  type="date" class="form-control" required/>
                      </div>
                     </div>
                   </div>
				       <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Alamat (Sesuai KTP)*</label>
                        <input name="alamat_ktp_cust" type="text" class="form-control" required maxlength="200">
                      </div>
                    </div>


					  <!--<input name="kota_ktp_cust" type="text" class="form-control" required maxlength="50">-->
										<?php $this->load->view('usercontrol/lookupzipcodecust.php') ?>

                  </div>
									 <div class="row">
										 <div class="col-md-8">
											 <div class="form-group">
												 <label class="bmd-label-floating">Alamat tinggal (saat ini)* </label>
												 <input name="curr_addr_cust" type="text" class="form-control" required maxlength="200">
											 </div>
										 </div>
										 <div class="col-md-2">
											 <div class="form-group">
												 <label class="bmd-label-floating">Kota / Kabupaten*</label>
												 <input name="curr_kota_cust" type="text" class="form-control" required maxlength="50">
											 </div>
										 </div>
										 <div class="col-md-2">
											<div class="form-group">
												<label class="bmd-label-floating">Lama tinggal (tahun)*</label>
												<input name="length_stay" type="number" min=0  class="form-control" required>
											</div>
										</div>
									 </div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="bmd-label-floating">Status tempat tinggal*</label>
												<select  name="cur_addr_stat_cust" class="form-control" required>
													<option value="">- Pilih -</option>
													<option value="OWN">Milik Sendiri</option>
													<option value="RENT">Sewa</option>
													<option value="KOS">Kost</option>
													<option value="FAM">Milik Orang Tua / Keluarga</option>
													<option value="OTHER">Lainnya</option>
												</select>
											</div>

										</div>

										<div class="col-md-0" hidden>
											<div class="form-group">
												<label class="bmd-label-floating">Jarak kantor MNCGUI terdekat (km)*</label>
												<input name="dist_nearest_branch" type="number" min=0 class="form-control">
											</div>
										</div>
									</div>

                 <div class="row">
									 <div class="col-md-4">
										 <div class="form-group">
											 <label class="bmd-label-floating">Nomor HP*</label>
											 <input name="hp_cust" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  required pattern="^[08][0-9]{9,20}"  title="format nomor handphone harus di awali dengan 08 dan minimal 9 karakter">
										 </div>
									 </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nomor Telp</label>
                          <input name="tlp_cust" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"  pattern="^[0][0-9]{9,20}"  title="format nomor telpon harus di awali dengan 0 dan minimal 9 karakter">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input name="email_cust" type="email" class="form-control">
                        </div>
                      </div>
                    </div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="bmd-label-floating">Nama Gadis Ibu Kandung*</label>
													<input name="mmn_cust" id="mmn_cust" onblur="validate('mmn')" type="text" class="form-control" required maxlength="50">
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="bmd-label-floating">Nama Ahli Waris*</label>
													<input name="ahliwaris_cust" id="ahliwaris_cust" type="text" class="form-control" required maxlength="50">
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="bmd-label-floating">Hubungan Ahlis Waris*</label>
													 <select  name="ddlhub_ahliwaris" class="form-control">
														 <option value="">- Pilih -</option>
														 <option value="ORTU">Orang Tua</option>
														 <option value="ADIK">Adik/Kakak</option>
														 <option value="ANAK" >Anak</option>
														 <option value="OTHER">Lainnya</option>
													 </select>
												</div>
											</div>
										</div>
										
                 <div class="clearfix"></div>
       </div>
    </div>
  </div>
  <div class="col-md-12" id="divPasangan">
    <div class="card">
      <div class="card-header card-header-text card-header-sucess">
        <div class="card-text">
          <h4 class="card-title">Isi Data Pasangan Calon Nasabah</h4>
        </div>
      </div>
      <div class="card-body">
                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label class="bmd-label-floating"><div id="lblNamaLengkapSpouse">Nama Lengkap</div></label>
                       <input name="nama_spouse" type="text" class="form-control" id="nama_spouse" maxlength="50">
                     </div>
                   </div>

                 </div>
				 <div class="row">
				  <div class="col-md-12">
                     <div class="form-group">
                       <label class="bmd-label-floating"><div id="lblKTPSpouse">No KTP Pasangan</div></label>
                       <input name="ktp_spouse" onblur="validate('ktp')" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" id="ktp_spouse" maxlength="16">
                     </div>
                   </div>
				 </div>
                 <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="bmd-label-floating"><div id="lbltmlSpouse">Tempat Lahir</div></label>
                       <input name="tempat_lahir_spouse" type="text" class="form-control" id="tempat_lahir_spouse" maxlength="50">
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class=""><div id="lbltlSpouse">Tanggal Lahir</div></label>
                         <input name="tgl_lahir_spouse" id = "tgl_lahir_spouse" type="date" class="form-control" id="tgl_lahir_spouse"/>
                      </div>
                     </div>
                 </div>
				 <div class="row">
				   <div class="col-md-12">
                     <div class="form-group">
                       <label class="bmd-label-floating"><div id="lblKTPWargaNegaraSp">Kewarganegaraan</div></label>
                       <select  name="ddlWargaNegaraSpouse" id="ddl_warga_spouse" class="form-control">
                        <option value="">- Pilih -</option>
                         <option value="WNI">WNI</option>
                         <option value="WNA">WNA</option>
                       </select>
                     </div>
                   </div>
				 </div>
                 <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="bmd-label-floating"><div id="lblalamatKTPSpouse">Alamat (Sesuai KTP)</div></label>
                        <input name="alamat_ktp_spouse" type="text" class="form-control" id="alamat_ktp_spouse" maxlength="200">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating"><div id="lblkotaSpouse">Kota / Kabupaten</div></label>
                        <input name="kota_ktp_spouse" type="text" class="form-control" id="kota_ktp_spouse" maxlength="50">
                      </div>
                    </div>
                  </div>
                 <div class="row">
                   <div class="col-md-4">
                     <div class="form-group">
                       <label class="bmd-label-floating"><div id="lblHPSpouse">No HP</div></label>
                       <input name="hp_spouse" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" id="hp_spouse" required pattern="^[08][0-9]{9,20}"  title="format nomor handphone harus di awali dengan 08 dan minimal 9 karakter">
                     </div>
                   </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"><div id="lblTlpSpouse">Nomor Telp</div></label>
                          <input name="telp_spouse" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" id="telp_spouse" pattern="^[0][0-9]{9,20}"  title="format nomor telpon harus di awali dengan 0 dan minimal 9 karakter" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input name="email_spouse" type="email" class="form-control">
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
					<h4 class="card-title">Isi Data Penjamin (Jika Ada)</h4>
				</div>
			</div>
			<div class="card-body">
								 <div class="row">
									 <div class="col-md-12">
										 <div class="form-group">
											 <label class="bmd-label-floating">Nama Lengkap</label>
											 <input name="nama_penjamin" type="text" class="form-control" maxlength="50">
										 </div>
									 </div>
								 </div>
								 <div class="row">
									 <div class="col-md-12">
										 <div class="form-group">
											 <label class="bmd-label-floating">No KTP</label>
											 <input name="ktpPenjamin" onkeypress="return event.charCode >= 48 && event.charCode <= 57"class="form-control" maxlength="16">
										 </div>
									 </div>

								 </div>
								 <div class="row">
								 		 <div class="col-md-4">
										<div class="form-group">
											<label class="bmd-label-floating">Kewarganegaraan</label>
													<select  name="ddlWargaNegaraPenjamin" class="form-control">
                            <option value="">- Pilih -</option>
														<option value="WNI">WNI</option>
														<option value="WNA">WNA</option>
													</select>
										</div>
									</div>
									 <div class="col-md-4">
										 <div class="form-group">
											 <label class="bmd-label-floating">Jenis Kelamin</label>
											 <select  name="ddlJenisKelPenjamin" class="form-control">
                        <option value="">- Pilih -</option>
												 <option value="Pria">Pria</option>
												 <option value="Wanita">Wanita</option>
											 </select>
										 </div>
									 </div>
									 <div class="col-md-4">
										 <div class="form-group">
											 <label class="bmd-label-floating">Status Perkawinan</label>
											 <select  name="ddlStatusKawinPenjamin" class="form-control" id="ddlStatusKawinCust">
                        <option value="">- Pilih -</option>
												 <option value="SINGLE">Lajang</option>
												 <option value="MENIKAH">Menikah</option>
												 <option value="CERAIH">Cerai Hidup</option>
												 <option value="CERAIM">Cerai Mati</option>
											 </select>
										 </div>
									 </div>
								 </div>
								 <div class="row">
									 <div class="col-md-8">
										 <div class="form-group">
											 <label class="bmd-label-floating">Tempat Lahir</label>
											 <input name="tempat_lahir_penjamin" type="text" class="form-control" maxlength="50">
										 </div>
									 </div>
									 <div class="col-md-4">
										 <div class="form-group">
											 <label class="">Tanggal Lahir</label>
												 <input name="tgl_lahir_penjamin" id = "tgl_lahir_penjamin" type="date" class="form-control"/>
											</div>
										 </div>
									 </div>
									 <div class="row">
										 <div class="col-md-8">
											 <div class="form-group">
												 <label class="bmd-label-floating">Alamat tinggal </label>
												 <input name="curr_addr_penjamin" type="text" class="form-control" maxlength="200">
											 </div>
										 </div>
										 <div class="col-md-2">
											 <div class="form-group">
												 <label class="bmd-label-floating">Kota / Kabupaten</label>
												 <input name="curr_kota_penjamin" type="text" class="form-control" maxlength="50">

											 </div>
										 </div>
										 	<div class="col-md-2">
											<div class="form-group">
												<label class="bmd-label-floating">Lama tinggal (tahun)</label>
												<input name="length_stay_penjamin" type="number" min=0  class="form-control">
											</div>
										</div>
									 </div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="bmd-label-floating">Status tempat tinggal</label>
												<select  name="cur_addr_stat_penjamin" class="form-control">
                          <option value="">- Pilih -</option>
													<option value="OWN">Milik Sendiri</option>
													<option value="RENT">Sewa</option>
													<option value="KOS">Kost</option>
													<option value="FAM">Milik Orang Tua / Keluarga</option>
													<option value="OTHER">Lainnya</option>
												</select>
											</div>
										</div>

									</div>

								 <div class="row">
									 <div class="col-md-4">
										 <div class="form-group">
											 <label class="bmd-label-floating">Nomor HP</label>
											 <input name="hp_penjamin" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"  pattern="^[08][0-9]{9,20}"  title="format nomor handphone harus di awali dengan 08 dan minimal 9 karakter">
										 </div>
									 </div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="bmd-label-floating">Nomor Telp</label>
													<input name="tlp_penjamin" onkeypress="return event.charCode >= 48 && event.charCode <= 57"class="form-control" pattern="^[0][0-9]{9,20}"  title="format nomor telpon harus di awali dengan 0 dan minimal 9 karakter">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="bmd-label-floating">Email</label>
													<input name="email_penjamin" type="email" class="form-control" maxlength="30">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="bmd-label-floating">Nama Pasangan</label>
													<input name="nama_spouse_penjamin" type="text" class="form-control" maxlength="50">
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
          <h4 class="card-title">Isi Data Pekerjaan & Pendapatan Nasabah</h4>
        </div>
      </div>
      <div class="card-body">
                 <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="bmd-label-floating">Jenis Pekejaan*</label>
                       <select  name="ddlJenisKerjaCust" id="ddlJenisKerja" class="form-control" required>
                        <option value="">- Pilih -</option>
                         <option value="KARYAWAN">Karyawan</option>
                         <option value="PROFESSIONAL">Professional</option>
                         <option value="WIRASWASTA">Wiraswasta</option>
                       </select>
                     </div>
                   </div>

                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="bmd-label-floating"><div id="labelstatKar">Status Pekerjaan</div></label>
                       <select  name="ddljobstat" id="ddljobstat" class="form-control">
                        <option value="">- Pilih -</option>
                         <option value="PERMANENT">Tetap</option>
                         <option value="KONTRAK">Kontrak</option>
                       </select>
                     </div>
                   </div>
                 </div>
                 <div class="row" id="prof">
                   <div class="col-md-6" >
                     <div class="form-group">
                       <label class="bmd-label-floating">Jenis Profesi (Profesional)</label>
                       <input name="jenis_profesi" type="text" class="form-control" maxlength="50">
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="bmd-label-floating">Pengalaman Bekerja (Tahun)</label>
                       <input name="pengalaman_kerja_prof" id="pengalaman_kerja_prof" type="number" onblur="validate('pengalamankerja')" class="form-control">
                     </div>
                   </div>
                 </div>
                 <div class="row" id="wir">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="bmd-label-floating">Jenis Bidang Usaha (Wiraswasta)</label>
                       <input name="bidang_usaha" type="text" class="form-control" maxlength="50">
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label class="bmd-label-floating">Pengalaman Bekerja (Tahun)</label>
                       <input name="pengalaman_kerja_wira" id= "pengalaman_kerja_wira" onblur="validate('pengalamankerja')" type="number" class="form-control">
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label class="bmd-label-floating">Nama Perusahaan</label>
                       <input name="nama_perusahaan" type="text" class="form-control" maxlength="50">
                     </div>
                   </div>
                 </div>
                 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Penghasilan Pemohon Perbulan*</label>
                          <input name="penghasilan_nasabah" type="number" min=0 class="form-control" required>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Penghasilan Tambahan</label>
                          <input name="penghasilan_tambahan" type="number" min=0 class="form-control">
                        </div>
                      </div>
                    </div>
				<div class="row" id="divPenghasilanPasangan">
				 <div class="col-md-12" >
                        <div class="form-group">
                          <label class="bmd-label-floating"><div id="lblIncomeSpouse">Penghasilan Pasangan</div></label>
                          <input name="penghasilan_pasangan" type="number" min=0 class="form-control" id="penghasilan_pasangan">
                        </div>
                      </div>
				</div>
                 <div class="row">
                   <div class="col-md-12" id="divJenisPekerjaanPasangan">
                     <div class="form-group">
                       <label class="bmd-label-floating">Jenis pekerjaan pasangan</label>
                       <select  name="ddlStatKerjaPasangan" class="form-control">
                        <option value="">- Pilih -</option>
                         <option value="KARYAWAN">Karyawan</option>
                         <option value="PROFESSIONAL">Professional</option>
                         <option value="WIRASWASTA">Wiraswasta</option>
                         <option value="IRT">IRT / Tidak Tentu</option>
                       </select>
                     </div>
					        </div>
							</div>
					 <div class="row">
					       <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Jumlah Tanggungan (termasuk pasangan)*</label>
                          <input name="jumlah_tanggungan" type="number" min=0 class="form-control" required>
                        </div>
                      </div>
					 </div>



                    <div class="row">
                         <div class="col-md-6">
                           <div class="form-group">
                             <label class="bmd-label-floating">Status Pekerjaan anak 1</label>
                             <select  name="ddlStatKerjaAnak1" class="form-control">
                               <option value="">-</option>
                               <option value="UNDERAGE">Anak dibawah 4 tahun</option>
                               <option value="TK">TK</option>
                               <option value="SD">SD</option>
                               <option value="SMP">SMP</option>
                               <option value="SMA">SMA</option>
                               <option value="KULIAH">Kuliah</option>
                               <option value="KARYAWAN">Bekerja</option>
                             </select>
                           </div>
                         </div>
                         <div class="col-md-6">
                           <div class="form-group">
                             <label class="bmd-label-floating">Status Pekerjaan anak 2</label>
                             <select  name="ddlStatKerjaAnak2" class="form-control">
                               <option value="">-</option>
                               <option value="UNDERAGE">Anak dibawah 4 tahun</option>
                               <option value="TK">TK</option>
                               <option value="SD">SD</option>
                               <option value="SMP">SMP</option>
                               <option value="SMA">SMA</option>
                               <option value="KULIAH">Kuliah</option>
                               <option value="KARYAWAN">Bekerja</option>
                             </select>
                           </div>
                         </div>
                       </div>
                       <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="bmd-label-floating">Status Pekerjaan anak 3</label>
                                <select  name="ddlStatKerjaAnak3" class="form-control">
                                  <option value="">-</option>
                                  <option value="UNDERAGE">Anak dibawah 4 tahun</option>
                                  <option value="TK">TK</option>
                                  <option value="SD">SD</option>
                                  <option value="SMP">SMP</option>
                                  <option value="SMA">SMA</option>
                                  <option value="KULIAH">Kuliah</option>
                                  <option value="KARYAWAN">Bekerja</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="bmd-label-floating">Status Pekerjaan anak 4</label>
                                <select  name="ddlStatKerjaAnak4" class="form-control">
                                  <option value="">-</option>
                                  <option value="UNDERAGE">Anak dibawah 4 tahun</option>
                                  <option value="TK">TK</option>
                                  <option value="SD">SD</option>
                                  <option value="SMP">SMP</option>
                                  <option value="SMA">SMA</option>
                                  <option value="KULIAH">Kuliah</option>
                                  <option value="KARYAWAN">Bekerja</option>
                                </select>
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
					<h4 class="card-title">Isi Data Emergency Contact (Saudara Tidak Serumah)</h4>
				</div>
			</div>
			<div class="card-body">
								 <div class="row">
									 <div class="col-md-12">
										 <div class="form-group">
											 <label class="bmd-label-floating"><div id="">Nama Lengkap*</div></label>
											 <input name="nama_ec" type="text" class="form-control" required maxlength="50">
										 </div>
									 </div>
								 </div>
								 
								 <div class="row">
									 <div class="col-md-12">
										 <div class="form-group">
											 <label class="bmd-label-floating"><div id="">Alamat Lengkap*</div></label>
											 <input name="alamat_ec" type="text" class="form-control" required maxlength="200">
										 </div>
									 </div>
								 </div>
								 
								 <div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="bmd-label-floating"><div>Hubungan*</div></label>
												<select  name="ddlrelationshipEC" class="form-control" required>
                          <option value="">- Pilih -</option>
													<option value="ADIK">Adik / Kakak</option>
													<option value="SEPUPU">Sepupu</option>
													<option value="ORTU">Orang Tua</option>
													<option value="OTHER">Lain - Lain</option>
												</select>
											</div>
										</div>
									</div>
								 <div class="row">
									 <div class="col-md-4">
										 <div class="form-group">
											 <label class="bmd-label-floating"><div >No HP*</div></label>
											 <input name="hp_ec" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" required maxlength="20"  pattern="^[08][0-9]{9,20}"  title="format nomor handphone harus di awali dengan 08 dan minimal 9 karakter">
										 </div>
									 </div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="bmd-label-floating"><div>Nomor Telp</div></label>
													<input name="telp_ec" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" pattern="^[0][0-9]{9,20}"  title="format nomor telpon harus di awali dengan 0 dan minimal 9 karakter">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="bmd-label-floating">Email</label>
													<input name="email_ec" type="email" class="form-control" maxlength="30">
												</div>
											</div>
										</div>
								 <div class="clearfix"></div>
						 </div>
		</div>
	</div>
	<div class="col-md-12">
	
	
	<a href="#" type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#crfmModal">Submit</a>
	<div id="crfmModal" name="crfmModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" id="btnCancelConfrm" name="btnCancelConfrm" data-dismiss="modal" class="close" >&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<p>
								Dengan ini saya menyatakan bahwa data dan informasi yang disampaikan secara tsb diatas adalah benar. 
								Apabila dikemudian hari diketahui bahwa informasi tidak benar, pihak MNC GUI berhak membatalkan permohonan pembiayaan calon nasabah.
							</p>
							
						</div>
					</div>
					<div class="col-md-12">
						<div align="right">
							<button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-primary pull-right">Accept</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	</form>
	</div>
</div>
</div>

  <?php $this->load->view('template/footer')?>
  <?php $this->load->view('template/core')?>
  <script>

	$('#ddlStatusKawinCust').on('change', function() {
  	if(this.value == "MENIKAH")
		{
			$("#divPasangan").show(400);
			$("#divPenghasilanPasangan").show(400);
			$("#divJenisPekerjaanPasangan").show(400);

			//set mandatory field spouse
			$('#nama_spouse').attr("required","");
			$('#ktp_spouse').attr("required","");
			$('#tempat_lahir_spouse').attr("required","");

			$('#tgl_lahir_spouse').attr("required","");
			$('#alamat_ktp_spouse').attr("required","");
			$('#kota_ktp_spouse').attr("required","");
			$('#tmpt_tinggal_ktp_stat_spouse').attr("required","");
			$('#penghasilan_pasangan').attr("required","");
      $('#ddl_warga_spouse').attr("required","");


			//ubah label menjadi mandatory
			$('#lblNamaLengkapSpouse').text("Nama Lengkap*");
			$('#lblKTPSpouse').text("No KTP Pasangan*");
			$('#lbltmlSpouse').text("Tempat Lahir*");
			$('#lbltlSpouse').text("Tanggal Lahir*");
			$('#lblalamatKTPSpouse').text("Alamat (Sesuai KTP)*");
			$('#lblkotaSpouse').text("Kota / Kabupaten*");
			$('#lblHPSpouse').text("No HP*");
			$('#lblIncomeSpouse').text("Penghasilan Pasangan*");
      $('#lblKTPWargaNegaraSp').text("Kewarganegaraan*");
		}
		else {
			 $("#divPasangan").hide(400);
			 $("#divPenghasilanPasangan").hide(400);
			 $("#divJenisPekerjaanPasangan").hide(400);
			//inputan di remove mandatory nya
			$('#nama_spouse').removeAttr("required","");
			$('#ktp_spouse').removeAttr("required","");

			$('#tempat_lahir_spouse').removeAttr("required","");
			$('#tgl_lahir_spouse').removeAttr("required","");
			$('#alamat_ktp_spouse').removeAttr("required","");
			$('#kota_ktp_spouse').removeAttr("required","");
			$('#hp_spouse').removeAttr("required","");
			$('#penghasilan_pasangan').removeAttr("required","");
      $('#lblKTPWargaNegaraSp').removeAttr("required","");
		 $('#ddl_warga_spouse').removeAttr("required","");

			$('#lblNamaLengkapSpouse').text("Nama Lengkap");
			$('#lblKTPSpouse').text("No KTP Pasangan");
			$('#lbltmlSpouse').text("Tempat Lahir");
			$('#lbltlSpouse').text("Tanggal Lahir");
			$('#lblalamatKTPSpouse').text("Alamat (Sesuai KTP)");
			$('#lblkotaSpouse').text("Kota / Kabupaten");
			$('#lblHPSpouse').text("No HP");
			$('#lblIncomeSpouse').text("Penghasilan Pasangan");
			$('#lblKTPWargaNegaraSp').text("Kewarganegaraan");
		}
});

  $( document ).ready(function() {
    changeCss('prospect');
	 $("#divPasangan").hide();
    $("#prof").hide();
    $("#wir").hide();
	$("#divPenghasilanPasangan").hide();
	$("#divJenisPekerjaanPasangan").hide();
        $("#ddlJenisKerja").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue == "PROFESSIONAL"){
                    $("#prof").show(400);
                    $("#wir").hide(400);
                    $('#labelstatKar').text("Status Karyawan");
					$('#pengalaman_kerja_wira').val("");
                    $('#ddljobstat').removeAttr("required","");
                } else if(optionValue == "WIRASWASTA"){
                  $("#prof").hide(400);
                  $("#wir").show(400);
                  $('#labelstatKar').text("Status Karyawan");
				  $('#pengalaman_kerja_prof').val("");
                  $('#ddljobstat').removeAttr("required","");
                }
                else if(optionValue == "KARYAWAN")
                {
                  $('#labelstatKar').text("Status Karyawan*");
                  $('#ddljobstat').attr("required","");
                  $("#prof").hide(400);
                  $("#wir").hide(400);
                }
            });
        }).change();


});

var today = new Date();
var dd = '31'
var mm = '12'
var yyyy = today.getFullYear() - 12;

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("tgl_lahir_penjamin").setAttribute("max", today);
document.getElementById("tgl_lahir_spouse").setAttribute("max", today);
document.getElementById("tgl_lahir_cust").setAttribute("max", today);


function validate(type)
{
	if(type=="mmn")
	{	var validator = ['mama','mami','ibu','mom','mother'];
		var input_mmn = document.getElementById("mmn_cust");
		 var input = document.getElementById("mmn_cust").value;

		 if(validator.indexOf(input) >=0 )
		 {
			input_mmn.setCustomValidity("Input dengan nama yang benar");

		 }
		 else
		 {
			 input_mmn.setCustomValidity("");
		 }

	}

	else if(type=="ktp")
	{
		var ktpcust = document.getElementById("ktpCust");
		var ktpspouse = document.getElementById("ktp_spouse");

		if(ktpcust.value == ktpspouse.value)
		{
			ktpcust.setCustomValidity("KTP Customer dan KTP Pasangan tidak boleh sama");
		}
		else
		{
			ktpcust.setCustomValidity("");
		}

	}
	else if(type=="pengalamankerja")
	{
		var today = new Date();
		var tgllahir =  document.getElementById("tgl_lahir_cust");

		var pengalaman_kerja_prof = document.getElementById("pengalaman_kerja_prof");
		var pengalaman_kerja_wira = document.getElementById("pengalaman_kerja_wira");
		var age =  today.getFullYear() - tgllahir.value.substring(0,4);
		if(pengalaman_kerja_prof.value != "" && pengalaman_kerja_prof.value > age)
		{
			pengalaman_kerja_prof.setCustomValidity("Pengalaman kerja tidak boleh lebih besar dari umur");
		}
		else if(pengalaman_kerja_wira.value != "" && pengalaman_kerja_wira.value > age)
		{
			pengalaman_kerja_wira.setCustomValidity("Pengalaman kerja tidak boleh lebih besar dari umur");
		}
		else
		{
			pengalaman_kerja_prof.setCustomValidity("");
			pengalaman_kerja_wira.setCustomValidity("");
		}

	}
}

var page = "1";

function pagingzipcode()
{
	var settings = {
	  url: "prospect/lookupzipcode",
	  method: "POST",
	  data: {"kelurahan":$("#searchKelurahan").val(),"kecamatan":$("#searchKecamatan").val(),"kota":$("#searchKota").val(),"zipcode":$("#searchKodePos").val(),"page":page},
	};

	$.ajax(settings).done(function (response) {

		$("#result").html(response);

	});

}

function NextPaging()
{
	if($('#result').has("link"))
	{
	page = page + 1;
	pagingzipcode();
}
}

function PreviousPaging() {
	if(page > 1)
	{
	page = page - 1;
	pagingzipcode();
	}

}

$('#searchZipcode').on("click", function(){
	page=1;
pagingzipcode();

});

 function setZipcodeValue(kelurahan,kecamatan,kota,zipcode)
{
	$('#kelurahan').val(kelurahan);
	$('#kecamatan').val(kecamatan);
	$('#kota').val(kota);
	$('#zipcode').val(zipcode);
}

function clicklookup()
{
	$('#lookupbtn').focus();
	$('#lookupbtn').click();

}



  </script>
</body>

</html>
