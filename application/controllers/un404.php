<?php
defined('BASEPATH') or exit('No direct script access allowed');

class un404 extends CI_Controller
{

    public function index()
    {
        $this->page->pageerror();
    }
}
