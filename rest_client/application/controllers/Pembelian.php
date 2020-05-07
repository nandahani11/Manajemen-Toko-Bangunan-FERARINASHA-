<?php

    class Pembelian extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Pembelian_model');
            $this->load->model('Barang_model');
            $this->load->library('form_validation');
        }
        
        public function index()
        {
            $data['judul'] = 'Daftar Data Pembelian';
            $data['pembelian'] = $this->Pembelian_model->getAllPembelian();
            if($this->input->post('keyword')){
                $data['pembelian'] = $this->Pembelian_model->cariDataPembelian();
            }
            $this->load->view('templates/header', $data);
            $this->load->view('pembelian/index', $data);
            $this->load->view('templates/footer');
        }

        public function tambahpembelian()
        {   
            $data['judul'] = 'Form Tambah Data Pembelian';
            $data['id_barang'] = ['1','2','3','4','5','6','7'];
            $data['barang'] = $this->Barang_model->getAllBarang();

            $this->form_validation->set_rules('id_barang','Id_Barang', 'required|numeric');
            $this->form_validation->set_rules('tgl_transaksi','Tgl_transaksi', 'required');
            $this->form_validation->set_rules('stok','Stok', 'required|numeric');
            $this->form_validation->set_rules('harga','Harga', 'required|numeric');
            $this->form_validation->set_rules('total','Total', 'required|numeric');

            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('pembelian/tambahpembelian');
                $this->load->view('templates/footer');
            }
            else{
                $this->Pembelian_model->tambahDataPembelian();
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('pembelian');
            }

        }

        public function hapuspembelian($id)
        {
            $this->Pembelian_model->hapusDataPembelian($id);
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('pembelian');
        }

        public function detailpembelian($id)
        {
            $data['judul'] = 'Detail Data Pembelian';
            $data['pembelian']=$this->Pembelian_model->getPembelianById($id);
            $this->load->view('templates/header', $data);
            $this->load->view('pembelian/detailpembelian', $data);
            $this->load->view('templates/footer');     
        }

        public function ubahpembelian($id)
        {
            $data['judul'] = 'Form Update Data Pembelian';
            $data['pembelian'] = $this->Pembelian_model->getPembelianById($id);
            
            $data['id_barang'] = ['1','2','3','4','5','6','7'];
            $data['barang'] = $this->Barang_model->getAllBarang();

            $this->form_validation->set_rules('id_barang','Id_Barang', 'required|numeric');
            $this->form_validation->set_rules('tgl_transaksi','Tgl_transaksi', 'required');
            $this->form_validation->set_rules('stok','Stok', 'required|numeric');
            $this->form_validation->set_rules('harga','Harga', 'required|numeric');
            $this->form_validation->set_rules('total','Total', 'required|numeric');

            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('pembelian/ubahpembelian', $data);
                $this->load->view('templates/footer');
            }
            else{
                $this->Pembelian_model->ubahDataPembelian();
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('pembelian');
            }
        }
    }
?>