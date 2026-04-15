<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('artikel_model');
        $this->load->library(['upload', 'pagination']);
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');
        $per_page = 10;

        $config['base_url'] = base_url('admin/artikel');
        $config['per_page'] = $per_page;
        $config['total_rows'] = $this->artikel_model->count_search($keyword);
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;

        $config['full_tag_open'] = '<div class="flex gap-2">';
        $config['full_tag_close'] = '</div>';
        $config['next_tag_open'] = '<button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 font-medium">';
        $config['next_tag_close'] = '</button>';
        $config['prev_tag_open'] = '<button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 font-medium">';
        $config['prev_tag_close'] = '</button>';
        $config['cur_tag_open'] = '<button class="px-3 py-1 border border-accent-500 rounded-md text-sm text-white bg-accent-600 font-medium">';
        $config['cur_tag_close'] = '</button>';
        $config['num_tag_open'] = '<button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 font-medium">';
        $config['num_tag_close'] = '</button>';
        $config['first_link'] = 'Pertama';
        $config['last_link'] = 'Terakhir';
        $config['first_tag_open'] = '<button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 font-medium">';
        $config['first_tag_close'] = '</button>';
        $config['last_tag_open'] = '<button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 font-medium">';
        $config['last_tag_close'] = '</button>';

        $this->pagination->initialize($config);

        $offset = $this->uri->segment(4) ? ($this->uri->segment(4) - 1) * $per_page : 0;
        $data['artikel'] = $this->artikel_model->search($keyword, $per_page, $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['keyword'] = $keyword;

        $this->load->view('admin/layout', array(
            'page_title' => 'Manajemen Artikel - Admin YPAB',
            'content' => $this->load->view('admin/artikel/index', $data, true)
        ));
    }

    public function tambah()
    {
        $this->load->view('admin/layout', array(
            'page_title' => 'Tambah Artikel - Admin YPAB',
            'content' => $this->load->view('admin/artikel/form', array(), true)
        ));
    }

    public function simpan()
    {
        $gambar = $this->_upload();

        $data = array(
            'judul' => $this->input->post('judul', true),
            'konten' => $this->input->post('konten', true),
            'penulis' => $this->input->post('penulis', true),
            'kategori' => $this->input->post('kategori', true),
            'status' => $this->input->post('status', true),
            'gambar' => $gambar
        );

        $this->artikel_model->insert($data);

        if ($this->session->flashdata('error')) {
            $this->session->set_flashdata('warning', 'Artikel disimpan, tetapi upload gambar gagal.');
        } else {
            $this->session->set_flashdata('success', 'Artikel berhasil disimpan!');
        }

        redirect('admin/artikel');
    }

    public function edit($id)
    {
        $data['artikel'] = $this->artikel_model->get_by_id($id);
        $this->load->view('admin/layout', array(
            'page_title' => 'Edit Artikel - Admin YPAB',
            'content' => $this->load->view('admin/artikel/form', $data, true)
        ));
    }

    public function update($id)
    {
        $old = $this->artikel_model->get_by_id($id);
        $gambar = $this->_upload($old->gambar ?? null);

        $data = array(
            'judul' => $this->input->post('judul', true),
            'konten' => $this->input->post('konten', true),
            'penulis' => $this->input->post('penulis', true),
            'kategori' => $this->input->post('kategori', true),
            'status' => $this->input->post('status', true)
        );

        if ($gambar) {
            $data['gambar'] = $gambar;
        }

        $this->artikel_model->update($id, $data);
        $this->session->set_flashdata('success', 'Artikel berhasil diperbarui!');
        redirect('admin/artikel');
    }

    public function hapus($id)
    {
        $artikel = $this->artikel_model->get_by_id($id);

        if ($artikel && $artikel->gambar) {
            $path = FCPATH . 'uploads/artikel/' . $artikel->gambar;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->artikel_model->delete($id);
        $this->session->set_flashdata('success', 'Artikel berhasil dihapus!');
        redirect('admin/artikel');
    }

    private function _upload($old_file = null)
    {
        if (empty($_FILES['gambar']['name'])) {
            return null;
        }

        $path = FCPATH . 'uploads/artikel';
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $config = array(
            'upload_path' => $path,
            'allowed_types' => 'jpg|jpeg|png',
            'max_size' => 0,
            'file_name' => 'artikel_' . time() . '_' . uniqid()
        );

        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {
            if ($old_file && file_exists($path . '/' . $old_file)) {
                unlink($path . '/' . $old_file);
            }
            return $this->upload->data('file_name');
        } else {
            $error = $this->upload->display_errors('', '');
            $this->session->set_flashdata('error', 'Upload gagal: ' . $error);
            return null;
        }
    }
}
