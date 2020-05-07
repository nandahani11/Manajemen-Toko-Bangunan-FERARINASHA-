<?php
use GuzzleHttp\Client;

class Barang_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/tutorial/REST-API/rest-server-TP/api/'
        ]);
    }

    public function getAllBarang()
    {
        $response = $this->_client->request('GET', 'databarang');
        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function getBarangById($id)
    {        
        $response = $this->_client->request('GET', 'databarang',[
            'query' => [
                'id' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function tambahDataBarang()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "harga" => $this->input->post('harga', true),
            "stok" => $this->input->post('stok', true)
        ];

        $response = $this->_client->request('POST', 'databarang', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function hapusDataBarang($id)
    {
        $response = $this->_client->request('DELETE', 'databarang',[
            'form_params' => [
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function ubahDataBarang()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "harga" => $this->input->post('harga', true),
            "stok" => $this->input->post('stok', true),
            "id" => $this->input->post('id', true),
        ];

        $response = $this->_client->request('PUT', 'databarang', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function cariDataBarang()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        return $this->db->get('barang')->result_array();
    }
}

?>