<?php

class Model_cabang extends CI_Model
{
    public function all()
    {
        $this->db->select('
               *
            ');
        $this->db->from('sys_cab');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function allbyidwil($id)
    {
        $this->db->select('
               *
            ');
        $this->db->from('sys_cab');
        $this->db->where('id_sys_cab', $id);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function allnoroot()
    {
        $this->db->select('
               *
            ');
        $this->db->from('sys_cab');
        $this->db->where('id_sys_cab !=', 1);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
