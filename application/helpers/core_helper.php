<?php

function form_set_error_delimiters()
{
    $ci = &get_instance();
    $ci->form_validation->set_error_delimiters("<div class='help-block error1'>", "</div>");
}

function get_message($code)
{
    $ci = &get_instance();
    return $ci->session->flashdata($code);
}

function status($status)
{
    if ($status == 0) {
        return "Tidak Aktif";
    } else {
        return "Aktif";
    }
}

function rekap($resort)
{
    if ($resort == null) {
        return "";
    }else{

    }
}

function aktifasi($is_active)
{
    if ($is_active == 0) {
        return "Aktifkan";
    } else {
        return "Non Aktifkan";
    }
}

// function date($hari)
// {
//     $hari = date('d-m-Y');
//     $d = $hari;
//     return $d;
// }

function role($role)
{
    switch ($role) {
        case 1:
            return "Administrator";
        case 2:
            return "Superuser";
        default:
            return "User";
    }
}

function rupiah($angka)
{
    $angki = number_format((float)$angka, 2, '.', '');
    $ang1 = explode(".", $angki);
    if (count($ang1) < 2) {
        $comma = '00';
        $angka = $ang1[0];
    } else {
        $comma = substr($ang1[1], 0, 2);
        $angka = $ang1[0];
    }
    $rupiah = "";
    $rp = strlen($angka);
    while ($rp > 3) {
        $rupiah = "." . substr($angka, -3) . $rupiah;
        $s = strlen($angka) - 3;
        $angka = substr($angka, 0, $s);
        $rp = strlen($angka);
    }
    $rupiah = "Rp. " . $angka . $rupiah . "," . $comma;
    return $rupiah;
}

function set_checkbox1($cvalue, $dvalue)
{
    if ($cvalue == $dvalue) {
        return true;
    } else {
        return false;
    }
}

function set_message($code, $mode, $message)
{
    $ci = &get_instance();
    $ci->session->set_flashdata($code, "<div class='alert alert-{$mode}'>{$message}</div>");
}
