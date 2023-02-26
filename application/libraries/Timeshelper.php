<?php

defined('BASEPATH') or exit('No direct script access allowed');

class timeshelper
{
    public function std()
    {
        $m          = DateTime::createFromFormat('U.u', microtime(true));
        $waktu      = $m->format("Y-m-d\TH:i:s.u");
        $timestamp  = substr($waktu, 0, 23) . "Z";

        return $timestamp;
    }

    public function spt()
    {
        $timestamp = substr($this->std(), 11, 8);
        return $timestamp;
    }

    public function genpid()
    {
        $ci     = &get_instance();
        $hitung = "select * from sys_uldata_his";
        $hitung = $ci->db->query($hitung)->num_rows();
        $hitung = $hitung + 1;
        $iduser = $this->idresnull();
        $idwil  = $ci->session->userdata('log_idwil_');
        $act    = $iduser . '/' . $idwil . '~' . $this->spt() . '_' . $hitung;
        return $act;
    }

    public function noberkas()
    {
        $ci     = &get_instance();
        $iduser = $this->idresnull();
        $idwil  = $ci->session->userdata('log_idwil_');
        $thn    = substr($this->std(), 0, 4);
        $bln    = substr($this->std(), 6, 2);

        $noberkas = $thn . '/UK/' . $bln . '/' . $idwil . $iduser;
        return $noberkas;
    }

    public function idresnull()
    {
        $ci      = &get_instance();
        $resort  = $ci->session->userdata('log_idres_ori');
        if (!$resort) {
            $res = '00';
            return $res;
        }
    }

    public function genname()
    {
        $ci      = &get_instance();
        $id      = $ci->session->userdata('log_idwil');
        $idwill  = $ci->session->userdata('log_idwil_'); //real idwill
        $resort  = $ci->session->userdata('log_idres_ori'); //real resort

        $hitung  = $ci->Model_file_u->count1($id) + 1;
        $nourut  = str_pad($hitung, 5, '0', STR_PAD_LEFT);
        $thn     = substr($this->std(), 0, 4);
        $resort  = $this->idresnull();
        $hasil   = 'UK/' . $thn . '/' . $idwill . '-' . $resort . '/' . $nourut;
        // 6-UK/2021/001-01/00001
        return $hasil;
    }
}
