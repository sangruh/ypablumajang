<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publikasi_model extends CI_Model {

    public function get_all($limit = null, $offset = 0)
    {
        $this->db->order_by('created_at', 'DESC');
        if ($limit) {
            return $this->db->get('publikasi', $limit, $offset)->result();
        }
        return $this->db->get('publikasi')->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('publikasi')->row();
    }

    public function insert($data)
    {
        return $this->db->insert('publikasi', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('publikasi', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('publikasi');
    }

    public function count_all()
    {
        return $this->db->count_all('publikasi');
    }

    public function search($keyword = null, $limit = 10, $offset = 0)
    {
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('judul', $keyword);
            $this->db->or_like('deskripsi', $keyword);
            $this->db->group_end();
        }
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('publikasi', $limit, $offset)->result();
    }

    public function count_search($keyword = null)
    {
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('judul', $keyword);
            $this->db->or_like('deskripsi', $keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results('publikasi');
    }
}