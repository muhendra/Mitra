<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class prospects_model extends CI_Model {
// General Function

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


// function ADD
  public function AddProspect($data)
  {
    $this->db->insert('cust_prospect',$data);
    return $this->db->insert_id();
  }

  public function AddDocProspect($data)
  {
    $this->db->insert('cust_prospect_doc',$data);
    return $this->db->insert_id();
  }

  public function AddEditDocProspectSingle($data,$handshake)
  {
    $this->db->select('*');
    $this->db->from('login_session');
    $this->db->where($handshake);
    $res = $this->db->get();
    $flag = "INSERT";
    if($res->num_rows() >= 1)
    {
      $this->db->select('*');
      $this->db->from('cust_prospect_doc');
      $this->db->where('cust_prospect_id', $data['cust_prospect_id'] );
      $this->db->where('file_type', $data['file_type'] );
      $resx = $this->db->get();
      if($resx->num_rows() >= 1)
      {
        $flag ="UPDATE";
      }

      if($flag == "INSERT")
      {
        $this->db->insert('cust_prospect_doc',$data);
        return $this->db->insert_id();
      }
      else {
        unset($data['cre_dt']);
        unset($data['cre_by']);
        $this->db->where('cust_prospect_id', $data['cust_prospect_id'] );
        $this->db->where('file_type', $data['file_type'] );
        $this->db->update('cust_prospect_doc',$data);
      }
    }
  }
//function Searching / Select

  public function SearchProspect($where)
  {
    $this->db->select('*');
    $this->db->from('cust_prospect');
	$this->db->where('mitra_id', $_SESSION['userinfo']->mcode);
    $this->db->like($where);
    return $this->db->get()->result();
  }

  public function GetProspect($where)
  {
    $this->db->select('*');
    $this->db->from('cust_prospect');
    $this->db->where($where);
	$this->db->where('mitra_id', $_SESSION['userinfo']->mcode);
    return $this->db->get()->result();


  }

  public function GetDashboard()
  {
  $stringqry = "SELECT status_aplikasi,COUNT('') as jumlah FROM cust_prospect where mitra_id = ".$this->db->escape($_SESSION['userinfo']->mcode)." GROUP  BY status_aplikasi";
	$result =  $this->db->query($stringqry)->result();
  //$result =  $this->db->get()->result();

  return $result;

  }

  public function GetProspectDoc($prospectid)
  {
      $this->db->select('*');
      $this->db->from('cust_prospect_doc');
      $this->db->where('cust_prospect_id',$prospectid);
      return $this->db->get()->result();

  }
}
