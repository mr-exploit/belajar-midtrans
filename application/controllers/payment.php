<?php

// namespace App\Controllers;

defined('BASEPATH') or exit('No direct script access allowed');

use Midtrans\Config;

class Payment extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
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
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-rKlXDZa3aDZDrashI11AVV5u';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            )
        );

        // Get Snap Token
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $data['title'] = 'Elite Badmintion';
        $dataPayment = [
            'snapToken' => $snapToken
        ];

        $this->load->view('users/template/auth_header', $data);
        // $this->load->view('users/template/nav');
        $this->load->view('users/payment');
        $this->load->view('users/template/auth_footer', $dataPayment);
    }
}
