<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cekpage
{

    public function cekaktifpage($string)
    {
        $ci = &get_instance();
        $key2 = 'nowar!';
        $ecI = hash_hmac('sha256', $string, $ci->config->item('encryption_key'), true);
        $ecII = base64_encode($ecI);
        $ecIII = sha1 ($key2. md5($ecII));
        return $ecIII;
    }

}