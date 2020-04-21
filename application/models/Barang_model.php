<?php

class Barang_model extends CI_Model
{
    public function getdatabarang($id = null)
    {
        if($id === null){
            return $this->db->get('barang')->result_array();
        } else{
            return $this->db->get_where('barang',['id' => $id])->result_array();
        }
    }

    public function deletedatabarang($id)
    {
        $this->db->delete('barang', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createddatabarang($data)
    {
        $this->db->insert('barang',$data);
        return $this->db->affected_rows();
    }

    public function updatedatabarang($data, $id)
    {
        $this->db->update('barang', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}

?>