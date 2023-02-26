<?php

class Model_danggota_cud extends CI_Model
{
    public function add($norek, $nama, $ktp, $namasc, $ktpsc, $id_sys_user_data, $id_sys_cab, $id_sys_user_role, $genpid)
    {
        $data = array(
            'rekno'             => $norek,
            'inno_id'           => $ktp,
            'nama'              => $nama,
            'inno_idsc'         => $ktpsc,
            'nama_sc'           => $namasc,
            'id_sys_user_data'  => $id_sys_user_data,
            'id_sys_cab'        => $id_sys_cab,
            'id_sys_user_role'  => $id_sys_user_role,
            'genpid'            => $genpid
        );
        return $this->db->insert('sys_enduser', $data);
    }

    public function by_id($id)
    {
        $this->db->where('id_sys_enduser', $id);
        return $this->db->get('sys_enduser')->row();
    }

    public function update($id, $norek, $nama, $ktp, $namasc, $ktpsc)
    {
        $data = array(
            'rekno'             => $norek,
            'inno_id'           => $ktp,
            'nama'              => $nama,
            'inno_idsc'         => $ktpsc,
            'nama_sc'           => $namasc
        );
        $this->db->where('id_sys_enduser', $id);
        return $this->db->update('sys_enduser', $data);
    }
    public function update2($id, $norek, $nama, $ktp, $namasc, $ktpsc, $id_sys_user_data)
    {
        $data = array(
            'rekno'             => $norek,
            'inno_id'           => $ktp,
            'nama'              => $nama,
            'inno_idsc'         => $ktpsc,
            'nama_sc'           => $namasc,
            'id_sys_user_data'  => $id_sys_user_data
        );
        $this->db->where('id_sys_enduser', $id);
        return $this->db->update('sys_enduser', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_sys_enduser', $id);
        return $this->db->delete('sys_enduser');
    }
}
