<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_server extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        //$this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('url');

        $this->load->view('rest_server');
    }
}
