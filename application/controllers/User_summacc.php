<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_summacc extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('model_krwenduser', 'model_cabang', 'model_krwdetail'));
        if ($this->hub->cekaktif() == false) {
            $this->hub->logout();
        }
    }

    public function index()
    {
            if ($this->core->grupid() == false) {
                redirect('0036g56');
            }

            $_path      = "select * from ornamen where id = 2";
            $path['1']     = $this->db->query($_path)->row();
            $data['path'] = $path['1']->prfix . $path['1']->path_pp;

            $id = $this->session->userdata('log_iduser1');
            $data['byid'] = $this->model_krwenduser->detailid($id);
            $this->page->user_atas();
            $this->load->view('user_konten/v_summary', $data);
            $this->load->view('user_asset/bawah');
     }

    public function _edit($id)
    {
        $id_sys_cab = $this->input->post('cab');
        $nik        = htmlspecialchars($this->input->post('nik'));
        $nama_krw   = htmlspecialchars($this->input->post('nama_krw'));

        form_set_error_delimiters();
        $this->form_validation->set_rules(
            'nik',
            'nik',
            'required|is_numeric',
            [
                'required' => 'NIK Tidak Boleh Kosong',
                'is_numeric' => 'NIK harus berisi Angka'
            ]
        );

        $this->form_validation->set_rules(
            'nama_krw',
            'nama_krw',
            'required',
            [
                'required' => 'Nama Lengkap Tidak Boleh Kosong',
            ]
        );

        if ($this->form_validation->run() == true) {
            $this->model_krwenduser->update($id, $id_sys_cab, $nik, $nama_krw);
        }
    }

    public function edit($id)
    {
        if ($this->hub->cekaktif() == false) {
            $this->hub->logout();
        } else {
            if ($this->core->grupid() == false) {
                redirect('0036g56');
            }
            $data['byid'] = $this->model_krwenduser->by_id($id);
            $data['cabs'] = $this->model_cabang->allnoroot();
            $data['detail'] = $this->model_krwdetail->detailid_($id);

            $data['title'] = 'iSTEA';
            $data['masuk'] = 'UKBSD';
            $this->load->view('user_asset/atas', $data);
            $this->load->view('user_asset/navigasi__', $data);

            $dtailkrw = $this->model_krwenduser->detailid($id);
            $dtailkrw = $dtailkrw->ktp;

            if ($this->input->post('ok')) {
                $this->_edit($id);
                if (isset($dtailkrw) == null) {
                    redirect('274100add/' . $data['byid']->id);
                } else {
                    redirect('274100edit/' . $data['detail']->id);
                }
            }
            $this->load->view('user_konten/edit_summary', $data);

            $this->load->view('user_asset/bawah');
        }
    }

    public function detailadd($id)
    {
        if ($this->hub->cekaktif() == false) {
            $this->hub->logout();
        } else {
            if ($this->core->grupid() == false) {
                redirect('0036g56');
            }
            $data['title'] = 'iSTEA';
            $data['masuk'] = 'UKBSD';
            $this->load->view('user_asset/atas', $data);
            $this->load->view('user_asset/navigasi__', $data);

            if ($this->input->post('ok')) {
                $this->adddet($id);
            }
            $this->load->view('user_konten/detailadd', $data);

            $this->load->view('user_asset/bawah');
        }
    }
    public function adddet($id)
    {
        $nktp = htmlspecialchars($this->input->post('nktp'));
        $ntlfn = htmlspecialchars($this->input->post('ntlfn'));
        $surel = htmlspecialchars($this->input->post('surel'));
        $nosim = htmlspecialchars($this->input->post('nosim'));
        $alamat = htmlspecialchars($this->input->post('alamat'));

        form_set_error_delimiters();
        $this->form_validation->set_rules(
            'nktp',
            'nktp',
            'required|is_numeric',
            [
                'is_numeric' => 'No. KTP harus berisi Angka',
                'required' => 'No. KTP Tidak boleh Kosong'
            ]
        );
        $this->form_validation->set_rules(
            'ntlfn',
            'ntlfn',
            'required|is_numeric',
            [
                'is_numeric' => 'No. Telfon harus berisi Angka',
                'required' => 'No. Telfon Tidak boleh Kosong'
            ]
        );
        if ($this->form_validation->run() == true) {
            $this->model_krwdetail->insert($id, $nktp, $ntlfn, $surel, $nosim, $alamat);
            redirect('274109');
        }
    }

    public function detailedit($id)
    {
        if ($this->hub->cekaktif() == false) {
            $this->hub->logout();
        } else {
            if ($this->core->grupid() == false) {
                redirect('0036g56');
            }
            $data['title'] = 'iSTEA';
            $data['masuk'] = 'UKBSD';
            $this->load->view('user_asset/atas', $data);
            $this->load->view('user_asset/navigasi__', $data);

            $data['byid'] = $this->model_krwdetail->detailid_($id);
            if ($this->input->post('ok')) {
                $this->editdet($id);
            }
            $this->load->view('user_konten/detailaedit', $data);

            $this->load->view('user_asset/bawah');
        }
    }
    public function editdet($id)
    {
        $nktp = htmlspecialchars($this->input->post('nktp'));
        $ntlfn = htmlspecialchars($this->input->post('ntlfn'));
        $surel = htmlspecialchars($this->input->post('surel'));
        $nosim = htmlspecialchars($this->input->post('nosim'));
        $alamat = htmlspecialchars($this->input->post('alamat'));

        form_set_error_delimiters();
        $this->form_validation->set_rules(
            'nktp',
            'nktp',
            'required|is_numeric',
            [
                'is_numeric' => 'No. KTP harus berisi Angka',
                'required' => 'No. KTP Tidak boleh Kosong'
            ]
        );
        $this->form_validation->set_rules(
            'ntlfn',
            'ntlfn',
            'required|is_numeric',
            [
                'is_numeric' => 'No. Telfon harus berisi Angka',
                'required' => 'No. Telfon Tidak boleh Kosong'
            ]
        );
        if ($this->form_validation->run() == true) {
            $this->model_krwdetail->update($id, $nktp, $ntlfn, $surel, $nosim, $alamat);
            redirect('274109');
        }
    }

    public function profilephoto($id)
    {
        if ($this->hub->cekaktif() == false) {
            $this->hub->logout();
        } else {
            if ($this->core->grupid() == false) {
                redirect('0036g56');
            }

            $_path      = "select * from ornamen where id = 2";
            $path['1']     = $this->db->query($_path)->row();
            $data['path'] = $path['1']->path_ . $path['1']->path_pp;  //stream view
            $_dircab = $path['1']->prfix . $path['1']->path_pp; //path upload
            $unlink = substr($_dircab, 2, 21);

            $data['byid'] = $this->model_krwenduser->by_id($id);
            $old_fp = $data['byid']->file_fp;

            $data['title'] = 'iSTEA';
            $data['masuk'] = 'UKBSD';
            $this->load->view('user_asset/atas', $data);
            $this->load->view('user_asset/navigasi__', $data);

            $this->load->library('upload');
            if ($this->input->post('ok')) {
                $name = $this->session->userdata('log_nik1');
                $config['file_name'] = $name;
                $config['upload_path'] = $_dircab;
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
                $config['max_size'] = '2000';
                $this->upload->initialize($config);

                if ($_FILES['file']['name']) {
                    if ($this->upload->do_upload('file')) {
                        //cek file yang ada----
                        if ($old_fp !== 'pp.jpg') {
                            unlink(FCPATH . $unlink . $old_fp); //hapus file foto yang lama
                        }

                        //cek file yang ada----

                        // $file_fp = $_FILES['file']['name'];
                        $file_fp = $this->upload->data('file_name');

                        //dbquery inject
                        $this->db->set('file_fp', $file_fp);
                        $this->db->where('id', $id);
                        $this->db->update('sys_krwenduser');
                        //dbquery inject

                        redirect('274109');
                    } else {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('_error/verror', $error);
                    }
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('_error/verror', $error);
                }
            }
            $this->load->view('user_konten/detailfp', $data);
            $this->load->view('user_asset/bawah');
        }
    }
}