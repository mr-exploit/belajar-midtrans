<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapangan_model extends CI_Model
{
    public function getLapanganData()
    {
        // Query untuk mengambil data lapangan dari database
        $query = $this->db->get('lapangan');

        // Return hasil query sebagai array
        return $query->result_array();
    }

    public function getLapanganById($id)
    {
        // Query untuk mengambil data lapangan berdasarkan id
        $query = $this->db->get_where('lapangan', ['id' => $id]);

        // Return hasil query sebagai array
        return $query->row_array();
    }
}
