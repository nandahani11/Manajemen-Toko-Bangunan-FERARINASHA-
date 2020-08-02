<?php

class Dashboard extends CI_Controller
{
    public function index($nama = '')
    {
        $data['judul'] = 'Halaman Dashboard';
        $data['nama'] = $nama;
        $this->load->view('dashboard/index');
    }
}

?>