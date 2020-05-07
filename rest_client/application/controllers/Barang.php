<?php

    class Barang extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Barang_model');
            $this->load->library('form_validation');
        }
        
        public function index()
        {
            $data['judul'] = 'Daftar Data Barang';
            $data['barang'] = $this->Barang_model->getAllBarang();
            if($this->input->post('keyword')){
                $data['barang'] = $this->Barang_model->cariDataBarang();
            }
            $this->load->view('templates/header', $data);
            $this->load->view('barang/index', $data);
            $this->load->view('templates/footer');
        }

        public function tambahbarang()
        {
            $data['judul'] = 'Form Tambah Data Barang';

            $this->form_validation->set_rules('nama','Nama', 'required');
            $this->form_validation->set_rules('harga','Harga', 'required|numeric');
            $this->form_validation->set_rules('stok','Stok', 'required|numeric');

            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('barang/tambahbarang');
                $this->load->view('templates/footer');
            }
            else{
                $this->Barang_model->tambahDataBarang();
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('barang');
            }
        }

        public function hapusbarang($id)
        {
            $this->Barang_model->hapusDataBarang($id);
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('barang');
        }

        public function detailbarang($id)
        {
            $data['judul'] = 'Detail Data Barang';
            $data['barang']=$this->Barang_model->getBarangById($id);
            $this->load->view('templates/header', $data);
            $this->load->view('barang/detailbarang', $data);
            $this->load->view('templates/footer');     
        }

        public function ubahbarang($id)
        {
            $data['judul'] = 'Form Update Data Barang';
            $data['barang'] = $this->Barang_model->getBarangById($id);

            $this->form_validation->set_rules('nama','Nama', 'required');
            $this->form_validation->set_rules('harga','Harga', 'required|numeric');
            $this->form_validation->set_rules('stok','Stok', 'required|numeric');

            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('barang/ubahbarang', $data);
                $this->load->view('templates/footer');
            }
            else{
                $this->Barang_model->ubahDataBarang();
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('barang');
            }
        }
    }
?>