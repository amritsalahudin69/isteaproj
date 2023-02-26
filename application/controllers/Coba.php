<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coba extends CI_Controller
{
    public function index(){
        // ECHO 'hallo';
        unlink(FCPATH .'/assets/file.php');
            
    }
}