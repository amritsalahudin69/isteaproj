<?php

class Model_order extends CI_Model
{
    public function allrow()
    {
        $this->db->select('
                           *
                        ');
        $this->db->from('sys_order');
        $this->db->limit(1);
        return $this->db->get()->row();;
    }
    public function all()
    {
        $this->db->select('
                        sys_order.*,
                        sys_cab.nama_cab
                        ');
        $this->db->from('sys_order');
        $this->db->join('sys_user_data', 'sys_order.user_log=sys_user_data.user_log');
        $this->db->join('sys_cab', 'sys_user_data.id_sys_cab=sys_cab.id_sys_cab');
        $this->db->order_by('indate', 'desc');
        $this->db->order_by('status', 'asc');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    public function allrow_byid($nik)
    {
        $this->db->select('
                           *
                        ');
        $this->db->from('sys_order');
        $this->db->where('user_log', $nik);
        $this->db->limit(1);
        return $this->db->get()->row();;
    }
    public function all_byid($nik)
    {
        $this->db->select('
                        sys_order.*,
                        sys_cab.nama_cab
                        ');
        $this->db->from('sys_order');
        $this->db->join('sys_user_data', 'sys_order.user_log=sys_user_data.user_log');
        $this->db->join('sys_cab', 'sys_user_data.id_sys_cab=sys_cab.id_sys_cab');
        $this->db->where('sys_order.user_log', $nik);
        $this->db->order_by('indate', 'desc');
        $this->db->order_by('status', 'asc');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function add($user_log,$indesc,$data_order,$notiket,$status, $norek)
    {
        $data = array (
            'user_log'   =>$user_log,
            'indesc'     =>$indesc,
            'data_order' =>$data_order,
            'notiket'    =>$notiket,
            'status'     =>$status,
            'rekno'      =>$norek
        );
        return $this->db->insert('sys_order', $data);
    }

    public function aktif($id, $status)
    {
        $data = array(
            'status'             => $status
        );
        $this->db->where('id', $id);
        return $this->db->update('sys_order', $data);
    }

    public function cek($norek)
    {
        if(strlen($norek) > 0) {
            $this->db->like('rekno', $norek);
        }
        return $this->db->get('sys_enduser')->row();
    }
}