<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {

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
		$this->load->view('adm/tables-booking-master');
	}
	public function view_booking_master()
	{
		$select_booking_master= $this->Data_model->select_booking_master();
		$data= $select_booking_master->result();
		echo json_encode($data);
	}
	public function add_detail_booking()
	{
		$data = array(
                  'id_booking' =>$this->input->post('id_booking'),
                  'booking_status' =>$this->input->post('status_booking'),
                  'booking_description' =>$this->input->post('booking_description')

            );
		$account_name = $this->input->post('account_name');

		$select_account = $this->Data_model->select_account_get($account_name);

		$row = $select_account->row();

		$account_email = $row->account_email;

		if($this->Data_model->insert_booking_detail($data))
		{
			$config = Array(
		      'protocol' => 'mail',
		      'smtp_host' => 'mail.indovenue.net',
		      'smtp_port' => 465,
		      'smtp_user' => 'support@indovenue.net', //isi dengan gmailmu!
		      'smtp_pass' => 'support123', //isi dengan password gmailmu!
		      'mailtype' => 'html',
		      'charset' => 'iso-8859-1',
		      'wordwrap' => TRUE
		    );

//            $this->email->initialize($config);
            $this->load->library('email', $config);
            $this->email->from('support@indovenue.com');
            $this->email->set_newline("\r\n");
            $this->email->to($account_email); //email tujuan. Isikan dengan emailmu!
            $this->email->subject('Pemesanan Indovenue');
            $this->email->message($this->load->view('indovenue', $data, true));
			redirect("/adm/Booking");
			//echo json_encode(array('msg'=>"Success.", 'status'=>"true"));
		}
		else
		{
			//echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
		}
	}

    public function canceled_booking()
    {
        $id_booking = $this->input->post('id_booking');

        $account_name = $this->input->post('account_name');

        $select_account = $this->Data_model->select_account_get($account_name);

        $row = $select_account->row();

        $account_email = $row->account_email;

        if($this->Data_model->canceled_booking($id_booking))
        {
            $config = Array(
		      'protocol' => 'mail',
		      'smtp_host' => 'mail.indovenue.net',
		      'smtp_port' => 465,
		      'smtp_user' => 'support@indovenue.net', //isi dengan gmailmu!
		      'smtp_pass' => 'support123', //isi dengan password gmailmu!
		      'mailtype' => 'html',
		      'charset' => 'iso-8859-1',
		      'wordwrap' => TRUE
		    );

//            $this->email->initialize($config);
            $this->load->library('email', $config);
            $this->email->from('support@indovenue.com');
            $this->email->set_newline("\r\n");
            $this->email->to($account_email); //email tujuan. Isikan dengan emailmu!
            $this->email->subject('Pemesanan Indovenue');
            $this->email->message("Mohon Maaf untuk Nomor Pemesanan ".$this->input->post('id_booking')." Kami batalkan");
            echo json_encode(array('msg'=>"Berhasil dibatalkan.", 'status'=>"true"));
        }
        else{
            echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
        }
    }
}