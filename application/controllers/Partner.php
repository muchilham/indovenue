<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 9/13/2017
 * Time: 11:16 AM
 */

class Partner extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('navbar');
        $this->load->view('partner');
        $this->load->view('footer');
    }
}
