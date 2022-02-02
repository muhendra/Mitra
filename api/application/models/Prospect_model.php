<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class prospect_model extends CI_Model {
	 function __construct()
    {
        // Construct the parent class
        parent::__construct();
		
		$this->load->database();

    }

    public function ValidateFPPNo($fpp,$mitraCode)
    {

    	
    	$this->db->select('fppno');
		$this->db->from('prospect_api');
		$this->db->where('fppno',$fpp);
		$this->db->where('MitraCode',$mitraCode);


		$res = $this->db->get();
		return $res;
    }

    public function ValidateNIKCust($NIK)
    {
    	$this->db->select('KTPCust');
		$this->db->from('prospect_api');
		$this->db->where('KTPCust',$NIK);
		$this->db->where('Status !=','CANCEL');
		$res = $this->db->get();
		return $res;
    }

    public function generateFPP()
  {
    $this->db->trans_start();
    $this->db->select('*');
    $this->db->from('ms_sequence');
    $this->db->where('seq_code','FPP');

    $msseq =  $this->db->get()->row();

    $data = array(
        'seq_no' => $msseq->seq_no + 1,
        'last_upd' => date('Y/m/d h:i:s a', time())

    );
    $this->db->where('ms_sequence_id', $msseq->ms_sequence_id  );
    $this->db->update('ms_sequence',$data);
    $this->db->trans_complete();

    $seqno     =  $msseq->seq_no;
    $prefix    = $msseq->prefix;
    $delimiter = $msseq->delimiter;
    $year      = date('y');
    $month     = date('m');
    $runningnum = 0;

    if($seqno < 10)
    {
        $runningnum =  '0000' . $seqno;

    }
    else if($seqno < 100)
    {
        $runningnum =  '000' . $seqno;

    }
    else if($seqno < 1000)
    {
        $runningnum =  '00' . $seqno;

    }
    else if($seqno < 10000)
    {
        $runningnum =  '0' . $seqno;

    }
    else {
      $runningnum = $seqno;
    }

    $fppNumber =  $prefix.$delimiter.$year.$delimiter.$month.$delimiter.$runningnum;
    return $fppNumber;

  }

    public function AddNewProspect($param)
    {

    	if(empty($param['FppNo']))
    	{
    		$param['FppNo'] = $this->generateFPP();
    	}
    
    	$this->db->insert('prospect_api', $param);
    	return	$param['FppNo'] ;
    }

}