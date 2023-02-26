<?php

defined('BASEPATH') or exit('No direct script access allowed');

class userhist
{
    public function insert($gen_id, $trigg_desc, $id_sys_user_data, $id_sys_cab, $browser, $osv, $ipclient, $genpid)
    {
        $ci = &get_instance();
        $ci->model_hist->add($gen_id, $trigg_desc, $id_sys_user_data, $id_sys_cab, $browser, $osv, $ipclient, $genpid);
    }
    public function actlogin()
    {
        $ci = &get_instance();

        $iduser = $ci->session->userdata('log_resort');
        $idwil = $ci->session->userdata('log_idwil_');
        $act = 'User : ' . $iduser . ' Dari Cabang : ' . $idwil . ' telah Login ';
        return $act;
    }

    public function login()
    {
        $ci = &get_instance();
        $iduser = $ci->session->userdata('log_resort');
        $idgrup = $ci->session->userdata('log_idgroup');
        $idwil = $ci->session->userdata('log_idwil_');
        $nmfile = ' hist_log ' . time();

        $gen_id             = $idwil . $iduser . $nmfile;
        $trigg_desc         = $this->actlogin();
        $id_sys_user_data   = $idgrup;
        $id_sys_cab         = $idwil;
        $browser            = $ci->agent->browser();
        $osv                = $ci->agent->platform();
        $ipclient           = $ci->input->ip_address();
        $genpid             = $ci->timeshelper->genpid();

        $this->insert($gen_id, $trigg_desc, $id_sys_user_data, $id_sys_cab, $browser, $osv, $ipclient, $genpid);
    }

    public function actlogout()
    {
        $ci = &get_instance();

        $iduser = $ci->session->userdata('log_resort');
        $idwil = $ci->session->userdata('log_idwil_');
        $act = 'User : ' . $iduser . ' Dari Cabang : ' . $idwil . ' menghentikan Sesi ';
        return $act;
    }

    // $trigg_desc         = $this->actlogout();

    public function logout()
    {
        $ci = &get_instance();
        $iduser = $ci->session->userdata('log_resort');
        $idgrup = $ci->session->userdata('log_idgroup');
        $idwil = $ci->session->userdata('log_idwil_');
        $nmfile = ' hist_log ' . time();

        $gen_id             = $idwil . $iduser . $nmfile;
        $trigg_desc         = $this->actlogout();
        $id_sys_user_data   = $idgrup;
        $id_sys_cab         = $idwil;
        $browser            = $ci->agent->browser();
        $osv                = $ci->agent->platform();
        $ipclient           = $ci->input->ip_address();
        $genpid             = $ci->timeshelper->genpid();

        $this->insert($gen_id, $trigg_desc, $id_sys_user_data, $id_sys_cab, $browser, $osv, $ipclient, $genpid);
    }


    public function act()
    {
        $ci = &get_instance();

        $iduser = $ci->session->userdata('log_resort');
        $idwil = $ci->session->userdata('log_idwil_');
        $act = 'User : ' . $iduser . ' Dari Cabang : ' . $idwil . ' Sudah menambahkan Data ';
        return $act;
    }

    public function add()
    {
        $ci = &get_instance();
        $iduser = $ci->session->userdata('log_resort');
        $idgrup = $ci->session->userdata('log_idgroup');
        $idwil = $ci->session->userdata('log_idwil_');
        $nmfile = 'hist_add' . time();

        $gen_id             = $idwil . $iduser . $nmfile;
        $trigg_desc          = $this->act();
        $id_sys_user_data   = $idgrup;
        $id_sys_cab         = $idwil;
        $browser            = $ci->agent->browser();
        $osv                = $ci->agent->platform();
        $ipclient           = $ci->input->ip_address();
        $genpid             = $ci->timeshelper->genpid();

        $this->insert($gen_id, $trigg_desc, $id_sys_user_data, $id_sys_cab, $browser, $osv, $ipclient, $genpid);
    }

    public function actdate()
    {
        $ci = &get_instance();

        $iduser = $ci->session->userdata('log_resort');
        $idwil = $ci->session->userdata('log_idwil_');
        $act = 'User : ' . $iduser . ' Dari Cabang : ' . $idwil . ' Telah Mengubah Data ';
        return $act;
    }

    public function update()
    {
        $ci = &get_instance();
        $iduser = $ci->session->userdata('log_resort');
        $idgrup = $ci->session->userdata('log_idgroup');
        $idwil = $ci->session->userdata('log_idwil_');
        $nmfile = 'hist_updt' . time();

        $gen_id             = $idwil . $iduser . $nmfile;
        $trigg_desc          = $this->actdate();
        $id_sys_user_data   = $idgrup;
        $id_sys_cab         = $idwil;
        $browser            = $ci->agent->browser();
        $osv                = $ci->agent->platform();
        $ipclient           = $ci->input->ip_address();
        $genpid             = $ci->timeshelper->genpid();

        $this->insert($gen_id, $trigg_desc, $id_sys_user_data, $id_sys_cab, $browser, $osv, $ipclient, $genpid);
    }

    public function actdel()
    {
        $ci = &get_instance();

        $iduser = $ci->session->userdata('log_resort');
        $idwil = $ci->session->userdata('log_idwil_');
        $act = 'User : ' . $iduser . ' Dari Cabang : ' . $idwil . ' Telah Menghapus Data ';
        return $act;
    }

    public function delete()
    {
        $ci = &get_instance();
        $iduser = $ci->session->userdata('log_resort');
        $idgrup = $ci->session->userdata('log_idgroup');
        $idwil2 = $ci->session->userdata('log_idwil_');
        $nmfile = 'hist_updt' . time();

        $gen_id             = $idwil2 . $iduser . $nmfile;
        $trigg_desc          = $this->actdel();
        $id_sys_user_data   = $idgrup;
        $id_sys_cab         = $idwil2;
        $browser            = $ci->agent->browser();
        $osv                = $ci->agent->platform();
        $ipclient           = $ci->input->ip_address();
        $genpid             = $ci->timeshelper->genpid();

        $this->insert($gen_id, $trigg_desc, $id_sys_user_data, $id_sys_cab, $browser, $osv, $ipclient, $genpid);
    }
}
