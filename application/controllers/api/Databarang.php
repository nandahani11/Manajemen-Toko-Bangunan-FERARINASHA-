<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class databarang extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang');
    }

    public function index_get()
    {
        $id = $this->get('id'); 
        if($id === null){
        $barang = $this->barang->getdatabarang();
        } else {
            $barang = $this->barang->getdatabarang($id);
        }

        
        if($barang){
            $this->response([
                'status' => TRUE,
                'data' => $barang
            ], REST_Controller::HTTP_OK);
        } else{
            $this->response([
                'status' => FALSE,
                'message' => 'id barang tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if($id === null){
            $this->response([
                'status' => FALSE,
                'message' => 'pilih id terlebih dulu!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else{
            if($this->barang->deletedatabarang($id) > 0){
                //ok
                $this->response([
                    'status' => TRUE,
                    'id' => $id,
                    'message' => 'barang telah dihapus'
                ], REST_Controller::HTTP_OK);
            } else {
                //id not found
                $this->response([
                    'status' => FALSE,
                    'message' => 'id barang tidak ditemukan!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'nama' => $this->post('nama'),
            'harga' => $this->post('harga'),
            'stok' => $this->post('stok')
        ];

        if( $this->barang->createddatabarang($data) > 0){
            $this->response([
                'status' => TRUE,
                'message' => 'barang baru telah ditambahkan.'
            ], REST_Controller::HTTP_CREATED);
        } else {
            //id not found
            $this->response([
                'status' => FALSE,
                'message' => 'gagal menambahkan barang.'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nama' => $this->put('nama'),
            'harga' => $this->put('harga'),
            'stok' => $this->put('stok')
        ];

        if( $this->barang->updatedatabarang($data, $id) > 0){
            $this->response([
                'status' => TRUE,
                'message' => 'data barang telah di update.'
            ], REST_Controller::HTTP_OK);
        } else {
            //id not found
            $this->response([
                'status' => FALSE,
                'message' => 'gagal update barang.'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

?>
