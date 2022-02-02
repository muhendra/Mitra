<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';


// use namespace
use Restserver\Libraries\REST_Controller;

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Prospect extends REST_Controller {

	 function __construct()
    {
        // Construct the parent class
        parent::__construct();
		$this->load->model('prospect_model');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function index_get()
{
	
	echo "Hello World";
}

public function validateDate($date)
{
	if (preg_match("/^((((19|[2-9]\d)\d{2})\-(0[13578]|1[02])\-(0[1-9]|[12]\d|3[01]))|(((19|[2-9]\d)\d{2})\-(0[13456789]|1[012])\-(0[1-9]|[12]\d|30))|(((19|[2-9]\d)\d{2})\-02\-(0[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))\-02\-29))$/",$date)) {
    return true;
} else {
    return false;
}

}

public function validate($mitraCode,$tokenparam)
    {

 
    	$this->load->model('helper_model');
     	 $res =  $this->helper_model->GetMitraKey($mitraCode);
         $secretKey = $res->result_object()[0]->SecretKey . date("d");
         $token =  hash('sha256', $secretKey);

        if($tokenparam == $token)
        {
            return true;
        }
        else

        {
            return false;
        }

    }

public function AddProspect_post()
{	
	$result = "1";
	$msg = "";
	$fppRes = "";
	$mitraCode = $this->post("MitraCode");
	$secretKey = $this->post("SecretKey",$mitraCode);


	if($this->validate($mitraCode,$secretKey))
	{



		$this->load->model('prospect_model');
		
		$FppNo 							= $this->post("FppNo");
		$Tenor							= $this->post("Tenor");

		// Langkah 1
		$CustName						= $this->post("CustName");
		$KtpCust						= $this->post("KtpCust");
		$HPCust						    = $this->post("HPCust");
		$EmailCust					    = $this->post("EmailCust");
		
		$BornPlaceCust					= $this->post("BornPlaceCust");
		$BirthDateCust					= $this->post("BirthDateCust");
		$GenderCust						= $this->post("GenderCust"); // M | F
		$MMNCust						= $this->post("MMNCust");
		$NPWPCust						= $this->post("NPWPCust");
		
		// langkah 2
		$KTPAddrCust					= $this->post("KTPAddrCust");
		$KTPRTCust						= $this->post("KTPRTCust");
		$KTPRWCust						= $this->post("KTPRWCust");
		$KTPProvCust					= $this->post("KTPProvCust");
		$KTPCityCust					= $this->post("KTPCityCust");
		$KTPKecamatanCust				= $this->post("KTPKecamatanCust");
		$KTPKelurahanCust				= $this->post("KTPKelurahanCust");


		$CurrAddrCust					= $this->post("CurrAddrCust");
		$CurrRTCust						= $this->post("CurrRTCust");
		$CurrRWCust						= $this->post("CurrRWCust");
		$CurrProvCust					= $this->post("CurrProvCust");
		$CurrKotaCust					= $this->post("CurrKotaCust");
		$CurrKecamatanCust				= $this->post("CurrKecamatanCust");
		$CurrKelurahanCust				= $this->post("CurrKelurahanCust");
		$StatusTempatTinggal			= $this->post("StatusTempatTinggal"); // Milik Pribadi | Milik Orang Tua atau Keluarga | Sewa | Kost | Lainnya


		//langkah 3

		$JenisPekerjaanCust				= $this->post("JenisPekerjaanCust"); //Karyawan | Profesional | Tidak Bekerja | Wiraswasta
		$CompanyNameCust				= $this->post("CompanyNameCust");
		$LengthOfWorkCust				= $this->post("LengthOfWorkCust");
		$StatusPekerjaanCust			= $this->post("StatusPekerjaanCust"); // Tetap | Kontrak
		$IncomeSalaryCust				= $this->post("IncomeSalaryCust");
		$IncomeAdditionalCust			= $this->post("IncomeAdditionalCust");

		//langkah 4
		$JumlahTanggunganCust			= $this->post("JumlahTanggunganCust");
		$MaritalStatCust				= $this->post("MaritalStatCust"); // Lajang | Menikah | Cerai

		$SpouseName						= $this->post("SpouseName");
		$KTPSpouse						= $this->post("KTPSpouse");
		$BornPlaceSpouse				= $this->post("BornPlaceSpouse");
		$BirthDateSpouse				= $this->post("BirthDateSpouse");
		$CurrAddrSpouse					= $this->post("CurrAddrSpouse");
		$CurrRTSpouse					= $this->post("CurrRTSpouse");
		$CurrRWSpouse					= $this->post("CurrProvSpouse");
		$CurrProvSpouse					= $this->post("CurrRWSpouse");
		$CurrKotaSpouse					= $this->post("CurrKotaSpouse");
		$CurrKecamatanSpouse			= $this->post("CurrKecamatanSpouse");			
		$CurrKelurahanSpouse			= $this->post("CurrKelurahanSpouse");
		$JenisPekerjaanSpouse			= $this->post("JenisPekerjaanSpouse"); // Karyawan | Profesional | Wiraswasta |Tidak Bekerja
		$CompanyNameSpouse				= $this->post("CompanyNameSpouse");
		$IncomeSpouse 					= $this->post("IncomeSpouse");
		

		//langkah 5
		$KerabatName					= $this->post("KerabatName");
		$AddrKerabat					= $this->post("AddrKerabat");
		$HubKerabat						= $this->post("HubKerabat");
		$HPKerabat						= $this->post("HPKerabat");


		//Upload Doc
		$DocKTP 						= $this->post("DocKTP");
		$DocKK 							= $this->post("DocKK");
		$DocNPWP 						= $this->post("DocNPWP");
		$DocBukuNikah 					= $this->post("DocBukuNikah");
		$DocBuktiPenghasilan  			= $this->post("DocBuktiPenghasilan");

		
		//additional untuk data guarantor
		$GuarantorName 					= $this->post("GuarantorName");
		$AddrGuarantor 					= $this->post("AddrGuarantor");
		$BirthDateGuarantor 			= $this->post("BirthDateGuarantor");
		$IncomeGuarantor				= $this->post("IncomeGuarantor");
		$KTPGuarantor					= $this->post("KTPGuarantor");
		$PhoneGuarantor					= $this->post("PhoneGuarantor");
		$RelationshipGuarantor			= $this->post("RelationshipGuarantor");


		$cekKTP = $this->prospect_model->ValidateNIKCust($KtpCust);

		
		if($cekKTP->num_rows() > 0)
		{
				$result = "0";
				$msg = "NIK Sudah Terdaftar";

		}
	
		else if($Tenor != "12" && $Tenor != "24" && $Tenor != "36" && $Tenor != "48" && $Tenor != "60" )
		{
			$result = "0";
			$msg    = "Tenor Tidak Terdaftar";


		}
		else if(empty($CustName))
		{
			$result = "0";
			$msg = "Nama Customer Harus di isi";

		}
		else if(strlen($KtpCust) != 16 || !is_numeric($KtpCust))
		{
			$result = "0";
			$msg = "No KTP Tidak Valid";

		}
		else if(strlen($HPCust) <= 9 || !is_numeric($HPCust))
		{

			$result = "0";
			$msg = "No HP Cust Tidak Valid";
		}
		else if(!empty($FppNo))
		{

			$res = $this->prospect_model->ValidateFPPNo($FppNo,$mitraCode);
			if($res->num_rows() <= 0)
			{
					$result = "0";
					$msg = "FPP No Tidak Valid";

			}
		}
		else if(!$this->validateDate($BirthDateCust))
		{

				$result = "0";
				$msg = "Format BirthDateCust tidak sesuai (yyyy-mm-dd)";
		}
		else if(empty($BornPlaceCust))
		{
		
			$result = "0";
			$msg = "Born Place Wajib di isi";
		}
			else if(empty($MMNCust))
		{
		
			$result = "0";
			$msg = "MMNCust Wajib di isi";
		}
		else if(strtoupper($GenderCust) != "M" && $GenderCust !="F")
		{
			$result = "0";
			$msg = "Gender Cust Wajib di Input (M / F)";
		}
		
		else if(!is_numeric($NPWPCust) && !empty($NPWPCust))
		{

			$result = "0";
			$msg = "NPWPCust Wajib Numeric";
		}
		else if(empty($KTPAddrCust) || empty($KTPRTCust) || empty($KTPRWCust) || empty($KTPProvCust) || empty($KTPCityCust) || empty($KTPKecamatanCust) || empty($KTPKelurahanCust ))
		{
			$result = "0";
			$msg = "Data Alamat KTP Customer Harus di isi lengkap";



		}

		else if(empty($StatusTempatTinggal) || ( strtoupper($StatusTempatTinggal) != "MILIK PRIBADI" && strtoupper($StatusTempatTinggal) != "MILIK KELUARGA" && strtoupper($StatusTempatTinggal) != "SEWA" && strtoupper($StatusTempatTinggal) != "KOST" && strtoupper($StatusTempatTinggal) != "LAINNYA")  )
		{

				$result = "0";
				$msg = "Status Tempat tinggal hanya bisa di input : MILIK PRIBADI | MILIK KELUARGA | SEWA | KOST | LAINNYA ";
		}
		else if(empty($CurrAddrCust) || empty($CurrRTCust) || empty($CurrRWCust) || empty($CurrProvCust) || empty($CurrKotaCust) || empty($CurrKecamatanCust) || empty($CurrKelurahanCust))
		{
				$result = "0";
				$msg = "Data Alamat Domisili Customer Harus di isi lengkap";

		}
		else if(empty($JenisPekerjaanCust) || ( strtoupper($JenisPekerjaanCust) != "KARYAWAN" && strtoupper($JenisPekerjaanCust) != "PROFESIONAL" && strtoupper($JenisPekerjaanCust) != "WIRASWASTA" && strtoupper($JenisPekerjaanCust) != "TIDAK BEKERJA"))
		{

				$result = "0";
				$msg = "Jenis Pekerjaan Customer hanya bisa di input : KARYAWAN | PROFESIONAL| WIRASWASTA |TIDAK BEKERJA";
		}

		else if(strtoupper($JenisPekerjaanCust) != "TIDAK BEKERJA")
		{

			if(empty($CompanyNameCust))
			{
				$result = "0";
				$msg = "Nama Perusahaan Cust Harus di isi";

			}
			else if(!is_numeric($LengthOfWorkCust))
			{
					$result = "0";
				$msg = "length of work Cust harus numeric";
			}

			else if(strtoupper($StatusPekerjaanCust) != "TETAP" && strtoupper($StatusPekerjaanCust) != "KONTRAK")
			{
					$result = "0";
				$msg = "Status Pekerjaan Cust Hanya Bisa di input TETAP  | KONTRAK";
			}
			else if(!is_numeric($IncomeSalaryCust))
			{
					$result = "0";
					$msg = "Income Salary Cust harus numeric";

			}
			else if(!empty($IncomeAdditionalCust) && !is_numeric($IncomeAdditionalCust))
			{
				$result = "0";
				$msg = "Income Additional Cust Harus numeric";
			}
		}

		if(!is_numeric($JumlahTanggunganCust))
		{
				$result = "0";
				$msg = "Jumlah Tanggungan Customer harus numeric";
		}

		else if(strtoupper($MaritalStatCust) != "LAJANG" && strtoupper($MaritalStatCust) != "MENIKAH" && strtoupper($MaritalStatCust) != "CERAI")
		{
			$result = "0";
			$msg = "Marital Status Cust Hanya bisa di input  LAJANG | MENIKAH | CERAI";
		}

		else if(!empty($EmailCust))
		{
			if(!filter_var($EmailCust, FILTER_VALIDATE_EMAIL))
			{
				$result = "0";
				$msg = "Email Tidak Valid";

			}
		}

		if(strtoupper($MaritalStatCust) == "MENIKAH")
		{

			if(empty($SpouseName))
			{
				$result = "0";
				$msg = "Spouse Name tidak boleh kosong";

			}
			else if(empty($KTPSpouse) || !is_numeric($KTPSpouse))
			{
				$result = "0";
				$msg = "KTP Spouse tidak boleh kosong";

			}

			else if(empty($BornPlaceSpouse))
			{
				$result = "0";
				$msg = "Tempat tanggal lahir pasangan harus di isi";
			}

			else if(empty($BirthDateSpouse) || !$this->validateDate($BirthDateSpouse))
			{
				$result = "0";
				$msg = "Format BirthDateSpouse tidak sesuai (yyyy-mm-dd)";
				
			}
			else if(empty($CurrAddrSpouse) || empty($CurrRTSpouse) || empty($CurrRWSpouse) || empty($CurrKotaSpouse) || empty($CurrKecamatanSpouse) || empty($CurrKelurahanSpouse) || empty($CurrProvSpouse))
			{
				$result = "0";
				$msg = "Alamat Domisili Spouse harus di isi";
				
			}
			else if(strtoupper($JenisPekerjaanSpouse) != "KARYAWAN" && strtoupper($JenisPekerjaanSpouse) != "PROFESIONAL" && strtoupper($JenisPekerjaanSpouse) != "WIRASWASTA" && strtoupper($JenisPekerjaanSpouse) != "TIDAK BEKERJA")
			{
						$result = "0";
						$msg = "Jenis Pekerjaan Spouse hanya bisa di input : KARYAWAN | PROFESIONAL| WIRASWASTA |TIDAK BEKERJA";

			}
			else if(strtoupper($JenisPekerjaanSpouse) != "TIDAK BEKERJA" && empty($CompanyNameSpouse))
			{

					$result = "0";
					$msg = "Company Name Spouse harus di isi";

			}
			else if(strtoupper($JenisPekerjaanSpouse) != "TIDAK BEKERJA" && !is_numeric($IncomeSpouse))
			{
					$result = "0";
					$msg = "Income Spouse harus di input numeric";


			}
		}

		if(empty($KerabatName) || empty($AddrKerabat) ||empty($HubKerabat))
		{
			$result = "0";
			$msg = "Data kerabat harus di input lengkap";
		}
		else if(empty($HPKerabat) || !is_numeric($HPKerabat) || strlen($HPKerabat) <= 9)
		{

			$result = "0";
			$msg = "Format No HP Kerabat salah";
		}


		if(empty($DocKTP) || empty($DocKK))
		{
			$result = "0";
			$msg = "Foto KTP dan FOTO KK harus di upload";
		}
		else if(strtoupper($MaritalStatCust) == "MENIKAH" && empty($DocBukuNikah))
		{
			$result = "0";
			$msg = "Foto buku nikah harus di upload";
		}
		if(!empty($GuarantorName))
		{
			if(empty($AddrGuarantor))
			{
				$result = "0";
				$msg = "Alamat Guarantor Harus di isi";
			}
			else if(!$this->validateDate($BirthDateGuarantor))
			{

				$result = "0";
				$msg = "Format BirthDateGuarantor tidak sesuai (yyyy-mm-dd)";
			}
			else if(!is_numeric($IncomeGuarantor))
			{
				$result = "0";
				$msg = "income guarantor harus di isi dan numeric";
			}
			else if(!is_numeric($KTPGuarantor) && strlen($KTPGuarantor) != 16)
			{
				$result = "0";
				$msg = "Format KTP Guarantor salah";
			}
			else if(!is_numeric($PhoneGuarantor) && strlen($PhoneGuarantor) < 9)
			{
				$result = "0";
				$msg = "Format NO HP Guarantor salah";
			}

			else if(empty($RelationshipGuarantor))
			{
				$result = "0";
				$msg = "RelationshipGuarantor harus di isi";
			}
		}

	}
	else
	{
		$result = "0";
		$msg = "Not Authorized";
	}
	
	if($result == "1")
	{ 

			$param = array(

					"MitraCode"					=>	$mitraCode,
					"FppNo"						=>	$FppNo 	,
					"Tenor"						=>	$Tenor	,
					"CustName"					=>	$CustName	,
					"KtpCust"					=>	$KtpCust	,
					"HPCust"					=>	$HPCust	,
					"EmailCust"					=>	$EmailCust	,
					"BornPlaceCust"				=>	$BornPlaceCust	,
					"BirthDateCust"				=>	$BirthDateCust	,
					"GenderCust"				=>	$GenderCust	,
					"MMNCust"					=>	$MMNCust	,
					"NPWPCust"					=>	$NPWPCust	,
					"KTPAddrCust"				=>	$KTPAddrCust	,
					"KTPRTCust"					=>	$KTPRTCust	,
					"KTPRWCust"					=>	$KTPRWCust	,
					"KTPProvCust"				=>	$KTPProvCust	,
					"KTPCityCust"				=>	$KTPCityCust	,
					"KTPKecamatanCust"			=>	$KTPKecamatanCust	,
					"KTPKelurahanCust"			=>	$KTPKelurahanCust	,
					"CurrAddrCust"				=>	$CurrAddrCust	,
					"CurrRTCust"				=>	$CurrRTCust	,
					"CurrRWCust"				=>	$CurrRWCust	,
					"CurrProvCust"				=>	$CurrProvCust	,
					"CurrKotaCust"				=>	$CurrKotaCust	,
					"CurrKecamatanCust"			=>	$CurrKecamatanCust	,
					"CurrKelurahanCust"			=>	$CurrKelurahanCust	,
					"StatusTempatTinggal"		=>	$StatusTempatTinggal	,
					"JenisPekerjaanCust"		=>	$JenisPekerjaanCust	,
					"CompanyNameCust"			=>	$CompanyNameCust	,
					"LengthOfWorkCust"			=>	$LengthOfWorkCust	,
					"StatusPekerjaanCust"		=>	$StatusPekerjaanCust	,
					"IncomeSalaryCust"			=>	$IncomeSalaryCust	,
					"IncomeAdditionalCust"		=>	$IncomeAdditionalCust	,
					"JumlahTanggunganCust"		=>	$JumlahTanggunganCust	,
					"MaritalStatCust"			=>	$MaritalStatCust	,
					"SpouseName"				=>	$SpouseName	,
					"KTPSpouse"					=>	$KTPSpouse	,
					"BornPlaceSpouse"			=>	$BornPlaceSpouse	,
					"BirthDateSpouse"			=>	$BirthDateSpouse	,
					"CurrAddrSpouse"			=>	$CurrAddrSpouse	,
					"CurrRTSpouse"				=>	$CurrRTSpouse	,
					"CurrRWSpouse"				=>	$CurrRWSpouse	,
					"CurrProvSpouse"			=>	$CurrProvSpouse	,
					"CurrKotaSpouse"			=>	$CurrKotaSpouse	,
					"CurrKecamatanSpouse"		=>	$CurrKecamatanSpouse	,
					"CurrKelurahanSpouse"		=>	$CurrKelurahanSpouse	,
					"JenisPekerjaanSpouse"		=>	$JenisPekerjaanSpouse	,
					"CompanyNameSpouse"			=>	$CompanyNameSpouse	,
					"IncomeSpouse"				=>	$IncomeSpouse 	,
					"KerabatName"				=>	$KerabatName	,
					"AddrKerabat"				=>	$AddrKerabat	,
					"HubKerabat"				=>	$HubKerabat	,
					"HPKerabat"					=>	$HPKerabat	,
					"DocKTP"					=>	$DocKTP 	,
					"DocKK"						=>	$DocKK 	,
					"DocNPWP"					=>	$DocNPWP 	,
					"DocBukuNikah"				=>	$DocBukuNikah 	,
					"DocBuktiPenghasilan"		=>	$DocBuktiPenghasilan  	,
					"GuarantorName"				=>	$GuarantorName 	,
					"AddrGuarantor"				=>	$AddrGuarantor 	,
					"BirthDateGuarantor"		=>	$BirthDateGuarantor 	,
					"IncomeGuarantor"			=>	$IncomeGuarantor	,
					"KTPGuarantor"				=>	$KTPGuarantor	,
					"PhoneGuarantor"			=>	$PhoneGuarantor	,
					"RelationshipGuarantor"		=>	$RelationshipGuarantor	,



			);

			
			$fppRes = $this->prospect_model->AddNewProspect($param);

			$msg="SUCCESS";

	}

		$message = [
          	'fpp' => $fppRes,
            'result' => $result,
			'error_message' => $msg
        ];
	$this->set_response($message, REST_Controller::HTTP_CREATED);


	


}


}