<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ads_enddetail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('model_krwenduser', 'model_hist', 'model_cabang', 'model_krwfile'));
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        }
    }

    public function detail($id)
    {
            if ($this->core->grupid() == false) {
                redirect('0036g56');
            }
            $_path      = "select * from ornamen where id = 2";
            $path['1']     = $this->db->query($_path)->row();
            $data['path'] = $path['1']->path_ . $path['1']->path_pp;

            $data['byid'] = $this->model_krwenduser->detail($id);

            $_path           = "select * from ornamen where id = 2";
            $path['1']       = $this->db->query($_path)->row();

            $gbr = '6';
            $dgmbr['_dircab'] = $path['1']->path_ . $path['1']->path_gambar;

            $dok = '1';
            $dfile['_dircab'] = $path['1']->path_ . $path['1']->path_file;

            $cek = $this->model_krwfile->file_allrow($data['byid']->id, $dok);

            $this->page->atas_detail();

            $this->load->view('userdetail/detail_v1', $data);

            if (isset($cek)) {
                $dgmbr['files']    = $this->model_krwfile->file_allid($data['byid']->id, $gbr);
                $this->load->view('userdetail/fileimg', $dgmbr);
            } else {
                $this->load->view('konten_add/empty');
            }

            if (isset($cek)) {
                $dfile['files'] = $this->model_krwfile->file_allid($data['byid']->id, $dok);
                $this->load->view('userdetail/filedok', $dfile);
            } else {
                $this->load->view('konten_add/empty');
            }
            $this->load->view('admin/bawah');

    }
}
