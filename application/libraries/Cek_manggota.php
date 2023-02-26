<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cek_manggota
{

    public function _cekmin()
    {
        $ci = &get_instance();
        $cekad = $ci->Model_danggota->_cekad();
        return $cekad;
    }

    public function _cekmin2()
    {
        $cek = $this->_cekmin();
        if (isset($cek->rekno) == null) {
            return true;
        } else {
            return false;
        }
    }
}
