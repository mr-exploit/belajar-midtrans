<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'History Sewa Lapangan Elite badminton';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']['role_id'] == 1) {
            // Admin: dapat melihat semua history
            $data['history'] = $this->db->get('history_sewa')->result_array();
        } else {
            // Pengguna biasa: hanya bisa melihat history miliknya sendiri
            $this->db->where('user_id', $data['user']['id']);
            $data['history'] = $this->db->get('history_sewa')->result_array();
        }

        $this->load->view('template/admin/header', $data);
        $this->load->view('template/admin/sidebar', $data);
        $this->load->view('template/admin/topbar', $data);
        $this->load->view('users/history', $data);
        $this->load->view('template/admin/footer');
    }

    public function deletehistory($id)
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Periksa apakah pengguna adalah admin
        if ($user['role_id'] != 1) {
            // Jika bukan admin, mungkin Anda ingin menampilkan pesan kesalahan atau mengalihkan pengguna ke halaman lain
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak memiliki izin untuk menghapus data!</div>');
            redirect('history');
        }

        // Jika pengguna adalah admin, lanjutkan dengan penghapusan data
        $this->db->delete('history_sewa', array('id' => $id));

        // Set pesan sukses (flash message) jika diperlukan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lapangan berhasil dihapus!</div>');

        redirect('history');
    }
}
