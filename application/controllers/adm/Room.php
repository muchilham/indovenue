<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Room extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')!=true)
		{
			redirect('');
		}

		$this->load->helper(array('url','form'));
		$this->load->library('session');
		$this->load->model('adm/Data_model');
	}

	public function room_area()
	{
		$this->load->view('adm/tables-room-area');
	}
	public function view_room_area()
	{
		$select_room_area = $this->Data_model->select_room_area();
		$data= $select_room_area->result();
		echo json_encode($data);
	}
	public function room_master()
	{
		$this->load->view('adm/tables-room-master');
	}
	public function view_room_master()
	{
		$select_room_master = $this->Data_model->select_room_master_aktif();
		$data= $select_room_master->result();
		echo json_encode($data);
	}
	public function view_room_detail()
	{
		$select_room_detail = $this->Data_model->select_room_detail();
		$data= $select_room_detail->result();
		echo json_encode($data);
	}
	public function room_type()
	{
		$this->load->view('adm/tables-room-type');
	}
	public function view_room_type()
	{
		$select_room_type = $this->Data_model->select_room_type();
		$data= $select_room_type->result();
		echo json_encode($data);
	}
	public function add_room_area()
	{
		$this->load->view('adm/add-room-area');
	}
	public function add_data_area()
	{
		$data = array(
                  'room_area_name' =>$this->input->post('room_area_name')
            );
		if($this->Data_model->insert_room_area($data))
		{
			echo json_encode(array('msg'=>"Success.", 'status'=>"true"));
		}
		else
		{
			echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
		}
	}
	public function add_room_type()
	{
		$this->load->view('adm/add-room-type');
	}
	public function add_data_type()
	{
		$data = array(
                  'room_type_name' =>$this->input->post('room_type_name')
            );
		if($this->Data_model->insert_room_type($data))
		{
			echo json_encode(array('msg'=>"Success.", 'status'=>"true"));
		}
		else
		{
			echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
		}
	}
	public function add_room_master()
	{
		$data['select_room_type'] = $this->Data_model->select_room_type();
		$data['select_room_area'] = $this->Data_model->select_room_area();
		$data['select_activity_type'] = $this->Data_model->select_activity_type();

		$this->load->view('adm/add-room-master',$data);
	}
	public function delete_room_area()
	{
		$room_area = $this->input->post('room_area');
		if($this->Data_model->delete_room_area($room_area))
		{
			echo json_encode(array('msg'=>"Success.", 'status'=>"true"));
		}
		else
		{
			echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
		}
	}
	public function delete_room_type()
	{
		$room_type = $this->input->post('room_type');
		if($this->Data_model->delete_room_type($room_type))
		{
			echo json_encode(array('msg'=>"Success.", 'status'=>"true"));
		}
		else
		{
			echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
		}
	}

	public function add_data_master()
	{
		date_default_timezone_set('Asia/jakarta');
        $id_max = "";
		$max = $this->Data_model->select_room_master();
		foreach($max->result() as $key)
		{
			$id_max = $key->id_room;
		}

		$nourut = (int) substr($id_max, 3, 7);

		$id_room = "KRM" .sprintf('%06s', $nourut + 1);

		$data_room_master = array(
			'id_room'   => $id_room,
			'room_name' => $this->input->post('room_name'),
			'room_area' => $this->input->post('room_area'),
			'room_type' => $this->input->post('room_type'),
			'room_address' => $this->input->post('room_address'),
			'room_description' => $this->input->post('room_description'),
			'room_lat' => $this->input->post('room_lat'),
			'room_lon' => $this->input->post('room_lon'),
			'room_createdate' => date('Y-m-d H:i:s'),
			'room_favorit' => $this->input->post('room_favorit'),
			'room_discount' => $this->input->post('demo1'),
			'room_capacity' => $this->input->post('room_capacity')
			);
		$this->Data_model->insert_room_master($data_room_master);

		$type_harga = $this->input->post('harga');
		$detail_name = $this->input->post('detail_name');
		$detail_value_harga = $this->input->post('detail_value_harga');
		$detail_description = $this->input->post('detail_description');

		foreach ($detail_name as $key => $value) {
			$data_harga = array(

                    'id_room'   => $id_room,
                    'details_type' => $type_harga,
                    'details_name' => $detail_name[$key],
                    'details_value' => $detail_value_harga[$key],
                    'details_description' => $detail_description[$key]
                );
			$this->Data_model->insert_room_details($data_harga);	
		}

		$type_fasilitas = $this->input->post('fasilitas');
		$detail_value_fasilitas = $this->input->post('detail_value_fasilitas');

        $dataInfo = array();
        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['file_fasilitas']['name']);
        for($i=0; $i<$cpt; $i++)
        {
            $_FILES['file_fasilitas']['name']= $files['file_fasilitas']['name'][$i];
            $_FILES['file_fasilitas']['type']= $files['file_fasilitas']['type'][$i];
            $_FILES['file_fasilitas']['tmp_name']= $files['file_fasilitas']['tmp_name'][$i];
            $_FILES['file_fasilitas']['error']= $files['file_fasilitas']['error'][$i];
            $_FILES['file_fasilitas']['size']= $files['file_fasilitas']['size'][$i];

            $config = array();
            $config['upload_path']          = './upload/fasilitas';
            $config['max_size']                 = 0;
            $config['max_width']              = 0;
            $config['max_height']             = 0;
            $config['encrypt_name'] 		= TRUE;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['overwrite']     = FALSE;
            $config['file_name']			= $_FILES['file_fasilitas']['name'];

            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('file_fasilitas'))
            {
               echo json_encode(array('Error' => $this->upload->display_errors()));
            }
            else
            {
                array_push($dataInfo,$this->upload->data('file_name'));
            }
        }

		 foreach ($detail_value_fasilitas as $key => $value) {

		 	$data_fasilitas = array(

                     'id_room'   => $id_room,
                     'details_type' => $type_fasilitas,
                     'details_value' => $detail_value_fasilitas[$key],
                     'details_icon' => $dataInfo[$key]
                 );
//		 	echo json_encode($data_fasilitas);
		 	$this->Data_model->insert_room_details($data_fasilitas);
		 }

		 $type_jenis_kegiatan = $this->input->post('jenis_kegiatan');
		 $detail_value_kegiatan = $this->input->post('detail_value_kegiatan');

		 foreach ($detail_value_kegiatan as $key => $value) {
		 	$data_kegiatan = array(

                     'id_room'   => $id_room,
                     'details_type' => $type_jenis_kegiatan,
                     'details_value' => $detail_value_kegiatan[$key]
                 );
		 	$this->Data_model->insert_room_details($data_kegiatan);
		 }

		 $type_lainlain = $this->input->post('lain_lain');
		 $detail_value_lainlain = $this->input->post('detail_value_lainlain');

        $dataInfo = array();
        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['file_lainlain']['name']);
        for($i=0; $i<$cpt; $i++)
        {
            $_FILES['file_lainlain']['name']= $files['file_lainlain']['name'][$i];
            $_FILES['file_lainlain']['type']= $files['file_lainlain']['type'][$i];
            $_FILES['file_lainlain']['tmp_name']= $files['file_lainlain']['tmp_name'][$i];
            $_FILES['file_lainlain']['error']= $files['file_lainlain']['error'][$i];
            $_FILES['file_lainlain']['size']= $files['file_lainlain']['size'][$i];

            $config = array();
            $config['upload_path']          = './upload/lainlain';
            $config['max_size']                 = 0;
            $config['max_width']              = 0;
            $config['max_height']             = 0;
            $config['encrypt_name'] 		= TRUE;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['overwrite']     = FALSE;
            $config['file_name']			= $_FILES['file_lainlain']['name'];

            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('file_lainlain'))
            {
                echo json_encode(array('Error' => $this->upload->display_errors()));
            }
            else
            {
                array_push($dataInfo,$this->upload->data('file_name'));
            }
        }

        foreach ($detail_value_lainlain as $key => $value) {

            $data_lainlain = array(
                'id_room'   => $id_room,
                'details_type' => $type_lainlain,
                'details_value' => $detail_value_lainlain[$key],
                'details_icon' => $dataInfo[$key]
            );
//            echo json_encode($data_lainlain);
            $this->Data_model->insert_room_details($data_lainlain);
        }

        $dataInfo = array();
        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['file_room']['name']);
        for($i=0; $i<$cpt; $i++)
        {
            $_FILES['file_room']['name']= $files['file_room']['name'][$i];
            $_FILES['file_room']['type']= $files['file_room']['type'][$i];
            $_FILES['file_room']['tmp_name']= $files['file_room']['tmp_name'][$i];
            $_FILES['file_room']['error']= $files['file_room']['error'][$i];
            $_FILES['file_room']['size']= $files['file_room']['size'][$i];

            $config = array();
            $config['upload_path']          = './upload/room';
            $config['max_size']                 = 100000;
            $config['max_width']              = 0;
            $config['max_height']             = 0;
            $config['encrypt_name'] 		= TRUE;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['overwrite']     = FALSE;
            $config['file_name']			= $_FILES['file_room']['name'];

            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('file_room'))
            {
                echo json_encode(array('Error' => $this->upload->display_errors()));
            }
            else
            {
                array_push($dataInfo,$this->upload->data('file_name'));
            }
        }

        foreach ($dataInfo as $key => $value) {

            $data_room = array(
                'id_room'   => $id_room,
                'details_type' => "5",
                'details_icon' => $dataInfo[$key]
            );
//            echo json_encode($data_room);
            $insert = $this->Data_model->insert_room_details($data_room);
        }

        if($insert)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Add Data Success</div>');
            redirect('adm/Room/add_room_master');
        }
        else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Add Data Failed</div>');
            redirect('adm/Room/add_room_master');
        }
