<?php

class Model_refmenu extends CI_Model
{
    public function rmenu($role_id)
    {
        $this->db->select('
                    mr.id_sys_user_menu_role,
                    mr.id_sys_user_menu,
                    mr.id_sys_user_role,
                    mr.instatus,
                    m.nama_menu,
                    m.inlink,
                    m.inicon,
                    m.indesc,
                    r.name_role,
                    r.kode
                   
            ');
        $this->db->from('sys_user_menu_role mr');
        $this->db->join('sys_user_menu m', 'm.id_sys_user_menu=mr.id_sys_user_menu');
        $this->db->join('sys_user_role r', 'r.id_sys_user_role=mr.id_sys_user_role');
        $this->db->where('mr.id_sys_user_menu_role', $role_id);

        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;


        
    }
}
