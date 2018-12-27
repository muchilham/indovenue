<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')!=true)
		{
			redirect('adm');
		}
		$this->load->helper(array('url','form'));
		$this->load->model('adm/Data_model');
	}

	public function index()
	{
		$this->load->view('adm/tables-account');
	}
	public function view_table_account()
	{
		$select_account= $this->Data_model->select_account();
		$data= $select_account->result();
		echo json_encode($data);
	}
	public function add_account()
	{
		$this->load->view('adm/add-account');
	}
	public function add_data()
	{
		date_default_timezone_set('Asia/jakarta');

		$this->load->library('upload');
        $nmfile = $_FILES['file']['name'];
        $config['upload_path'] = './assets/adm/images/account/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|mp4|3gp|mp3'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '40000'; //maksimum besar file 4M
        $config['max_width']  = ''; 
        $config['max_height']  = '';
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file'))
        {
	        $gbr = $this->upload->data();
			$data = array(
	                  'account_name' =>$this->input->post('account_username'),
	                  'account_password' =>$this->input->post('account_password'),
	                  'account_created' =>date('Y-m-d H:i:s'),
	                  'account_role' =>"0",
	                  'account_email' =>$this->input->post('account_email'),
	                  'account_photo' =>$gbr['file_name']
	            );
			if($this->Data_model->insert_account($data))
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Add Data Success</div>');
				redirect('adm/Account/add_account');
			}
			else
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Add Data Failed</div>');
				redirect('adm/Account/add_account');
			}
		}
		else
		{
			$data = array(
	                  'account_name' =>$this->input->post('account_username'),
	                  'account_password' =>$this->input->post('account_password'),
	                  'account_created' =>date('Y-m-d H:i:s'),
	                  'account_role' =>"0",
	                  'account_email' =>$this->input->post('account_email')
	            );
			if($this->Data_model->insert_account($data))
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Add Data Success</div>');
				redirect('adm/Account/add_account');
			}
			else
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Add Data Failed</div>');
				redirect('adm/Account/add_account');
			}
		}

	}
	public function update_data($account_name)
	{
		date_default_timezone_set('Asia/jakarta');

		$this->load->library('upload');
        $nmfile = $_FILES['file']['name'];
        $config['upload_path'] = './assets/adm/images/account/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|mp4|3gp|mp3'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '40000'; //maksimum besar file 4M
        $config['max_width']  = ''; 
        $config['max_height']  = '';
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file'))
        {
	        $gbr = $this->upload->data();
			$data = array(
	                  'account_name' =>$this->input->post('account_username'),
	                  'account_password' =>$this->input->post('account_password'),
	                  'account_created' =>date('Y-m-d H:i:s'),
	                  'account_role' =>"0",
	                  'account_email' =>$this->input->post('account_email'),
	                  'account_photo' =>$gbr['file_name'],
	            );

			$select_account_get = $this->Data_model->select_account_get($account_name);
			$row = $select_account_get->row();
			unlink("./assets/adm/images/account/$row->account_photo");

			if($this->Data_model->update_account($account_name,$data))
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Add Data Success</div>');
				redirect('adm/Account');
			}
			else
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Add Data Failed</div>');
				redirect('adm/Account');
			}
		}
		else
		{
			$data = array(
	                  'account_name' =>$this->input->post('account_username'),
	                  'account_password' =>$this->input->post('account_password'),
	                  'account_created' =>date('Y-m-d H:i:s'),
	                  'account_role' =>"0",
	                  'account_email' =>$this->input->post('account_email')
	            );
			if($this->Data_model->update_account($account_name,$data))
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Add Data Success</div>');
				redirect('adm/Account/');
			}
			else
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Add Data Failed</div>');
				redirect('adm/Account');
			}
		}

	}
	public function delete_account()
	{
		$account_name = $this->input->post('account_name');
		$select_account_get = $this->Data_model->select_account_get($account_name);
		$row = $select_account_get->row();

		if($row->account_photo != "default.jpg")
		{
		unlink("./assets/adm/images/account/$row->account_photo");
		}

		if($this->Data_model->delete_account($account_name))
		{
			echo json_encode(array('msg'=>"Success.", 'status'=>"true"));
		}
		else
		{
			echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
		}
	}
	public function view_update_account($nama_account)
	{
		$select_account_get = $this->Data_model->select_account_get($nama_account);
		$data['select_account_get']= $select_account_get->row();
		$this->load->view('adm/update_account',$data);
	}
}