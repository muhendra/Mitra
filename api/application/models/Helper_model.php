<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class helper_model extends CI_Model {
	 function __construct()
    {
        // Construct the parent class
        parent::__construct();
		
		$this->load->database();

    }

    public function GetMitraKey($Mcode)
    {

    	$this->db->select('MitraCode,MitraName,SecretKey');
		$this->db->from('mitra_api');
		$this->db->where('MitraCode',$Mcode);
		$this->db->where('IsActive','1');


		$res = $this->db->get();
		return $res;
    }



}