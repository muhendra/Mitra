<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model {


public function CreateLoginSession()
{
  $session = array(
          'session_id' => session_id(),
          'mitra_id'   => $_SESSION['userinfo']->mcode,
          'login_dt'   => date('Y/m/d h:i:s a', time()),
          'logout_dt'  => null,
          'is_active'    => 1

  );
  $this->db->insert('login_session',$session);
  $_SESSION['session_id'] = $session['session_id'];
}

  public function login($where)
  {
    $this->db->select('mkey,mcode,nama,tempatlahir,tanggallahir,address,email,hp,notlp,nowhatsapp,jenismitra,issubmitra,isactive,contactperson,npwp,aktapendirian,submitra,branch,tipemitra,provinsimitra,kota,first_login');
    $this->db->from('mitra');
    $this->db->where($where);
  //  print_r($where);
    $res = $this->db->get();
    if($res->num_rows() >= 1)
    {
      $row = $res->row();
        $session = array(
                'session_id' => session_id(),
                'mitra_id'   => $row->mcode,
                'login_dt'   => date('Y/m/d h:i:s a', time()),
                'logout_dt'  => null,
                'is_active'    => 1

        );
      $this->db->insert('login_session',$session);
      $result = array(
            'result'     => '1',
            'err_msg'    => ''
      );

      $_SESSION['session_id'] = $session['session_id'];
      $_SESSION['userinfo'] = $row;
    }
    else {
      $result = array(
          'result'  => '0',
          'err_msg' => 'username atau password salah'
      );
    }


    return $result;

  }

  public function logout()
  {
      $data = array(
          'is_active' => 0,
          'logout_dt' => date('Y/m/d h:i:s a', time())

      );
      $this->db->where('session_id', $_SESSION['session_id']  );
      $this->db->update('login_session',$data);
  }
}
