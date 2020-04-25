<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class datakaryawan extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model','karyawan');
    }

    public function index_get()
    {
        $id = $this->get('id'); 
        if($id === null){
        $karyawan = $this->karyawan->getdatakaryawan();
        } else {
            $karyawan = $this->karyawan->getdatakaryawan($id);
        }
        
        if($karyawan){
            $this->response([
                'status' => TRUE,
                'data' => $karyawan
            ], REST_Controller::HTTP_NOT_FOUND);
        } else{
            $this->response([
                'status' => FALSE,
                'message' => 'id karyawan tidak ditemukan'
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
            if($this->karyawan->deletedatakaryawan($id) > 0){
                //ok
                $this->response([
                    'status' => TRUE,
                    'id' => $id,
                    'message' => 'karyawan telah dihapus'
                ], REST_Controller::HTTP_OK);
            } else {
                //id not found
                $this->response([
                    'status' => FALSE,
                    'message' => 'id karyawan tidak ditemukan!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'nama' => $this->post('nama'),
            'jk' => $this->post('jk'),
            'alamat' => $this->post('alamat'),
            'kontak' => $this->post('kontak')
        ];

        if( $this->karyawan->createddatakaryawan($data) > 0){
            $this->response([
                'status' => TRUE,
                'message' => 'karyawan baru telah ditambahkan.'
            ], REST_Controller::HTTP_CREATED);
        } else {
            //id not found
            $this->response([
                'status' => FALSE,
                'message' => 'gagal menambahkan karyawan.'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nama' => $this->put('nama'),
            'jk' => $this->put('jk'),
            'alamat' => $this->put('alamat'),
            'kontak' => $this->put('kontak')
        ];

        if( $this->karyawan->updatedatakaryawan($data, $id) > 0){
            $this->response([
                'status' => TRUE,
                'message' => 'data karyawan telah di update.'
            ], REST_Controller::HTTP_OK);
        } else {
            //id not found
            $this->response([
                'status' => FALSE,
                'message' => 'gagal update karyawan.'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

?>