<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
					}
	public function index()
	{
		if(isset($_SESSION['session_id']))
		{
			$this->loginAPI();
		}
		else
		{
			$this->load->view('login');
		}
	}

	public function logout()
	{
		$this->load->model('user_model');
		$this->user_model->logout();
		session_destroy();
		redirect(base_url());
	}
	
	public function cpass()
	{
		$this->load->view('cpass');
	}
	
	public function DoChangePass()
	{
		$oldpass = $this->input->post('oldpass');
		$newpass1 = $this->input->post('newpass1');
		$newpass2 = $this->input->post('newpass2');
		
		if($newpass1 != $newpass2)
		{
			$this->session->set_flashdata('notification_msg', 'Password baru dan ulangi password tidak sama' );
			$this->session->set_flashdata('notification_type', 'danger');
			$this->session->set_flashdata('notification_flag', '1');
			redirect(base_url().'/home/cpass');
			
		}
		else
		{
			$data = array(
						 'username'				  				 => $_SESSION['userinfo']->mcode,
						 'OldPass'								 => md5($oldpass),
						 'NewPass'								 => md5($newpass1),
						 'token'								 => hash('sha256',secret_key.date("d"))	
					 );
					 
					$result = $this->CallAPI("POST",CP_API,$data);
					if($result['result'] == "1")
					{
					 $this->session->set_flashdata('notification_msg', 'Password berhasil di ubah' );
					 $this->session->set_flashdata('notification_type', 'success');
					 $this->session->set_flashdata('notification_flag', '1');
					redirect(base_url());	
					}
					else
					{
						 $this->session->set_flashdata('notification_msg', $result['message'] );
						 $this->session->set_flashdata('notification_type', 'danger');
				         $this->session->set_flashdata('notification_flag', '1');
						redirect(base_url().'/home/cpass');
					}
		}
	}

	public function loginx()
	{
		$this->load->model('prospects_model');
		if(!isset($_SESSION['session_id']))
		{
			$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
			 $userIp=$this->input->ip_address();
			 $secret = $this->config->item('google_secret');
			 $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
			 $ch = curl_init();
			 curl_setopt($ch, CURLOPT_URL, $url);
			 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			 $output = curl_exec($ch);
			 curl_close($ch);

			 $status= json_decode($output, true);

			 if ($status['success']) {

				 $this->load->model('user_model');
				 $data = array(
				 'mcode'				  						 => $this->input->post('username',TRUE),
				 'password'								   => md5($this->input->post('pass')),
				 'isactive'									 => 'Y'
			 );
				 $res =	$this->user_model->login($data);
				 if($res['result'] == '1')
				 {
					 $this->session->set_flashdata('notification_msg', 'Selamat Datang '.$_SESSION['userinfo']->nama );
					 $this->session->set_flashdata('notification_type', 'success');
					 $this->session->set_flashdata('notification_flag', '1');
					 $dashboard = Array("dashboard" => 	$this->prospects_model->GetDashboard());
					 $this->load->view('home',$dashboard);
				 }
				 else {
					  $this->load->view('login',$res);

				 }

			 }else{
				 		$res = array('err_msg' => "Captcha Salah");
						 $this->load->view('login',$res);
			 }
	}
	else {
		$dashboard = Array("dashboard" =>$this->prospects_model->GetDashboard());
		$this->load->view('home',$dashboard);
	}

}

public function loginAPI()
{
	$this->load->model('user_model');
	if(!isset($_SESSION['session_id']))
	{
		$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
		 $userIp=$this->input->ip_address();
		 $secret = $this->config->item('google_secret');
		 $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $url);
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 $output = curl_exec($ch);
		 curl_close($ch);

		 $status= json_decode($output, true);

		 if ($status['success']) {

						 $data = array(
						 'username'				  				 => $this->input->post('username',TRUE),
						 'password'								 => md5($this->input->post('pass')),
						 'token'								 => hash('sha256',secret_key.date("d"))	
					 );
					$result = $this->CallAPI("POST",LOGIN_API,$data);


			 if($result['result'] == '1')
			 {
				 $this->load->model('prospects_model');
				 $_SESSION['userinfo']  = (object)$result['mitra'];
				 $this->user_model->CreateLoginSession();
				 $this->session->set_flashdata('notification_msg', 'Selamat Datang '.$_SESSION['userinfo']->nama );
				 $this->session->set_flashdata('notification_type', 'success');
				 $this->session->set_flashdata('notification_flag', '1');
				 $dashboard = Array("dashboard" => 	$this->prospects_model->GetDashboard());
				 $this->load->view('home',$dashboard);
			 }
			 else {

				 $res = array(
							 'result'     => '0',
							 'err_msg'    => $result['message']
				 );

					$this->load->view('login',$res);

			 }

		 }else{
					$res = array('err_msg' => "Captcha Salah");
					 $this->load->view('login',$res);
		 }
}
else {
	$this->load->model('prospects_model');
	$dashboard = Array("dashboard" =>$this->prospects_model->GetDashboard());
	$this->load->view('home',$dashboard);
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
