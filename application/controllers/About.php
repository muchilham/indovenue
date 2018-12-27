<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 9/13/2017
 * Time: 1:15 AM
 */
class About extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {

        $this->load->view('navbar');
        $this->load->view('about');
        $this->load->view('footer');
    }
}
