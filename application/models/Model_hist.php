<?php

class Model_hist extends CI_Model
{
    public function add($gen_id ,$trigg_desc ,$id_sys_user_data,$id_sys_cab, $browser, $osv, $ipclient, $genpid)
    {
        $data = array (
            'gen_id'            =>$gen_id,
            'trigg_desc'         =>$trigg_desc,
            'id_sys_user_data'  =>$id_sys_user_data,
            'id_sys_cab'        =>$id_sys_cab,
            'browser'           =>$browser,
            'osv'               =>$osv,
            'ipclient'          =>$ipclient,
            'genpid'            =>$genpid
        );
        return $this->db->insert('sys_uldata_his', $data);
    }
    public function his_da($genpid, $st_d, $end_d)
    {
        $data = array (
            'genpid'    =>$genpid,
            'st_d'      =>$st_d,
            'end_d'     =>$end_d
        );
        return $this->db->insert('sys_hd', $data);

    }
}
