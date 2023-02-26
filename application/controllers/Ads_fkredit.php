<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ads_fkredit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('Model_refmenu', 'Model_danggota'));
    }

    public function index()
    {
        $gb = '.jpg';
        $dok = '.pdf';

        $this->page->atas_detail();
        //konten
        $this->load->view('blank/top');
        // $this->load->view('konten/blank', $data);
        $this->load->view('blank/bot');
        //konten
        $this->page->bawah();
    }
}
