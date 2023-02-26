<?php

class Model_info extends CI_Model
{
    public function info_admin()
    {

        $this->db->select('
                            *
                        ');
        $this->db->from('sys_info');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function row_info_admin()
    {

        $this->db->select('
                            judul,
                            konten
                        ');
        $this->db->from('sys_info');
        $this->db->limit(1);
        return $this->db->get()->row();;
    }

    public function info()
    {

        $this->db->select('
                            *
                        ');
        $this->db->from('sys_info');
        $this->db->where('aktif', 1);
        $this->db->order_by('tglrilis', 'desc');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function cekrow_info()
    {

        $this->db->select('
                            judul,
                            konten
                        ');
        $this->db->from('sys_info');
        $this->db->where('aktif', 1);
        $this->db->limit(1);
        return $this->db->get()->row();;
    }

    public function add($judul, $konten, $aktif, $nfile)
    {
        $data = array (
            'judul'      =>$judul,
            'konten'     =>$konten,
            'aktif'      =>$aktif,
            'file'       => $nfile
        );
        return $this->db->insert('sys_info', $data);
    }

    public function _add($judul, $konten, $aktif)
    {
        $data = array (
            'judul'      =>$judul,
            'konten'     =>$konten,
            'aktif'      =>$aktif
        );
        return $this->db->insert('sys_info', $data);
    }

    public function edit($id, $judul, $konten, $aktif)
    {
        $data = array (
            'judul'      =>$judul,
            'konten'     =>$konten,
            'aktif'      =>$aktif
        );
        $this->db->where('id_sys_info', $id);
        return $this->db->update('sys_info', $data);
    }

    public function aktif($id, $aktif)
    {
        $data = array(
            'aktif'             => $aktif
        );
        $this->db->where('id_sys_info', $id);
        return $this->db->update('sys_info', $data);
    }
    public function aktif1($aktif)
    {
        $data = array(
            'aktif'             => $aktif
        );
        return $this->db->update('sys_info', $data);
    }

    public function get_by_id($id)
    {
        $this->db->where('id_sys_info', $id);
        return $this->db->get('sys_info')->row();
    }
}
