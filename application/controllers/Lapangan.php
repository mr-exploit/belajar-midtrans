<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        // Periksa peran pengguna sebelum akses
        $user_role = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()['role_id'];
        if ($user_role != '1') {

            redirect('home'); // Ganti 'home' dengan halaman lain yang ingin Anda arahkan
        }
    }

    public function index()
    {
        $data['title'] = 'Add Lapangan Elite badminton';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['artis'] = $this->db->get('lapangan')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[lapangan.nama]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|greater_than_equal_to[0]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('template/admin/sidebar', $data);
            $this->load->view('template/admin/topbar', $data);
            $this->load->view('admin/lapangan', $data);
            $this->load->view('template/admin/footer');
        } else {
            $config['upload_path'] = './assets/img/lapangan/';
            $config['file_name'] = uniqid(rand());
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('errors', $this->upload->display_errors());
                redirect(base_url() . 'content', 'refresh');
            }

            $upload_data = $this->upload->data();

            $data = array(
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'image' => $upload_data['file_name'],
                'harga' => $this->input->post('harga'),
                'createdate' => date('Y-m-d H:i:s'),
            );

            if (!$this->db->insert('lapangan', $data)) {
                // Duplicate entry error

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama lapangan sudah ada. Silakan gunakan nama lapangan yang lain.</div>');
                redirect('lapangan');
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Lapangan Added!! </div>');
            redirect('lapangan');
        }
    }

    public function editLapangan($id)
    {
        $nama = $this->input->post('editnama');
        $alamat = $this->input->post('editalamat');
        $harga = $this->input->post('editharga');

        // Proses pengunggahan gambar baru
        if (!empty($_FILES['editimage']['name'])) {
            $config['upload_path']          = './assets/img/lapangan/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048; // 2MB
            $config['encrypt_name']         = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('editimage')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $image_data = $this->upload->data();
                $image_name = $image_data['file_name'];
            }
        }


        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'harga' => $harga,
        );

        // Jika ada gambar yang diunggah, tambahkan data gambar ke dalam array data
        if (!empty($image_name)) {
            $data['image'] = $image_name;
        }


        $this->db->where('id', $id);
        $this->db->update('lapangan', $data);

        // Set pesan sukses (flash message) jika diperlukan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lapangan berhasil diupdate!</div>');

        // Redirect ke halaman yang sesuai, contohnya 'lapangan'
        redirect('lapangan/');
    }

    public function deleteLapangan($id)
    {

        // Ambil nama file gambar dari database
        $gambarData = $this->db->get_where('lapangan', ['id' => $id])->row_array();
        $gambar = $gambarData['image'];

        // Hapus file gambar dari direktori
        $path = './assets/img/lapangan/' . $gambar;
        if (file_exists($path)) {
            unlink($path);
        }

        // Menghapus data berdasarkan ID
        $this->db->delete('lapangan', array('id' => $id));

        // Set pesan sukses (flash message) jika diperlukan
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lapangan berhasil dihapus!</div>');

        // Redirect ke halaman yang sesuai, contohnya 'content'
        redirect('lapangan');
    }




    public function getEditLapanganById($id)
    {
        $data = $this->db->get_where('lapangan', array('id' => $id))->row_array();
        echo json_encode($data);
    }

    public function lapanganDetail($id)
    {
        $this->load->model('Lapangan_model');
        $lapangan['lapangan'] = $this->Lapangan_model->getLapanganById($id);
        $data['title'] = 'Lapangan Detail';
        $this->load->view('users/template/auth_header', $data);
        $this->load->view('users/template/nav');
        $this->load->view('users/lapangandetail', $lapangan);
        $this->load->view('users/template/auth_footer');
    }
}
