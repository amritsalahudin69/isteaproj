<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ads_enduserkrw extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('model_krwenduser', 'model_hist', 'model_cabang'));

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
            $this->load->view('userkrw/userkrw_b_add');

            $role_id = $this->session->userdata('log_idgroup');
            $idwil = $this->session->userdata('log_idwil');

            $_path      = "select * from ornamen where id = 2";
            $path['1']     = $this->db->query($_path)->row();
            $data['path'] = $path['1']->prfix . $path['1']->path_pp;

            $ok = $this->input->get('ok');
            $data['cabs'] = $this->model_cabang->all();
            switch ($role_id) {
                case ($role_id == 1):
                    $_user = $this->model_krwenduser->allrow();
                    if (isset($_user) == null) {
                        $this->load->view('konten_add/empty');
                    } else {
                        if ($ok == 'Cari') {
                            $ncabang = $this->input->get('ncabang');
                            $nik = $this->input->get('nik');
                            $nama_krw = $this->input->get('nama_krw');

                            $data['ncabang'] = $ncabang;
                            $data['nik'] = $nik;
                            $data['nama_krw'] = $nama_krw;

                            $user = $this->model_krwenduser->all_search($ncabang, $nik, $nama_krw);
                            if (isset($user) == null) {
                                $data['user'] = $this->model_krwenduser->all();
                                $this->load->view('konten_add/srckosong');
                            } else {
                                $data['user'] = $this->model_krwenduser->all_by_search($ncabang, $nik, $nama_krw);
                            }
                        } else {
                            $data['user'] = $this->model_krwenduser->all();
                        }
                        $this->load->view('userkrw/userkrw_cari', $data);
                        $this->load->view('userkrw/userkrw_card', $data);
                    }
                    break;
                case ($role_id == 2):
                    $_user = $this->model_krwenduser->allrekrow($idwil);
                    if (isset($_user) == null) {
                        $this->load->view('konten_add/empty');
                    } else {
                        $data['user'] = $this->model_krwenduser->allrek($idwil);
                        $this->load->view('userkrw/userkrw_card', $data);
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
            $role_id = $this->session->userdata('log_idgroup');
            if ($role_id == 1) {
                $data['cabs'] = $this->model_cabang->all();
            } else {
                $idwil = $this->session->userdata('log_idwil');
                $data['cabs'] = $this->model_cabang->allbyidwil($idwil);
            }
            $this->page->atas();

            if ($this->input->post('ok')) {
                $this->_add();
            }
            $this->load->view('userkrw/userkrw_add', $data);

            $this->page->bawah();
        
    }

    public function _add()
    {

        $_path      = "select * from ornamen where id = 2";
        $path['1']     = $this->db->query($_path)->row();
        $path = $path['1']->path_ . $path['1']->path_pp;

        $id_sys_cab       = $this->input->post('cab');
        $id_adm_user_role = 3;
        $nik              = htmlspecialchars($this->input->post('nik'));
        $nama_krw         = htmlspecialchars($this->input->post('nama_krw'));
        $pass_            = htmlspecialchars($this->input->post('pass_krw'));
        $pass_krw         = $this->core->doencrypt($pass_);
        $prfixpp          = $path;
        $file_fp          = 'pp.jpg';
        $status           = 1;

        form_set_error_delimiters();
        $this->form_validation->set_rules(
            'nik',
            'nik',
            'required|is_numeric',
            [
                'required' => 'NIK Tidak Boleh Kosong',
                'is_numeric' => 'NIK harus berisi Angka'
            ]
        );

        $this->form_validation->set_rules(
            'nama_krw',
            'nama_krw',
            'required',
            [
                'required' => 'Nama Lengkap Tidak Boleh Kosong',
            ]
        );

        $this->form_validation->set_rules(
            'pass_krw',
            'pass_krw',
            'required',
            [
                'required' => 'Password Tidak Boleh Kosong'
            ]
        );


        if ($this->form_validation->run() == true) {
            $this->userhist->add();
            $this->model_krwenduser->add($id_sys_cab, $id_adm_user_role, $nik, $nama_krw, $pass_krw, $prfixpp, $file_fp, $status);
            redirect('9696ip');
        }
    }

    public function st0($id)
    {
        $nama = $this->model_krwenduser->get_by_id($id);
        $nama_krw = $nama->nama_krw;
        $this->deaktif($id);
        set_message('msg', 'danger', "Anda baru saja me-Non-Aktifkan status : <strong>{$nama_krw}</strong>.");
        redirect('9696ip');
    }

    public function st1($id)
    {
        $nama = $this->model_krwenduser->get_by_id($id);
        $nama_krw = $nama->nama_krw;
        $this->aktif($id);
        set_message('msg', 'success', "Anda baru saja me-Aktifkan status : <strong>{$nama_krw}</strong>.");
        redirect('9696ip');
    }

    public function aktif($id)
    {
        $status = 1;
        $this->model_krwenduser->aktif($id, $status);
    }
    public function deaktif($id)
    {
        $status = 0;
        $this->model_krwenduser->aktif($id, $status);
    }

    public function edit($id)
    {
        if ($this->core->cekaktif() == false) {
            redirect('login');
        } else {
            if ($this->core->grupid() == false) {
                redirect('0036g56');
            }
            $data['byid'] = $this->model_krwenduser->by_id($id);

            $role_id = $this->session->userdata('log_idgroup');
            if ($role_id == 1) {
                $data['cabs'] = $this->model_cabang->all();
            } else {
                $idwil = $this->session->userdata('log_idwil');
                $data['cabs'] = $this->model_cabang->allbyidwil($idwil);
            }
            $this->page->atas_detail();

            if ($this->input->post('ok')) {
                $this->_edit($id);
            }
            $this->load->view('userkrw/userkrw_edit', $data);
            $this->page->bawah();
        }
    }
    public function _edit($id)
    {
        $id_sys_cab = $this->input->post('cab');
        $nik        = htmlspecialchars($this->input->post('nik'));
        $nama_krw   = htmlspecialchars($this->input->post('nama_krw'));

        form_set_error_delimiters();
        $this->form_validation->set_rules(
            'nik',
            'nik',
            'required|is_numeric',
            [
                'required' => 'NIK Tidak Boleh Kosong',
                'is_numeric' => 'NIK harus berisi Angka'
            ]
        );

        $this->form_validation->set_rules(
            'nama_krw',
            'nama_krw',
            'required',
            [
                'required' => 'Nama Lengkap Tidak Boleh Kosong',
            ]
        );

        if ($this->form_validation->run() == true) {
            $this->userhist->add();
            $this->model_krwenduser->update($id, $id_sys_cab, $nik, $nama_krw);
            redirect('9696ip');
        }
    }
}
