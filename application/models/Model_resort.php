<?php

class Model_resort extends CI_Model
{
    public function all()
    {
        $this->db->select('
                            u.id_sys_user_data as id,
                            u.resort_name,
                            u.user_log as user,
                            u.idres_ori as idres,
                            u.instatus,
                            c.nama_cab,
                            k.nik,
                            k.nama_krw,
                            k.status as aktif
                        ');
        $this->db->from('sys_user_data u');
        $this->db->join('sys_krwenduser k', 'k.id=u.id_sys_krwenduser', 'left');
        $this->db->join('sys_cab c', 'c.id_sys_cab=u.id_sys_cab');
        // $this->db->where('u.instatus', 1);
        // $this->db->where('u.id_sys_user_data !=', 112);
        $this->db->where('u.id_sys_user_data !=', 110);

        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function all_by_search($ncabang, $nik, $user)
    {
        $this->db->select('
                            u.id_sys_user_data as id,
                            u.resort_name,
                            u.user_log as user,
                            u.idres_ori as idres,
                            u.instatus,
                            c.nama_cab,
                            k.nik,
                            k.nama_krw,
                            k.status as aktif
                        ');
        $this->db->from('sys_user_data u');
        $this->db->join('sys_krwenduser k', 'k.id=u.id_sys_krwenduser', 'left');
        $this->db->join('sys_cab c', 'c.id_sys_cab=u.id_sys_cab');
        // $this->db->where('u.instatus', 1);
        $this->db->where('u.id_sys_user_data !=', 110);

        if (strlen($ncabang) > 0) {
            $this->db->like('c.nama_cab', $ncabang);
        }

        if (strlen($nik) > 0) {
            $this->db->where('k.nik', $nik);
        }

        if (strlen($user) > 0) {
            $this->db->where('u.user_log', $user);
        }

        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function all_search($ncabang, $nik, $user)
    {
        $this->db->select('
                            u.id_sys_user_data as id,
                            u.resort_name,
                            u.user_log as user,
                            u.idres_ori as idres,
                            u.instatus,
                            c.nama_cab,
                            k.nik,
                            k.nama_krw,
                            k.status as aktif
                        ');
        $this->db->from('sys_user_data u');
        $this->db->join('sys_krwenduser k', 'k.id=u.id_sys_krwenduser', 'left');
        $this->db->join('sys_cab c', 'c.id_sys_cab=u.id_sys_cab');
        // $this->db->where('u.instatus', 1);
        $this->db->where('u.id_sys_user_data !=', 110);

        if (strlen($ncabang) > 0) {
            $this->db->like('c.nama_cab', $ncabang);
        }

        if (strlen($nik) > 0) {
            $this->db->where('k.nik', $nik);
        }

        if (strlen($user) > 0) {
            $this->db->where('u.user_log', $user);
        }

        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function allrow()
    {
        $this->db->select('
                            u.id_sys_user_data as id,
                            u.resort_name,
                            u.user_log as user,
                            u.idres_ori as idres,
                            u.instatus,
                            k.nik,
                            k.nama_krw,
                            k.status as aktif
                        ');
        $this->db->from('sys_user_data u');
        $this->db->join('sys_krwenduser k', 'k.id=u.id_sys_krwenduser', 'left');
        // $this->db->where('instatus', 1);
        $this->db->where('u.id_sys_user_data !=', 110);

        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function allrek($role_id)
    {

        $this->db->select('
                            u.id_sys_user_data as id,
                            u.id_sys_user_role,
                            u.resort_name,
                            u.user_log as user,
                            u.idres_ori as idres,
                            u.instatus,
                            c.nama_cab,
                            k.nik,
                            k.nama_krw,
                            k.status as aktif
                        ');
        $this->db->from('sys_user_data u');
        $this->db->join('sys_krwenduser k', 'k.id=u.id_sys_krwenduser', 'left');
        $this->db->join('sys_cab c', 'c.id_sys_cab=u.id_sys_cab');
        $this->db->where('u.id_sys_user_role', 3);
        $this->db->where('u.id_sys_cab', $role_id);

        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function allrek_by_search($role_id, $ncabang, $nik, $user)
    {

        $this->db->select('
                            u.id_sys_user_data as id,
                            u.id_sys_user_role,
                            u.resort_name,
                            u.user_log as user,
                            u.idres_ori as idres,
                            u.instatus,
                            c.nama_cab,
                            k.nik,
                            k.nama_krw,
                            k.status as aktif
                        ');
        $this->db->from('sys_user_data u');
        $this->db->join('sys_krwenduser k', 'k.id=u.id_sys_krwenduser', 'left');
        $this->db->join('sys_cab c', 'c.id_sys_cab=u.id_sys_cab');
        $this->db->where('u.id_sys_user_role', 3);
        $this->db->where('u.id_sys_cab', $role_id);
        if (strlen($ncabang) > 0) {
            $this->db->like('c.nama_cab', $ncabang);
        }

        if (strlen($nik) > 0) {
            $this->db->where('k.nik', $nik);
        }

        if (strlen($user) > 0) {
            $this->db->where('u.user_log', $user);
        }

        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function allrek_search($role_id, $ncabang, $nik, $user)
    {

        $this->db->select('
                            u.id_sys_user_data as id,
                            u.resort_name,
                            u.user_log as user,
                            u.idres_ori as idres,
                            u.instatus,
                            c.nama_cab,
                            k.nik,
                            k.nama_krw,
                            k.status as aktif
                        ');
        $this->db->from('sys_user_data u');
        $this->db->join('sys_krwenduser k', 'k.id=u.id_sys_krwenduser', 'left');
        $this->db->join('sys_cab c', 'c.id_sys_cab=u.id_sys_cab');
        // $this->db->where('u.instatus', 1);
        $this->db->where('u.id_sys_cab', $role_id);
        if (strlen($ncabang) > 0) {
            $this->db->like('c.nama_cab', $ncabang);
        }

        if (strlen($nik) > 0) {
            $this->db->where('k.nik', $nik);
        }

        if (strlen($user) > 0) {
            $this->db->where('u.user_log', $user);
        }

        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function allrekrow($role_id)
    {
        $this->db->select('
                            u.id_sys_user_data as id,
                            u.id_sys_user_role,
                            u.resort_name,
                            u.user_log as user,
                            u.idres_ori as idres,
                            u.instatus,
                            c.nama_cab,
                            k.nik,
                            k.nama_krw,
                            k.status as aktif
                        ');
        $this->db->from('sys_user_data u');
        $this->db->join('sys_krwenduser k', 'k.id=u.id_sys_krwenduser', 'left');
        $this->db->join('sys_cab c', 'c.id_sys_cab=u.id_sys_cab');
        $this->db->where('u.id_sys_user_role', 3);
        $this->db->where('u.id_sys_cab', $role_id);

        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function add($id_sys_cab, $id_sys_user_role, $resort_name, $user_log, $user_pass, $idres_ori, $instatus, $id_sys_krwenduser)
    {
        $data = array (
            'id_sys_cab'       =>$id_sys_cab,
            'id_sys_user_role' =>$id_sys_user_role,
            'resort_name'      =>$resort_name,
            'user_log'         =>$user_log,
            'user_pass'        =>$user_pass,
            'idres_ori'        =>$idres_ori,
            'instatus'         =>$instatus,
            'id_sys_krwenduser'=>$id_sys_krwenduser
        );
        return $this->db->insert('sys_user_data', $data);
    }

    public function get_by_id($id)
    {
        $this->db->where('id_sys_user_data', $id);
        return $this->db->get('sys_user_data')->row();
    }

    public function aktif($id, $instatus)
    {
        $data = array(
            'instatus'             => $instatus
        );
        $this->db->where('id_sys_user_data', $id);
        return $this->db->update('sys_user_data', $data);
    }

    public function by_id($id)
    {
        $this->db->select('
                            u.id_sys_user_data as id,
                            u.resort_name,
                            u.user_log as user,
                            u.idres_ori as idres,
                            u.instatus,
                            k.nik,
                            k.nama_krw,
                            k.status as aktif
                        ');
        $this->db->from('sys_user_data u');
        $this->db->join('sys_krwenduser k', 'k.id=u.id_sys_krwenduser', 'left');
        $this->db->where('u.id_sys_user_data', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function update($id, $id_sys_cab, $id_sys_user_role, $resort_name, $user_log, $user_pass, $idres_ori, $instatus, $id_sys_krwenduser)
    {
        $data = array (
            'id_sys_cab'       =>$id_sys_cab,
            'id_sys_user_role' =>$id_sys_user_role,
            'resort_name'      =>$resort_name,
            'user_log'         =>$user_log,
            'user_pass'        =>$user_pass,
            'idres_ori'        =>$idres_ori,
            'instatus'         =>$instatus,
            'id_sys_krwenduser'=>$id_sys_krwenduser
        );
        $this->db->where('id_sys_user_data', $id);
        return $this->db->update('sys_user_data', $data);
    }

}
