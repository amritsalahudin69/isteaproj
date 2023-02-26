<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adm_coreII extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'user_agent'));
        $this->load->model(array('model_hist', 'model_cabang', 'model_krwenduser'));
    }

    public function index()
    {
        $this->userhist->logout();
        $this->core->asperson();
        if ($this->input->post('ok')) {
            $this->hub->login();
        }
        $this->page->istealogin();
    }

    public function daftar()
    {
        $_path      = "select * from ornamen where id = 2";
        $path['1']     = $this->db->query($_path)->row();
        $path = $path['1']->path_ . $path['1']->path_pp;

        if ($this->input->post('ok')) {
            $this->hub->daftar();
        }
        $this->page->isteadaftar();
    }

    public function gantipassword()
    {
        if ($this->hub->cekaktif() == false) {
            $this->hub->logout();
            redirect('6977');
        } else {
        $this->page->istearepass();
            if ($this->input->post('ok')) {
                $this->hub->gantipassword();
            }
        }
    }


    public function kluar()
    {
        $this->hub->logout();
    }
}
