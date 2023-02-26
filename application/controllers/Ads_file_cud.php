<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ads_file_cud extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'upload'));
        $this->load->model(array('Model_refmenu', 'Model_danggota', 'Model_dfile', 'Model_file_u', 'model_hist'));

        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        }
    }

    public function addimg($id)
    {
            $this->page->atas_detail();
            $idwil             = $this->session->userdata('log_idwil_');
            $data['dropdown1'] = $this->Model_file_u->dokty();
            $data['dircab']    = $this->Model_dfile->_path($idwil);
            $norek             = $this->Model_file_u->gennorek($id);
            $hitung            = $this->Model_file_u->count1($id) + 1;
            $hitung            = str_pad($hitung, 3, '0', STR_PAD_LEFT);
            $img               = '6';
            $_dircab           = $data['dircab']->dir_pathupload . $data['dircab']->idwil . $data['dircab']->dir_path_img;
            $_nama           = $data['dircab']->dir_pathupload2 . $data['dircab']->idwil . $data['dircab']->dir_path_img;

            $this->load->library('upload');
            if ($this->input->post('ok')) {

                $config['upload_path'] = $_dircab;
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
                $config['max_size'] = '4000';
                // $config['file_name'] = '~' . $norek->rekno . '-' . $img . '-' . $hitung;
                // $config['file_name'] = '~file_' . $img . time() . '-' . $hitung; //05072022
                $config['file_name'] = '~file_' . $img . time(); //05072022
                $this->upload->initialize($config);

                if ($_FILES['file']['name']) {
                    if ($this->upload->do_upload('file')) {
                        $id_sys_ref_dokument        = $this->input->post('idsck');
                        $file_name                  = htmlspecialchars(strtoupper($this->input->post('filename')));
                        $no_surat                   = htmlspecialchars($this->input->post('no_surat'));
                        $indesc                     = htmlspecialchars(strtolower($this->input->post('indesc')));
                        $indesc                     = $file_name . '||' . $no_surat . '||' . $indesc;
                        $inexten                    = explode('.', $_FILES['file']['name']);
                        $inexten                    = end($inexten);
                        $kode_file                  = $img;
                        $genpid                     = $this->timeshelper->genpid();
                        $name_ori                   = $_FILES['file']['name'];
                        $insize                     = $_FILES['file']['size'];
                        $gen_fname                   = $this->upload->data('file_name');
                        $inprefix                   = $_nama . $gen_fname;
                        $inprefixs                  = $_dircab;

                        form_set_error_delimiters();
                        $this->form_validation->set_rules(
                            'filename',
                            'filename',
                            'required',
                            [
                                'required' => 'Nama File Tidak boleh Kosong'
                            ]
                        );
                        $this->form_validation->set_rules(
                            'no_surat',
                            'no_surat',
                            'required',
                            [
                                'required' => 'No Surat Tidak boleh Kosong'
                            ]
                        );

                        if ($this->form_validation->run() == true) {
                            $this->userhist->add();
                            $this->insert($id, $id_sys_ref_dokument, $file_name, $no_surat, $gen_fname, $indesc, $inexten, $kode_file, $insize, $inprefix, $inprefixs, $genpid, $name_ori);
                        }
                    } else {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('_error/verror', $error);
                    }
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('_error/verror', $error);
                }
            }

            $this->load->view('konten/k_uploadimg', $data);
            $this->page->bawah();

    }

    public function adddok($id)
    {

            $this->page->atas_detail();

            $idwil             = $this->session->userdata('log_idwil_');
            $data['dropdown1'] = $this->Model_file_u->dokty();
            $data['dircab']    = $this->Model_dfile->_path($idwil);
            $norek             = $this->Model_file_u->gennorek($id);
            $hitung            = $this->Model_file_u->count1($id) + 1;
            $hitung            = str_pad($hitung, 1, '0', STR_PAD_LEFT);
            $img               = '1';
            $_dircab           = $data['dircab']->dir_pathupload . $data['dircab']->idwil . $data['dircab']->dir_path_dok;
            $_nama           = $data['dircab']->dir_pathupload2 . $data['dircab']->idwil . $data['dircab']->dir_path_dok;

            $this->load->library('upload');
            if ($this->input->post('ok')) {

                $config['upload_path'] = $_dircab;
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['max_size'] = '8000';
                // $config['file_name'] = '~file_' . $img . time() . '-' . $hitung; //05072022
                $config['file_name'] = '~file_' . $img . time(); //05072022
                $this->upload->initialize($config);

                if ($_FILES['file']['name']) {
                    if ($this->upload->do_upload('file')) {
                        $id_sys_ref_dokument        = $this->input->post('idsck');
                        $file_name                  = htmlspecialchars(strtoupper($this->input->post('filename')));
                        $no_surat                   = htmlspecialchars($this->input->post('no_surat'));
                        $indesc                     = htmlspecialchars(strtolower($this->input->post('indesc')));
                        $indesc                     = $file_name . '||' . $no_surat . '||' . $indesc;
                        $inexten                    = explode('.', $_FILES['file']['name']);
                        $inexten                    = end($inexten);
                        $kode_file                  = $img;
                        $genpid                     = $this->timeshelper->genpid();
                        $name_ori                   = $_FILES['file']['name'];
                        $insize                     = $_FILES['file']['size'];

                        $gen_fname                   = $this->upload->data('file_name');
                        $inprefix                   = $_nama . $gen_fname;
                        $inprefixs                   = $_dircab;

                        form_set_error_delimiters();
                        $this->form_validation->set_rules(
                            'filename',
                            'filename',
                            'required',
                            [
                                'required' => 'Nama File Tidak boleh Kosong'
                            ]
                        );
                        $this->form_validation->set_rules(
                            'no_surat',
                            'no_surat',
                            'required',
                            [
                                'required' => 'No Surat Tidak boleh Kosong'
                            ]
                        );

                        if ($this->form_validation->run() == true) {
                            $this->userhist->add();
                            $this->insert($id, $id_sys_ref_dokument, $file_name, $no_surat, $gen_fname, $indesc, $inexten, $kode_file, $insize, $inprefix, $inprefixs, $genpid, $name_ori);
                        }
                    } else {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('_error/verror', $error);
                    }
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('_error/verror', $error);
                }
            }

            $this->load->view('konten/k_uploadimg', $data);
            $this->page->bawah();

    }

    public function insert($id, $id_sys_ref_dokument, $file_name, $no_surat, $gen_fname, $indesc, $inexten, $kode_file, $insize, $inprefix, $inprefixs, $genpid, $name_ori)
    {
        // var_dump($inprefixs);
        // die;
        $this->Model_file_u->addupload($id, $id_sys_ref_dokument, $file_name, $no_surat, $gen_fname, $indesc, $inexten, $kode_file, $insize, $inprefix, $inprefixs, $genpid, $name_ori);
        set_message('msg', 'success', "Anda baru saja mengunggah Data");
        redirect('054hj44/' . $id);
    }

    public function _hapus($id)
    {
        // $this->_hapus($id);
    }

    public function hapus($id){
        $data['file'] = $this->Model_dfile->getfile_byid($id);
        // $path = str_replace('/', '\\',$data['file']->inprefixs). $data['file']->gen_fname;
        $path = $data['file']->inprefixs. $data['file']->gen_fname;
        $this->Model_dfile->hapus_file($id);
        set_message('hapus', 'danger', "Anda baru saja menghapus data Kredit : <strong>{$data['file']->indesc} || {$data['file']->gen_fname}</strong>.");
        unlink(FCPATH. $path);
        redirect('054hj44/' .$data['file']->id_sys_dnumloan);
    }

}
