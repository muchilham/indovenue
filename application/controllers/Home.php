<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 9/13/2017
 * Time: 1:15 AM
 */
class Home extends CI_Controller {

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
        $model["searchVenue"] = $this->VenueModels->searchVenueHome();
        $model['getVenueReviewBest'] = $this->VenueModels->getVenueReviewBest();
        $this->load->view('navbar');
        $this->load->view('home',$model);
        $this->load->view('footer');
    }
}
