<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ads_order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('model_hist', 'model_order'));
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        }
    }

    public function index()
    {

            if ($this->core->grupid() == false) {
                redirect('0036g56');
            }
            $this->page->atas();

            $data['role_id'] = $this->session->userdata('log_idgroup');
            $data['nik'] = $this->session->userdata('log_nik');

            switch ($data['role_id']) {
                case ($data['role_id'] == 1):
                    $ax = $this->model_order->allrow();
                    if(isset($ax)){
                        $data['ax'] = $this->model_order->all();
                        $this->load->view('order/ordertable', $data);
                    }else{
                        $this->load->view('konten_add/empty');
                    }
                    break;
                    case ($data['role_id'] == 2):
                        $ax = $this->model_order->allrow_byid($data['nik']);
                        if(isset($ax)){
                            $data['ax'] = $this->model_order->all_byid($data['nik']);
                            $this->load->view('order/ordertable', $data);
                        }else{
                        $this->load->view('order/btadd');
                        $this->load->view('konten_add/empty');
                    }

                    break;
            }

            $this->page->bawah();

    }

    public function add()
    {
            if ($this->core->grupid() == false) {
                redirect('0036g56');
            }
            $this->page->atas();
            if ($this->input->post('ok')) {
                $this->_add();
            }
            $data['xrt'] = 0;
            $this->load->view('order/add', $data);
            $this->page->bawah();

    }

    public function _add()
    {
        $data['nik'] = $this->session->userdata('log_nik');
        $notiket = mt_rand(10, 9999);

        $user_log         = $data['nik'];

        $norek            = htmlspecialchars($this->input->post('norek'));

        $indesc           = htmlspecialchars($this->input->post('indesc'));
        $data_order       = htmlspecialchars($this->input->post('data_order'));
        $notiket          = $notiket. time();
        $status           = 1;

        form_set_error_delimiters();
        $this->form_validation->set_rules(
            'norek',
            'norek',
            'required',
            [
                'required' => 'No. Rekening Tidak boleh Kosong'
            ]
        );

        //tambah field untuk no rekening
        if ($this->form_validation->run() == true) {
            $cekx = $this->model_order->cek($norek);
            if(isset($cekx)){
                $this->userhist->add();
                $this->model_order->add($user_log,$indesc,$data_order,$notiket,$status, $norek);
            }else{
                $data['xrt'] = 1;
                redirect('90ordadd');
            }
            redirect('ord01');
        }
    }

    public function st0($id)
    {
        $status = 0;
        $this->model_order->aktif($id, $status);
        redirect('ord01');
    }

    public function st1($id)
    {
        $status = 1;
        $this->model_order->aktif($id, $status);
        redirect('ord01');
    }

}
