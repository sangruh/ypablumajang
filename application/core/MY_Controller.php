<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        // Cek apakah sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }
}

class Admin_Controller extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }
}