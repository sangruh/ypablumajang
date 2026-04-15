<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kegiatan_model');
        $this->load->model('artikel_model');
        $this->load->model('berita_model');
        $this->load->model('publikasi_model');
    }

    public function index()
    {
        // Ambil jumlah data
        $data['total_kegiatan'] = $this->kegiatan_model->count_all();
        $data['total_artikel'] = $this->artikel_model->count_all();
        $data['total_berita'] = $this->berita_model->count_all();
        $data['total_publikasi'] = $this->publikasi_model->count_all();

        // Ambil 5 data terbaru untuk aktivitas
        $data['recent_activities'] = $this->get_recent_activities();

        // Ambil kegiatan mendatang
        $data['upcoming_events'] = $this->kegiatan_model->get_upcoming(3);

        $this->load->view('admin/layout', array(
            'page_title' => 'Dashboard - Admin YPAB',
            'content' => $this->load->view('admin/dashboard', $data, true)
        ));
    }

    private function get_recent_activities()
    {
        $activities = array();

        // Berita terbaru
        $berita = $this->berita_model->get_all(3);
        foreach ($berita as $row) {
            $activities[] = array(
                'type' => 'berita',
                'title' => $row->judul,
                'date' => $row->created_at,
                'icon' => 'primary'
            );
        }

        // Artikel terbaru
        $artikel = $this->artikel_model->get_all_artikel(3);
        foreach ($artikel as $row) {
            $activities[] = array(
                'type' => 'artikel',
                'title' => $row->judul,
                'date' => $row->created_at,
                'icon' => 'accent'
            );
        }

        // Kegiatan terbaru
        $kegiatan = $this->kegiatan_model->get_all_kegiatan(3);
        foreach ($kegiatan as $row) {
            $activities[] = array(
                'type' => 'kegiatan',
                'title' => $row->judul ?? $row->nama,
                'date' => $row->created_at ?? $row->tanggal,
                'icon' => 'warning'
            );
        }

        // Urutkan berdasarkan tanggal terbaru
        usort($activities, function($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });

        return array_slice($activities, 0, 5);
    }
}