//
//		 foreach ($detail_value_lainlain as $key => $value) {
//		 	$data_lainlain = array(
//
//                     'id_room'   => $id_room,
//                     'details_type' => $type_lainlain,
//                     'details_value' => $detail_value_lainlain[$key],
//                     'details_icon' => Test
//                 );
//		 	$insert = $this->Data_model->insert_room_details($data_lainlain);
//		 }
//
//		 if($insert)
//		 {
//		 	echo json_encode(array('msg'=>"Success.", 'status'=>"true"));
//		 }
//		 else
//		 {
//		 	echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
//		 }
	}

	public function view_update_room_area($id_room_area)
	{
		$select_room_area_get = $this->Data_model->select_room_area_get($id_room_area);
		$data['select_room_area_get']= $select_room_area_get->row();
		$this->load->view('adm/update_room_area',$data);
	}

	public function update_data_area($id_room_area)
	{
		$data = array(
                  'room_area_name' =>$this->input->post('room_area_name')
            );

            if($this->Data_model->update_room_area($id_room_area,$data))
            {
				echo json_encode(array('msg'=>"Success.", 'status'=>"true"));
			}
			else
			{
				echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
			}
	}

	public function view_update_room_type($id_room_type)
	{
		$select_room_type_get = $this->Data_model->select_room_type_get($id_room_type);
		$data['select_room_type_get']= $select_room_type_get->row();
		$this->load->view('adm/update_room_type',$data);
	}

	public function update_data_type($id_room_type)
	{
		$data = array(
                  'room_type_name' =>$this->input->post('room_type_name')
            );

            if($this->Data_model->update_room_type($id_room_type,$data))
            {
				echo json_encode(array('msg'=>"Success.", 'status'=>"true"));
			}
			else
			{
				echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
			}
	}

	public function delete_room_master()
	{
		$id_room_master = $this->input->post('room_master');
		$data = array(
                  'room_status' => 0
            );

            if($this->Data_model->update_room_master($id_room_master,$data))
            {
				echo json_encode(array('msg'=>"Success.", 'status'=>"true"));
			}
			else
			{
				echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
			}
	}

	public function view_update_room_master($id_room)
	{
		$select_room_master = $this->Data_model->select_room_master_get($id_room);
		$select_room_details = $this->Data_model->select_room_details_get($id_room);

		$data['select_room_type'] = $this->Data_model->select_room_type();
		$data['select_room_area'] = $this->Data_model->select_room_area();
		$data['select_activity_type'] = $this->Data_model->select_activity_type();
		$data['select_room_master']= $select_room_master->row();
		$data['select_room_details']= $select_room_details->result();
		$this->load->view('adm/update_room_master',$data);
	}
