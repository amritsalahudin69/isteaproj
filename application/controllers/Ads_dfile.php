<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ads_dfile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array(
            'Model_refmenu',
            'Model_danggota',
            'Model_dfile',
            'model_hist',
            'model_nloan_cud'
        ));

        if ($this->core->cekaktif() == false) {
            $this->core->logout();
          }
    }

    public function dfile($id)
    {
            $this->page->atas_detail();
            $data['detail'] = $this->Model_danggota->dn_detail($id);
            $this->load->view('konten/k_dossier_detail', $data);
            $cek = $this->Model_danggota->_numloan($id);
            $role_id = $this->session->userdata('log_idgroup');
            if($role_id==1){
                $cek1 = 0;
                $this->model_nloan_cud->cek($id,$cek1);
            }
            if (isset($cek) == null) {
                $this->load->view('konten_add/add_dossierdetail');
                $this->load->view('konten_add/empty');
            } else {
            //   echo $id;
                $data = array(
                  'loans' => $this->Model_danggota->numloan($id),
                  'ubah'  => $this->Model_danggota->ubah($id),
                  'd'    => $this->Model_danggota->ubah($id)->id_sys_dnumloan
                );
                $this->load->view('blank/top');
                $this->load->view('konten/k_dossier_numloan', $data);
                $this->load->view('blank/bot');
            }
            $this->page->bawah();
    }

   public function del($id)
    {  
        // echo $id;
        $cek_db = "select * from sys_file_loan where id_sys_dnumloan = $id";
        $cekx = $this->db->query($cek_db)->result_array();
        foreach ($cekx as $x){
            // $path = substr(str_replace('/', '\\',$x['inprefixs']). $x['gen_fname'], 2);
            $path = substr($x['inprefixs']. $x['gen_fname'], 2);
            $var = $x['id_sys_file_loan'];
            $cekrow = "select * from sys_file_loan where id_sys_file_loan = $var";
            $r = $this->db->query($cekrow)->row();
            if(isset($r)){
                if(isset($path)){
                    unlink(FCPATH. $path);
                }
                $this->model_nloan_cud->hapus($r->id_sys_file_loan);
            }
        }
        $xr = $this->model_nloan_cud->return($id);
        $return = $xr->id_sys_enduser;
        $hapus = $xr->id_sys_dnumloan;
        $this->model_nloan_cud->hapustgl($hapus);
        redirect('054a452/' . $return);
    }

    public function add($id)
    {
            $this->page->atas_detail();
            $data['detail'] = $this->Model_danggota->dn_detail($id);
            $this->load->view('konten/k_dossier_detail', $data);
            $cek = $this->Model_danggota->_numloan($id);
            if (isset($cek) == null) {
                $this->load->view('konten_add/empty');
            }else{
                $data['loans'] = $this->Model_danggota->numloan($id);
            }
            $this->load->view('konten/k_dfile_add', $data);
            if ($this->input->post('ok')) {
                $this->_add($id);
            }
            $this->page->bawah();

    }

    public function ubah($id)
    {

            $this->page->atas_detail();

            $data['detail'] = $this->Model_danggota->dn_detail($id);
            $this->load->view('konten/k_dossier_detail', $data);

            $cek = $this->Model_danggota->_numloan($id);

            if (isset($cek) == null) {
                $this->load->view('konten_add/empty');
            }else{
                $data['loans'] = $this->Model_danggota->numloan($id);
            }

            $this->load->view('konten/k_dfile_add', $data);
            if ($this->input->post('ok')) {
                $yloan      = $this->input->post('yloan');
                form_set_error_delimiters();
                $this->form_validation->set_rules(
                    'yloan',
                    'yloan',
                    'required',
                    [
                        'required' => 'Tanggal Pinjaman Tidak boleh Kosong'
                        ]
                    );
                if ($this->form_validation->run() == true) {
                $this->userhist->add();
                $this->model_nloan_cud->ubahdata($id, $yloan);
                set_message('msg', 'success', "Anda baru saja mengubah Data");
                redirect('054a452/' . $id);
                }
            }
            $this->page->bawah();

    }

    public function noberkas($id)
    {
        $hitung = $this->Model_danggota->count($id) + 1;
        $hitung = str_pad($hitung, 3, 0, STR_PAD_LEFT);
        $idwil  = $this->session->userdata('log_idwil_');
        $res    = $this->session->userdata('log_idres');
        $rek    = $this->Model_danggota->rekno($id);

        $noberkas = 'UK/' . $idwil . '-' . $rek->rekno . '-' . $hitung;
        return $noberkas;
    }

    public function _add($id)
    {
        $rek    = $this->Model_danggota->rekno($id)->rekno;
        $noberkas   = $this->noberkas($id);
        $desc_loan  = htmlspecialchars($this->input->post('desc_loan'));
        $yloan      = $this->input->post('yloan');
        $genpid     = $this->timeshelper->genpid();
        $num_loan   = $yloan . $rek;
        $cek1 = 1;
        $cek_qduplicat = $this->db->get_where('sys_dnumloan', ['num_loan'=>$num_loan])->row();
        if(isset($cek_qduplicat)==null){
            $cek_duplicat = 0;
        }else{
            $cek_duplicat = $cek_qduplicat->num_loan;
        }
        if($cek_duplicat == $num_loan){
            echo '<div class="container-fluid">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Accordion -->
                            <a href="'.site_url('054a452add/'. $id).'" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                <h1 class="m-0 font-weight-bold text-primary">Tanggal drop tidak boleh sama || KLIK disini Untuk Kembali ke Halaman Semula</h1>
                            </a>
                        </div>
                  </div>';
            die;
        }

        form_set_error_delimiters();
        $this->form_validation->set_rules(
            'yloan',
            'yloan',
            'required',
            [
                'required' => 'Tanggal Pinjaman Tidak boleh Kosong'
                ]
            );


        if ($this->form_validation->run() == true) {
        $this->userhist->add();
        $this->insert($id, $num_loan, $noberkas, $desc_loan, $yloan, $genpid, $cek1);
        }
    }

    public function insert($id, $num_loan, $noberkas, $desc_loan, $yloan, $genpid, $cek1)
    {
        $this->model_nloan_cud->tambah($id, $num_loan, $noberkas, $desc_loan, $yloan, $genpid, $cek1);
        set_message('msg', 'success', "Anda baru saja menambahkan Data");
        redirect('054a452/' . $id);
    }

    // public function del($id)
    // {   $cek_db = "select * from sys_file_loan where id_sys_dnumloan = $id";
    //     $cekx = $this->db->query($cek_db)->result_array();
    //     foreach ($cekx as $x){
    //         $path = substr(str_replace('/', '\\',$x['inprefixs']). $x['gen_fname'], 2);
    //         $var = $x['id_sys_file_loan'];
    //         $cekrow = "select * from sys_file_loan where id_sys_file_loan = $var";
    //         $r = $this->db->query($cekrow)->row();
    //         if(isset($r)){
    //             unlink(FCPATH. $path);
    //             $this->model_nloan_cud->hapus($r->id_sys_file_loan);
    //         }
    //     }
    //     $xr = $this->model_nloan_cud->return($id);
    //     $return = $xr->id_sys_enduser;
    //     $hapus = $xr->id_sys_dnumloan;
    //     $this->model_nloan_cud->hapustgl($hapus);
    //     redirect('054a452/' . $return);
    // }

}
