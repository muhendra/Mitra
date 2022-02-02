<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Prospect extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
	        {
	                parent::__construct();
	               if(!isset($_SESSION['session_id']))
								 {
									 	redirect(base_url().'home');
								 };
	        }



	public function index()
	{
		$this->load->view('addprospek');
	}

	public function addprospekdoc()
	{
		$this->load->view('addprospekdoc');

	}

	public function viewprospek($id)
	{
		$this->load->library('encryption');
		$this->load->model('prospects_model');
		$where = array('cust_prospect_id' => $this->encryption->decrypt(decode ($id)));
		$res = $this->prospects_model->GetProspect($where);
		$hsl = Array('cust' => $res);


		$this->load->view('viewprospek',$hsl);

	}
	public function prosinquiry()
	{
			$this->load->view('prospect_inquiry');

	}
	public function viewprospectdoc($id)
	{
			$this->load->library('encryption');
			$this->load->model('prospects_model');
			$id_decode = $this->encryption->decrypt(decode ($id));
			$where = array('cust_prospect_id' => $id_decode );
			$res = $this->prospects_model->GetProspect($where);
			$doc = $this->prospects_model->GetProspectDoc($id_decode);
			$result= array(
			'id'        => $id,
			'nama_cust' => $res[0]->nama_cust,
			'ktp_cust'  => $res[0]->ktp_cust,
			'fpp_no'    => $res[0]->fpp_no,
			'doc'       => $doc);
			$this->load->view('popup_prosdoc',$result);
	}

	public function getInquiryData()
	{
		$this->load->model('prospects_model');

		$namacust 						= $this->input->post('nama_cust',true);
		$ktp_cust 						= $this->input->post('ktpCust',true);
		$tanggal_lahir_cust		= $this->input->post('tgl_lahir_cust');
		$alamat_ktp_cust			= $this->input->post('alamat_ktp_cust',true);
		$fpp_no								= $this->input->post('fpp_no',true);

		if($namacust == '' && $ktp_cust == '' && $tanggal_lahir_cust == '' && $alamat_ktp_cust == '' &&  $fpp_no == '')
		{
			$this->session->set_flashdata('notification_msg','Masukan minimal 1 kriteria pencarian' );
			$this->session->set_flashdata('notification_type', 'danger');
			$this->session->set_flashdata('notification_flag', '1');
			$this->load->view('prospect_inquiry');
		}
		else if($namacust != '' && strlen($this->input->post('nama_cust')) < 3)
		{
			$this->session->set_flashdata('notification_msg','kriteria pencarian nama nasabah minimal 3 karakter' );
			$this->session->set_flashdata('notification_type', 'danger');
			$this->session->set_flashdata('notification_flag', '1');
			$this->load->view('prospect_inquiry');
		}
		else if($ktp_cust != '' && strlen($this->input->post('ktpCust')) < 3)
		{
			$this->session->set_flashdata('notification_msg','kriteria pencarian no ktp minimal 3 karakter' );
			$this->session->set_flashdata('notification_type', 'danger');
			$this->session->set_flashdata('notification_flag', '1');
			$this->load->view('prospect_inquiry');
		}
		else if($alamat_ktp_cust != '' && strlen($this->input->post('alamat_ktp_cust')) < 3)
		{
			$this->session->set_flashdata('notification_msg','kriteria pencarian alamat minimal 3 karakter' );
			$this->session->set_flashdata('notification_type', 'danger');
			$this->session->set_flashdata('notification_flag', '1');
			$this->load->view('prospect_inquiry');
		}
		else if($fpp_no != '' && strlen($this->input->post('fpp_no')) < 3)
		{
			$this->session->set_flashdata('notification_msg','kriteria pencarian fpp minimal 3 karakter' );
			$this->session->set_flashdata('notification_type', 'danger');
			$this->session->set_flashdata('notification_flag', '1');
			$this->load->view('prospect_inquiry');
		}

		else {

		$where = array(
										'nama_cust'  					=> $namacust ,
										'ktp_cust'   					=> $ktp_cust ,
										'tanggal_lahir_cust'  => $tanggal_lahir_cust ,
										'alamat_ktp_cust' 		=> $alamat_ktp_cust ,
										'fpp_no'							=> $fpp_no

		);
		$result['data'] = $this->prospects_model->SearchProspect($where);
		$this->load->library('encryption');
		$plain_text = 'This is a plain-text message!';
		foreach ($result['data'] as $val)
		{
			$val->cust_prospect_id = encode ( $this->encryption->encrypt($val->cust_prospect_id));
		}


		$this->load->view('prospect_inquiry',$result);
	}


	}

	public function ViewDashBoard($status)
	{
		if(in_array($status, array("NEW","ON%20PROGRESS","APPROVE","REJECT")))
		{
			$this->load->library('encryption');
			$stat = str_replace('%20', ' ', $status);
			$this->load->model('prospects_model');

			$where = array(
											'status_aplikasi'  		=> $stat,
											'mitra_id'			    => $_SESSION['userinfo']->mcode

			);
			$result['data'] = $this->prospects_model->SearchProspect($where);
			foreach ($result['data'] as $val)
		{
			$val->cust_prospect_id = encode ( $this->encryption->encrypt($val->cust_prospect_id));
		}
			$this->load->view('view_dashboard',$result);
		}
		else
		{
			die("Invalid Request");

		}
	}

	public function saveData()
	{

		$this->load->model('prospects_model');

		$data = array(
		'fpp_no'												 => $this->prospects_model->generateFPP(),
		'nama_cust'				  						 => $this->input->post('nama_cust',true),
		'tenor'													 => $this->input->post('ddltenor',true),
		'ktp_cust' 				 							 => $this->input->post('ktpCust',true),
		'npwp_cust'											 => $this->input->post('npwp_cust',true),
		'gender_cust' 									 => $this->input->post('ddlJenisKelCust',true),
		'education_cust'								 => $this->input->post('ddlLastEdu',true),
		'marital_stat_cust' 						 => $this->input->post('ddlStatusKawinCust',true),
		'tempat_lahir_cust' 						 => $this->input->post('tempat_lahir_cust',true),
		'tanggal_lahir_cust' 						 => $this->input->post('tgl_lahir_cust',true),
		'alamat_ktp_cust' 							 => $this->input->post('alamat_ktp_cust',true),
		'kota_ktp_cust' 								 => $this->input->post('kota_ktp_cust',true),
		'kelurahan_ktp_cust' 						 => $this->input->post('kelurahan_ktp_cust',true),
		'kecamatan_ktp_cust' 						 => $this->input->post('kecamatan_ktp_cust',true),
		'zipcode_ktp_cust' 							 => $this->input->post('zipcode_ktp_cust',true),
		'no_telp_cust' 									 => $this->input->post('tlp_cust',true),
		'hp_cust'											   => $this->input->post('hp_cust',true),
		'email_cust' 										 => $this->input->post('email_cust',true),
		'mmn_cust'											 => $this->input->post('mmn_cust',true),
		'nama_spouse' 									 => $this->input->post('nama_spouse',true),
		'ktp_spouse' 										 => $this->input->post('ktp_spouse',true),
		'warga_negara_spouse' 				 	 => $this->input->post('ddlWargaNegaraSpouse',true),
		'tempat_lahir_spouse' 					 => $this->input->post('tempat_lahir_spouse',true),
		'tanggal_lahir_spouse' 					 => $this->input->post('tgl_lahir_spouse',true),
		'alamat_ktp_spouse' 					   => $this->input->post('alamat_ktp_spouse',true),
		'kota_ktp_spouse' 							 => $this->input->post('kota_ktp_spouse',true),
		'hp_spouse'											 => $this->input->post('hp_spouse',true),
		'telp_spouse'										 => $this->input->post('telp_spouse',true),
		'email_spouse' 									 => $this->input->post('email_spouse',true),
		'nama_penjamin'									 => $this->input->post('nama_penjamin',true),
		'ktp_penjamin'									 => $this->input->post('ktpPenjamin',true),
		'warga_negara_penjamin'					 => $this->input->post('ddlWargaNegaraPenjamin',true),
		'gender_penjamin'					 			 => $this->input->post('ddlJenisKelPenjamin',true),
		'marital_stat_penjamin'					 => $this->input->post('ddlStatusKawinPenjamin',true),
		'tempat_lahir_penjamin'					 => $this->input->post('tempat_lahir_penjamin',true),
		'tgl_lahir_penjamin'					 	 => $this->input->post('tgl_lahir_penjamin',true),
		'curr_addr_penjamin'					 	 => $this->input->post('curr_addr_penjamin',true),
		'curr_kota_penjamin'						 => $this->input->post('curr_kota_penjamin',true),
		'cur_addr_stat_penjamin'				 => $this->input->post('cur_addr_stat_penjamin',true),
		'length_stay_penjamin'					 => $this->input->post('length_stay_penjamin',true),
		'hp_penjamin'										 => $this->input->post('hp_penjamin',true),
		'tlp_penjamin'									 => $this->input->post('tlp_penjamin',true),
		'email_penjamin'								 => $this->input->post('email_penjamin',true),
		'nama_spouse_penjamin'					 =>	$this->input->post('nama_spouse_penjamin',true),
		'nama_ec'												 =>	$this->input->post('nama_ec',true),
		'relationship_ec'							   =>	$this->input->post('ddlrelationshipEC',true),
		'hp_ec'							   					 =>	$this->input->post('hp_ec',true),
		'telp_ec'							   				 =>	$this->input->post('telp_ec',true),
		'email_ec'											 => $this->input->post('email_ec',true),
		'alamat_tinggal_cust' 					 => $this->input->post('curr_addr_cust',true),
		'kota_tinggal_cust' 						 => $this->input->post('curr_kota_cust',true),
		'status_tinggal_cust' 					 => $this->input->post('cur_addr_stat_cust',true),
		'lama_tinggal_cust' 						 => $this->input->post('length_stay',true),
		'jarak_kantor_cust'				  	   => $this->input->post('dist_nearest_branch',true),
		'jenis_pekerjaan_cust' 					 => $this->input->post('ddlJenisKerjaCust',true),
		'group_mnc_cust' 								 => $this->input->post('ddlstatgrup',true),
		'status_karyawan_cust' 				   => $this->input->post('ddljobstat',true),
		'jenis_profesi' 								 => $this->input->post('jenis_profesi',true),
		'pengalaman_kerja' 				 			 => $this->input->post('jenis_profesi',true) == 'PROFESSIONAL'?   $this->input->post('pengalaman_kerja_prof') :$this->input->post('pengalaman_kerja_wira',true) ,
		'bidang_usaha' 									 => $this->input->post('bidang_usaha',true),
		'nama_perusahaan_cust' 					 => $this->input->post('nama_perusahaan',true),
		'penghasilan_cust' 							 => $this->input->post('penghasilan_nasabah',true),
		'penghasilan_spouse' 						 => $this->input->post('penghasilan_pasangan',true),
		'other_income_cust'							 => $this->input->post('penghasilan_tambahan',true),
		'jenis_pekerjaan_spouse' 				 => $this->input->post('ddlStatKerjaPasangan',true),
		'jumlah_tanggungan' 						 => $this->input->post('jumlah_tanggungan',true),
		'pekerjaan_status_child1' 			 => $this->input->post('ddlStatKerjaAnak1',true),
		'pekerjaan_status_child2'				 => $this->input->post('ddlStatKerjaAnak2',true),
		'pekerjaan_status_child3'				 => $this->input->post('ddlStatKerjaAnak3',true),
		'pekerjaan_status_child4' 			 => $this->input->post('ddlStatKerjaAnak4',true),
		'cre_by' 												 => 'SYSTEM',
		'cre_dt' 												 => date('Y/m/d h:i:s a', time()),
		'upd_by' 												 => 'SYSEM',
		'upd_dt'												 => date('Y/m/d h:i:s a', time()),
		'status_aplikasi'								 => 'NEW',
		'mitra_id'											 => $_SESSION['userinfo'] -> mcode,
		'nama_mitra'										=> $_SESSION['userinfo']->nama,
		'ahliwaris_cust' 			 => $this->input->post('ahliwaris_cust',true),
		'hub_ahliwaris' 			 => $this->input->post('ddlhub_ahliwaris',true),
		'alamat_ec' 			 => $this->input->post('alamat_ec',true)
	);
	$id =	$this->prospects_model->AddProspect($data);
		$result= array('id' => $id,
		'nama_cust' => $data['nama_cust'],
		'ktp_cust' => $data['ktp_cust'],
		'fpp_no' =>   $data['fpp_no']
	);
	$_SESSION['datapros'] = $result;
		redirect(base_url().'prospect/addprospekdoc');

	}



