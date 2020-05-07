<?php

    class Karyawan extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Karyawan_model');
            $this->load->library('form_validation');
        }
        
        public function index()
        {
            $data['judul'] = 'Daftar Data Karyawan';
            $data['karyawan'] = $this->Karyawan_model->getAllKaryawan();
            if($this->input->post('keyword')){
                $data['karyawan'] = $this->Karyawan_model->cariDataKaryawan();
            }
            $this->load->view('templates/header', $data);
            $this->load->view('karyawan/index', $data);
            $this->load->view('templates/footer');
        }

        public function tambahkaryawan()
        {   
            $data['judul'] = 'Form Tambah Data Karyawan';
            $data['jk'] = ['Pria','Wanita'];

            $this->form_validation->set_rules('nama','Nama', 'required');
            $this->form_validation->set_rules('jk','Jk', 'required');
            $this->form_validation->set_rules('alamat','Alamat', 'required');
            $this->form_validation->set_rules('kontak','Kontak', 'required');

            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('karyawan/tambahkaryawan');
                $this->load->view('templates/footer');
            }
            else{
                $this->Karyawan_model->tambahDataKaryawan();
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('karyawan');
            }

        }

        public function hapuskaryawan($id)
        {
            $this->Karyawan_model->hapusDataKaryawan($id);
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('karyawan');
        }

        //SEWAKTU - WAKTU DIBUTUHKAN!
        /*public function detailkaryawan($id)
        {
            $data['judul'] = 'Detail Data Karyawan';
            $data['karyawan']=$this->Karyawan_model->getKaryawanById($id);
            $this->load->view('templates/header', $data);
            $this->load->view('karyawan/detailkaryawan', $data);
            $this->load->view('templates/footer');     
        }*/

        public function ubahkaryawan($id)
        {
            $data['judul'] = 'Form Update Data Karyawan';
            $data['karyawan'] = $this->Karyawan_model->getKaryawanById($id);
            $data['jk'] = ['Pria','Wanita'];

            $this->form_validation->set_rules('nama','Nama', 'required');
            $this->form_validation->set_rules('jk','Jk', 'required');
            $this->form_validation->set_rules('alamat','Alamat', 'required');
            $this->form_validation->set_rules('kontak','Kontak', 'required');

            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('karyawan/ubahkaryawan', $data);
                $this->load->view('templates/footer');
            }
            else{
                $this->Karyawan_model->ubahDataKaryawan();
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('karyawan');
            }
        }
    }   
?>