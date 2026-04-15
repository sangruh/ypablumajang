<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_model extends CI_Model {

    public function get_all_artikel($limit = null, $offset = 0)
    {
        $this->db->order_by('created_at', 'DESC');
        if ($limit) {
            return $this->db->get('artikel', $limit, $offset)->result();
        }
        return $this->db->get('artikel')->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('artikel')->row();
    }

    public function get_published($limit = null)
    {
        $this->db->where('status', 'publish');
        $this->db->order_by('created_at', 'DESC');
        if ($limit) {
            return $this->db->get('artikel', $limit)->result();
        }
        return $this->db->get('artikel')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('artikel', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('artikel', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('artikel');
    }

    public function count_all()
    {
        return $this->db->count_all('artikel');
    }

    public function count_by_status($status)
    {
        $this->db->where('status', $status);
        return $this->db->count_all_results('artikel');
    }

    public function search($keyword = null, $limit = 10, $offset = 0)
    {
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('judul', $keyword);
            $this->db->or_like('konten', $keyword);
            $this->db->or_like('penulis', $keyword);
            $this->db->or_like('kategori', $keyword);
            $this->db->group_end();
        }
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('artikel', $limit, $offset)->result();
    }

    public function count_search($keyword = null)
    {
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('judul', $keyword);
            $this->db->or_like('konten', $keyword);
            $this->db->or_like('penulis', $keyword);
            $this->db->or_like('kategori', $keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results('artikel');
    }
}