<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ads_dkredit extends CI_Controller
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

    public function index()
    {
            $this->page->atas();
            $admin  = 1;
            $rekap  = 2;
            $pdl    = 3;

            $role_id = $this->session->userdata('log_idgroup');
            $idwil = $this->session->userdata('log_idwil');
            $idres_ = $this->session->userdata('log_idres');

            $ok = $this->input->get('ok');
            switch ($role_id) {
                case ($role_id == $admin):
                    if ($this->cek_manggota->_cekmin2() == true) {
                        // $this->load->view('konten_add/add_dossier');
                        $this->load->view('konten_add/empty');
                    } else {
                        if ($ok == 'Cari') {
                            $rekno = $this->input->get('norek');
                            $nama = $this->input->get('nama');
                            $inno_id = $this->input->get('ktp');

                            $data['rekno'] = $rekno;
                            $data['nama'] = $nama;
                            $data['inno_id'] = $inno_id;

                            $dossier = $this->Model_danggota->admin_search($rekno, $nama, $inno_id);
                            if (isset($dossier) == null) {
                                $data['dossiers'] = $this->Model_danggota->admin();
                                $this->load->view('konten_add/srckosong');
                            } else {
                                $data['dossiers'] = $this->Model_danggota->admin_by_search($rekno, $nama, $inno_id);
                            }
                        } else {
                            $data['dossiers'] = $this->Model_danggota->admin();
                        }
                        // $this->load->view('konten_add/add_dossier');
                        $this->load->view('konten/k_dossier_h', $data);
                    }
                    break;
                case ($role_id == $rekap):
                    $cek_rekap = $this->Model_danggota->_cekrekap($idwil);
                    if (isset($cek_rekap) == null) {
                        // $this->load->view('konten_add/add_dossier');
                        $this->load->view('konten_add/empty');
                    } else {

                        if ($ok == 'Cari') {
                            $rekno = $this->input->get('norek');
                            $nama = $this->input->get('nama');
                            $inno_id = $this->input->get('ktp');

                            $data['rekno'] = $rekno;
                            $data['nama'] = $nama;
                            $data['inno_id'] = $inno_id;

                            $dossier = $this->Model_danggota->rekap_search($rekno, $nama, $inno_id, $idwil);
                            if (isset($dossier) == null) {
                                $data['dossiers'] = $this->Model_danggota->rekap($idwil);
                                $this->load->view('konten_add/srckosong');
                            } else {
                                $data['dossiers'] = $this->Model_danggota->rekap_by_search($rekno, $nama, $inno_id, $idwil);
                            }
                        } else {
                            $data['dossiers'] = $this->Model_danggota->rekap($idwil);
                        }

                        // $this->load->view('konten_add/add_dossier');
                        $this->load->view('konten/k_dossier_h', $data);
                    }
                    break;

                    $role_id = $this->session->userdata('log_idgroup');
                    $idwil = $this->session->userdata('log_idwil');
                    $idres_ = $this->session->userdata('log_idres');

                    case ($role_id == $pdl):
                    $cek_pdl = $this->Model_danggota->_cekadpdl($idwil, $role_id, $idres_);

                    // var_dump($cek_pdl );

                    if (isset($cek_pdl) == null) {
                        $this->load->view('konten_add/add_dossier');
                        $this->load->view('konten_add/empty');
                    } else {

                        if ($ok == 'Cari') {
                            $rekno = $this->input->get('norek');
                            $nama = $this->input->get('nama');
                            $inno_id = $this->input->get('ktp');

                            $data['rekno'] = $rekno;
                            $data['nama'] = $nama;
                            $data['inno_id'] = $inno_id;

                            $dossier = $this->Model_danggota->pdl_search($rekno, $nama, $inno_id, $idwil, $role_id, $idres_);
                            if (isset($dossier) == null) {
                                $data['dossiers'] = $this->Model_danggota->pdl($idwil, $role_id, $idres_);
                                $this->load->view('konten_add/srckosong');
                            } else {
                                $data['dossiers'] = $this->Model_danggota->pdl_by_search($rekno, $nama, $inno_id, $idwil, $role_id, $idres_);
                            }
                        } else {
                            $data['dossiers'] = $this->Model_danggota->pdl($idwil, $role_id, $idres_);
                        }
                        $this->load->view('konten_add/add_dossier');
                        $this->load->view('konten/k_dossier_h', $data);
                    }
                    break;
                    $this->page->bawah();
            }
        
    } //end




}
