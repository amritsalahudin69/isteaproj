<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_fileacc extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('model_krwfile'));
        if ($this->hub->cekaktif() == false) {
            $this->hub->logout();
        }
    }

    public function dokumen()
    {
            $_path      = "select * from ornamen where id = 2";
            $path['1']     = $this->db->query($_path)->row();
            $data['_dircab'] = $path['1']->prfix . $path['1']->path_file;

            $ex = '1';
            $id = $this->session->userdata('log_iduser1');
            $cek = $this->model_krwfile->fileall_row($id, $ex);

            $this->page->user_atas();

            $this->load->view('user_button/b_addfile', $data);

            if (isset($cek) == null) {
                $this->load->view('user_asset/empty');
            } else {
                $data['files'] = $this->model_krwfile->file_all($id, $ex);
                $this->load->view('user_file/filedok', $data);
            }
            $this->load->view('user_asset/bawah');
    }

    public function dokadd()
    {
            $_path      = "select * from ornamen where id = 2";
            $path['1']  = $this->db->query($_path)->row();
            $_dircab    = $path['1']->prfix . $path['1']->path_file;

            $ex         = '1';
            $id         = $this->session->userdata('log_iduser1');
            $nik        = $this->session->userdata('log_nik1');

            $hit        = "select * from adm_fileupload where id = $id";
            $hitung     = $this->db->query($hit)->num_rows() + 1;

            $this->load->library('upload');
            if ($this->input->post('ok')) {
                $config['upload_path'] = $_dircab;
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['max_size'] = '8000';
                $config['file_name'] = '~' . $nik  . '-' . $ex . '-' . $hitung;;
                $this->upload->initialize($config);

                if ($_FILES['file']['name']) {
                    if ($this->upload->do_upload('file')) {
                        $id_sys_krwenduser = $id;
                        $file_name         = htmlspecialchars(strtoupper($this->input->post('filename')));
                        $indesc            = htmlspecialchars(strtolower($this->input->post('indesc')));
                        $inexten           = explode('.', $_FILES['file']['name']);
                        $inexten           = end($inexten);
                        $kode_file         = $ex;
                        $inprefix          = $_dircab;
                        $name_ori          = $_FILES['file']['name'];
                        $insize            = $_FILES['file']['size'];
                        $gen_fname         = $this->upload->data('file_name');

                        form_set_error_delimiters();
                        $this->form_validation->set_rules(
                            'filename',
                            'filename',
                            'required',
                            [
                                'required' => 'Nama File Tidak boleh Kosong'
                            ]
                        );
                        if ($this->form_validation->run() == true) {
                            $this->model_krwfile->insert($id_sys_krwenduser, $file_name,$gen_fname, $indesc, $inexten, $kode_file, $insize, $inprefix, $name_ori);
                            redirect('001');
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

            $this->page->user_nonav();
            $this->load->view('user_file/fileadd');
            $this->load->view('user_asset/bawah');
    }

    public function gambar()
    {
            $_path      = "select * from ornamen where id = 2";
            $path['1']     = $this->db->query($_path)->row();
            $data['_dircab'] = $path['1']->prfix . $path['1']->path_gambar;


            $ex = '6';
            $id = $this->session->userdata('log_iduser1');
            $cek = $this->model_krwfile->fileall_row($id, $ex);

            $this->page->user_atas();

            $this->load->view('user_button/b_addgambar', $data);

            if (isset($cek) == null) {
                $this->load->view('user_asset/empty');
            } else {
                $data['files'] = $this->model_krwfile->file_all($id, $ex);
                $this->load->view('user_file/fileimg',$data);
            }
            $this->load->view('user_asset/bawah');

    }

    public function gamadd()
    {
        $_path      = "select * from ornamen where id = 2";
        $path['1']  = $this->db->query($_path)->row();
        $_dircab    = $path['1']->prfix . $path['1']->path_file;

        $ex         = '6';
        $id         = $this->session->userdata('log_iduser1');
        $nik        = $this->session->userdata('log_nik1');

        $hit        = "select * from adm_fileupload where id = $id";
        $hitung     = $this->db->query($hit)->num_rows() + 1;

        $this->load->library('upload');
        if ($this->input->post('ok')) {
            $config['upload_path'] = $_dircab;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['max_size'] = '2000';
            $config['file_name'] = '~' . $nik  . '-' . $ex . '-' . $hitung;;
            $this->upload->initialize($config);

            if ($_FILES['file']['name']) {
                if ($this->upload->do_upload('file')) {
                    $id_sys_krwenduser = $id;
                    $file_name         = htmlspecialchars(strtoupper($this->input->post('filename')));
                    $indesc            = htmlspecialchars(strtolower($this->input->post('indesc')));
                    $inexten           = explode('.', $_FILES['file']['name']);
                    $inexten           = end($inexten);
                    $kode_file         = $ex;
                    $inprefix          = $_dircab;
                    $name_ori          = $_FILES['file']['name'];
                    $insize            = $_FILES['file']['size'];
                    $gen_fname         = $this->upload->data('file_name');

                    form_set_error_delimiters();
                    $this->form_validation->set_rules(
                        'filename',
                        'filename',
                        'required',
                        [
                            'required' => 'Nama File Tidak boleh Kosong'
                        ]
                    );
                    if ($this->form_validation->run() == true) {
                        $this->model_krwfile->insert($id_sys_krwenduser, $file_name,$gen_fname, $indesc, $inexten, $kode_file, $insize, $inprefix, $name_ori);
                        redirect('006');
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

        $this->page->user_nonav();
        $this->load->view('user_file/fileadd');
        $this->load->view('user_asset/bawah');
        
    }
}
