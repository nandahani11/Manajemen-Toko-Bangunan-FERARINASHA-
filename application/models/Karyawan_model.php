<?php

class Karyawan_model extends CI_Model
{

    public function getdatakaryawan()
    {
        if($id === null){
            return $this->db->get('karyawan')->result_array();
        } else{
            return $this->db->get_where('karyawan',['id' => $id])->result_array();
        }
    }

    public function deletedatakaryawan($id)
    {
        $this->db->delete('karyawan', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createddatakaryawan($data)
    {
        $this->db->insert('karyawan',$data);
        return $this->db->affected_rows();
    }

    public function updatedatakaryawan($data, $id)
    {
        $this->db->update('karyawan', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }


?>

