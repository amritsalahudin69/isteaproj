<?php

class Model_nloan_cud extends CI_Model
{
    public function tambah($id_sys_enduser, $num_loan, $noberkas, $desc_loan, $yloan, $genpid, $cek1)
    {
        $data = array(
            'id_sys_enduser' => $id_sys_enduser,
            'num_loan'       => $num_loan,
            'noberkas'       => $noberkas,
            'desc_loan'      => $desc_loan,
            'yloan'          => $yloan,
            'genpid'         => $genpid,
            'cek1'           => $cek1
        );
        return $this->db->insert('sys_dnumloan', $data);
    }

    public function ubahdata($id, $yloan)
    {
        $data = array(
            'yloan'          => $yloan
        );
        $this->db->where('id_sys_enduser', $id);
        return $this->db->update('sys_dnumloan', $data);
    }

    public function cek($id, $cek1)
    {
        $data = array(
            'cek1'  => $cek1
        );
        $this->db->where('id_sys_enduser', $id);
        $this->db->where('cek1', 1);
        return $this->db->update('sys_dnumloan', $data);
    }

    public function ubah($id, $noberkas)
    {
        $data = array(
            'noberkas'  => $noberkas
        );
        $this->db->where('id_sys_enduser', $id);
        return $this->db->update('sys_dnumloan', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_sys_file_loan', $id);
        return $this->db->delete('sys_file_loan');
    }

    public function return($id)
    {
        $this->db->select('
                e.id_sys_enduser,
                d.id_sys_dnumloan
            ');
        $this->db->from('sys_enduser e');
        $this->db->join('sys_dnumloan d', 'e.id_sys_enduser=d.id_sys_enduser');
        $this->db->where('d.id_sys_dnumloan', $id);
        return $this->db->get()->row();
    }

    public function hapustgl($id)
    {
        $this->db->where('id_sys_dnumloan', $id);
        return $this->db->delete('sys_dnumloan');
    }

}
