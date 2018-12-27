<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModels extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function login($account_email,$account_password)
    {
        $this->db->select('*');
        $this->db->from('account');
        $this->db->join('user', 'account.account_name = user.account_name');
        $this->db->where('account_email', $account_email);
        $this->db->where('account_password', $account_password);
        $this->db->where('account_role', 1);
        $this->db->where('account_status', 1);

        return $this->db->get();
    }

    function insert_account($data)
    {
        return $this->db->insert('account',$data);
    }

    function update_account($data,$account_name)
    {
//        $this->db->where('account_name',$account_name);
        return $this->db->update('account',$data, $account_name);
    }
    function update_account_password($data,$account_name)
    {
//        $this->db->where('account_name',$account_name);
        return $this->db->update('account',$data,array("account_name" => $account_name));
    }
    function update_account_user($data,$account_name)
    {
//        $this->db->where('account_name',$account_name);
        return $this->db->update('user',$data,array("account_name" => $account_name));
    }

    function insert_account_user($data)
    {
        return $this->db->insert('user',$data);
    }

    function add_favorite_room($data)
    {
        return $this->db->insert('favorit_room_account',$data);
    }
    function delete_favorite_room($data)
    {

        return $this->db->delete('favorit_room_account',array( "account_name" => $data['account_name'], "id_room" => $data['id_room']));
    }

    function select_booking_master()
    {
        $this->db->from('booking_master');
        return $this->db->get();
    }

    function add_booking_master($data)
    {
        return $this->db->insert('booking_master',$data);
    }

    function add_booking_details($data)
    {
        return $this->db->insert('booking_details',$data);
    }


    function add_room_rating($data)
    {
        return $this->db->insert('room_rating',$data);
    }


    function select_exist_user($account_email)
    {
        $this->db->select('*');
        $this->db->from('account');
        $this->db->join('user', 'account.account_name = user.account_name');
        $this->db->where('account_email', $account_email);
        $this->db->where('account_role', 1);
        $this->db->where('account_status', 1);

        return $this->db->get();
    }
}