public function uploadinq()
{
	$this->load->library('encryption');
	$fpp = $this->input->post('fpp_no',true);
	$writepath = upload_path_linux;
	$uploadpath = upload_path.$fpp;


	$config['upload_path']          = $writepath;
	$config['allowed_types']        = 'gif|jpg|png|pdf|jpeg';
	$config['file_name'] 						=$this->input->post('filename',true).'_'.str_replace('/','',$fpp);
	 $config['overwrite'] 					= TRUE;
	$this->load->library('upload', $config);
	 if ( ! $this->upload->do_upload('file'))
					{
									$error = array('error' => $this->upload->display_errors());
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$this->load->library('ftp');
						$ftp_config['hostname'] = '172.31.215.10';
						$ftp_config['port']		= '3001';
						$ftp_config['username'] = 'mcustomer';
						$ftp_config['password'] = 'Mncl@2020';
						$ftp_config['debug']    = TRUE;

						$this->ftp->connect($ftp_config);

						$foldercheck =  $this->ftp->list_files($fpp);
						if(!$foldercheck)
						{
						$this->ftp->mkdir($fpp);
						}

						$check = $this->ftp->list_files($fpp.'/'.$data['upload_data']['file_name']);
						if($check)
						{

							$this->ftp->delete_file($fpp.'/'.$data['upload_data']['file_name']);
						}



						$res = $this->ftp->upload($config['upload_path'].$config['file_name'].$data['upload_data']['file_ext'], $fpp.'/'.$data['upload_data']['file_name']);
						$this->ftp->close();

						$this->load->model('prospects_model');

						$handshake =  array('session_id' =>   $this->input->post('session_id',true),'mitra_id' => $this->input->post('mitra_id',true),'is_active'=>'1' );
						$param = array(
															'cust_prospect_id' => $this->encryption->decrypt(decode ($this->input->post('cust_prospect_id',true))) ,
															'file_size_kb'		 =>	$data['upload_data']['file_size'],
															'file_name'		     =>	$data['upload_data']['file_name'],
															'file_type'		     =>	$this->input->post('filename',true),
															'file_ext'				 => $data['upload_data']['file_ext'],
															'file_path'				 => $uploadpath.'/'.$this->input->post('filename',true).'_'.str_replace('/','',$fpp).$data['upload_data']['file_ext'],
															'doc_stat'				 => 'NEW',
															'cre_by'				   => $_SESSION['userinfo']->mcode,
															'upd_by'				   => $_SESSION['userinfo']->mcode,
															'cre_dt'				   => date('Y/m/d h:i:s a', time()),
															'upd_dt'				   => date('Y/m/d h:i:s a', time()),

											);
					$this->prospects_model->AddEditDocProspectSingle($param,$handshake);
					@unlink($writepath.$data['upload_data']['file_name']);

					}
}

	public function upload()
	{
		$this->load->model('prospects_model');
		$this->load->helper('path');
		$this->load->library('ftp');
		$ftp_config['hostname'] = '172.31.215.10';
		$ftp_config['port']		= '3001';
		$ftp_config['username'] = 'mcustomer';
		$ftp_config['password'] = 'Mncl@2020';
		$ftp_config['debug']    = TRUE;
		$this->ftp->connect($ftp_config);


		$fpp 		= $this->input->post('fppNo',true);
		$foldercheck =  $this->ftp->list_files($fpp);
						if(!$foldercheck)
						{
						$this->ftp->mkdir($fpp);
						}

		$uploadpath = upload_path.$fpp;
		$writepath = upload_path_linux;

		$config['upload_path']          = $writepath;
		$config['allowed_types']        = 'gif|jpg|png|pdf|jpeg';
		$config['file_name'] 						='KTP_'.str_replace('/','',$fpp);
		 $config['overwrite'] 					= TRUE;
	 	$this->load->library('upload', $config);

		 if ( ! $this->upload->do_upload('fileKTP'))
						{
										$error = array('error' => $this->upload->display_errors());
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							 $res = $this->ftp->upload($config['upload_path'].$config['file_name'].$data['upload_data']['file_ext'], $fpp.'/'.$data['upload_data']['file_name']);

										$param = array(
														'cust_prospect_id' => $this->input->post('cust_prospect_id'),
														'file_size_kb'		 =>	$data['upload_data']['file_size'],
														'file_name'		     =>	$data['upload_data']['file_name'],
														'file_type'		     =>	'KTP',
														'file_ext'				 => $data['upload_data']['file_ext'],
														'file_path'				 => $uploadpath.'/'.$data['upload_data']['file_name'],
														'doc_stat'				 => 'NEW',
														'cre_by'				   => $_SESSION['userinfo']->mcode,
														'upd_by'				   => $_SESSION['userinfo']->mcode,
														'cre_dt'				   => date('Y/m/d h:i:s a', time()),
														'upd_by'				   => date('Y/m/d h:i:s a', time()),

										);

										$this->prospects_model->AddDocProspect($param);
										@unlink($writepath.$data['upload_data']['file_name']);
						}

		$config['file_name']	= 'KTPSP_'.str_replace('/','',$fpp);
		$this->upload->initialize($config);


		if ( ! $this->upload->do_upload('fileKTPSP'))
					 {
									 $error = array('error' => $this->upload->display_errors());
					 }
					 else
					 {
						 $data = array('upload_data' => $this->upload->data());
						  $res = $this->ftp->upload($config['upload_path'].$config['file_name'].$data['upload_data']['file_ext'], $fpp.'/'.$data['upload_data']['file_name']);

									 $param = array(
													 'cust_prospect_id' => $this->input->post('cust_prospect_id',true),
													 'file_size_kb'		 =>	$data['upload_data']['file_size'],
													 'file_name'		     =>	$data['upload_data']['file_name'],
													 'file_type'		     =>	'KTPSP',
													 'file_ext'				 => $data['upload_data']['file_ext'],
													 'file_path'			 => $uploadpath.'/'.$data['upload_data']['file_name'],
													 'doc_stat'				 => 'NEW',
													 'cre_by'				   => $_SESSION['userinfo']->mcode,
													 'upd_by'				   => $_SESSION['userinfo']->mcode,
													 'cre_dt'				   => date('Y/m/d h:i:s a', time()),
													 'upd_by'				   => date('Y/m/d h:i:s a', time()),

									 );

									 $this->prospects_model->AddDocProspect($param);
									 @unlink($writepath.$data['upload_data']['file_name']);
					 }
	$config['file_name']	= 'BUKUNIKAH_'.str_replace('/','',$fpp);
	$this->upload->initialize($config);


	if ( ! $this->upload->do_upload('fileBN'))
				 {
								 $error = array('error' => $this->upload->display_errors());
				 }
				 else
				 {
					 $data = array('upload_data' => $this->upload->data());
					  $res = $this->ftp->upload($config['upload_path'].$config['file_name'].$data['upload_data']['file_ext'], $fpp.'/'.$data['upload_data']['file_name']);

								 $param = array(
												 'cust_prospect_id' => $this->input->post('cust_prospect_id',true),
												 'file_size_kb'		 =>	$data['upload_data']['file_size'],
												 'file_name'		     =>	$data['upload_data']['file_name'],
												 'file_type'		     =>	'BUKUNIKAH',
												 'file_ext'				 => $data['upload_data']['file_ext'],
												 'file_path'				 => $uploadpath.'/'.$data['upload_data']['file_name'],
												 'doc_stat'				 => 'NEW',
												 'cre_by'				   => $_SESSION['userinfo']->mcode,
												 'upd_by'				   => $_SESSION['userinfo']->mcode,
												 'cre_dt'				   => date('Y/m/d h:i:s a', time()),
												 'upd_by'				   => date('Y/m/d h:i:s a', time()),

								 );

								 $this->prospects_model->AddDocProspect($param);
								 @unlink($writepath.$data['upload_data']['file_name']);
				 }
$config['file_name']	= 'KK_'.str_replace('/','',$fpp);
$this->upload->initialize($config);


if ( ! $this->upload->do_upload('fileKK'))
			 {
							 $error = array('error' => $this->upload->display_errors());
			 }
			 else
			 {
				  $data = array('upload_data' => $this->upload->data());
				  $res = $this->ftp->upload($config['upload_path'].$config['file_name'].$data['upload_data']['file_ext'], $fpp.'/'.$data['upload_data']['file_name']);

							 $param = array(
											 'cust_prospect_id' => $this->input->post('cust_prospect_id',true),
											 'file_size_kb'		 =>	$data['upload_data']['file_size'],
											 'file_name'		     =>	$data['upload_data']['file_name'],
											 'file_type'		     =>	'KK',
											 'file_ext'				 => $data['upload_data']['file_ext'],
											 'file_path'			 => $uploadpath.'/'.$data['upload_data']['file_name'],
											 'doc_stat'				 => 'NEW',
											 'cre_by'				   => $_SESSION['userinfo']->mcode,
											 'upd_by'				   => $_SESSION['userinfo']->mcode,
											 'cre_dt'				   => date('Y/m/d h:i:s a', time()),
											 'upd_by'				   => date('Y/m/d h:i:s a', time()),

							 );

							 $this->prospects_model->AddDocProspect($param);
							 @unlink($writepath.$data['upload_data']['file_name']);
			 }
$config['file_name']	= 'NPWP_'.str_replace('/','',$fpp);
$this->upload->initialize($config);


if ( ! $this->upload->do_upload('fileNPWP'))
			 {
							 $error = array('error' => $this->upload->display_errors());
			 }
			 else
			 {
				  $data = array('upload_data' => $this->upload->data());
				  $res = $this->ftp->upload($config['upload_path'].$config['file_name'].$data['upload_data']['file_ext'], $fpp.'/'.$data['upload_data']['file_name']);

							 $param = array(
											 'cust_prospect_id' => $this->input->post('cust_prospect_id',true),
											 'file_size_kb'		 =>	$data['upload_data']['file_size'],
											 'file_name'		     =>	$data['upload_data']['file_name'],
											 'file_type'		     =>	'NPWP',
											 'file_ext'				 => $data['upload_data']['file_ext'],
											 'file_path'			 => $uploadpath.'/'.$data['upload_data']['file_name'],
											 'doc_stat'				 => 'NEW',
											 'cre_by'				   => $_SESSION['userinfo']->mcode,
											 'upd_by'				   => $_SESSION['userinfo']->mcode,
											 'cre_dt'				   => date('Y/m/d h:i:s a', time()),
											 'upd_by'				   => date('Y/m/d h:i:s a', time()),

							 );

							 $this->prospects_model->AddDocProspect($param);
							 @unlink($writepath.$data['upload_data']['file_name']);
			 }
$config['file_name']	= 'SLIPGAJI_'.str_replace('/','',$fpp);
$this->upload->initialize($config);


if ( ! $this->upload->do_upload('fileSG'))
			 {
							 $error = array('error' => $this->upload->display_errors());
			 }
			 else
			 {
				 $data = array('upload_data' => $this->upload->data());
				  $res = $this->ftp->upload($config['upload_path'].$config['file_name'].$data['upload_data']['file_ext'], $fpp.'/'.$data['upload_data']['file_name']);

							 $param = array(
											 'cust_prospect_id' => $this->input->post('cust_prospect_id',true),
											 'file_size_kb'		 =>	$data['upload_data']['file_size'],
											 'file_name'		     =>	$data['upload_data']['file_name'],
											 'file_type'		     =>	'SLIPGAJI',
											 'file_ext'				 => $data['upload_data']['file_ext'],
											 'file_path'			 => $uploadpath.'/'.$data['upload_data']['file_name'],
											 'doc_stat'				 => 'NEW',
											 'cre_by'				 => $_SESSION['userinfo']->mcode,
											 'upd_by'				 => $_SESSION['userinfo']->mcode,
											 'cre_dt'				 => date('Y/m/d h:i:s a', time()),
											 'upd_by'				 => date('Y/m/d h:i:s a', time()),

							 );

							 $this->prospects_model->AddDocProspect($param);
							 @unlink($writepath.$data['upload_data']['file_name']);
			 }
$config['file_name']	= 'REKKORAN_'.str_replace('/','',$fpp);
$this->upload->initialize($config);


if ( ! $this->upload->do_upload('fileRK'))
			 {
							 $error = array('error' => $this->upload->display_errors());
			 }
			 else
			 {
				 $data = array('upload_data' => $this->upload->data());
				  $res = $this->ftp->upload($config['upload_path'].$config['file_name'].$data['upload_data']['file_ext'], $fpp.'/'.$data['upload_data']['file_name']);

							 $param = array(
											 'cust_prospect_id' => $this->input->post('cust_prospect_id',true),
											 'file_size_kb'		 =>	$data['upload_data']['file_size'],
											 'file_name'		     =>	$data['upload_data']['file_name'],
											 'file_type'		     =>	'REKKORAN',
											 'file_ext'				 => $data['upload_data']['file_ext'],
											 'file_path'			 => $uploadpath.'/'.$data['upload_data']['file_name'],
											 'doc_stat'				 => 'NEW',
											 'cre_by'				 => $_SESSION['userinfo']->mcode,
											 'upd_by'				 => $_SESSION['userinfo']->mcode,
											 'cre_dt'				 => date('Y/m/d h:i:s a', time()),
											 'upd_by'				 => date('Y/m/d h:i:s a', time()),

							 );

							 $this->prospects_model->AddDocProspect($param);
							 @unlink($writepath.$data['upload_data']['file_name']);
			 }

$config['file_name']	= 'TAGIHAN_'.str_replace('/','',$fpp);
$this->upload->initialize($config);

if ( ! $this->upload->do_upload('fileTG'))
			 {
							 $error = array('error' => $this->upload->display_errors());
			 }
			 else
			 {
				 $data = array('upload_data' => $this->upload->data());
				  $res = $this->ftp->upload($config['upload_path'].$config['file_name'].$data['upload_data']['file_ext'], $fpp.'/'.$data['upload_data']['file_name']);

							 $param = array(
											 'cust_prospect_id' => $this->input->post('cust_prospect_id',true),
											 'file_size_kb'		 =>	$data['upload_data']['file_size'],
											 'file_name'		     =>	$data['upload_data']['file_name'],
											 'file_type'		     =>	'TAGIHAN',
											 'file_ext'				 => $data['upload_data']['file_ext'],
											 'file_path'			 => $uploadpath.'/'.$data['upload_data']['file_name'],
											 'doc_stat'				 => 'NEW',
											 'cre_by'				 => $_SESSION['userinfo']->mcode,
											 'upd_by'				 => $_SESSION['userinfo']->mcode,
											 'cre_dt'				 => date('Y/m/d h:i:s a', time()),
											 'upd_by'				 => date('Y/m/d h:i:s a', time()),

							 );

							 $this->prospects_model->AddDocProspect($param);
							 @unlink($writepath.$data['upload_data']['file_name']);
			 }

				$this->ftp->close();
			 	redirect(base_url().'prospect');
		 }

