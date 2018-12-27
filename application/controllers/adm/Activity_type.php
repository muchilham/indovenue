<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity_type extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')!=true)
		{
			redirect('adm');
		}
		$this->load->library('session');
		$this->load->model('adm/Data_model');
	}

	public function index()
	{
		$this->load->view('adm/tables-activity-type');
	}
	public function view_table_activity_type()
	{
		$select_activity_type = $this->Data_model->select_activity_type();
		$data= $select_activity_type ->result();
		echo json_encode($data);
	}
	public function add_activity_type()
	{
		$this->load->view('adm/add-activity-type');
	}
	public function add_data()
	{
		$data = array(
                  'activity_name' =>$this->input->post('activity_name')
            );
		if($this->Data_model->insert_activity_type($data))
		{
			echo json_encode(array('msg'=>"Success.", 'status'=>"true"));
		}
		else
		{
			echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
		}
	}
	public function delete_activity_type()
	{
		$activity_type = $this->input->post('activity_type');
		if($this->Data_model->delete_activity_type($activity_type))
		{
			echo json_encode(array('msg'=>"Success.", 'status'=>"true"));
		}
		else
		{
			echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
		}
	}
	public function view_update_activity($id_activity)
	{
		$select_activity_get = $this->Data_model->select_activity_get($id_activity);
		$data['select_activity_get']= $select_activity_get->row();
		$this->load->view('adm/update_activity_type',$data);
	}
	public function update_data($id_activity)
	{
		$data = array(
                  'activity_name' =>$this->input->post('activity_name')
            );

            if($this->Data_model->update_activity_type($id_activity,$data))
            {
				echo json_encode(array('msg'=>"Success.", 'status'=>"true"));
			}
			else
			{
				echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
			}
	}
}