<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Datapembelian extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembelian_model', 'pembelian');
    }

    public function index_get()
    {
        $id = $this->get('id'); 
        if($id === null){
        $pembelian = $this->pembelian->getdatapembelian();
        } else {
            $pembelian = $this->pembelian->getdatapembelian($id);
        }

        
        if($pembelian){
            $this->response([
                'status' => TRUE,
                'data' => $pembelian
            ], REST_Controller::HTTP_OK);
        } else{
            $this->response([
                'status' => FALSE,
                'message' => 'id pembelian tidak ditemukan'
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
            if($this->pembelian->deletedatapembelian($id) > 0){
                //ok
                $this->response([
                    'status' => TRUE,
                    'id' => $id,
                    'message' => 'pembelian telah dihapus'
                ], REST_Controller::HTTP_OK);
            } else {
                //id not found
                $this->response([
                    'status' => FALSE,
                    'message' => 'id pembelian tidak ditemukan!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'id_barang' => $this->post('id_barang'),
            'tgl_transaksi' => date_format(date_create($this->post('tgl_pembelian')), 'Y-m-d'),
            'stok' => $this->post('stok'),
            'harga' => $this->post('harga'),
            'total' => $this->post('total')
        ];

        if( $this->pembelian->createddatapembelian($data) > 0){
            $this->response([
                'status' => TRUE,
                'message' => 'pembelian baru telah ditambahkan.'
            ], REST_Controller::HTTP_CREATED);
        } else {
            //id not found
            $this->response([
                'status' => FALSE,
                'message' => 'gagal menambahkan pembelian.'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'id_barang' => $this->put('id_barang'),
            'id_barang' => $this->put('id_barang'),
            'tgl_transaksi' => date_format(date_create($this->put('tgl_pembelian')), 'Y-m-d'),
            'stok' => $this->put('stok'),
            'harga' => $this->put('harga'),
            'total' => $this->put('total')
        ];

        if( $this->pembelian->updatedatapembelian($data, $id) > 0){
            $this->response([
                'status' => TRUE,
                'message' => 'data pembelian telah di update.'
            ], REST_Controller::HTTP_OK);
        } else {
            //id not found
            $this->response([
                'status' => FALSE,
                'message' => 'gagal update pembelian.'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

?>