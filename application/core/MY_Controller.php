<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Base Controller - Semua controller extend ini
 */
class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        // Load session library
        $this->load->library('session');
        
        // Cek apakah sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        
        // Load user data ke semua views
        $this->user_id = $this->session->userdata('user_id');
        $this->username = $this->session->userdata('username');
        $this->role = $this->session->userdata('role');
        $this->nama_lengkap = $this->session->userdata('nama_lengkap');
        $this->email = $this->session->userdata('email');
        $this->sekolah_id = $this->session->userdata('sekolah_id') ?? NULL;

        // Pass role ke semua views untuk menu conditional
        $this->load->vars('role', $this->role);
        $this->load->vars('user_id', $this->user_id);
        $this->load->vars('username', $this->username);
        $this->load->vars('nama_lengkap', $this->nama_lengkap);
        $this->load->vars('email', $this->email);
        $this->load->vars('sekolah_id', $this->sekolah_id);
    }
}

/**
 * Admin Controller - Khusus Super Admin
 */
class Admin_Controller extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        
        // Cek role harus super_admin
        if ($this->role !== 'super_admin') {
            show_error('Akses ditolak! Anda tidak memiliki izin untuk mengakses halaman ini.', 403);
        }
    }
}
