<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        // Ambil data lapangan dari model
        $this->load->model('Lapangan_model'); // Pastikan model sudah dimuat
        $data['lapangan'] = $this->Lapangan_model->getLapanganData(); // Panggil metode dari model

        $data['title'] = 'Elite Badmintion';
        $this->load->view('users/template/auth_header', $data);
        $this->load->view('users/template/nav');
        $this->load->view('users/home');
        $this->load->view('users/template/auth_footer');
    }

    public function lapanganAll()
    {
        $this->load->model('Lapangan_model');
        $data['lapangan'] = $this->Lapangan_model->getLapanganData();
        $data['title'] = 'Lapangan All';
        $this->load->view('users/template/auth_header', $data);
        $this->load->view('users/template/nav');
        $this->load->view('users/lapanganall', $data);
        $this->load->view('users/template/auth_footer');
    }

   
}
