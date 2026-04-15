<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->or_where('email', $username);
        $user = $this->db->get('users')->row();

        if ($user && password_verify($password, $user->password) && $user->is_active == 1) {
            return $user;
        }

        return false;
    }

    public function get_user_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('users')->row();
    }
}
