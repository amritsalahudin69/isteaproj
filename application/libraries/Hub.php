<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Hub
{
    public function doencrypt($string)
    {
        $ci = &get_instance();
        $key2 = 'nowar!';
        $ecI = hash_hmac('sha256', $string, $ci->config->item('encryption_key'), true);
        $ecII = base64_encode($ecI);
        $ecIII = sha1($key2 . md5($ecII));
        return $ecIII;
    }

    public function daftar()
    {
        $ci = &get_instance();
        $_path      = "select * from ornamen where id = 2";
        $path['1']     = $ci->db->query($_path)->row();
        $path = $path['1']->path_ . $path['1']->path_pp;

        $id_sys_cab = $ci->input->post('cabang');
        $id_adm_user_role = 3;
        $nik        = htmlspecialchars($ci->input->post('nik', true));
        $nama_krw   = htmlspecialchars($ci->input->post('name', true));
        $pass_      = htmlspecialchars($ci->input->post('password1', true));
        $pass_krw   = $this->doencrypt($pass_);
        $prfixpp    = $path;
        $file_fp    = 'pp.jpg';
        $status     = 0;

        $ceknik = $ci->db->get_where('sys_krwenduser', ['nik' => $nik])->row_array();
        $ceknik = $ceknik['nik'];
        if ($nik == $ceknik) {
            set_message('daftar', 'danger', "Nomor Induk Karyawan Sudah terdaftar, Lakukan Login!");
            redirect('6977');
        }

        form_set_error_delimiters();
        $ci->form_validation->set_rules(
            'nik',
            'nik',
            'required|is_numeric',
            [
                'required' => 'NIP Tidak Boleh Kosong',
                'is_numeric' => 'NIP harus berisi Angka'
            ]
        );

        $ci->form_validation->set_rules(
            'name',
            'name',
            'required',
            [
                'required' => 'Nama Lengkap Tidak Boleh Kosong',
            ]
        );

        $ci->form_validation->set_rules(
            'password1',
            'password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password tidak cocok',
                'min_length' => 'Password terlalu pendek'
            ]
        );
        $ci->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($ci->form_validation->run() == true) {
            $ci->model_krwenduser->add($id_sys_cab, $id_adm_user_role, $nik, $nama_krw, $pass_krw, $prfixpp, $file_fp, $status);
            set_message('daftar', 'success', "Pendaftaran Berhasil, Hubungi rekap Untuk Aktifasi!");
            redirect('6977');
        }
    }

    public function login()
    {
        $ci = &get_instance();
        $user_log = $ci->input->post('user_log', true);
        $password1 = $ci->input->post('password', true);

        $ci->load->library('form_validation');
        form_set_error_delimiters();
        $ci->form_validation->set_rules(
            'user_log',
            'user_log',
            'required|is_numeric|trim[sys_user_data.user_log]',
            [
                'is_numeric' => 'USER harus berisi Angka',
                'required' => 'USER tidak boleh Kosong'
            ]
        );
        $ci->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[1]',
            [
                'min_length' => 'Password terlalu pendek'
            ]
        );
        if ($ci->form_validation->run() == true) {
            $user = $ci->model_krwenduser->login($user_log);
            $password_login = $this->doencrypt($password1);
            $status = $user->status;
            $pwd = $user->upwd;
            if (isset($user)) {
                //code (cek)jika data ada(parameter nik)
                if ($status == 1) {
                    //code (cek)jika status 1(ada) parameter status
                    if ($password_login == $pwd) {
                        //code (cek) apakah inputan psswd sudah sama dengan psswd di field db
                        $datalog = array(
                            'log_status1'    => true,
                            'log_iduser1'    => $user->id,
                            'log_nik1'       => $user->nik,
                            'log_nama1'      => $user->nama_krw,
                            'log_idscab1'    => $user->id_sys_cab,
                            'log_idwil1'     => $user->idwil
                        );
                        $ci->session->set_userdata($datalog);
                        redirect('2741724');
                    } else {
                        set_message('daftar', 'danger', "Password Salah");
                        redirect('6977');
                    }
                } else {
                    set_message('daftar', 'danger', "User Belum di Aktivasi oleh REKAP");
                    redirect('6977');
                }
            } else {
                set_message('daftar', 'danger', "User Belum di Terdaftar");
                redirect('6977');
            }
        }
    }
    public function cek_password()
    {
        $ci                  = &get_instance();
        $id                  = $ci->session->userdata('log_iduser1');
        $oldpass             = "select * from sys_krwenduser where id = $id";
        $data['oldpass']     = $ci->db->query($oldpass)->row();
        $oldpass             = $data['oldpass']->pss_krw;
        return $oldpass;
    }

    public function gantipassword()
    {
        
        $ci = &get_instance();
        $id = $ci->session->userdata('log_iduser1');
        $password = $ci->input->post('password', true);
        $newpass = $ci->input->post('newpass', true);
        $confirm = $ci->input->post('confirm', true);

        $oldpass = $this->cek_password();
        $newpassword = $this->doencrypt($password);

        $ci->load->library('form_validation');
        form_set_error_delimiters();
        $ci->form_validation->set_rules(
            'password',
            'password',
            'required|min_length[3]',
            [
                'required'      => 'Password Lama Tidak Boleh Kosong',
                'min_length'    => 'Panjang Password Minimal 3 Karakter'
            ]
        );
        $ci->form_validation->set_rules(
            'newpass',
            'password baru',
            'required|min_length[3]',
            [
                'required'      => 'Password Baru Tidak Boleh Kosong',
                'min_length'    => 'Panjang Password Baru Minimal 3 Karakter'
            ]
        );
        $ci->form_validation->set_rules('confirm', 'konfirmasi password baru', 'required|min_length[3]|matches[newpass]');

        if ($ci->form_validation->run() == true) {
            if ($oldpass == $newpassword) {
                $enpass = $this->doencrypt($newpass);
                $ci->model_krwenduser->gantipass($id, $enpass);
                $this->logout();
            } else {
                set_message('msg', 'danger', "Password Lama Salah! Ulangi Lagi!");
            }
        }
    }

    public function logout()
    {
        $ci = &get_instance();
        $ci->session->unset_userdata('log_status1');
        $ci->session->unset_userdata('log_nik1');
        $ci->session->unset_userdata('log_nama1');
        $ci->session->unset_userdata('log_idscab1');
        $ci->session->unset_userdata('log_idwil1');
        set_message('daftar', 'danger', "Anda Sudah Keluar");
        redirect('6977');
    }

    public function cekaktif()
    {
        $ci = &get_instance();
        if ($ci->session->log_status1 == true) {
            return true;
        } else {
            return false;
        }
    }
}
