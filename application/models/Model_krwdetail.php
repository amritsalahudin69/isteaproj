<?php

class Model_krwdetail extends CI_Model
{
    public function detailid($id)
    {
        $this->db->select('
                id,
                id_krwenduser,
                nktp as ktp,
                ntlfn as tlfn,
                surel,
                nosim as sim,
                alamat,
            ');
        $this->db->from('sys_krwdetail');
        $this->db->where('id_krwenduser', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function detailid_($id)
    {
        $this->db->select('
                id,
                id_krwenduser,
                nktp as ktp,
                ntlfn as tlfn,
                surel,
                nosim as sim,
                alamat,
            ');
        $this->db->from('sys_krwdetail');
        $this->db->where('id_krwenduser', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    } 

    public function detailedit($id)
    {
        $this->db->select('
                id,
                id_krwenduser,
                nktp as ktp,
                ntlfn as tlfn,
                surel,
                nosim as sim,
                alamat,
            ');
        $this->db->from('sys_krwdetail');
        $this->db->where('id', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function insert($id_krwenduser, $nktp, $ntlfn, $surel, $nosim, $alamat)
    {
        $data = array(
            'id_krwenduser' => $id_krwenduser,
            'nktp'          => $nktp,
            'ntlfn'         => $ntlfn,
            'surel'         => $surel,
            'nosim'         => $nosim,
            'alamat'        => $alamat
        );
        return $this->db->insert('sys_krwdetail', $data);
    }

    public function update($id, $nktp, $ntlfn, $surel, $nosim, $alamat)
    {
        $data = array(
            'nktp'          => $nktp,
            'ntlfn'         => $ntlfn,
            'surel'         => $surel,
            'nosim'         => $nosim,
            'alamat'        => $alamat
        );
        $this->db->where('id', $id);
        return $this->db->update('sys_krwdetail', $data);
    }
}