public function update_data_master($id_room)
	{
		date_default_timezone_set('Asia/jakarta');

		$data_room_master = array(
			'id_room'   => $id_room,
			'room_name' => $this->input->post('room_name'),
			'room_area' => $this->input->post('room_area'),
			'room_type' => $this->input->post('room_type'),
			'room_address' => $this->input->post('room_address'),
			'room_description' => $this->input->post('room_description'),
			'room_lat' => $this->input->post('room_lat'),
			'room_lon' => $this->input->post('room_lon'),
			'room_createdate' => date('Y-m-d H:i:s'),
			'room_favorit' => $this->input->post('room_favorit'),
			'room_discount' => $this->input->post('demo1'),
			'room_capacity' => $this->input->post('room_capacity')
			);
		$this->Data_model->update_room_master($id_room,$data_room_master);

		// $select_room_details = $this->Data_model->select_room_details_get($id_room);
		// $result = $select_room_details->result();
		// foreach ($result as $key) {
		// 	if($key->details_type == '2')
		// 	{
		// 		// $path = base_url().'/upload/fasilitas'.$key->details_icon;
		// 		unlink(base_url("upload/fasilitas/".$key->details_icon ));
		// 	}
		// 	else if($key->details_type == '4')
		// 	{
		// 		unlink("./upload/lainlain/$key->details_icon");
		// 	}
		// 	else if($key->details_type == '5')
		// 	{
		// 		unlink("./upload/room/$key->details_icon");
		// 	}
		// }

		$this->Data_model->delete_room_details($id_room);

		$type_harga = $this->input->post('harga');
		$detail_name = $this->input->post('detail_name');
		$detail_value_harga = $this->input->post('detail_value_harga');
		$detail_description = $this->input->post('detail_description');

		foreach ($detail_name as $key => $value) {
			$data_harga = array(

                    'id_room'   => $id_room,
                    'details_type' => $type_harga,
                    'details_name' => $detail_name[$key],
                    'details_value' => $detail_value_harga[$key],
                    'details_description' => $detail_description[$key]
                );
			$this->Data_model->insert_room_details($data_harga);	
		}

		$type_fasilitas = $this->input->post('fasilitas');
		$detail_value_fasilitas = $this->input->post('detail_value_fasilitas');

		if ($this->input->post('file_fasilitas')) {
			$dataInfo = $this->input->post('file_fasilitas');
		}
		else{
			$dataInfo = array();
		}

        
        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['file_fasilitas']['name']);
        for($i=0; $i<$cpt; $i++)
        {
            $_FILES['file_fasilitas']['name']= $files['file_fasilitas']['name'][$i];
            $_FILES['file_fasilitas']['type']= $files['file_fasilitas']['type'][$i];
            $_FILES['file_fasilitas']['tmp_name']= $files['file_fasilitas']['tmp_name'][$i];
            $_FILES['file_fasilitas']['error']= $files['file_fasilitas']['error'][$i];
            $_FILES['file_fasilitas']['size']= $files['file_fasilitas']['size'][$i];

            $config = array();
            $config['upload_path']          = './upload/fasilitas';
            $config['max_size']                 = 0;
            $config['max_width']              = 0;
            $config['max_height']             = 0;
            $config['encrypt_name'] 		= TRUE;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['overwrite']     = TRUE;
            $config['file_name']			= $_FILES['file_fasilitas']['name'];

            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('file_fasilitas'))
            {
               echo json_encode(array('Error' => $this->upload->display_errors()));
            }
            else
            {
                array_push($dataInfo,$this->upload->data('file_name'));
            }
        }

		 foreach ($detail_value_fasilitas as $key => $value) {

		 	$data_fasilitas = array(

                     'id_room'   => $id_room,
                     'details_type' => $type_fasilitas,
                     'details_value' => $detail_value_fasilitas[$key],
                     'details_icon' => $dataInfo[$key]
                 );
//		 	echo json_encode($data_fasilitas);
		 	$this->Data_model->insert_room_details($data_fasilitas);
		 }

		 $type_jenis_kegiatan = $this->input->post('jenis_kegiatan');
		 $detail_value_kegiatan = $this->input->post('detail_value_kegiatan');

		 foreach ($detail_value_kegiatan as $key => $value) {
		 	$data_kegiatan = array(

                     'id_room'   => $id_room,
                     'details_type' => $type_jenis_kegiatan,
                     'details_value' => $detail_value_kegiatan[$key]
                 );
		 	$this->Data_model->insert_room_details($data_kegiatan);
		 }

		 $type_lainlain = $this->input->post('lain_lain');
		 $detail_value_lainlain = $this->input->post('detail_value_lainlain');
		 if ($this->input->post('file_lainlain')) {
			$dataInfo = $this->input->post('file_lainlain');
		}
		else{
			$dataInfo = array();
		}

        // $dataInfo = array();
        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['file_lainlain']['name']);
        for($i=0; $i<$cpt; $i++)
        {
            $_FILES['file_lainlain']['name']= $files['file_lainlain']['name'][$i];
            $_FILES['file_lainlain']['type']= $files['file_lainlain']['type'][$i];
            $_FILES['file_lainlain']['tmp_name']= $files['file_lainlain']['tmp_name'][$i];
            $_FILES['file_lainlain']['error']= $files['file_lainlain']['error'][$i];
            $_FILES['file_lainlain']['size']= $files['file_lainlain']['size'][$i];

            $config = array();
            $config['upload_path']          = './upload/lainlain';
            $config['max_size']                 = 0;
            $config['max_width']              = 0;
            $config['max_height']             = 0;
            $config['encrypt_name'] 		= TRUE;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['overwrite']     = FALSE;
            $config['file_name']			= $_FILES['file_lainlain']['name'];

            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('file_lainlain'))
            {
                echo json_encode(array('Error' => $this->upload->display_errors()));
            }
            else
            {
                array_push($dataInfo,$this->upload->data('file_name'));
            }
        }

        foreach ($detail_value_lainlain as $key => $value) {

            $data_lainlain = array(
                'id_room'   => $id_room,
                'details_type' => $type_lainlain,
                'details_value' => $detail_value_lainlain[$key],
                'details_icon' => $dataInfo[$key]
            );
//            echo json_encode($data_lainlain);
            $this->Data_model->insert_room_details($data_lainlain);
        }

        if ($this->input->post('file_room')) {
			$dataInfo = $this->input->post('file_room');
		}
		else{
			$dataInfo = array();
		}
        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['file_room']['name']);
        for($i=0; $i<$cpt; $i++)
        {
            $_FILES['file_room']['name']= $files['file_room']['name'][$i];
            $_FILES['file_room']['type']= $files['file_room']['type'][$i];
            $_FILES['file_room']['tmp_name']= $files['file_room']['tmp_name'][$i];
            $_FILES['file_room']['error']= $files['file_room']['error'][$i];
            $_FILES['file_room']['size']= $files['file_room']['size'][$i];

            $config = array();
            $config['upload_path']          = './upload/room';
            $config['max_size']                 = 100000;
            $config['max_width']              = 0;
            $config['max_height']             = 0;
            $config['encrypt_name'] 		= TRUE;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['overwrite']     = FALSE;
            $config['file_name']			= $_FILES['file_room']['name'];

            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('file_room'))
            {
                echo json_encode(array('Error' => $this->upload->display_errors()));
            }
            else
            {
                array_push($dataInfo,$this->upload->data('file_name'));
            }
        }

        foreach ($dataInfo as $key => $value) {

            $data_room = array(
                'id_room'   => $id_room,
                'details_type' => "5",
                'details_icon' => $dataInfo[$key]
            );
//            echo json_encode($data_room);
            $insert = $this->Data_model->insert_room_details($data_room);
        }

        if($insert)
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Update Data Success</div>');
            redirect('adm/Room/view_update_room_master/'.$id_room);
        }
        else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Update Data Failed</div>');
            redirect('adm/Room/view_update_room_master/'.$id_room);
        }
//
//		 foreach ($detail_value_lainlain as $key => $value) {
//		 	$data_lainlain = array(
//
//                     'id_room'   => $id_room,
//                     'details_type' => $type_lainlain,
//                     'details_value' => $detail_value_lainlain[$key],
//                     'details_icon' => Test
//                 );
//		 	$insert = $this->Data_model->insert_room_details($data_lainlain);
//		 }
//
//		 if($insert)
//		 {
//		 	echo json_encode(array('msg'=>"Success.", 'status'=>"true"));
//		 }
//		 else
//		 {
//		 	echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
//		 }
	}

	public function detail_room_master($id_room)
	{
		$select_room_master= $this->Data_model->select_room_master_get($id_room);
		$select_room_details= $this->Data_model->select_room_details_get($id_room);

		$data['select_room_master'] = $select_room_master->row();
		$data['select_room_details'] = $select_room_details->result();

		echo json_encode($data);
	}
}