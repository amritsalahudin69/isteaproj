<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Core
{
    public function doencrypt($string)
    {
        $ci = &get_instance();
        $key2 = 'nowar!';
        $ecI = hash_hmac('sha256', $string, $ci->config->item('encryption_key'), true);
        $ecII = base64_encode($ecI);
        $ecIII = sha1($key2 . md5($ecII)); //45karakter
        return $ecIII;
    }

    public function cek_password()
    {
        $ci = &get_instance();
        $id                  = $ci->session->userdata('log_idres');
        $oldpass             = "select * from sys_user_data where id_sys_user_data = $id";
        $data['oldpass']     = $ci->db->query($oldpass)->row();
        $oldpass             = $data['oldpass']->user_pass;

        return $oldpass;
    }

    public function gantipassword()
    {

        $ci = &get_instance();
        $id = $ci->session->userdata('log_idres');
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
                $ci->model_user->gantipass($id, $enpass);
                $this->logout();
            } else {
                set_message('msg', 'danger', "Password Lama Salah! Ulangi Lagi!");
            }
        }
    }

    public function _login()
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
            $user = $ci->model_user->login($user_log);
            $password_login = $this->doencrypt($password1);
            $status = $user->instatus;
            $pwd = $user->upwd;
            if (isset($user)) {
                if ($status == 1) {
                    if ($password_login == $pwd) {

                            $datalog = array(
                                'log_status'          => true,
                                'log_idres'           => $user->id_sys_user_data,
                                'log_resort'          => $user->resort_name,
                                'log_nik'             => $user->nik,
                                'log_idres_ori'       => $user->idres_ori,
                                'log_idgroup'         => $user->idgroup,
                                'log_kgrup'           => $user->kgroup,
                                'log_idwil'           => $user->id_wil,
                                'log_idwil_'          => $user->idwil
                            );
                            $ci->session->set_userdata($datalog);
                            $ci->userhist->login();
                            session_start();
                            $nik = $ci->session->log_nik;

                            redirect('0036g56');

                    } else {
                        set_message('daftar', 'danger', "Password Salah");
                        redirect('login');
                    }
                } else {
                    set_message('daftar', 'danger', "User Belum di Aktivasi oleh REKAP");
                    redirect('login');
                }
            } else {
                set_message('daftar', 'danger', "User Belum di Terdaftar");
                redirect('login');
            }
        }
    }

    public function cekaktif()
    {
        $ci = &get_instance();
        if ($ci->session->log_status == true) {
            return true;
        } else {
            return false;
        }
    }

    public function grupid()
    {
        $ci = &get_instance();
        $angka = $ci->session->log_idgroup;
        if ($angka > 2) {
            return false;
        } else {
            return true;
        }
    }

    public function pageaktif()
    {
        if ($this->cekaktif() == false) {
            set_message('msg', 'danger', 'Silahkan login terlebih dahulu.');
            redirect('login');
        }
    }

    public function pageid()
    {
        $ci = &get_instance();
        $m = $this->session->userdata('log_idgroup');
        var_dump($m);
    }

    public function logout()
    {
        $ci = &get_instance();
        $ci->session->unset_userdata('log_status');
        $ci->session->unset_userdata('log_idres');
        $ci->session->unset_userdata('log_resort');
        $ci->session->unset_userdata('log_nik');
        $ci->session->unset_userdata('log_idres_ori');
        $ci->session->unset_userdata('log_idgroup');
        $ci->session->unset_userdata('log_kgrup');
        $ci->session->unset_userdata('log_idwil');
        $ci->session->unset_userdata('log_idwil_');
        session_destroy();
        set_message('daftar', 'danger', "Anda Sudah Keluar");
        redirect('login');
    }

    public function asperson()
    {
        $ci = &get_instance();
        $ci->session->unset_userdata('log_status');
        $ci->session->unset_userdata('log_idres');
        $ci->session->unset_userdata('log_resort');
        $ci->session->unset_userdata('log_nik');
        $ci->session->unset_userdata('log_idres_ori');
        $ci->session->unset_userdata('log_idgroup');
        $ci->session->unset_userdata('log_kgrup');
        $ci->session->unset_userdata('log_idwil');
        $ci->session->unset_userdata('log_idwil_');
    }
}
