<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usr_info extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('model_info', 'model_hist'));
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        }
    }

    public function index()
    {
            if ($this->core->grupid() == false) {
                redirect('0036g56');
            }

            $data['title'] = 'Dokumentasi Kredit Utama Karya Group';
            $data['masuk'] = 'UKBSD';
            $this->load->view('admin/juduladmin', $data);
            $this->load->view('mnindex/frm_mn_wrapper', $data);
            $this->load->view('mnindex/frm_mn_topbar');

            $cekrowinfo = $this->model_info->row_info_admin();
            if (isset($cekrowinfo) == null) {
                $this->load->view('konten_add/empty');
            }else{
                $data['infos'] = $this->model_info->info_admin();
                $this->load->view('uix/uix_infotable', $data);
                }


            $this->load->view('admin/bawah');
            $this->load->view('mnindex/frm_ft_2');

    }

    // public function add()
    // {
    //     if ($this->core->cekaktif() == false) {
    //         $this->core->logout();
    //     }else{

    //         if ($this->core->grupid() == false) {
    //             redirect('0036g56');
    //         }

    //         $this->page->atas();

    //         $this->load->view('uix/uix_infoadd');
    //         if ($this->input->post('ok')) {
    //             $this->_add();
    //         }

    //         $this->page->bawah();
    //     }
    // }
    // public function _add()
    // {
    //     $judul  = htmlspecialchars($this->input->post('judul'));
    //     $konten = htmlspecialchars($this->input->post('konten'));
    //     $aktif  = 1;

    //     form_set_error_delimiters();
    //     $this->form_validation->set_rules(
    //         'judul',
    //         'judul',
    //         'required',
    //         [
    //             'required' => 'JudulTidak Boleh Kosong'
    //         ]
    //     );
    //     if ($this->form_validation->run() == true) {
    //         $this->userhist->add();
    //         $this->model_info->add($judul, $konten, $aktif);
    //         redirect('356info?');
    //     }
    // }

    public function add()
    {
            if ($this->core->grupid() == false) {
                redirect('0036g56');
            }

            $this->page->atas();
            $this->load->view('uix/uix_infoadd');

            $this->load->library('upload');
            if ($this->input->post('ok')) {   // startofif upload
                // $a = $_FILES['file']['name'];
                // var_dump($a);
                // die;
                    $nmfile = "file_".time();
                    $config['upload_path'] = './assets/info/';
                    $config['allowed_types'] = 'gif|jpg|png|JPEG|bmp';
                    $config['max_size'] = '4000';
                    $config['file_name'] = $nmfile;
                    $this->upload->initialize($config);
                    if ($_FILES['file']['name']){
                        if ($this->upload->do_upload('file')) {
                            $nfile =$this->upload->data('file_name');
                            $judul  = htmlspecialchars($this->input->post('judul'));
                            $konten = htmlspecialchars($this->input->post('konten'));
                            $aktif  = 1;

                            form_set_error_delimiters();
                            $this->form_validation->set_rules(
                                'judul',
                                'judul',
                                'required',
                                [
                                    'required' => 'JudulTidak Boleh Kosong'
                                ]
                            );
                            if ($this->form_validation->run() == true) {
                                $this->userhist->add();
                                $this->model_info->add($judul, $konten, $aktif, $nfile);
                                redirect('356info?');
                            }

                        }
                    } else{
                        $judul  = htmlspecialchars($this->input->post('judul'));
                        $konten = htmlspecialchars($this->input->post('konten'));
                        $aktif  = 1;

                        form_set_error_delimiters();
                        $this->form_validation->set_rules(
                            'judul',
                            'judul',
                            'required',
                            [
                                'required' => 'JudulTidak Boleh Kosong'
                            ]
                        );
                        if ($this->form_validation->run() == true) {
                            $this->userhist->add();
                            $this->model_info->_add($judul, $konten, $aktif);
                            redirect('356info?');
                        }
                    }
            } // endofif upload

            $this->page->bawah();
        
    }


    public function st0($id)
    {
        $info = $this->model_info->get_by_id($id);
        $judul = $info->judul;
        $this->deaktif($id);
        set_message('msg', 'danger', "Anda baru saja me-Non-Aktifkan status : <strong>{$judul}</strong>.");
        redirect('356info?');
    }

    public function st1($id)
    {
        $info = $this->model_info->get_by_id($id);
        $judul = $info->judul;
        $this->aktif($id);
        set_message('msg', 'success', "Anda baru saja me-Aktifkan status : <strong>{$judul}</strong>.");
        redirect('356info?');
    }

    public function aktif($id)
    {
        $instatus = 1;
        $this->model_info->aktif($id, $instatus);
    }
    public function deaktif($id)
    {
        $instatus = 0;
        $this->model_info->aktif($id, $instatus);
    }



}
