<?php

class Pembelian_model extends CI_Model
{
    public function getdatapembelian($id = null)
    {
        if($id === null){
            return $this->db->get('pembelian')->result_array();
        } else{
            return $this->db->get_where('pembelian',['id' => $id])->result_array();
        }
    }

    public function deletedatapembelian($id)
    {
        $this->db->delete('pembelian', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createddatapembelian($data)
    {
        $this->db->insert('pembelian',$data);
        return $this->db->affected_rows();
    }

    public function updatedatapembelian($data, $id)
    {
        $this->db->update('pembelian', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}

?>
