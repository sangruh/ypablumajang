<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        // cek jika sudah login, redirect ke admin
        if ($this->session->userdata('logged_in')){
            redirect('admin');
        }
        $this->load->view('login/index', array('page_title' => 'Login - Admin YPAB'));
    }

    public function proses()
    {
        // Nanti diproses login di sini
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        
        // validasi didatabase
        $user = $this->user_model->login($username, $password);

        if ($user) {
            // set session
            $session_data = array(
                'logged_in' => TRUE,
                'user_id' => $user->id,
                'username' => $user->username,
                'nama_lengkap' => $user->nama_lengkap,
                'email' => $user->email,
                'role' => $user->role
            );
            $this->session->set_userdata($session_data);
            redirect('admin');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('login');
        }
    }

    public function logout()
    {
        // Nanti hapus session
        $this->session->sess_destroy();
        redirect('login');
    }
}
