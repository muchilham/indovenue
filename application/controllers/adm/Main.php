<?php header('Access-Control-Allow-Origin: *'); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('adm/Data_model');
	}

	public function index()
	{
		$this->load->view('adm/login');
	}
	public function Login()
	{
		// $account_name = $this->input->post('account_name');
		// $account_password = $this->input->post('account_password');
		// $temp_account = $this->Data_model->Main($account_name,$account_password);
		
		// if ($temp_account->num_rows() == 1)
		// 	{
		// 		foreach($temp_account->result() as $key)
		// 		{
		// 			$array_items = array(
		// 				'account_name' => $key->account_name,
		// 				'account_password' => $key->account_password,
		// 				'account_email' => $key->account_email,
		// 				'account_role' => $key->account_role,
		// 				'logged_in' => true
		// 				);
		// 			// $this->session->sess_expiration = '18000';
		// 			$this->session->set_userdata($array_items);
		// 		}
		// 			echo json_encode(array('msg'=>"Main Success", 'url'=>"Dashboard/", 'status'=>"true"));
		// 	}
		// 	else
		// 	{
		// 		echo json_encode(array('msg' => "Main Failed"));
		// 	}
		$account_name = $this->input->post('account_name');
		$account_password = $this->input->post('account_password');
		$temp_account = $this->Data_model->Login($account_name,$account_password);

		
		if ($temp_account->num_rows() == 1)
			{
				foreach($temp_account->result() as $key)
				{
					$array_items = array(
						'account_name' => $key->account_name,
						'account_password' => $key->account_password,
						'account_photo' => $key->account_photo,
						'logged_in' => true
						);
					$this->session->set_userdata($array_items);
				}
					echo json_encode(array('msg'=>"Success.", 'url'=>"adm/dashboard/", 'status'=>true));
			}
		else
			{
				echo json_encode(array('msg' => "Main Gagal"));
			}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('../adm');
	}

}