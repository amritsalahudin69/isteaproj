<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('model_info'));
    }

    public function index()
    {
        if ($this->hub->cekaktif() == false) {
            $this->hub->logout();
            redirect('6977');
        } else {
            $this->page->user_atas();

            $this->load->view('user_asset/home');
            $this->load->view('user_asset/bawah');
        }
    }
}
