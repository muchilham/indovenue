<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	// Select Query
	function login($account_name,$account_password)
	{
		$this->db->select('*');
		$this->db->from('account');
		$this->db->where('account_name', $account_name);
		$this->db->where('account_password', $account_password);
		$this->db->where('account_role', '0');

		return $this->db->get();
	}
	function select_account()
	{
		$this->db->select('*');
		$this->db->from('account');

		return $this->db->get();
	}
	function select_account_get($nama_account)
	{
		$this->db->from('account');
		$this->db->where('account_name', $nama_account);

		return $this->db->get();
	}
	function select_activity_type()
	{
		$this->db->select('*');
		$this->db->from('activity_type');

		return $this->db->get();
	}
	function select_activity_get($id_activity)
	{
		$this->db->from('activity_type');
		$this->db->where('id_activity', $id_activity);

		return $this->db->get();
	}
	function select_room_area()
	{
		$this->db->select('*');
		$this->db->from('room_area');

		return $this->db->get();
	}
	function select_room_area_get($id_room_area)
	{
		$this->db->from('room_area');
		$this->db->where('id_room_area', $id_room_area);

		return $this->db->get();
	}
	function select_room_detail()
	{
		$this->db->select('*');
		$this->db->from('room_details');

		return $this->db->get();
	}
	function select_room_details_get($id_room)
	{
		$this->db->from('room_details');
		$this->db->where('id_room', $id_room);

		return $this->db->get();
	}
	function select_room_master()
	{
		$this->db->from('room_master');
		return $this->db->get();
	}
	function select_room_master_get($id_room)
	{
		$this->db->from('room_master');
		$this->db->where('id_room', $id_room);

		return $this->db->get();
	}
	function select_room_master_aktif()
	{

		$this->db->where('room_status',1);
		$this->db->from('room_master');

		return $this->db->get();
	}
	function select_room_type()
	{
		$this->db->select('*');
		$this->db->from('room_type');

		return $this->db->get();
	}
	function select_room_type_get($id_room_type)
	{
		$this->db->from('room_type');
		$this->db->where('id_room_type', $id_room_type);

		return $this->db->get();
	}
	function insert_account($data)
	{
		return $this->db->insert('account',$data);
	}
	function insert_activity_type($data)
	{
		return $this->db->insert('activity_type',$data);
	}
	function insert_room_area($data)
	{
		return $this->db->insert('room_area',$data);
	}
	function insert_room_type($data)
	{
		return $this->db->insert('room_type',$data);
	}
	// function select_booking_master()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('booking_master');

	// 	return $this->db->get();
	// }
	function select_booking_master()
	{
//		$query = "SELECT
//					DISTINCT
//					a.`id_booking`,
//					a.`id_room`,
//					a.`booking_start`,
//					a.`booking_end`,
//					a.`booking_createdate`,
//					a.`account_name`,
//					COUNT(b.`id_details`) as count
//					FROM
//					`booking_master` AS a INNER JOIN
//					`booking_details` AS b ON a.`id_booking` = b.`id_booking`";
//
//		return $this->db->query($query);

        $this->db->select("a.*, (case when b.count is null then 0 else b.count end) as count");
        $this->db->from("( select 
                                    a.* 
                                 from
                                 `booking_master` AS a 
                                ) as a");
        $this->db->join("(  select
                                    a.id_booking,
                                    count(b.id_booking) as count
                                  from
                                  `booking_master` AS a INNER JOIN 
                                  `booking_details` AS b 
                                  ON a.`id_booking` = b.id_booking
                                  GROUP by b.id_booking
                                ) as b",'a.id_booking = b.id_booking','left');
        return $this->db->get();
	}
	function insert_booking_detail($data)
	{
		return $this->db->insert('booking_details',$data);
	}
	function delete_account($account_name)
	{
		$this->db->where('account_name',$account_name);
		return $this->db->delete('account');
	}
	function delete_activity_type($id_activity)
	{
		$this->db->where('id_activity',$id_activity);
		return $this->db->delete('activity_type');
	}
	function delete_room_area($id_room_area)
	{
		$this->db->where('id_room_area',$id_room_area);
		return $this->db->delete('room_area');
	}
	function delete_room_details($id_room_details)
	{
		$this->db->where('id_room',$id_room_details);
		return $this->db->delete('room_details');
	}
	function delete_room_type($id_room_type)
	{
		$this->db->where('id_room_type',$id_room_type);
		return $this->db->delete('room_type');
	}
	function insert_room_master($data)
	{
		return $this->db->insert('room_master',$data);
	}
	function insert_room_details($data)
	{
		return $this->db->insert('room_details',$data);
	}
	function update_account($account_name,$data)
	{
		$this->db->where('account_name',$account_name);
		return $this->db->update('account', $data);
	}
	function update_activity_type($id_activity,$data)
	{
		$this->db->where('id_activity',$id_activity);
		return $this->db->update('activity_type', $data);
	}
	function update_room_area($id_room_area,$data)
	{
		$this->db->where('id_room_area',$id_room_area);
		return $this->db->update('room_area', $data);
	}
	function update_room_type($id_room_type,$data)
	{
		$this->db->where('id_room_type',$id_room_type);
		return $this->db->update('room_type', $data);
	}
	function update_room_master($id_room_master,$data)
	{
		$this->db->where('id_room',$id_room_master);
		return $this->db->update('room_master', $data);
	}

    function canceled_booking($id_booking)
    {
        $this->db->where('id_booking',$id_booking);
        return $this->db->delete('booking_details');
    }

}
