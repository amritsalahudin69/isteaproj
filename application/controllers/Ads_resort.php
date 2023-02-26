<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ads_resort extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('model_resort', 'model_krwenduser', 'model_hist', 'model_cabang', 'model_user'));
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

            $this->load->view('resort/resort_b_add');

            $role_id = $this->session->userdata('log_idgroup');
            $idwil = $this->session->userdata('log_idwil');

            $ok = $this->input->get('ok');
            $data['cabs'] = $this->model_cabang->all();
            switch ($role_id) {
                case ($role_id == 1):
                    $_resort = $this->model_resort->allrow();
                    if (isset($_resort) == null) {
                        $this->load->view('konten_add/empty');
                    } else {
                        if ($ok == 'Cari') {
                            $ncabang = $this->input->get('ncabang');
                            $nik = $this->input->get('nik');
                            $user = $this->input->get('user');

                            $data['ncabang'] = $ncabang;
                            $data['nik'] = $nik;
                            $data['user'] = $user;

                            $resort = $this->model_resort->all_search($ncabang, $nik, $user);
                            if (isset($resort) == null) {
                                $data['resort'] = $this->model_resort->all();
                                $this->load->view('konten_add/srckosong');
                            } else {
                                $data['resort'] = $this->model_resort->all_by_search($ncabang, $nik, $user);
                            }
                        } else {
                            $data['resort'] = $this->model_resort->all();
                        }
                        $this->load->view('resort/resort', $data);
                    }
                    break;

                case ($role_id == 2):
                    $__resort = $this->model_resort->allrekrow($idwil);
                    if (isset($__resort)) {
                        $data['resort'] = $this->model_resort->allrek($idwil);
                        $this->load->view('resort/resort_tabel', $data);
                    } else {
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
            $idwil = $this->session->userdata('log_idwil');
            $role_id = $this->session->userdata('log_idgroup');

                if ($role_id !== 1) {
                        // $data['krws'] = $this->model_krwenduser->all();
                        // var_dump($data['krws']);
                    // } else {
                        $idwil = $this->session->userdata('log_idwil');
                        // $data['krws'] = $this->model_krwenduser->allbyidwil($idwil);
            }

            $this->page->atas();

            if ($this->input->post('ok')) {
                $this->_add();
            }
            $this->load->view('resort/resort_add');

            $this->page->bawah();
    }

    public function _add()
    {
        $role = $this->session->userdata('log_idgroup');
        $idwil = $this->session->userdata('log_idwil');

        if ($role == 2) {
            $id_sys_user_role = $role + 1;
        } else {
            $id_sys_user_role = 2;
        }

        $id_sys_cab         = $idwil;
        $resort_name        = htmlspecialchars($this->input->post('name_resort'));
        $user_pass          = htmlspecialchars($this->input->post('user_pass'));
        $user_pass          = $this->core->doencrypt($user_pass);
        $idres_ori          = htmlspecialchars($this->input->post('idres'));
        $instatus           = 1;
        $user_log           = ($idwil - 1) . $idres_ori . $id_sys_user_role;
        $id_sys_krwenduser  = $this->input->post('krw');


        form_set_error_delimiters();
        $this->form_validation->set_rules(
            'name_resort',
            'name_resort',
            'required',
            [
                'required' => 'Nama Resort Tidak Boleh Kosong'
            ]
        );

        $this->form_validation->set_rules(
            'user_pass',
            'user_pass',
            'required',
            [
                'required' => 'Password Tidak Boleh Kosong'
            ]
        );

        $this->form_validation->set_rules(
            'idres',
            'idres',
            'required|is_numeric',
            [
                'is_numeric' => 'Kode Resort harus berisi Angka',
                'required' => 'Kode Resort Tidak boleh Kosong'
            ]
        );

        //sso_
            // $sso_instatus   = 0;
            // $sso_keterangan = 'nik || user_log';
        //sso_

        if ($this->form_validation->run() == true) {
            $this->userhist->add();
            $this->model_resort->add($id_sys_cab, $id_sys_user_role, $resort_name, $user_log, $user_pass, $idres_ori, $instatus, $id_sys_krwenduser);
            // $this->model_user->sso_add($resort_name, $sso_instatus, $sso_keterangan);
            redirect('888a562');
        }
    }

    public function st0($id)
    {
        $resort = $this->model_resort->get_by_id($id);
        $resort_name = $resort->resort_name;
        $this->deaktif($id);
        set_message('msg', 'danger', "Anda baru saja me-Non-Aktifkan status : <strong>{$resort_name}</strong>.");
        redirect('888a562');
    }

    public function st1($id)
    {
        $resort = $this->model_resort->get_by_id($id);
        $resort_name = $resort->resort_name;
        $this->aktif($id);
        set_message('msg', 'success', "Anda baru saja me-Aktifkan status : <strong>{$resort_name}</strong>.");
        redirect('888a562');
    }

    public function aktif($id)
    {
        $instatus = 1;
        $this->model_resort->aktif($id, $instatus);
    }
    public function deaktif($id)
    {
        $instatus = 0;
        $this->model_resort->aktif($id, $instatus);
    }

    public function edit($id)
    {
            if ($this->core->grupid() == false) {
                redirect('0036g56');
            }
            $data['byid'] = $this->model_resort->by_id($id);

            $role_id = $this->session->userdata('log_idgroup');
            if ($role_id == 1) {
                $data['krws'] = $this->model_krwenduser->all();
            } else {
                $idwil = $this->session->userdata('log_idwil');
                $xr = $this->model_krwenduser->allbyidwil_row($idwil);
                if(isset($xr)== 1){
                    $data['krws'] = $this->model_krwenduser->allbyidwil($idwil);
                }
            }

            $this->page->atas_detail();

            if ($this->input->post('ok')) {
                $this->_edit($id);
            }
            $this->load->view('resort/resort_edit', $data);

            $this->page->bawah();
        
    }
    public function _edit($id)
    {
        $role = $this->session->userdata('log_idgroup');
        $idwil = $this->session->userdata('log_idwil');

        if ($role == 2) {
            $id_sys_user_role = $role + 1;
        } else {
            $id_sys_user_role = 2;
        }

        $id_sys_cab         = $idwil;
        $resort_name        = htmlspecialchars($this->input->post('name_resort'));
        $user_pass          = htmlspecialchars($this->input->post('user_pass'));
        $user_pass          = $this->core->doencrypt($user_pass);
        $idres_ori          = htmlspecialchars($this->input->post('idres'));
        $instatus           = 1;
        $user_log           = ($idwil - 1) . $idres_ori . $id_sys_user_role;
        $id_sys_krwenduser  = $this->input->post('krw');


        form_set_error_delimiters();
        $this->form_validation->set_rules(
            'name_resort',
            'name_resort',
            'required',
            [
                'required' => 'Nama Resort Tidak Boleh Kosong'
            ]
        );

        $this->form_validation->set_rules(
            'user_pass',
            'user_pass',
            'required',
            [
                'required' => 'Password Tidak Boleh Kosong'
            ]
        );

        $this->form_validation->set_rules(
            'idres',
            'idres',
            'required|is_numeric',
            [
                'is_numeric' => 'Kode Resort harus berisi Angka',
                'required' => 'Kode Resort Tidak boleh Kosong'
            ]
        );

        if ($this->form_validation->run() == true) {
            $this->userhist->add();
            $this->model_resort->update($id, $id_sys_cab, $id_sys_user_role, $resort_name, $user_log, $user_pass, $idres_ori, $instatus, $id_sys_krwenduser);
            redirect('888a562');
        }
    }
}
