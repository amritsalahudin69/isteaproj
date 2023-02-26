<?php

defined('BASEPATH') or exit('No direct script access allowed');

class page
{
    public function gate(){
        $data['title'] = 'Dokumentasi Kredit Utama Karya Group';
        $data['masuk'] = 'iSTEA';
        return $data;
    }

    public function login(){
        $ci = &get_instance();
        $data = $this->gate();
        $ci->load->view('admin/juduladmin', $data);
        $ci->load->view('admin/login', $data);
        $ci->load->view('admin/bawah');
    }

    public function repass(){
        $ci = &get_instance();
        $data = $this->gate();
        $ci->load->view('admin/juduladmin', $data);
        $ci->load->view('ganti_pass/gantipass');
        $ci->load->view('admin/bawah');
    }

    public function judul(){
        $data['title'] = 'Dokumentasi Kredit Utama Karya Group';
        $data['masuk'] = 'Dokumentasi Berkas Kredit';
        return $data;
    }

    public function atas(){
        $ci = &get_instance();
        $data = $this->judul();
        $ci->load->view('admin/juduladmin', $data);
        $ci->load->view('mnindex/frm_mn_wrapper', $data);
        $ci->load->view('mnindex/frm_mn_topbar');
    }

    public function atas_detail(){
        $ci = &get_instance();
        $data = $this->judul();
        $ci->load->view('admin/juduladmin', $data);
        $ci->load->view('mnindex/frm_mn_topbar');
    }

    public function bawah(){
        $ci = &get_instance();
        $ci->load->view('admin/bawah');
        $ci->load->view('mnindex/frm_ft_2');
    }

    public function istealogin(){
        $ci = &get_instance();
        $data['title'] = 'iSTEA';
        $data['masuk'] = 'Login Sebagai Personal';
        $ci->load->view('admin/juduladmin', $data);
        $ci->load->view('admin/masuk', $data);
        $ci->load->view('admin/bawah');
    }
    public function isteadaftar(){
        $ci = &get_instance();
        $data['title'] = 'iSTEA';
        $data['daftar'] = 'Daftar';
        $data['cabangs'] = $ci->model_cabang->allnoroot();
        $ci->load->view('admin/juduladmin', $data);
        $ci->load->view('admin/registrasi', $data);
        $ci->load->view('admin/bawah');
    }

    public function istearepass(){
        $ci = &get_instance();
        $data['title'] = 'iSTEA';
        $data['masuk'] = 'UKBSD';
        $ci->load->view('user_asset/atas', $data);
        $ci->load->view('user_asset/navigasi', $data);
        $ci->load->view('ganti_pass/gantipass_user');
        $ci->load->view('user_asset/bawah');
    }
    
    public function pageerror()
    {
        $ci = &get_instance();
        $data['title'] = 'ERROR404';
        $data['masuk'] = 'ERROR404';
        $ci->load->view('admin/juduladmin', $data);
        $ci->load->view('_error/empty_data');
        $ci->load->view('admin/bawah');
    }

    public function user_atas()
    {
        $ci = &get_instance();
        $data['title'] = 'iSTEA';
        $data['masuk'] = 'UKBSD';
        $ci->load->view('user_asset/atas', $data);
        $ci->load->view('user_asset/navigasi', $data);
    }

    public function user_nonav()
    {
        $ci = &get_instance();
        $data['title'] = 'iSTEA';
        $data['masuk'] = 'UKBSD';
        $ci->load->view('user_asset/atas', $data);
    }


}