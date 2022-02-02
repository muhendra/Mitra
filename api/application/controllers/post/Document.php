<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class Document extends REST_Controller {
	
	

    function __construct()
    {
        // Construct the parent class
       parent::__construct();
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    function validate($tokenparam)
    {
         $secretKey = secret_key . date("d");
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

    function CallAPI($url,$param)
    {
          $curl = curl_init();


            curl_setopt($curl, CURLOPT_POST, 1);

            if ($param)
            {
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($param));
            }
          
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;

    }

    public function index_get()
{
	
	echo "Hello World";
}



public function GetDocument_post()
{
    $result = "0";


    try{
         $AgreementNo = $this->post('AgreementNo');
         $DocType = $this->post('DocType');
         $token = $this->post('token');
         $file = "";
         $fileExt = "";
        $errCode = "0";
        $errMsg = "";

    if($this->validate($token))
    {

    $data = array("AgreementNo" => $AgreementNo,"DocType" => $DocType);
    $url = "http://172.31.215.90/DocumentAPI/api/GetDocument";
    $result = $this->CallAPI($url,$data);
    $val = json_decode($result,true);

        $message = [
      
        'AgreementNo' => $val["agreementNo"],
        'DocType' => $val["docyTpe"],
        'File' => $val["file"],
        'FileExt' => $val["fileExt"],
        'errCode' => $val["errCode"],
        'errMsg' =>$val["errMsg"]
          ];


            }
            else

            {
                  $errCode = "1";
                    $errMsg = "invalid token";
                     $message = [
      
                                'AgreementNo' => "",
                                'DocType'     => "",
                                'File'        => "",
                                'FileExt'     => "",
                                "errCode"     => "1",
                                "errMsg"      => $errMsg
                                  ];

            }
    
   
    }
    catch (Exception $ex)
    {
        $errMsg = $ex->getMessage();
         $message = [
      
        'AgreementNo' => "",
        'DocType'     => "",
        'File'        => "",
        'FileExt'     => "",
        "errCode"     => "1",
        "errMsg"      => $errMsg
          ];
    }
     $this->set_response($message, REST_Controller::HTTP_CREATED);

}

public function GetListDocument_post()
{
   $result = "0";


    try{
         $AgreementNo = $this->post('AgreementNo');
         $token = $this->post('token');
        $errCode = "0";
        $errMsg = "";

    if($this->validate($token))
    {

    $data = array("AgreementNo" => $AgreementNo);
    $url = "http://172.31.215.90/DocumentAPI/api/getlistdocument";
    $result = $this->CallAPI($url,$data);
    $val = json_decode($result,true);

        $message = [
    
        'DocType' => $val["docType"],
        'errCode' => $val["errCode"],
        'errMsg' =>$val["errMsg"]
          ];


            }
            else

            {
                  $errCode = "1";
                    $errMsg = "invalid token";
                     $message = [
    
                                'DocType'     => "",
                                "errCode"     => "1",
                                "errMsg"      => $errMsg
                                  ];

            }
    
   
    }
    catch (Exception $ex)
    {
        $errMsg = $ex->getMessage();
         $message = [
        'DocType'     => "",
        "errCode"     => "1",
        "errMsg"      => $errMsg
          ];
    }
     $this->set_response($message, REST_Controller::HTTP_CREATED);
}


public function GetInstallment_post()
{



    try{
         $AgreementNo = $this->post('AgreementNo');
         $token = $this->post('token');
    if($this->validate($token))
    {

    $data = array("AgreementNo" => $AgreementNo);
    $url = "http://172.31.215.90/DocumentAPI/api/getinstallment";
    $result = $this->CallAPI($url,$data);
    $val = json_decode($result,true);
    }
    }
    catch (Exception $ex)
    {
  
    }
     $this->set_response($val, REST_Controller::HTTP_CREATED);
}





}