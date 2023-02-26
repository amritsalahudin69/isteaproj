<?php

class Model_file_u extends CI_Model
{
    public function dokty()
    {
        $this->db->select('
                    rd.id_sys_ref_dokument,
                    rd.keterangan
                ');
        $this->db->from('sys_ref_dokument rd');
        $this->db->where('status', 1);
        // $this->db->join('sys_category_dokument cd ', 'cd.id_sys_ref_dokument=rd.id_sys_ref_dokument' , 'right');
        $this->db->order_by('rd.id_sys_ref_dokument', 'desc');

        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function dokty2($id)
    {
        $this->db->select('
                    rd.id_sys_ref_dokument as sd
                ');
        $this->db->from('sys_ref_dokument rd');
        $this->db->join('sys_category_dokument cd ', 'cd.id_sys_ref_dokument=rd.id_sys_ref_dokument', 'right');
        $this->db->where('cd.id_sys_category_dokument', $id);

        return $this->db->get()->num_rows();
    }

    public function count1($id)
    {
        $this->db->select('
                    f.id_sys_file_loan
                ');
        $this->db->from('sys_file_loan f');
        $this->db->join('sys_dnumloan n', 'n.id_sys_dnumloan=f.id_sys_dnumloan');
        $this->db->join('sys_enduser e', 'e.id_sys_enduser=n.id_sys_enduser');
        $this->db->join('sys_cab c', 'c.id_sys_cab=e.id_sys_cab');
        $this->db->join('sys_dir_cab b', 'b.idwil=c.idwil');
        $this->db->where('c.id_sys_cab', $id);

        return $this->db->get()->num_rows();
    }

    public function addupload($id_sys_dnumloan, $id_sys_ref_dokument, $file_name, $no_surat, $gen_fname, $indesc, $inexten, $kode_file, $insize, $inprefix, $inprefixs, $genpid, $name_ori)
    {
        $data = array(
            'id_sys_dnumloan'           => $id_sys_dnumloan,
            'id_sys_ref_dokument'       => $id_sys_ref_dokument,
            'file_name'                 => $file_name,
            'no_surat'                  => $no_surat,
            'gen_fname'                => $gen_fname,
            'indesc'                    => $indesc,
            'inexten'                   => $inexten,
            'kode_file'                 => $kode_file,
            'insize'                    => $insize,
            'inprefix'                  => $inprefix,
            'inprefixs'                 => $inprefixs,
            'genpid'                    => $genpid,
            'name_ori'                  => $name_ori
        );
        return $this->db->insert('sys_file_loan', $data);
    }

    public function update($id, $id_sys_ref_dokument, $file_name, $no_surat, $indesc, $genpid)
    {
        $data = array(
            'id_sys_ref_dokument'       => $id_sys_ref_dokument,
            'file_name'                 => $file_name,
            'no_surat'                  => $no_surat,
            'indesc'                    => $indesc,
            'genpid'                    => $genpid
        );
        $this->db->where('id_sys_file_loan', $id);
        // id_sys_file_loan
        return $this->db->update('sys_file_loan', $data);
    }

    public function gennorek($id)
    {
        $this->db->select('
                    e.rekno
                ');
        $this->db->from('sys_dnumloan n');
        $this->db->join('sys_enduser e', 'e.id_sys_enduser=n.id_sys_enduser');
        $this->db->where('n.id_sys_dnumloan', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function byid($id)
    {
        $this->db->select('
                    *
                ');
        $this->db->from('sys_file_loan');
        $this->db->where('id_sys_file_loan', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }
}
