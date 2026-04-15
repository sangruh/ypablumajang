<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_model extends CI_Model {

    public function get_all_kegiatan($limit = null, $offset = 0)
    {
        $this->db->order_by('tanggal', 'DESC');
        if ($limit) {
            return $this->db->get('kegiatan', $limit, $offset)->result();
        }
        return $this->db->get('kegiatan')->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('kegiatan')->row();
    }

    public function insert($data)
    {
        return $this->db->insert('kegiatan', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('kegiatan', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('kegiatan');
    }

    public function count_all()
    {
        return $this->db->count_all('kegiatan');
    }

    public function get_by_status($status)
    {
        $this->db->where('status', $status);
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get('kegiatan')->result();
    }

    public function get_upcoming($limit = 3)
    {
        $this->db->where('tanggal >=', date('Y-m-d'));
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get('kegiatan', $limit)->result();
    }

    public function search($keyword = null, $limit = 10, $offset = 0)
    {
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('judul', $keyword);
            $this->db->or_like('deskripsi', $keyword);
            $this->db->or_like('lokasi', $keyword);
            $this->db->group_end();
        }
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get('kegiatan', $limit, $offset)->result();
    }

    public function count_search($keyword = null)
    {
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('judul', $keyword);
            $this->db->or_like('deskripsi', $keyword);
            $this->db->or_like('lokasi', $keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results('kegiatan');
    }
}