<?php

class Model_krwfile extends CI_Model
{
    public function fileall_row($id, $ex)
    {
        $this->db->select('
                    id,
                    id_sys_krwenduser,
                    file_name,
                    gen_fname,
                    indesc,
                    indate_ul,
                    inexten,
                    kode_file,
                    insize,
                    inprefix,
                    name_ori
            ');
        $this->db->from('adm_fileupload');
        $this->db->where('id_sys_krwenduser', $id);
        $this->db->where('kode_file', $ex);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function file_all($id, $ex)
    {
        $this->db->select('
                    id,
                    id_sys_krwenduser,
                    file_name,
                    gen_fname,
                    indesc,
                    indate_ul,
                    inexten,
                    kode_file,
                    insize,
                    inprefix,
                    name_ori
            ');
        $this->db->from('adm_fileupload');
        $this->db->where('id_sys_krwenduser', $id);
        $this->db->where('kode_file', $ex);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function insert($id_sys_krwenduser, $file_name, $gen_fname, $indesc, $inexten, $kode_file, $insize, $inprefix, $name_ori)
    {
        $data = array(
            'id_sys_krwenduser' => $id_sys_krwenduser,
            'file_name'         => $file_name,
            'gen_fname'         => $gen_fname,
            'indesc'            => $indesc,
            'inexten'           => $inexten,
            'kode_file'         => $kode_file,
            'insize'            => $insize,
            'inprefix'          => $inprefix,
            'name_ori'          => $name_ori
        );
        return $this->db->insert('adm_fileupload', $data);
    }

    public function file_allid($id, $kode_file)
    {
        $this->db->select('
                    id,
                    id_sys_krwenduser,
                    file_name,
                    gen_fname,
                    indesc,
                    indate_ul,
                    inexten,
                    kode_file,
                    insize,
                    inprefix,
                    name_ori
            ');
        $this->db->from('adm_fileupload');
        $this->db->where('id_sys_krwenduser', $id);
        $this->db->where('kode_file', $kode_file);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function file_allrow($id, $kode_file)
    {
        $this->db->select('
                    id,
                    id_sys_krwenduser,
                    file_name,
                    gen_fname,
                    indesc,
                    indate_ul,
                    inexten,
                    kode_file,
                    insize,
                    inprefix,
                    name_ori
            ');
        $this->db->from('adm_fileupload');
        $this->db->where('id_sys_krwenduser', $id);
        $this->db->where('kode_file', $kode_file);
        $this->db->limit(1);
        return $this->db->get()->row();
    }
}
