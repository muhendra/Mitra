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
class Activity extends REST_Controller {
	
	

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
		$this->load->model('activity_model');
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


public function GetActivityType_get()
{
	
	$res = $this->activity_model->GetActivityType();
	$msg = array();
	foreach($res->result_array() as $x)
	{
		array_push($msg,$x['ListName']);
		
	}
	$this->set_response($msg, REST_Controller::HTTP_CREATED); 
}

public function GetActivityProduct_get()
{
	
	$res = $this->activity_model->GetListProduct();
	$msg = array();
	foreach($res->result_array() as $x)
	{
		array_push($msg,$x['ListName']);
		
	}
	$this->set_response($msg, REST_Controller::HTTP_CREATED); 
}


public function GetMasterSupplier_post()
{
	$search = "";
	$errMsg = "";
	$result = "0";
	
	try{
		$search = $this->post('search');
		$res = $this->activity_model->GetMasterSupplier($search);
		$msg = $res->result_array();
		$result = "1";
	}
	catch (Exception $ex)
	{
		$errMsg = $ex->getMessage();
	}
	
	$message = [
	  
		'result' => $result,
		'error_message' => $errMsg,
		'data' => $msg
	];
	
	$this->set_response($message, REST_Controller::HTTP_CREATED);
}

public function GetSupplierList_get()
{
	
	$res = $this->activity_model->GetListSupplier();
	$msg = array();
	foreach($res->result_array() as $x)
	{
		array_push($msg,$x['supplier_name']);
		
	}
	$this->set_response($msg, REST_Controller::HTTP_CREATED); 
}

public function GetSupplierByProduct_post()
{
	$product =  'ALL';
	$product = $this->post('product');
	$res = $this->activity_model->GetListSupplierByProduct($product);
	$msg = array();
	foreach($res->result_array() as $x)
	{
		array_push($msg,$x['supplier_name']);
		
	}
	$this->set_response($msg, REST_Controller::HTTP_CREATED);
}

public function logout_post()
{
	$session_Id = $this->post('session_id');
	$this->activity_model->DestroyLoginSession($session_Id);
	
	
}


public function login_post()
{
	$username = $this->post('userid');
	$password =  $this->post('password');
	$login_source = $this->post('loginSource');
	
	isset($login_source) == false ? $login_source = "MOBILE" : $login_source = $login_source;
	
	$token =  $this->post('token');
	$method = "POST";
	$url = "http://172.31.215.90/SmileSupportAPI_Live/api/login";
	 $curl = curl_init();
	 
	
						 $data = array(
						 'userid'				  				 => $username,
						 'password'								 => $password,
						 'token'								 => $token
					 );

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

    $val = json_decode($result,true);
	
	
	
	if(isset($val['result']))
	{
		if($val['result'] == '1')
		
		{
			
		
			$param =  array(
			
						          
								  'empName'   => $val['dataUser'][0]['staff_name'],
								  'login_dt'   => date('Y/m/d h:i:s a', time()),
								  'logout_dt'  => null,
								  'is_active'    => 1,
								  'login_source' => $login_source
			
			);
			
			
			
				$session_id = $this->activity_model->CreateLoginSession($param);
				$val['session_id'] = $session_id;
		}	
	}
	
	 $this->set_response($val, REST_Controller::HTTP_CREATED); 
}
    

    public function addactivity_post()
    {
       
		$errMsg = "";
		$result = "0";
		$activity = '';
		$type='';
		$desc = '';
		$image = '';
		$longitude = '';
		$latitude = '';
		$userid = '';
		$visitDuration = '0';
		$product = '';
		$meetupwith = '';
		$supplier = '';
		
		try{
			$activity = $this->post('activity');
			$type = $this->post('type');
			$desc = $this->post('desc');
			$userid = $this->post('username');
			$longitude = $this->post('longitude');
			$latitude = $this->post('latitude');
			$image = $this->post('image');
			$visitDuration = $this->post('visitDuration');
			$product = $this->post('product');
			$meetupwith = $this->post('meetupWith');
			$supplier = $this->post('supplier');
			$activity =  Array(
				"ActivityName" => $activity,
				"Type" => $type,
				"Description" => $desc,
				"Image" => $image,
				"Longitude" => $longitude,
				"Latitude" => $latitude,
				"UserId" =>$userid,
				"InputDt" => date("Y-m-d H:i"),
				"visitDuration" => $visitDuration,
				"Product" => $product,
				"MeetupWith" => $meetupwith,
				"Supplier" => $supplier
				
			);
			$res = $this->activity_model->AddActivity( $activity );
			$result = "1";
		}
		
		catch (Exception $ex)
		{
			
			$errMsg = $ex->getMessage();
		}
		
        $message = [
          
            'result' => $result,
			'error_message' => $errMsg,
			'data' => $res->row()
        ];

        $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
	
	public function listactivity_post()
	{
		$username =  '';
		$errMsg = "";
		$result = "0";
		
		try{
			$username = $this->post('username');
			$res = $this->activity_model->GetActivityByUser($username);
			$msg = $res->result_array();
			$result = "1";
		}
		catch (Exception $ex)
		{
			$errMsg = $ex->getMessage();
		}
		
		$message = [
          
            'result' => $result,
			'error_message' => $errMsg,
			'data' => $msg
        ];
		
		$this->set_response($message, REST_Controller::HTTP_CREATED);
	}

   

}
