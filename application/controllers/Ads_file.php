<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ads_file extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('Model_refmenu', 'Model_danggota', 'Model_dfile'));
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        }
    }

    public function view_all_file($id)
    {
            $gb = '6';
            $dok = '1';

            $this->page->atas_detail();

            $admin  = 3;
            $role_id = $this->session->userdata('log_idgroup');
            $idwil = $this->session->userdata('log_idwil_');

            $this->load->view('blank/top'); //konten

            $_cekimg = $this->Model_dfile->_cekimg($id, $gb);
            $_cekdok = $this->Model_dfile->_cekdok($id, $dok);

            switch ($role_id) {
                case ($role_id < $admin):
                    $data['dircab'] = $this->Model_dfile->pathroot($id);
                    if (isset($_cekimg) == null) {
                        $this->load->view('konten_add/empty_img');
                    } else {
                        $data['_dircab'] = $data['dircab']->dir_path . $data['dircab']->idwil . $data['dircab']->dir_path_img;
                        $data['imgs'] = $this->Model_dfile->floan_img_($id, $gb);
                        $this->load->view('konten/k_fileimg', $data);
                    }

                    if (isset($_cekdok) == null) {
                        $this->load->view('konten_add/empty_dok');
                    } else {
                        $data['_dircab'] = $data['dircab']->dir_path . $data['dircab']->idwil . $data['dircab']->dir_path_dok;
                        $data['doks'] = $this->Model_dfile->floan_dok_($id, $dok);
                        $this->load->view('konten/k_filedok', $data);
                    }
                    break;

                case ($role_id == $admin):

                    $data['dircab'] = $this->Model_dfile->_path($idwil);

                    $this->load->model('Model_danggota');
                    $data['tambah'] = $this->Model_danggota->numloannl($id);

                    if (isset($_cekimg) == null) {
                        $this->load->view('konten_add/empty_img');
                        $this->load->view('konten_add/add_dimg', $data);
                    } else {
                        $data['_dircab'] = $data['dircab']->dir_path . $data['dircab']->idwil . $data['dircab']->dir_path_img;
                        $data['imgs'] = $this->Model_dfile->floan_img_($id, $gb);
                        $this->load->view('konten/k_fileimg', $data);
                    }

                    if (isset($_cekdok) == null) {
                        $this->load->view('konten_add/empty_dok');
                        $this->load->view('konten_add/add_ddok', $data);
                    } else {
                        $data['_dircab'] = $data['dircab']->dir_path . $data['dircab']->idwil . $data['dircab']->dir_path_dok;
                        $data['doks'] = $this->Model_dfile->floan_dok_($id, $dok);
                        $this->load->view('konten/k_filedok', $data);
                    }
                    break;

                    $this->load->view('blank/bot'); //konten
                    $this->page->bawah();
            }

    }
}
