<?php

class Model_User extends CI_Model
{
    public function login($user_log)
    {
        $this->db->select('
                d.id_sys_user_data,
                d.resort_name,
                d.user_log as nik,
                d.user_pass as upwd,
                d.idres_ori,
                d.instatus,
                r.id_sys_user_role as idgroup,
                r.kode as kgroup,
                c.id_sys_cab as id_wil,
                c.idwil
            ');
        $this->db->from('sys_user_data d');
        $this->db->join('sys_user_role r', 'd.id_sys_user_role=r.id_sys_user_role');
        $this->db->join('sys_cab c', 'd.id_sys_cab=c.id_sys_cab');
        $this->db->where('d.user_log', $user_log);
        return $this->db->get()->row();
    }

    public function gantipass($id, $enpass)
    {
        $data = array(
            'user_pass' => $enpass
        );
        $this->db->where('id_sys_user_data', $id);
        return $this->db->update('sys_user_data', $data);
    }

    public function deaktif($nik, $instatus)
    {
        $data = array(
            'instatus'             => $instatus
        );
        $this->db->where('sso_id', $nik);
        return $this->db->update('sso_', $data);
    }

    public function sso_add($resort_name, $sso_instatus, $sso_keterangan)
    {
        $data = array (
            'sso_id'         =>$resort_name,
            'instatus'       =>$sso_instatus,
            'keterangan'     =>$sso_keterangan
        );
        return $this->db->insert('sso_', $data);
    }
}
