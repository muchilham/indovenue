<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 9/13/2017
 * Time: 1:15 AM
 */
class Search extends CI_Controller {
    private $perPage = 1;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->model('adm/Data_model');
        $model['select_room_type'] = $this->Data_model->select_room_type();
        $model['select_room_area'] = $this->Data_model->select_room_area();
        $model['select_activity_type'] = $this->Data_model->select_activity_type();

        $this->load->model('VenueModels');
        $model["favoritVenue"] = $this->VenueModels->favoritVenue();
        $model["newVenue"] = $this->VenueModels->newVenue();
        if(!empty($this->input->get("page")))
        {
            $start =  ceil($this->input->get("page") * $this->perPage) - 1;
            if (empty($this->input->get("id")) || null === $this->input->get("id")) {
                $model["countVenue"] = $this->VenueModels->countVenue();
                $model["searchVenue"] = $this->VenueModels->searchVenue($this->perPage,$start);
            } else {
                if ($this->input->get("rt") == "all" || $this->input->get("an") == "all" || $this->input->get("ra") == "all") {
                    $model["countVenue"] = $this->VenueModels->countVenue();
                    $model["searchVenue"] = $this->VenueModels->searchVenue($this->perPage,$start);
                } else {
                    $capacity = explode(",", $this->input->get("cp"));
                    $price = explode(",", $this->input->get("pr"));
                    $data = array(
                        "room_type" => $this->input->get("rt"),
                        "activity_name" => $this->input->get("an"),
                        "room_area" => $this->input->get("ra"),
                        "room_capacity_min" => $capacity[0],
                        "room_capacity_max" => $capacity[1],
                        "room_price_min" => $price[0],
                        "room_price_max" => $price[1]
                    );
                    $model["countVenue"] = $this->VenueModels->countVenueWhere($data);
                    $model["searchVenue"] = $this->VenueModels->searchVenueWhere($data,$this->perPage,$start);
                }
            }
            $result = $this->load->view('venue', $model);
            echo json_encode($result);
        }
        else
        {
            if (empty($this->input->get("id")) || null === $this->input->get("id")) {
                $model["countVenue"] = $this->VenueModels->countVenue();
                $model["searchVenue"] = $this->VenueModels->searchVenue($this->perPage,0);
            } else {
                if ($this->input->get("rt") == "all" || $this->input->get("an") == "all" || $this->input->get("ra") == "all") {
                    $model["countVenue"] = $this->VenueModels->countVenue();
                    $model["searchVenue"] = $this->VenueModels->searchVenue($this->perPage,0);
                } else {
                    $capacity = explode(",", $this->input->get("cp"));
                    $price = explode(",", $this->input->get("pr"));
                    $data = array(
                        "room_type" => $this->input->get("rt"),
                        "activity_name" => $this->input->get("an"),
                        "room_area" => $this->input->get("ra"),
                        "room_capacity_min" => $capacity[0],
                        "room_capacity_max" => $capacity[1],
                        "room_price_min" => $price[0],
                        "room_price_max" => $price[1]
                    );
                    $model["countVenue"] = $this->VenueModels->countVenueWhere($data);
                    $model["searchVenue"] = $this->VenueModels->searchVenueWhere($data,$this->perPage,0);
                }
            }

            $this->load->view('navbar');
            $this->load->view('search', $model);
            $this->load->view('footer');
        }
    }

    public function detail($id_room = null)
    {
        if($id_room != null)
        {

            $this->load->model('VenueModels');
            $data["getVenueMasterByID"] = $this->VenueModels->getVenueMasterByID($id_room);
            $data["getVenueDetailsPriceByID"] = $this->VenueModels->getVenueDetailsPriceByID($id_room);
            $data["getVenueDetailsFasilitasByID"] = $this->VenueModels->getVenueDetailsFasilitasByID($id_room);
            $data["getVenueDetailsActivityByID"] = $this->VenueModels->getVenueDetailsActivityByID($id_room);
            $data["getVenueDetailsDllByID"] = $this->VenueModels->getVenueDetailsDllByID($id_room);
            $data["getVenueDetailsPhotoByID"] = $this->VenueModels->getVenueDetailsPhotoByID($id_room);
            $data["getVenueActivityForBooking"] = $this->VenueModels->getVenueActivityForBooking($id_room);
            $data["getVenueDetailsReviewByID"] = $this->VenueModels->getVenueDetailsReviewByID($id_room);

            $data["newVenue"] = $this->VenueModels->newVenue();
            $this->load->view('navbar');
            $this->load->view('detail',$data);
            $this->load->view('footer');
        }
    }
}
