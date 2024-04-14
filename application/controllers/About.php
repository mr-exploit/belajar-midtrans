<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function index(){

            $data['title'] = 'About Ingold Creative';
            $this->load->view('users/template/auth_header', $data);
            $this->load->view('users/template/nav');
            $this->load->view('users/about');
            $this->load->view('users/template/auth_footer');
        
    }


}