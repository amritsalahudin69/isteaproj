<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adm_home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('model_info'));

        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        }
    }

    public function index()
    {
            $this->page->atas();
            $e = $this->model_info->cekrow_info();
            if(isset($e)){
                $data['infos'] = $this->model_info->info();
                $this->load->view('uix/uix_home', $data); //konten
            }
            $this->page->bawah();

    }
}
