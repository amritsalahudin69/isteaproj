<?php
defined('BASEPATH') or exit('No direct script access allowed');

//coba menggunakan vscode
class Adm_core extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'user_agent'));
        $this->load->model(array('model_user', 'model_hist'));
    }

    public function index()
    {
        if ($this->core->cekaktif() == true) {
            redirect('0036g56');
        }
        if ($this->input->post('ok')) {
            $this->core->_login();
        }
        $this->page->login();
    }

    public function gantipassword()
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        }
        if ($this->input->post('ok')) {
            $this->core->gantipassword();
        }
        
        $this->page->repass();
    }
}
