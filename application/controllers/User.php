<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 9/13/2017
 * Time: 1:15 AM
 */
class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('UserModels');

    }

    public function index()
    {
        if(!$this->session->logged_in)
        {
            redirect('../');
        }

        $this->load->model('VenueModels');
        $data["getVenueBooking"] = $this->VenueModels->getVenueBooking($this->session->account_name);
        $data["getVenueFavorit"] = $this->VenueModels->getVenueFavorit($this->session->account_name);
        $data["getVenueLastBooking"] = $this->VenueModels->getVenueLastBooking($this->session->account_name);
        $data["getVenueForReviewBooking"] = $this->VenueModels->getVenueForReviewBooking($this->session->account_name);
        $this->load->view('navbar');
        $this->load->view('user',$data);
    }

    public function forgetpassword()
    {

        $this->load->view('forgetpassword');
    }
    public function register()
    {
        $this->load->view('register');
    }

    public function login()
    {
        $account_email = $this->input->post('account_email');
        $account_password = $this->input->post('account_password');
        $temp_account = $this->UserModels->login($account_email,$account_password);


        if ($temp_account->num_rows() == 1)
        {
            foreach($temp_account->result() as $key)
            {
                $array_items = array(
                    'account_email' => $key->account_email,
                    'account_lastlogin' => $key->account_lastlogin,
                    'account_created' => $key->account_created,
                    'account_name' => $key->account_name,
                    'account_photo' => "upload/account/".$key->account_photo,
                    'account_password' => $key->account_password,
                    'user_fullname' => $key->user_fullname,
                    'user_contact' => $key->user_contact,
                    'user_address' => $key->user_address,
                    'user_country' => $key->user_country,
                    'logged_in' => true
                );
                $this->session->set_userdata($array_items);
            }
            echo json_encode(array('msg'=>"Success.", 'url'=>"", 'status'=>true));
        }
        else
        {
            echo json_encode(array('msg' => "Login Gagal!"));
        }
    }

    public function registeruser()
    {
        date_default_timezone_set('Asia/jakarta');
        $data_register = array(
            'account_name' =>$this->input->post('account_email'),
            'account_password' =>$this->input->post('account_password'),
            'account_created' =>date('Y-m-d H:i:s'),
            'account_role' => empty($this->input->post('s')) ? "1" : $this->input->post('s'),
            'account_email' =>$this->input->post('account_email')
        );
        if($this->UserModels->insert_account($data_register))
        {
            $config = Array(
                'protocol' => 'mail',
                'smtp_host' => 'mail.indovenue.quickxote.com',
                'smtp_port' => 465,
                'smtp_user' => 'support@indovenue.quickxote.com', //isi dengan gmailmu!
                'smtp_pass' => 'support123', //isi dengan password gmailmu!
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

//            $this->email->initialize($config);
            $this->load->library('email', $config);
            $this->email->from('support@indovenue.quickxote.com');
            $this->email->set_newline("\r\n");
            $this->email->to($this->input->post('account_email')); //email tujuan. Isikan dengan emailmu!
            $this->email->subject('Aktivasi Indovenue');
            $this->email->message($this->load->view('indovenue', $data_register, true));
            if($this->email->send()) {
                echo json_encode(array('msg' => "Success.", 'status' => "true"));
            }
        }
        else
        {
            echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
        }
    }

    public function resetpassword2()
    {
        $this->load->view("resetpassword");
    }


    public function resetpassword()
    {
        date_default_timezone_set('Asia/jakarta');

        $account_name = $this->input->post("account_name");
        $isExist = $this->UserModels->select_exist_user($account_name);

        if ($isExist->num_rows() == 1)
        {
            $data = array(
                'account_password' => $this->generateRandomString(6),
            );

            if($this->UserModels->update_account_password($data, $account_name))
            {
                $config = Array(
                    'protocol' => 'mail',
                    'smtp_host' => 'mail.indovenue.quickxote.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'support@indovenue.quickxote.com', //isi dengan gmailmu!
                    'smtp_pass' => 'support123', //isi dengan password gmailmu!
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE
                );

//            $this->email->initialize($config);
                $this->load->library('email', $config);
                $this->email->from('support@indovenue.quickxote.com');
                $this->email->set_newline("\r\n");
                $this->email->to($account_name); //email tujuan. Isikan dengan emailmu!
                $this->email->subject('Atur Ulang Kata Sandi Indovenue');
                $this->email->message($this->load->view('resetpassword', $data, true));
                if($this->email->send()) {
                    echo json_encode(array('msg' => "Success.", 'status' => "true"));
                }
            }
            else
            {
                echo json_encode(array('msg'=>"failed.", 'status'=>"false"));
            }
        }
        else
        {
            echo json_encode(array('msg'=>"Akun anda belum terdaftar.", 'status'=>"false"));
        }
    }

    public function activationuser($account_name)
    {
        $data = array(
            'account_status' =>"1");
        $account_name = array('account_name' => $account_name);

        $this->UserModels->update_account($data,$account_name);
        $this->UserModels->insert_account_user($account_name);

        redirect("../");
    }

    public function updateuser($account_name)
    {
        $data = array(
            'user_fullname' =>$this->input->post('user_fullname'),
            'user_contact' =>$this->input->post('user_contact'),
            'user_address' =>$this->input->post('user_address'),
            'user_country' =>$this->input->post('user_country')
        );

        if(  $this->UserModels->update_account_user($data,$account_name))
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Ubah Data Berhasil</div>');
            $this->session->set_userdata($data);
            redirect('../user');
        }
        else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Ubah Data Gagal</div>');
            redirect('../user');
        }
    }

    public function updateaccountpassword($account_name)
    {
        $oldpassword = $this->input->post('oldpassword');
        $newpassword = $this->input->post('newpassword');

        $data = array(
            'account_password' => $newpassword
        );

        if($oldpassword == $this->session->account_password) {

            if ($this->UserModels->update_account_password($data, $account_name)) {
                $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Ubah Data Berhasil</div>');
                $this->session->set_userdata("account_password",$newpassword);
                redirect('../user');
            } else {
                $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Ubah Data Gagal</div>');
                redirect('../user');
            }
        }
        else
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Password lama anda tidak cocok</div>');
            redirect('../user');
        }
    }

    public function addfavoriteroom()
    {
        $data = array(
            'account_name' =>$this->input->post("account_name"),
            'id_room' =>$this->input->post("id_room")
        );

        if($this->session->logged_in)
        {
            if ($this->UserModels->add_favorite_room($data))
            {
                echo json_encode(array('msg' => "Telah ditambahkan ke favorit anda.", 'status' => "true"));
            }
            else
            {
                echo json_encode(array('msg' => "Sudah ada difavorit anda.", 'status' => "false"));
            }
        }
        else
        {
            echo json_encode(array('msg' => "Silahkan anda login terlebih dahulu.", 'status' => "false"));
        }
    }

    public function deletefavoriteroom()
    {
        $data = array(
            'account_name' =>$this->input->post("account_name"),
            'id_room' =>$this->input->post("id_room")
        );

        if($this->session->logged_in)
        {
            if ($this->UserModels->delete_favorite_room($data))
            {
//             $this->load->model('VenueModels');
//             $model['getVenueFavorit'] = $this->VenueModels->getVenueFavorit($this->session->account_name);
//             $result = $this->load->view('favoritevenue', $model);
                echo json_encode(array('msg' => "Berhasil dihapus pada favorit anda.", 'status' => "true"));
//             echo json_encode($result);
            }
            else
            {
                echo json_encode(array('msg' => "Terjadi kesalahan saat menghapus favorit anda.", 'status' => "false"));
            }
        }
        else
        {
            echo json_encode(array('msg' => "Silahkan anda login terlebih dahulu.", 'status' => "false"));
        }
    }

    public function booking()
    {
        date_default_timezone_set('Asia/jakarta');
        $id_max = "";
        $max = $this->UserModels->select_booking_master();
        foreach($max->result() as $key)
        {
            $id_max = $key->id_booking;
        }

        $nourut = (int) substr($id_max, 3,7);

        $id_booking = "INV" .sprintf('%06s', $nourut + 1);
        $data = array(
        'id_booking' => $id_booking,
        'id_room' =>$this->input->post("id_room"),
        'booking_price' =>$this->input->post("booking_price"),
        'booking_start' =>$this->input->post("booking_start"),
        'booking_end' =>$this->input->post("booking_end"),
        'booking_createdate' => date("Y-m-d H:i:s"),
        'activity_name' =>$this->input->post("activity_name"),
        'account_name' =>$this->input->post("account_name"),
        'account_email' =>$this->input->post("account_email"),
        'account_contact' =>$this->input->post("account_contact")
    );

        $datas = array(
            'id_booking' => $id_booking,
            'booking_status' =>0,
            'booking_description' =>$this->input->post("booking_description")
        );

        if($this->UserModels->add_booking_master($data) && $this->UserModels->add_booking_details($datas))
        {
            echo json_encode(array('msg' => "Anda berhasil memesan ruangan ini, Silahkan membayar DP terlebih dahulu.", 'status' => "true"));
        }
        else
        {
            echo json_encode(array('msg' => "Gagal memesan.", 'status' => "false"));
        }
    }

    public function addroomrating()
    {
        $data = array(
            'id_room' =>$this->input->post("id_room"),
            'id_booking' =>$this->input->post("id_booking"),
            'account_name' => $this->session->account_name,
            'rating_value' =>$this->input->post("rating_value"),
            'rating_description' =>$this->input->post("rating_description"),
        );

        if($this->session->logged_in)
        {
            if ($this->UserModels->add_room_rating($data))
            {
                echo json_encode(array('msg' => "Terima kasih atas review anda terhadap venue ini.", 'status' => "true"));
            }
            else
            {
                echo json_encode(array('msg' => "Sudah anda review!.", 'status' => "false"));
            }
        }
        else
        {
            echo json_encode(array('msg' => "Silahkan anda login terlebih dahulu.", 'status' => "false"));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('../');
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
