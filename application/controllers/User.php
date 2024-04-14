<?php

use phpDocumentor\Reflection\Types\Integer;

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        logged_in();
        // Memuat file konfigurasi Midtrans
        require_once(APPPATH . 'libraries/Midtrans/Config.php');
        // Memuat file pustaka Midtrans Snap
        require_once(APPPATH . 'libraries/Midtrans/Snap.php');
        // Memuat file sanitizer Midtrans
        require_once(APPPATH . 'libraries/Midtrans/Sanitizer.php');
        require_once(APPPATH . 'libraries/Midtrans/CoreApi.php');
        // Memuat file pustaka Midtrans ApiRequestor
        require_once(APPPATH . 'libraries/Midtrans/ApiRequestor.php');
    }

    public function index()
    {
        $data['title'] = "My Profile";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // echo 'selamat datang ' . $data['user']['name'];
        $this->load->view('template/admin/header', $data);
        $this->load->view('template/admin/sidebar', $data);
        $this->load->view('template/admin/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/admin/footer');
    }

    public function lapanganAll()
    {
        $data['title'] = "My Profile";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Lapangan_model');
        $data['lapangan'] = $this->Lapangan_model->getLapanganData();
        $data['title'] = 'Lapangan All';
        $this->load->view('template/admin/header', $data);
        $this->load->view('template/admin/sidebar', $data);
        $this->load->view('template/admin/topbar', $data);
        $this->load->view('user/lapanganall', $data);
        $this->load->view('template/admin/footer');
    }

    public function lapanganDetail($id)
    {
        $this->load->model('Lapangan_model');
        $lapangan['lapangan'] = $this->Lapangan_model->getLapanganById($id);
        $data['title'] = 'Lapangan Detail';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $lapangan['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // var_dump($harga);
        $this->load->view('template/admin/header', $data);
        $this->load->view('template/admin/sidebar', $data);
        $this->load->view('template/admin/topbar', $data);
        $this->load->view('users/lapangandetail', $lapangan);
        $this->load->view('template/admin/footer');
        // $this->load->view('users/template/auth_header', $data);
        // $this->load->view('users/lapangandetail', $lapangan);
        // $this->load->view('users/template/auth_footer');
    }
    public function process_payment()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-rKlXDZa3aDZDrashI11AVV5u';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;


        // Ambil data yang dikirimkan dari JavaScript
        $idlapangan = $this->input->post('idlapangan');
        $harga = $this->input->post('harga');
        // $harga_int = (int) $hargalapangan;
        $namalapangan = $this->input->post('namalapangan');
        $tanggal = $this->input->post('tanggal');
        $sewalapangan = $namalapangan . " ditanggal " . $tanggal;

        // Calculate expiry time 1 hour from now
        $expiryTime = date('Y-m-d H:i:s', strtotime('+1 hour'));


        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $harga,
                'expiry' => array(
                    'start_time' => date('Y-m-d H:i:s'), // Start time is now
                    'unit' => 'minute', // Set the expiry unit to minutes
                    'duration' => 60, // Set the duration to 60 minutes (1 hour)
                ),
            ),
            'item_details' => array(
                array(
                    'id' => $idlapangan, // ID unik untuk lapangan
                    'price' => $harga, // Harga lapangan
                    'quantity' => 1,
                    'name' => $sewalapangan, // Nama lapangan
                ),
            ),
            'customer_details' => array(
                'first_name' => $this->session->userdata('name'),
                'email' => $this->session->userdata('email'),
            ),
        );
        // $params = [
        //     'transaction_details' => array(
        //         'order_id' => rand(),
        //         'gross_amount' => $harga,
        //     ),
        //     'item_details' => array(
        //         'id' => '1',
        //         'price' => $harga,
        //         'name' => $sewalapangan
        //     )
        // ];
        // Get Snap Token
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $dataPayment = [
            'snapToken' => $snapToken
        ];
        // $this->load->view('template/admin/footer', $dataPayment);
        // Kirim respons kembali ke JavaScript (opsional)
        $response = array('status' => 'success', 'message' => 'Pembayaran berhasil diproses');
        $json = [
            'status' => $response,
            'snapToken' => $snapToken
        ];
        echo json_encode($json);
        // Lakukan logika pemrosesan pembayaran di sini
    }

    public function add_payment()
    {
        $data['title'] = "Add Payment";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $lapanganData = array(
            'lapangan_id' => $this->input->post('lapanganid'),
            'user_id' => $this->input->post("UserId"),
            'user_name' => $this->input->post('userName'),
            'totalharga' => $this->input->post('harga'),
            'order_id' => $this->input->post('orderId'),
            'payment_type' => $this->input->post('paymenttype'),
            'transcation_id' => $this->input->post('transcationId'),
            'transactionTime' => $this->input->post('transactionTime'),
            'status_message' => $this->input->post('status_message'),
            'va_number' => $this->input->post("vaNumber"),
            'bank' => $this->input->post("Bank"),
            'pdf_url' => $this->input->post("pdfUrl"),
            'namalapangan' => $this->input->post("namalapangan"),
            'hari' => $this->input->post("tanggal")
        );
        try {
            if ($this->db->insert('history_sewa', $lapanganData)) {
                // Jika penambahan lapangan berhasil
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sewa Lapangan Added!! </div>');
                $response['status'] = 'success';
            } else {
                // Jika penambahan lapangan gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to add new Sewa. Please try again.</div>');
                redirect('user/lapanganDetail/1');
            }
        } catch (Exception $e) {
            // Tangani pengecualian di sini
            // Contoh: Menampilkan pesan kesalahan
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        // Mengirim respons JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
