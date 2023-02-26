<?php

class Model_krwenduser extends CI_Model
{
    public function login($user_log)
    {
        $this->db->select('
                k.id,
                k.nik,
                k.nama_krw,
                k.pss_krw as upwd,
                k.prfixpp,
                k.file_fp,
                k.status,
                c.nama_cab as cabang,
                c.id_sys_cab,
                c.idwil
            ');
        $this->db->from('sys_krwenduser k');
        $this->db->join('sys_cab c', 'k.id_sys_cab=c.id_sys_cab');
        $this->db->where('k.nik', $user_log);
        $this->db->order_by('k.status', 'asc');
        return $this->db->get()->row();
    }

    public function all()
    {
        $this->db->select('
                k.id,
                k.nik,
                k.nama_krw,
                k.prfixpp,
                k.file_fp,
                k.status,
                c.nama_cab as cabang
            ');
        $this->db->from('sys_krwenduser k');
        $this->db->join('sys_cab c', 'k.id_sys_cab=c.id_sys_cab');
        $this->db->order_by('k.status', 'asc');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function allrek($id)
    {
        $this->db->select('
                k.id,
                k.nik,
                k.nama_krw,
                k.prfixpp,
                k.file_fp,
                k.status,
                c.nama_cab as cabang
            ');
        $this->db->from('sys_krwenduser k');
        $this->db->join('sys_cab c', 'k.id_sys_cab=c.id_sys_cab');
        $this->db->where('k.id_sys_cab', $id);
        $this->db->order_by('k.status', 'asc');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function allrow()
    {
        $this->db->select('
                k.id,
                k.nik,
                k.nama_krw,
                k.prfixpp,
                k.file_fp,
                k.status,
                c.nama_cab as cabang
            ');
        $this->db->from('sys_krwenduser k');
        $this->db->join('sys_cab c', 'k.id_sys_cab=c.id_sys_cab');
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function allrekrow($id)
    {
        $this->db->select('
                k.id,
                k.nik,
                k.nama_krw,
                k.prfixpp,
                k.file_fp,
                k.status,
                c.nama_cab as cabang
            ');
        $this->db->from('sys_krwenduser k');
        $this->db->join('sys_cab c', 'k.id_sys_cab=c.id_sys_cab');
        $this->db->where('k.id_sys_cab', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function allbyidwil($idwil)
    {
        $this->db->select('
                id, nik, nama_krw
            ');
        $this->db->from('sys_krwenduser');
        $this->db->where('id_sys_cab', $idwil);


        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function allbyidwil_row($idwil)
    {
        $this->db->select('
                id, nik, nama_krw
            ');
        $this->db->from('sys_krwenduser');
        $this->db->where('id_sys_cab', $idwil);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function all_by_search($ncabang, $nik, $nama_krw)
    {
        $this->db->select('
                k.id,
                k.nik,
                k.nama_krw,
                k.prfixpp,
                k.file_fp,
                k.status,
                c.nama_cab as cabang
            ');
        $this->db->from('sys_krwenduser k');
        $this->db->join('sys_cab c', 'k.id_sys_cab=c.id_sys_cab');


        if (strlen($ncabang) > 0) {
            $this->db->like('c.nama_cab', $ncabang);
        }

        if (strlen($nik) > 0) {
            $this->db->where('k.nik', $nik);
        }

        if (strlen($nama_krw) > 0) {
            $this->db->like('k.nama_krw', $nama_krw);
        }

        $this->db->order_by('k.status', 'asc');
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function all_search($ncabang, $nik, $nama_krw)
    {
        $this->db->select('
                k.id,
                k.nik,
                k.nama_krw,
                k.prfixpp,
                k.file_fp,
                k.status,
                c.nama_cab as cabang
            ');
        $this->db->from('sys_krwenduser k');
        $this->db->join('sys_cab c', 'k.id_sys_cab=c.id_sys_cab');

        if (strlen($ncabang) > 0) {
            $this->db->like('c.nama_cab', $ncabang);
        }

        if (strlen($nik) > 0) {
            $this->db->where('k.nik', $nik);
        }

        if (strlen($nama_krw) > 0) {
            $this->db->like('k.nama_krw', $nama_krw);
        }
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function add($id_sys_cab, $id_adm_user_role, $nik, $nama_krw, $pass_krw, $prfixpp, $file_fp, $status)
    {
        $data = array(
            'id_sys_cab' => $id_sys_cab,
            'id_adm_user_role' => $id_adm_user_role,
            'nik'        => $nik,
            'nama_krw'   => $nama_krw,
            'pss_krw'   => $pass_krw,
            'prfixpp'    => $prfixpp,
            'file_fp'    => $file_fp,
            'status'     => $status
        );
        return $this->db->insert('sys_krwenduser', $data);
    }

    public function update($id, $id_sys_cab, $nik, $nama_krw)
    {
        $data = array(
            'id_sys_cab' => $id_sys_cab,
            'nik'        => $nik,
            'nama_krw'   => $nama_krw
            // 'pss_krw'   => $pass_krw
        );
        $this->db->where('id', $id);
        return $this->db->update('sys_krwenduser', $data);
    }

    public function aktif($id, $status)
    {
        $data = array(
            'status'             => $status
        );
        $this->db->where('id', $id);
        return $this->db->update('sys_krwenduser', $data);
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('sys_krwenduser')->row();
    }

    public function detail($id)
    {
        $this->db->select('
                k.id,
                k.nik,
                k.nama_krw,
                k.prfixpp,
                k.file_fp,
                k.status,
                c.nama_cab as cabang,
                d.nktp as ktp,
                d.ntlfn as tlfn,
                d.nosim as sim,
                d.alamat,
                d.surel
            ');
        $this->db->from('sys_krwenduser k');
        $this->db->join('sys_cab c', 'k.id_sys_cab=c.id_sys_cab');
        $this->db->join('sys_krwdetail d', 'k.id=d.id_krwenduser', 'left');
        $this->db->where('k.id', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function detailnik($id)
    {
        $this->db->select('
                k.id,
                k.nik,
                k.nama_krw,
                k.prfixpp,
                k.file_fp,
                k.status,
                c.nama_cab as cabang,
                d.nktp as ktp,
                d.ntlfn as tlfn,
                d.nosim as sim,
                d.alamat,
                d.surel
            ');
        $this->db->from('sys_krwenduser k');
        $this->db->join('sys_cab c', 'k.id_sys_cab=c.id_sys_cab');
        $this->db->join('sys_krwdetail d', 'k.id=d.id_krwenduser', 'left');
        $this->db->where('k.nik', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function detailid($id)
    {
        $this->db->select('
                k.id,
                k.nik,
                k.nama_krw,
                k.prfixpp,
                k.file_fp,
                k.status,
                c.nama_cab as cabang,
                d.nktp as ktp,
                d.ntlfn as tlfn,
                d.nosim as sim,
                d.alamat,
                d.surel
            ');
        $this->db->from('sys_krwenduser k');
        $this->db->join('sys_cab c', 'k.id_sys_cab=c.id_sys_cab');
        $this->db->join('sys_krwdetail d', 'k.id=d.id_krwenduser', 'left');
        $this->db->where('k.id', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function by_id($id)
    {
        $this->db->select('
                k.id,
                k.id_sys_cab,
                k.nik,
                k.nama_krw,
                k.prfixpp,
                k.file_fp,
                k.status,
                c.nama_cab as cabang
                
            ');
        $this->db->from('sys_krwenduser k');
        $this->db->join('sys_cab c', 'k.id_sys_cab=c.id_sys_cab'); // c.nama_cab as cabang
        $this->db->where('k.id', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function gantipass($id, $enpass)
    {
        $data = array(
            'pss_krw' => $enpass
        );
        $this->db->where('id', $id);
        return $this->db->update('sys_krwenduser', $data);
    }
}
