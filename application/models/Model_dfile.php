<?php

class Model_dfile extends CI_Model
{
    public function _cekimg($id, $gb)
    {
        $this->db->select('e.*');
        $this->db->from('sys_file_loan e');
        $this->db->where('id_sys_dnumloan', $id);
        $this->db->where('kode_file', $gb);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function _cekdok($id, $dok)
    {
        $this->db->select('e.*');
        $this->db->from('sys_file_loan e');
        $this->db->where('id_sys_dnumloan', $id);
        $this->db->where('kode_file', $dok);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function floan_img($id, $gb)
    {
        $this->db->where('id_sys_dnumloan', $id);
        $this->db->where('kode_file', $gb);
        $query = $this->db->get('sys_file_loan');
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function floan_img_($id, $gb)
    {
        $this->db->select('f.*, r.*');
        $this->db->from('sys_file_loan f');
        $this->db->join('sys_ref_dokument r', 'f.id_sys_ref_dokument=r.id_sys_ref_dokument');
        
        $this->db->where('id_sys_dnumloan', $id);
        $this->db->where('kode_file', $gb);
        
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    
    
    public function floan_dok($id, $dok)
    {
        $this->db->where('id_sys_dnumloan', $id);
        $this->db->where('kode_file', $dok);
        $query = $this->db->get('sys_file_loan');
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    
    public function floan_dok_($id, $dok)
    {
        $this->db->select('f.*, r.*');
        $this->db->from('sys_file_loan f');
        $this->db->join('sys_ref_dokument r', 'f.id_sys_ref_dokument=r.id_sys_ref_dokument');
        
        $this->db->where('id_sys_dnumloan', $id);
        $this->db->where('kode_file', $dok);
        
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    
    public function _path($idwil)
    {
        $this->db->select('
        *
        ');
        $this->db->from('sys_dir_cab');
        $this->db->where('idwil', $idwil);
        $this->db->limit(1);
        
        return $this->db->get()->row();
    }
    public function pathroot($id)
    {
        $this->db->select('
                    b.*,
                    ');
                    $this->db->from('sys_file_loan f');
                    $this->db->join('sys_dnumloan n', 'n.id_sys_dnumloan=f.id_sys_dnumloan');
                    $this->db->join('sys_enduser e', 'e.id_sys_enduser=n.id_sys_enduser');
                    $this->db->join('sys_cab c', 'c.id_sys_cab=e.id_sys_cab');
                    $this->db->join('sys_dir_cab b', 'b.idwil=c.idwil');
                    $this->db->where('f.id_sys_dnumloan', $id);
                    $this->db->limit(1);
                    
                    return $this->db->get()->row();
                }
                
                public function getfile_byid($id)
                {
                    $this->db->where('id_sys_file_loan', $id);
                    return $this->db->get('sys_file_loan')->row();
                }
                public function hapus_file($id)
                {
                    $this->db->where('id_sys_file_loan', $id);
                    return $this->db->delete('sys_file_loan');
                }
            }
            