public function lookupzipcode()
{

	if(isset($_SESSION['userinfo']))
	{
		$countpage = 1;
		$kelurahan = $this->input->post('kelurahan',true);
		$kecamatan = $this->input->post('kecamatan',true);
		$kota 	   = $this->input->post('kota',true);
		$zipcode   = $this->input->post('zipcode',true);
		$page 	   = $this->input->post('page',true);
		$token 	   = hash('sha256',secret_key.date("d"));

		$param 	= Array(
							'kelurahan' => $kelurahan,
							'kecamatan'	=> $kecamatan,
							'kota'		=> $kota,
							'zipcode'	=> $zipcode,
							'page'		=> $page,
							'token'		=> $token
						);

		$result = $this->CallAPI("POST",ZIPCODE_API,$param);

		$html ='<div class="table-responsive"><table class="table table-hover"><thead class=" text-primary">
   <th>Kelurahan</th><th>Kecamatan</th><th>Kota</th><th>Zipcode</th><th>Action</th></thead>
	 <tbody>';


		foreach ($result['zipcodes'] as $key) {
				$html =  $html."<tr><td>".$key["kelurahan"]."</td><td>".$key["kecamatan"]."</td><td>".$key["kota"]."</td><td>".$key["kodepos"]."</td><td><a href=\"#\"onclick=\"setZipcodeValue('".$key["kelurahan"]."','".$key["kecamatan"]."','".$key["kota"]."','". $key["kodepos"]. "')\" data-dismiss=\"modal\">Select</a></td></tr>";
				$countpage = $countpage +1;
		}

		$html =  $html."</tbody></table></div>";

		print_r($html);
		if($countpage >= 5)
		{
			print_r(' <div class="modal-footer"><a href="#" onclick="PreviousPaging()">Previous</a><a href="#" onclick="NextPaging()">Next</a></div>');
		}
		else {
		print_r(' <div class="modal-footer"><a href="#" onclick="PreviousPaging()">Previous</a></div>');
		}

}
}

function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return json_decode($result,true);
}


}
