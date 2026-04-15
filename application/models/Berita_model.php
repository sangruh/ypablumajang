<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

    public function get_all($limit = null, $offset = 0)
    {
        $this->db->order_by('created_at', 'DESC');
        if ($limit) {
            return $this->db->get('berita', $limit, $offset)->result();
        }
        return $this->db->get('berita')->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('berita')->row();
    }

    public function get_published($limit = null)
    {
        $this->db->where('status', 'publish');
        $this->db->order_by('tanggal', 'DESC');
        if ($limit) {
            return $this->db->get('berita', $limit)->result();
        }
        return $this->db->get('berita')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('berita', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('berita', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('berita');
    }

    public function count_all()
    {
        return $this->db->count_all('berita');
    }

    public function count_by_status($status)
    {
        $this->db->where('status', $status);
        return $this->db->count_all_results('berita');
    }

    public function search($keyword = null, $limit = 10, $offset = 0)
    {
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('judul', $keyword);
            $this->db->or_like('konten', $keyword);
            $this->db->or_like('kategori', $keyword);
            $this->db->group_end();
        }
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('berita', $limit, $offset)->result();
    }

    public function count_search($keyword = null)
    {
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('judul', $keyword);
            $this->db->or_like('konten', $keyword);
            $this->db->or_like('kategori', $keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results('berita');
    }
}