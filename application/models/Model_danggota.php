<?php

class Model_danggota extends CI_Model
{
    public function _cekad()
    {
        $this->db->select('e.*');
        $this->db->from('sys_enduser e');
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function admin()
    {
        $this->db->select('
                    e.*,
                    d.id_sys_user_data,
                    d.id_sys_cab,
                    d.id_sys_user_role,
                    d.resort_name,
                    d.user_log as log,
                    d.idres_ori,
                    c.*,
                    n.cek1
                ');
        $this->db->from('sys_enduser e');
        $this->db->join('sys_user_data d', 'd.id_sys_user_data=e.id_sys_user_data');
        $this->db->join('sys_cab c', 'c.id_sys_cab=d.id_sys_cab');
        $this->db->join('sys_dnumloan n', 'n.id_sys_enduser=e.id_sys_enduser');
        $this->db->order_by('n.cek1', 'desc');
        $this->db->order_by('e.id_sys_enduser', 'desc');
        $this->db->group_by('e.rekno');

        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function rekap($idwil)
    {
        $this->db->select('
                    e.*,
                    d.id_sys_user_data,
                    d.id_sys_cab,
                    d.id_sys_user_role,
                    d.resort_name,
                    d.user_log AS log,
                    d.idres_ori,
                    c.*
                ');
        $this->db->from('sys_enduser e');
        $this->db->join('sys_user_data d', 'd.id_sys_user_data=e.id_sys_user_data');
        $this->db->join('sys_cab c', 'c.id_sys_cab=d.id_sys_cab');
        $this->db->where('d.id_sys_cab', $idwil);
        $this->db->order_by('e.id_sys_enduser', 'desc');

        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function rekap_search($rekno, $nama, $inno_id, $idwil)
    {
        $this->db->select('
                    e.*,
                    d.id_sys_user_data,
                    d.id_sys_cab,
                    d.id_sys_user_role,
                    d.resort_name,
                    d.user_log AS log,
                    d.idres_ori,
                    c.*
                ');
        $this->db->from('sys_enduser e');
        $this->db->join('sys_user_data d', 'd.id_sys_user_data=e.id_sys_user_data');
        $this->db->join('sys_cab c', 'c.id_sys_cab=d.id_sys_cab');

        if (strlen($rekno) > 0) {
            $this->db->like('e.rekno', $rekno);
        }

        if (strlen($nama) > 0) {
            $this->db->like('e.nama', $nama);
        }

        if (strlen($inno_id) > 0) {
            $this->db->where('e.inno_id', $inno_id);
        }
        $this->db->where('d.id_sys_cab', $idwil);
        $this->db->order_by('e.id_sys_enduser', 'desc');

        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function rekap_by_search($rekno, $nama, $inno_id, $idwil)
    {
        $this->db->select('
                    e.*,
                    d.id_sys_user_data,
                    d.id_sys_cab,
                    d.id_sys_user_role,
                    d.resort_name,
                    d.user_log AS log,
                    d.idres_ori,
                    c.*
                ');
        $this->db->from('sys_enduser e');
        $this->db->join('sys_user_data d', 'd.id_sys_user_data=e.id_sys_user_data');
        $this->db->join('sys_cab c', 'c.id_sys_cab=d.id_sys_cab');

        if (strlen($rekno) > 0) {
            $this->db->like('e.rekno', $rekno);
        }

        if (strlen($nama) > 0) {
            $this->db->like('e.nama', $nama);
        }

        if (strlen($inno_id) > 0) {
            $this->db->where('e.inno_id', $inno_id);
        }

        $this->db->where('d.id_sys_cab', $idwil);
        $this->db->order_by('e.id_sys_enduser', 'desc');

        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }


    public function admin_by_search($rekno, $nama, $inno_id)
    {
        $this->db->select('
                    e.*,
                    d.id_sys_user_data,
                    d.id_sys_cab,
                    d.id_sys_user_role,
                    d.resort_name,
                    d.user_log as log,
                    d.idres_ori,
                    c.*,
                    n.cek1
                ');
        $this->db->from('sys_enduser e');
        $this->db->join('sys_user_data d', 'd.id_sys_user_data=e.id_sys_user_data');
        $this->db->join('sys_cab c', 'c.id_sys_cab=d.id_sys_cab');
        $this->db->join('sys_dnumloan n', 'n.id_sys_enduser=e.id_sys_enduser');
        $this->db->order_by('n.cek1', 'desc');
        $this->db->group_by('e.rekno');

        if (strlen($rekno) > 0) {
            $this->db->like('e.rekno', $rekno);
        }

        if (strlen($nama) > 0) {
            $this->db->like('e.nama', $nama);
        }

        if (strlen($inno_id) > 0) {
            $this->db->where('e.inno_id', $inno_id);
        }

        $this->db->order_by('e.id_sys_enduser', 'desc');

        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function admin_search($rekno, $nama, $inno_id)
    {
        $this->db->select('
                    e.*,
                    d.id_sys_user_data,
                    d.id_sys_cab,
                    d.id_sys_user_role,
                    d.resort_name,
                    d.user_log as log,
                    d.idres_ori,
                    c.*,
                    n.cek1
                ');
        $this->db->from('sys_enduser e');
        $this->db->join('sys_user_data d', 'd.id_sys_user_data=e.id_sys_user_data');
        $this->db->join('sys_cab c', 'c.id_sys_cab=d.id_sys_cab');
        $this->db->join('sys_dnumloan n', 'n.id_sys_enduser=e.id_sys_enduser');
        $this->db->order_by('n.cek1', 'desc');
        $this->db->group_by('e.rekno');

        if (strlen($rekno) > 0) {
            $this->db->like('e.rekno', $rekno);
        }

        if (strlen($nama) > 0) {
            $this->db->like('e.nama', $nama);
        }

        if (strlen($inno_id) > 0) {
            $this->db->where('e.inno_id', $inno_id);
        }

        $this->db->order_by('e.id_sys_enduser', 'desc');

        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function _cekrekap($idwil)
    {
        $this->db->select('
                    e.*,
                    d.id_sys_user_data,
                    d.id_sys_cab,
                    d.id_sys_user_role,
                    d.resort_name,
                    d.user_log AS log,
                    d.idres_ori,
                    c.*
                ');
        $this->db->from('sys_enduser e');
        $this->db->join('sys_user_data d', 'd.id_sys_user_data=e.id_sys_user_data');
        $this->db->join('sys_cab c', 'c.id_sys_cab=d.id_sys_cab');
        $this->db->where('d.id_sys_cab', $idwil);
        $this->db->order_by('e.id_sys_enduser', 'desc');

        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function _cekadpdl($idwil, $role_id, $idres_)
    {
        $this->db->select('
                    e.*,
                    d.id_sys_user_data,
                    d.id_sys_cab,
                    d.id_sys_user_role,
                    d.resort_name,
                    d.user_log AS log,
                    d.idres_ori,
                    c.*
                ');
        $this->db->from('sys_enduser e');
        $this->db->join('sys_user_data d', 'd.id_sys_user_data=e.id_sys_user_data');
        $this->db->join('sys_cab c', 'c.id_sys_cab=d.id_sys_cab');
        $this->db->where('e.id_sys_user_role', $role_id);
        $this->db->where('d.id_sys_cab', $idwil);
        $this->db->where('d.id_sys_user_data', $idres_);
        $this->db->order_by('e.id_sys_enduser', 'desc');

        $this->db->limit(1);
        return $this->db->get()->row();
    }


    public function pdl($idwil, $role_id, $idres_)
    {
        $this->db->select('
                    e.*,
                    d.id_sys_user_data,
                    d.id_sys_cab,
                    d.id_sys_user_role,
                    d.resort_name,
                    d.user_log AS log,
                    d.idres_ori,
                    c.*
                ');
        $this->db->from('sys_enduser e');
        $this->db->join('sys_user_data d', 'd.id_sys_user_data=e.id_sys_user_data');
        $this->db->join('sys_cab c', 'c.id_sys_cab=d.id_sys_cab');
        $this->db->where('e.id_sys_user_role', $role_id);
        $this->db->where('d.id_sys_cab', $idwil);
        $this->db->where('d.id_sys_user_data', $idres_);
        $this->db->order_by('e.id_sys_enduser', 'desc');

        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function pdl_by_search($rekno, $nama, $inno_id, $idwil, $role_id, $idres_)
    {
        $this->db->select('
                    e.*,
                    d.id_sys_user_data,
                    d.id_sys_cab,
                    d.id_sys_user_role,
                    d.resort_name,
                    d.user_log AS log,
                    d.idres_ori,
                    c.*
                ');
        $this->db->from('sys_enduser e');
        $this->db->join('sys_user_data d', 'd.id_sys_user_data=e.id_sys_user_data');
        $this->db->join('sys_cab c', 'c.id_sys_cab=d.id_sys_cab');

        if (strlen($rekno) > 0) {
            $this->db->like('e.rekno', $rekno);
        }

        if (strlen($nama) > 0) {
            $this->db->like('e.nama', $nama);
        }

        if (strlen($inno_id) > 0) {
            $this->db->where('e.inno_id', $inno_id);
        }

        $this->db->where('e.id_sys_user_role', $role_id);
        $this->db->where('d.id_sys_cab', $idwil);
        $this->db->where('d.id_sys_user_data', $idres_);
        $this->db->order_by('e.id_sys_enduser', 'desc');

        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function pdl_search($rekno, $nama, $inno_id, $idwil, $role_id, $idres_)
    {
        $this->db->select('
                    e.*,
                    d.id_sys_user_data,
                    d.id_sys_cab,
                    d.id_sys_user_role,
                    d.resort_name,
                    d.user_log AS log,
                    d.idres_ori,
                    c.*
                ');
        $this->db->from('sys_enduser e');
        $this->db->join('sys_user_data d', 'd.id_sys_user_data=e.id_sys_user_data');
        $this->db->join('sys_cab c', 'c.id_sys_cab=d.id_sys_cab');

        if (strlen($rekno) > 0) {
            $this->db->like('e.rekno', $rekno);
        }

        if (strlen($nama) > 0) {
            $this->db->like('e.nama', $nama);
        }

        if (strlen($inno_id) > 0) {
            $this->db->where('e.inno_id', $inno_id);
        }

        $this->db->where('e.id_sys_user_role', $role_id);
        $this->db->where('d.id_sys_cab', $idwil);
        $this->db->where('d.id_sys_user_data', $idres_);
        $this->db->order_by('e.id_sys_enduser', 'desc');

        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function dn_detail($id)
    {
        $this->db->select('
                    e.*,
                    d.id_sys_user_data,
                    d.id_sys_cab,
                    d.id_sys_user_role,
                    d.resort_name,
                    d.user_log AS log,
                    d.idres_ori,
                    c.*
                ');
        $this->db->from('sys_enduser e');
        $this->db->join('sys_user_data d', 'd.id_sys_user_data=e.id_sys_user_data');
        $this->db->join('sys_cab c', 'c.id_sys_cab=d.id_sys_cab');
        $this->db->order_by('e.id_sys_enduser', 'desc');
        $this->db->where('e.id_sys_enduser', $id);
        return $this->db->get()->row();
    }

    public function _numloan($id)
    {
        $this->db->select('*');
        $this->db->from('sys_dnumloan');
        $this->db->where('id_sys_enduser', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function rekno($id)
    {
        $this->db->select('*');
        $this->db->from('sys_enduser');
        $this->db->where('id_sys_enduser', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function numloannl($id)
    {
        $this->db->select('*');
        $this->db->from('sys_dnumloan');
        $this->db->where('id_sys_dnumloan', $id);
        return $this->db->get()->row();
    }

    public function numloan($id)
    {
        $this->db->where('id_sys_enduser', $id);
        $this->db->order_by('id_sys_dnumloan', 'asc');
        $query = $this->db->get('sys_dnumloan');

        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function ubah($id)
    {
        $this->db->where('id_sys_enduser', $id);
        return $this->db->get('sys_dnumloan')->row();
    }

    public function count($id)
    {
        $this->db->where('id_sys_enduser', $id);
        $this->db->order_by('id_sys_dnumloan', 'asc');
        return $this->db->get('sys_dnumloan')->num_rows();
    }

    public function _imgcek($id)
    {
        $this->db->select('
                            n.id_sys_dnumloan as id_numloan,
                            f.*
                        ');
        $this->db->from('sys_dnumloan n');
        $this->db->join('sys_file_loan f', 'f.id_sys_dnumloan=n.sys_dnumloan', 'left');
        $this->db->where('f.id_sys_dnumloan', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function floan_img($id, $gb)
    {

        $this->db->where('id_sys_dnumloan', $id);
        $this->db->where('inexten', $gb);
        $query = $this->db->get('sys_file_loan');
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function floan_dok($id, $dok)
    {

        $this->db->where('id_sys_dnumloan', $id);
        $this->db->where('inexten', $dok);
        $query = $this->db->get('sys_file_loan');
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
