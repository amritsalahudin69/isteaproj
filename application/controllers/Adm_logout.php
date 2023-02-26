<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adm_logout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->model('model_hist');
    }
    public function index()
    {
        $instatus = 0;
        $nik = $this->session->userdata('log_nik');
        $this->model_user->deaktif($nik, $instatus);
        $this->userhist->logout();
        $this->core->logout();
    }
}
