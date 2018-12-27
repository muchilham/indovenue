<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 9/19/2017
 * Time: 11:34 PM
 */

class VenueModels extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function favoritVenue()
    {
        $this->db->select(" 
                                            a.*,
                                            CONCAT(b.harga) AS harga,
                                            CONCAT(c.photo) AS photo");
        $this->db->from("
                                            (
                                        SELECT
                                            a.`id_room`,
                                            a.`room_name`,
                                            a.`room_type`,
                                            a.`room_area`,
                                            a.`room_discount`,
                                            a.`room_capacity`,
                                            a.`room_description`,
                                            a.`room_favorit`,
                                            a.`room_status`
                                        FROM `room_master` AS a
                                    )  a");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            CONCAT(b.`details_value`) AS harga
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 1
                                        GROUP BY b.`id_room`	
                                    ) b", "a.id_room = b.id_room", "inner");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            CONCAT(b.`details_icon`) AS photo
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 5
                                        GROUP BY b.`id_room`	
                                    ) c","a.id_room = c.id_room", "inner");
        $this->db->join("(
                                        SELECT id_room FROM
                                            (
                                                SELECT id_room, COUNT(*) AS counted
                                                FROM favorit_room_account
                                                GROUP BY id_room
                                            ) AS counts ORDER BY counted DESC LIMIT 0,3
                                        ) d", "a.id_room = d.id_room", "inner");
        $this->db->where("a.room_status =", 1);
        $this->db->group_by('a.id_room');
        return $this->db->get();
    }

    function searchVenueHome()
    {
        $this->db->select(" 
                                            a.*,
                                            CONCAT(b.harga) AS harga,
                                            CONCAT(c.kegiatan) AS kegiatan,
                                            CONCAT(d.photo) AS photo");
        $this->db->from("
                                            (
                                        SELECT
                                            a.`id_room`,
                                            a.`room_name`,
                                            a.`room_type`,
                                            a.`room_area`,
                                            a.`room_discount`,
                                            a.`room_capacity`,
                                            a.`room_description`,
                                            a.`room_favorit`,
                                            a.`room_status`
                                        FROM `room_master` AS a
                                    )  a");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            CONCAT(b.`details_value`) AS harga
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 1
                                        GROUP BY b.`id_room`	
                                    ) b", "a.id_room = b.id_room", "inner");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            GROUP_CONCAT(b.`details_value`) AS kegiatan
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 3
                                        GROUP BY b.`id_room`	
                                    )  c","a.id_room = c.id_room", "inner");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            CONCAT(b.`details_icon`) AS photo
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 5
                                        GROUP BY b.`id_room`	
                                    ) d","a.id_room = d.id_room", "inner");
        $this->db->where("a.room_status =", 1);
        $this->db->group_by('a.id_room');
        $this->db->limit(3, 0);
        return $this->db->get();
    }
    function searchVenue($start, $nextPage)
    {
        $this->db->select(" 
                                            a.*,
                                            CONCAT(b.harga) AS harga,
                                            CONCAT(c.kegiatan) AS kegiatan,
                                            CONCAT(d.photo) AS photo");
        $this->db->from("
                                            (
                                        SELECT
                                            a.`id_room`,
                                            a.`room_name`,
                                            a.`room_type`,
                                            a.`room_area`,
                                            a.`room_discount`,
                                            a.`room_capacity`,
                                            a.`room_description`,
                                            a.`room_favorit`,
                                            a.`room_status`
                                        FROM `room_master` AS a
                                    )  a");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            CONCAT(b.`details_value`) AS harga
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 1
                                        GROUP BY b.`id_room`	
                                    ) b", "a.id_room = b.id_room", "inner");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            GROUP_CONCAT(b.`details_value`) AS kegiatan
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 3
                                        GROUP BY b.`id_room`	
                                    )  c","a.id_room = c.id_room", "inner");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            CONCAT(b.`details_icon`) AS photo
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 5
                                        GROUP BY b.`id_room`	
                                    ) d","a.id_room = d.id_room", "inner");
        $this->db->where("a.room_status =", 1);
        $this->db->group_by('a.id_room');
        $this->db->limit($start, $nextPage);
        return $this->db->get();
    }

    function countVenue()
    {
        $this->db->select(" COUNT(a.id_room) as count");
        $this->db->from("
                                            (
                                        SELECT
                                            a.`id_room`,
                                            a.`room_name`,
                                            a.`room_type`,
                                            a.`room_area`,
                                            a.`room_discount`,
                                            a.`room_capacity`,
                                            a.`room_description`,
                                            a.`room_favorit`,
                                            a.`room_status`
                                        FROM `room_master` AS a
                                    )  a");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            CONCAT(b.`details_value`) AS harga
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 1
                                        GROUP BY b.`id_room`	
                                    ) b", "a.id_room = b.id_room", "inner");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            GROUP_CONCAT(b.`details_value`) AS kegiatan
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 3
                                        GROUP BY b.`id_room`	
                                    )  c","a.id_room = c.id_room", "inner");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            CONCAT(b.`details_icon`) AS photo
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 5
                                        GROUP BY b.`id_room`	
                                    ) d","a.id_room = d.id_room", "inner");
        $this->db->where("a.room_status =", 1);
        return $this->db->get();
    }

    function newVenue()
    {
        $this->db->select(" 
                                            a.*,
                                            CONCAT(b.harga) AS harga,
                                            CONCAT(c.kegiatan) AS kegiatan,
                                            CONCAT(d.photo) AS photo");
        $this->db->from("
                                            (
                                        SELECT
                                            a.`id_room`,
                                            a.`room_name`,
                                            a.`room_type`,
                                            a.`room_area`,
                                            a.`room_discount`,
                                            a.`room_capacity`,
                                            a.`room_description`,
                                            a.`room_favorit`,
                                            a.`room_status`
                                        FROM `room_master` AS a
                                    )  a");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            CONCAT(b.`details_value`) AS harga
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 1
                                        GROUP BY b.`id_room`	
                                    ) b", "a.id_room = b.id_room", "inner");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            GROUP_CONCAT(b.`details_value`) AS kegiatan
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 3
                                        GROUP BY b.`id_room`	
                                    )  c","a.id_room = c.id_room", "inner");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            CONCAT(b.`details_icon`) AS photo
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 5
                                        GROUP BY b.`id_room`	
                                    ) d","a.id_room = d.id_room", "inner");
        $this->db->where("a.room_status =", 1);
        $this->db->group_by('a.id_room');
        return $this->db->get();
    }
    function searchVenueWhere($data,$start, $nextPage)
    {
        extract($data);
        $this->db->select(" 
                                            a.*,
                                            CONCAT(b.harga) AS harga,
                                            CONCAT(c.kegiatan) AS kegiatan,
                                            CONCAT(d.photo) AS photo");
        $this->db->from("
                                            (
                                        SELECT
                                            a.`id_room`,
                                            a.`room_name`,
                                            a.`room_type`,
                                            a.`room_area`,
                                            a.`room_discount`,
                                            a.`room_capacity`,
                                            a.`room_description`,
                                            a.`room_favorit`,
                                            a.`room_status`
                                        FROM `room_master` AS a
                                    )  a");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            CONCAT(b.`details_value`) AS harga
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 1
                                        GROUP BY b.`id_room`	
                                    ) b", "a.id_room = b.id_room", "inner");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            GROUP_CONCAT(b.`details_value`) AS kegiatan
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 3
                                        GROUP BY b.`id_room`	
                                    )  c","a.id_room = c.id_room", "inner");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            CONCAT(b.`details_icon`) AS photo
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 5
                                        GROUP BY b.`id_room`	
                                    ) d","a.id_room = d.id_room", "inner");
        $this->db->where("a.room_type", $data['room_type']);
        $this->db->where("a.room_area",$data['room_area']);
        $this->db->where("a.room_capacity >=", $data['room_capacity_min']);
        $this->db->where("a.room_capacity <=", $data['room_capacity_max']);
        $this->db->where("b.harga >=", $data['room_price_min']);
        $this->db->where("b.harga <=", $data['room_price_max']);
        $this->db->where("a.room_status =", 1);
        $this->db->like("c.kegiatan", $data['activity_name'],'both');
        $this->db->limit($start, $nextPage);
        return $this->db->get();
    }
    function countVenueWhere($data)
    {
        extract($data);
        $this->db->select(" COUNT(a.id_room) as count");
        $this->db->from("
                                            (
                                        SELECT
                                            a.`id_room`,
                                            a.`room_name`,
                                            a.`room_type`,
                                            a.`room_area`,
                                            a.`room_discount`,
                                            a.`room_capacity`,
                                            a.`room_description`,
                                            a.`room_favorit`,
                                            a.`room_status`
                                        FROM `room_master` AS a
                                    )  a");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            CONCAT(b.`details_value`) AS harga
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 1
                                        GROUP BY b.`id_room`	
                                    ) b", "a.id_room = b.id_room", "inner");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            GROUP_CONCAT(b.`details_value`) AS kegiatan
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 3
                                        GROUP BY b.`id_room`	
                                    )  c","a.id_room = c.id_room", "inner");
        $this->db->join("(
                                        SELECT
                                            a.`id_room`,
                                            CONCAT(b.`details_icon`) AS photo
                                        FROM `room_master` AS a INNER JOIN
                                        `room_details` AS b ON a.`id_room` = b.`id_room`
                                        WHERE b.`details_type` = 5
                                        GROUP BY b.`id_room`	
                                    ) d","a.id_room = d.id_room", "inner");
        $this->db->where("a.room_type", $data['room_type']);
        $this->db->where("a.room_area",$data['room_area']);
        $this->db->where("a.room_capacity >=", $data['room_capacity_min']);
        $this->db->where("a.room_capacity <=", $data['room_capacity_max']);
        $this->db->where("b.harga >=", $data['room_price_min']);
        $this->db->where("b.harga <=", $data['room_price_max']);
        $this->db->where("a.room_status =", 1);
        $this->db->like("c.kegiatan", $data['activity_name'],'both');
        return $this->db->get();
    }

    function getVenueMasterByID($id_room)
    {
        $this->db->select("*");
        $this->db->from("room_master");
        $this->db->where("room_master.id_room", $id_room);

        return $this->db->get();
    }
    function getVenueDetailsPriceByID($id_room)
    {
        $this->db->select("*");
        $this->db->from("room_master");
        $this->db->join("room_details",'room_master.id_room = room_details.id_room', "inner");
        $this->db->where("room_master.id_room", $id_room);
        $this->db->where("room_details.details_type", "1");

        return $this->db->get();
    }
    function getVenueDetailsFasilitasByID($id_room)
    {
        $this->db->select("*");
        $this->db->from("room_master");
        $this->db->join("room_details",'room_master.id_room = room_details.id_room', "inner");
        $this->db->where("room_master.id_room", $id_room);
        $this->db->where("room_details.details_type", "2");

        return $this->db->get();
    }
    function getVenueDetailsActivityByID($id_room)
    {
        $this->db->select("*");
        $this->db->from("room_master");
        $this->db->join("room_details",'room_master.id_room = room_details.id_room', "inner");
        $this->db->where("room_master.id_room", $id_room);
        $this->db->where("room_details.details_type", "3");

        return $this->db->get();
    }
    function getVenueDetailsDllByID($id_room)
    {
        $this->db->select("*");
        $this->db->from("room_master");
        $this->db->join("room_details",'room_master.id_room = room_details.id_room', "inner");
        $this->db->where("room_master.id_room", $id_room);
        $this->db->where("room_details.details_type", "4");

        return $this->db->get();
    }
    function getVenueDetailsPhotoByID($id_room)
    {
        $this->db->select("*");
        $this->db->from("room_master");
        $this->db->join("room_details",'room_master.id_room = room_details.id_room', "inner");
        $this->db->where("room_master.id_room", $id_room);
        $this->db->where("room_details.details_type", "5");

        return $this->db->get();
    }
    function getVenueDetailsReviewByID($id_room)
    {
        $this->db->select("a.`id_room`,
                                            b.`rating_date`,
                                            b.`rating_description`,
                                            b.`rating_value`,
                                            c.`account_name`,
                                            c.`account_photo`,
                                            d.`user_fullname`");
        $this->db->from("room_master AS a");
        $this->db->join("room_rating AS b",'a.`id_room` = b.`id_room`', "inner");
        $this->db->join("account AS c", "b.`account_name` = c.`account_name`", "innner");
        $this->db->join("user AS d", "c.`account_name` = d.`account_name`", "innner");
        $this->db->where("a.id_room", $id_room);
        return $this->db->get();
    }

    /**
     * @return CI_Model
     */
    public function getVenueActivityForBooking($id_room)
    {
        $this->db->select("a.*,
                                                        CONCAT(c.kegiatan) AS kegiatan");
        $this->db->from("(
                                                            SELECT
                                                                a.`id_room`
                                                            FROM `room_master` AS a
                                                        ) AS a");
        $this->db->join("(
                                                            SELECT
                                                                a.`id_room`,
                                                                GROUP_CONCAT(b.`details_value`) AS kegiatan
                                                            FROM `room_master` AS a INNER JOIN
                                                            `room_details` AS b ON a.`id_room` = b.`id_room`
                                                            WHERE b.`details_type` = 3
                                                            GROUP BY b.`id_room`	
                                                        ) AS c", "a.id_room = c.id_room", "inner");
        $this->db->where("a.id_room =", $id_room);
        return $this->db->get();
    }

    /**
     * @return CI_Model
     */
    public function getVenueBooking($account_name)
    {
        return $this->db->query("SELECT
                                e.id_booking,
                                e.booking_start,
                                e.booking_end,
                                e.booking_createdate,
                                e.booking_price as harga,
                                e.	account_name,
                                e.account_email,
                                e.account_contact,
                                e.count,
                                a.*
                                FROM
                                    (	
                                        SELECT 
                                        a.*,
                                        CONCAT(b.harga) AS harga1,
                                        CONCAT(c.kegiatan) AS kegiatan,
                                        CONCAT(d.photo) AS photo
                                        FROM
                                        (
                                            SELECT
                                                a.`id_room`,
                                                a.`room_name`,
                                                a.`room_type`,
                                                a.`room_area`,
                                                a.`room_discount`,
                                                a.`room_capacity`,
                                                a.`room_description`,
                                                a.`room_favorit`
                                            FROM `room_master` AS a
                                        ) AS a INNER JOIN
                                        (
                                            SELECT
                                                a.`id_room`,
                                                CONCAT(b.`details_value`) AS harga
                                            FROM `room_master` AS a INNER JOIN
                                            `room_details` AS b ON a.`id_room` = b.`id_room`
                                            WHERE b.`details_type` = 1
                                            GROUP BY b.`id_room`
                                            LIMIT 0,1
                                        ) AS b ON a.id_room = b.id_room INNER JOIN 
                                        (
                                            SELECT
                                                a.`id_room`,
                                                GROUP_CONCAT(b.`details_value`) AS kegiatan
                                            FROM `room_master` AS a INNER JOIN
                                            `room_details` AS b ON a.`id_room` = b.`id_room`
                                            WHERE b.`details_type` = 3
                                            GROUP BY b.`id_room`	
                                        ) AS c ON a.id_room = c.id_room INNER JOIN
                                        (
                                            SELECT
                                                a.`id_room`,
                                                CONCAT(b.`details_icon`) AS photo
                                            FROM `room_master` AS a INNER JOIN
                                            `room_details` AS b ON a.`id_room` = b.`id_room`
                                            WHERE b.`details_type` = 5
                                            GROUP BY b.`id_room`	
                                        ) AS d ON a.id_room = d.id_room 
                                    GROUP BY a.id_room
                                    ) AS a INNER JOIN
                                    (
                                        SELECT 
                                            c.*
                                        FROM
                                        (
                                            SELECT 
                                            a.*,
                                            b.count
                                            FROM
                                            ( 
                                                SELECT 
                                                    a.* 
                                                 FROM
                                                 `booking_master` AS a 
                                            ) AS a LEFT JOIN
                                            (
                                                  SELECT
                                                    a.id_booking,
                                                    count(b.id_booking) as count
                                                  FROM
                                                    `booking_master` AS a INNER JOIN 
                                                    `booking_details` AS b 
                                                  ON a.`id_booking` = b.id_booking
                                                  GROUP by b.id_booking
                                            ) AS b on a.id_booking = b.id_booking
                                        ) as c
                                    ) AS e on a.id_room = e.id_room
                                WHERE e.account_name = ?",array($account_name));
    }
    public function getVenueReviewBest()
    {
        return $this->db->query("SELECT 
                                                            a.`id_room` AS id_room,
                                                            CONCAT(a.room_name) AS room_name,
                                                            CONCAT(b.`rating_date`) AS rating_date,
                                                            CONCAT(b.`rating_description`) AS rating_description,
                                                            CONCAT(b.`rating_value`) AS rating_value,
                                                            CONCAT(c.`account_name`) AS account_name,
                                                            CONCAT(c.`account_photo`) AS account_photo,
                                                            CONCAT(d.`user_fullname`) AS user_fullname,
                                                            CONCAT(aa.photo) AS photo
                                                            FROM room_master AS a INNER JOIN
                                                            (
                                                                SELECT
                                                                    a.`id_room`,
                                                                    CONCAT(b.`details_icon`) AS photo
                                                                FROM `room_master` AS a INNER JOIN
                                                                `room_details` AS b ON a.`id_room` = b.`id_room`
                                                                WHERE b.`details_type` = 5
                                                                GROUP BY b.`id_room`
                                                                LIMIT 0,1
                                                            ) AS aa INNER JOIN
                                                            room_rating AS b ON a.`id_room` = b.`id_room` INNER JOIN
                                                            account AS c ON b.`account_name` = c.`account_name` INNER JOIN
                                                            user AS d ON c.`account_name` = d.`account_name`
                                                            GROUP BY a.id_room
                                                            HAVING COUNT(a.id_room) >= 1
                                                            LIMIT 0,3");
    }
    public function getVenueLastBooking($account_name)
    {
        return $this->db->query("SELECT
                                e.id_booking,
                                e.booking_start,
                                e.booking_end,
                                e.booking_createdate,
                                e.booking_price as harga,
                                e.	account_name,
                                e.account_email,
                                e.account_contact,
                                e.booking_description,
                                e.count,
                                a.*
                                FROM
                                    (	
                                        SELECT 
                                        a.*,
                                        CONCAT(b.harga) AS harga1,
                                        CONCAT(c.kegiatan) AS kegiatan,
                                        CONCAT(d.photo) AS photo
                                        FROM
                                        (
                                            SELECT
                                                a.`id_room`,
                                                a.`room_name`,
                                                a.`room_type`,
                                                a.`room_area`,
                                                a.`room_discount`,
                                                a.`room_capacity`,
                                                a.`room_description`,
                                                a.`room_favorit`
                                            FROM `room_master` AS a
                                        ) AS a INNER JOIN
                                        (
                                            SELECT
                                                a.`id_room`,
                                                CONCAT(b.`details_value`) AS harga
                                            FROM `room_master` AS a INNER JOIN
                                            `room_details` AS b ON a.`id_room` = b.`id_room`
                                            WHERE b.`details_type` = 1
                                            GROUP BY b.`id_room`
                                            LIMIT 0,1	
                                        ) AS b ON a.id_room = b.id_room INNER JOIN 
                                        (
                                            SELECT
                                                a.`id_room`,
                                                GROUP_CONCAT(b.`details_value`) AS kegiatan
                                            FROM `room_master` AS a INNER JOIN
                                            `room_details` AS b ON a.`id_room` = b.`id_room`
                                            WHERE b.`details_type` = 3
                                            GROUP BY b.`id_room`	
                                        ) AS c ON a.id_room = c.id_room INNER JOIN
                                        (
                                            SELECT
                                                a.`id_room`,
                                                CONCAT(b.`details_icon`) AS photo
                                            FROM `room_master` AS a INNER JOIN
                                            `room_details` AS b ON a.`id_room` = b.`id_room`
                                            WHERE b.`details_type` = 5
                                            GROUP BY b.`id_room`	
                                        ) AS d ON a.id_room = d.id_room 
                                    GROUP BY a.id_room
                                    ) AS a INNER JOIN
                                    (
                                        SELECT 
                                            c.*
                                        FROM
                                        (
                                            SELECT 
                                            a.*,
					                        b.`booking_description`,
                                            b.count
                                            FROM
                                            ( 
                                                SELECT 
                                                    a.* 
                                                 FROM
                                                 `booking_master` AS a
                                            ) AS a LEFT JOIN
                                            (
                                                  SELECT
                                                    a.id_booking,
					                                b.`booking_description`,
                                                    count(b.id_booking) as count
                                                  FROM
                                                    `booking_master` AS a INNER JOIN 
                                                    `booking_details` AS b 
                                                  ON a.`id_booking` = b.id_booking
                                                  GROUP by b.id_booking
                                            ) AS b on a.id_booking = b.id_booking
                                        ) as c
                                    ) AS e on a.id_room = e.id_room
                                WHERE e.account_name = ? ORDER BY e.booking_createdate DESC LIMIT 0,1 ",array($account_name));
    }

    public function getVenueForReviewBooking($account_name)
    {
        return $this->db->query("SELECT
                                                            e.id_booking,
                                                            e.booking_start,
                                                            e.booking_end,
                                                            e.booking_createdate,
                                                            e.booking_price AS harga,
                                                            e.account_name,
                                                            e.account_email,
                                                            e.account_contact,
                                                            e.booking_description,
                                                            e.count,
                                                            a.*,
                                                            CASE WHEN b.`rating_value` IS NULL THEN 0 ELSE b.`rating_value` END as rating_value,
                                                            b.`rating_description`,
                                                            b.`rating_date`
                                                            FROM
                                                                (	
                                                                SELECT 
                                                                a.*,
                                                                CONCAT(b.harga) AS harga1,
                                                                CONCAT(c.kegiatan) AS kegiatan,
                                                                CONCAT(d.photo) AS photo
                                                                FROM
                                                                (
                                                                    SELECT
                                                                    a.`id_room`,
                                                                    a.`room_name`,
                                                                    a.`room_type`,
                                                                    a.`room_area`,
                                                                    a.`room_discount`,
                                                                    a.`room_capacity`,
                                                                    a.`room_description`,
                                                                    a.`room_favorit`
                                                                    FROM `room_master` AS a
                                                                ) AS a INNER JOIN
                                                                (
                                                                    SELECT
                                                                    a.`id_room`,
                                                                    CONCAT(b.`details_value`) AS harga
                                                                    FROM `room_master` AS a INNER JOIN
                                                                    `room_details` AS b ON a.`id_room` = b.`id_room`
                                                                    WHERE b.`details_type` = 1
                                                                    GROUP BY b.`id_room`
                                                                    LIMIT 0,1	
                                                                ) AS b ON a.id_room = b.id_room INNER JOIN 
                                                                (
                                                                    SELECT
                                                                    a.`id_room`,
                                                                    GROUP_CONCAT(b.`details_value`) AS kegiatan
                                                                    FROM `room_master` AS a INNER JOIN
                                                                    `room_details` AS b ON a.`id_room` = b.`id_room`
                                                                    WHERE b.`details_type` = 3
                                                                    GROUP BY b.`id_room`	
                                                                ) AS c ON a.id_room = c.id_room INNER JOIN
                                                                (
                                                                    SELECT
                                                                    a.`id_room`,
                                                                    CONCAT(b.`details_icon`) AS photo
                                                                    FROM `room_master` AS a INNER JOIN
                                                                    `room_details` AS b ON a.`id_room` = b.`id_room`
                                                                    WHERE b.`details_type` = 5
                                                                    GROUP BY b.`id_room`	
                                                                ) AS d ON a.id_room = d.id_room 
                                                                GROUP BY a.id_room
                                                                ) AS a INNER JOIN
                                                                (
                                                                SELECT 
                                                                    c.*
                                                                FROM
                                                                (
                                                                    SELECT 
                                                                    a.*,
                                                                            b.`booking_description`,
                                                                    b.count
                                                                    FROM
                                                                    ( 
                                                                    SELECT 
                                                                        a.* 
                                                                     FROM
                                                                     `booking_master` AS a
                                                                    ) AS a LEFT JOIN
                                                                    (
                                                                      SELECT
                                                                        a.id_booking,
                                                                                b.`booking_description`,
                                                                        COUNT(b.id_booking) AS COUNT
                                                                      FROM
                                                                        `booking_master` AS a INNER JOIN 
                                                                        `booking_details` AS b 
                                                                      ON a.`id_booking` = b.id_booking
                                                                      GROUP BY b.id_booking
                                                                    ) AS b ON a.id_booking = b.id_booking
                                                                ) AS c
                                                                ) AS e ON a.id_room = e.id_room LEFT JOIN
                                                                room_rating AS b ON e.id_booking = b.`id_booking`
                                                            WHERE e.account_name = ? AND e.count = 4 ORDER BY e.booking_createdate DESC",array($account_name));
    }
    public function getVenueFavorit($account_name)
    {
        return $this->db->query("SELECT
                                        b.account_name,
                                        a.*
                                        FROM
                                            (	
                                                SELECT 
                                                a.*,
                                                CONCAT(b.harga) AS harga,
                                                CONCAT(c.kegiatan) AS kegiatan,
                                                CONCAT(d.photo) AS photo
                                                FROM
                                                (
                                                    SELECT
                                                        a.`id_room`,
                                                        a.`room_name`,
                                                        a.`room_type`,
                                                        a.`room_area`,
                                                        a.`room_discount`,
                                                        a.`room_capacity`,
                                                        a.`room_description`,
                                                        a.`room_favorit`
                                                    FROM `room_master` AS a
                                                ) AS a INNER JOIN
                                                (
                                                    SELECT
                                                        a.`id_room`,
                                                        CONCAT(b.`details_value`) AS harga
                                                    FROM `room_master` AS a INNER JOIN
                                                    `room_details` AS b ON a.`id_room` = b.`id_room`
                                                    WHERE b.`details_type` = 1
                                                    GROUP BY b.`id_room`	
                                                    LIMIT 0,1
                                                ) AS b ON a.id_room = b.id_room INNER JOIN 
                                                (
                                                    SELECT
                                                        a.`id_room`,
                                                        GROUP_CONCAT(b.`details_value`) AS kegiatan
                                                    FROM `room_master` AS a INNER JOIN
                                                    `room_details` AS b ON a.`id_room` = b.`id_room`
                                                    WHERE b.`details_type` = 3
                                                    GROUP BY b.`id_room`	
                                                ) AS c ON a.id_room = c.id_room INNER JOIN
                                                (
                                                    SELECT
                                                        a.`id_room`,
                                                        CONCAT(b.`details_icon`) AS photo
                                                    FROM `room_master` AS a INNER JOIN
                                                    `room_details` AS b ON a.`id_room` = b.`id_room`
                                                    WHERE b.`details_type` = 5
                                                    GROUP BY b.`id_room`	
                                                ) AS d ON a.id_room = d.id_room 
                                            GROUP BY a.id_room
                                            ) AS a INNER JOIN
                                            (
                                                SELECT 
                                                    a.*
                                                FROM
                                                    favorit_room_account as a
                                            ) as b on a.id_room = b.id_room
                                        WHERE b.account_name = ?",array($account_name));
    }
}