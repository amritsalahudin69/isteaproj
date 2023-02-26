<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ads_dkredit_cud extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'user_agent'));
        $this->load->model(array('model_refmenu','model_danggota_cud', 'model_hist', 'Model_nloan_cud', 'Model_danggota'));

        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        }
    }

    /*private function _add()
    {
        $iduser = $this->session->userdata('log_idres');
        $idwil = $this->session->userdata('log_idwil');
        $role_id = $this->session->userdata('log_idgroup');

        $norek              = htmlspecialchars($this->input->post('norek'));
        $nama               = htmlspecialchars($this->input->post('nama'));
        $nama               = strtoupper($nama);
        $ktp                = $this->input->post('ktp');
        $namasc             = $this->input->post('namasc');
        $namasc             = strtoupper($namasc);
        $ktpsc              = $this->input->post('ktpsc');
        $id_sys_user_data   = $iduser;
        $id_sys_cab         = $idwil;
        $id_sys_user_role   = $role_id;
        $genpid             = $this->timeshelper->genpid();

        form_set_error_delimiters();
        $this->form_validation->set_rules(
            'norek',
            'norek',
            'required|min_length[12]|is_unique[sys_enduser.rekno]',    //[nasabah.norek]
            [
                'required' => 'No. Rekening Tidak boleh Kosong',
                'min_length'    => 'Panjang Rekening Minimal 12 Karakter',  //1120111 1586
                'is_unique'    => 'No Rekening Sudah ada. Mohon Cek Kembali!!',
            ]
        );

        $this->form_validation->set_rules(
            'nama',
            'nama',
            'required',
            [
                'required' => 'No. Rekening Tidak boleh Kosong',
            ]
        );

        $this->form_validation->set_rules(
            'ktp',
            'ktp',
            'required|is_numeric|min_length[15]',
            [
                'is_numeric' => 'ID KTP harus berisi Angka',
                'required' => 'No. Rekening Tidak boleh Kosong',
                'min_length'    => 'Panjang Rekening Minimal 16 Karakter'
            ]
        );

        $this->form_validation->set_rules(
            'namasc',
            'namasc',
            'required',
            [
                'required' => 'No. Rekening Tidak boleh Kosong',
            ]
        );

        $this->form_validation->set_rules(
            'ktpsc',
            'ktpsc',
            'required|is_numeric|min_length[16]',
            [
                'is_numeric' => 'ID KTP harus berisi Angka',
                'required' => 'No. Rekening Tidak boleh Kosong',
                'min_length'    => 'Panjang Rekening Minimal 16 Karakter'
            ]
        );

        if ($this->form_validation->run() == true) {
            $this->userhist->add();
            $this->insert($norek, $nama, $ktp, $namasc, $ktpsc, $id_sys_user_data, $id_sys_cab, $id_sys_user_role, $genpid);
        }
    } */

    private function insert($norek, $nama, $ktp, $namasc, $ktpsc, $id_sys_user_data, $id_sys_cab, $id_sys_user_role, $genpid)
    {
        $this->model_danggota_cud->add($norek, $nama, $ktp, $namasc, $ktpsc, $id_sys_user_data, $id_sys_cab, $id_sys_user_role, $genpid);
        set_message('msg', 'success', "Anda baru saja menambahkan Data Anggota.");
        redirect('054a562');
    }

    public function add()
    {
            if ($this->input->post('ok')) {
                // $this->_add();

                $iduser = $this->session->userdata('log_idres');
                $idwil = $this->session->userdata('log_idwil');
                $role_id = $this->session->userdata('log_idgroup');

                $norek              = htmlspecialchars($this->input->post('norek'));
                $nama               = htmlspecialchars($this->input->post('nama'));
                $nama               = strtoupper($nama);
                $ktp                = $this->input->post('ktp');
                $namasc             = $this->input->post('namasc');
                $namasc             = strtoupper($namasc);
                $ktpsc              = $this->input->post('ktpsc');
                $id_sys_user_data   = $iduser;
                $id_sys_cab         = $idwil;
                $id_sys_user_role   = $role_id;
                $genpid             = $this->timeshelper->genpid();

                form_set_error_delimiters();
                $this->form_validation->set_rules(
                    'norek',
                    'norek',
                    'required|min_length[12]|is_unique[sys_enduser.rekno]',    //[nasabah.norek]
                    [
                        'required' => 'No. Rekening Tidak boleh Kosong',
                        'min_length'    => 'Panjang Rekening Minimal 12 Karakter',  //1120111 1586
                        'is_unique'    => 'No Rekening Sudah ada. Mohon Cek Kembali!!',
                    ]
                );

                $this->form_validation->set_rules(
                    'nama',
                    'nama',
                    'required',
                    [
                        'required' => 'No. Rekening Tidak boleh Kosong',
                    ]
                );

                $this->form_validation->set_rules(
                    'ktp',
                    'ktp',
                    'required|is_numeric|min_length[15]',
                    [
                        'is_numeric' => 'ID KTP harus berisi Angka',
                        'required' => 'No. Rekening Tidak boleh Kosong',
                        'min_length'    => 'Panjang Rekening Minimal 16 Karakter'
                    ]
                );

                $this->form_validation->set_rules(
                    'namasc',
                    'namasc',
                    'required',
                    [
                        'required' => 'No. Rekening Tidak boleh Kosong',
                    ]
                );

                $this->form_validation->set_rules(
                    'ktpsc',
                    'ktpsc',
                    'required|is_numeric|min_length[16]',
                    [
                        'is_numeric' => 'ID KTP harus berisi Angka',
                        'required' => 'No. Rekening Tidak boleh Kosong',
                        'min_length'    => 'Panjang Rekening Minimal 16 Karakter'
                    ]
                );

                if ($this->form_validation->run() == true) {
                    $this->userhist->add();
                    $this->insert($norek, $nama, $ktp, $namasc, $ktpsc, $id_sys_user_data, $id_sys_cab, $id_sys_user_role, $genpid);
                }
            }

            $this->page->atas();
            $this->load->view('konten/k_dossier_h_add');
            $this->page->bawah();

    }

    private function _edit($id)
      {
        $role_id            = $this->session->userdata('log_idgroup');
        $norek              = htmlspecialchars($this->input->post('norek'));
        $nama               = htmlspecialchars($this->input->post('nama'));
        $nama               = strtoupper($nama);
        $ktp                = $this->input->post('ktp');
        $namasc             = $this->input->post('namasc');
        $namasc             = strtoupper($namasc);
        $ktpsc              = $this->input->post('ktpsc');
        if($role_id == 1){
          $id_sys_user_data   = $this->input->post('resort');
        }

        form_set_error_delimiters();
        $this->form_validation->set_rules(
            'norek',
            'norek',
            'required|min_length[11]',
            [
                'required' => 'No. Rekening Tidak boleh Kosong',
                'min_length'    => 'Panjang Rekening Minimal 11 Karakter'
            ]
        );

        $this->form_validation->set_rules(
            'nama',
            'nama',
            'required',
            [
                'required' => 'No. Rekening Tidak boleh Kosong',
            ]
        );

        $this->form_validation->set_rules(
            'ktp',
            'ktp',
            'required|is_numeric|min_length[16]',
            [
                'is_numeric' => 'ID KTP harus berisi Angka',
                'required' => 'No. Rekening Tidak boleh Kosong',
                'min_length'    => 'Panjang Rekening Minimal 16 Karakter'
            ]
        );

        $this->form_validation->set_rules(
            'namasc',
            'namasc',
            'required',
            [
                'required' => 'No. Rekening Tidak boleh Kosong',
            ]
        );

        $this->form_validation->set_rules(
            'ktpsc',
            'ktpsc',
            'required|is_numeric|min_length[16]',
            [
                'is_numeric' => 'ID KTP harus berisi Angka',
                'required' => 'No. Rekening Tidak boleh Kosong',
                'min_length'    => 'Panjang Rekening Minimal 16 Karakter'
            ]
        );

        if ($this->form_validation->run() == true) {
            $this->userhist->update();
              if($role_id == 1){
              $this->update2($id, $norek, $nama, $ktp, $namasc, $ktpsc, $id_sys_user_data);
            }else{
              $this->update($id, $norek, $nama, $ktp, $namasc, $ktpsc);
            }
        }
    }

    private function update2($id, $norek, $nama, $ktp, $namasc, $ktpsc, $id_sys_user_data)
    {
        $this->model_danggota_cud->update2($id, $norek, $nama, $ktp, $namasc, $ktpsc, $id_sys_user_data);
        set_message('msg', 'success', "Anda baru saja Mengubah Data Anggota");
        redirect('054a562');
    }

    private function update($id, $norek, $nama, $ktp, $namasc, $ktpsc)
    {
        $this->model_danggota_cud->update($id, $norek, $nama, $ktp, $namasc, $ktpsc);
        set_message('msg', 'success', "Anda baru saja Mengubah Data Anggota");
        redirect('054a562');
    }

    public function edit($id)
    {
            $data['byid'] = $this->model_danggota_cud->by_id($id);
            if ($this->input->post('ok')) {
                $this->update_numloan($id);
                $this->_edit($id);
            }
            $this->page->atas_detail();
            $this->load->view('konten/k_dossier_h_edit', $data);
            $this->page->bawah();

    }

    private function update_numloan ($id) //05072022
    {
        $data['byid'] = $this->model_danggota_cud->by_id($id);
        $norek              = htmlspecialchars($this->input->post('norek'));
        $hitung = $this->Model_danggota->count($id) + 1;
        $hitung = str_pad($hitung, 3, 0, STR_PAD_LEFT);
        $idwil  = $this->session->userdata('log_idwil_');
        $noberkas = 'UK/' . $idwil . '-' . $norek  . '-' . 'PDL_edited';
        $this->Model_nloan_cud->ubah($id, $noberkas);
    }

    public function del($id)
    {
        $this->userhist->delete();
        $this->model_danggota_cud->delete($id);
        set_message('msg', 'danger', "Anda baru saja menghapus Data");
        redirect('054a562');
    }
}
