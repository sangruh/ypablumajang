<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('berita_model');
        $this->load->library(['upload', 'pagination']);
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');
        $per_page = 10;

        $config['base_url'] = base_url('admin/berita');
        $config['per_page'] = $per_page;
        $config['total_rows'] = $this->berita_model->count_search($keyword);
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;

        $config['full_tag_open'] = '<div class="flex gap-2">';
        $config['full_tag_close'] = '</div>';
        $config['next_tag_open'] = '<button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 font-medium">';
        $config['next_tag_close'] = '</button>';
        $config['prev_tag_open'] = '<button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 font-medium">';
        $config['prev_tag_close'] = '</button>';
        $config['cur_tag_open'] = '<button class="px-3 py-1 border border-primary-500 rounded-md text-sm text-white bg-primary-600 font-medium">';
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
        $data['berita'] = $this->berita_model->search($keyword, $per_page, $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['keyword'] = $keyword;

        $this->load->view('admin/layout', [
            'page_title' => 'Manajemen Berita - Admin YPAB',
            'content' => $this->load->view('admin/berita/index', $data, true)
        ]);
    }

    public function tambah()
    {
        $this->load->view('admin/layout', [
            'page_title' => 'Tambah Berita - Admin YPAB',
            'content' => $this->load->view('admin/berita/form', [], true)
        ]);
    }

    public function simpan()
    {
        $gambar = $this->_upload();

        // If upload failed but form should still save (gambar is optional)
        $data = [
            'judul'    => $this->input->post('judul', true),
            'konten'   => $this->input->post('konten', true),
            'kategori' => $this->input->post('kategori', true),
            'tanggal'  => $this->input->post('tanggal', true),
            'status'   => $this->input->post('status', true),
            'gambar'   => $gambar
        ];

        $this->berita_model->insert($data);
        
        // Check if there was an upload error
        if ($this->session->flashdata('error')) {
            $this->session->set_flashdata('warning', 'Berita disimpan, tetapi upload gambar gagal.');
        } else {
            $this->session->set_flashdata('success', 'Berita berhasil disimpan!');
        }
        
        redirect('admin/berita');
    }

    public function edit($id)
    {
        $data['berita'] = $this->berita_model->get_by_id($id);
        $this->load->view('admin/layout', [
            'page_title' => 'Edit Berita - Admin YPAB',
            'content' => $this->load->view('admin/berita/form', $data, true)
        ]);
    }

    public function update($id)
    {
        $old = $this->berita_model->get_by_id($id);
        $gambar = $this->_upload($old->gambar ?? null);

        $data = [
            'judul'    => $this->input->post('judul', true),
            'konten'   => $this->input->post('konten', true),
            'kategori' => $this->input->post('kategori', true),
            'tanggal'  => $this->input->post('tanggal', true),
            'status'   => $this->input->post('status', true)
        ];

        if ($gambar) {
            $data['gambar'] = $gambar;
        }

        $this->berita_model->update($id, $data);
        $this->session->set_flashdata('success', 'Berita berhasil diperbarui!');
        redirect('admin/berita');
    }

    public function hapus($id)
    {
        $berita = $this->berita_model->get_by_id($id);

        if ($berita?->gambar) {
            $path = FCPATH . 'uploads/berita/' . $berita->gambar;
            if (file_exists($path)) unlink($path);
        }

        $this->berita_model->delete($id);
        $this->session->set_flashdata('success', 'Berita berhasil dihapus!');
        redirect('admin/berita');
    }

    private function _upload($old_file = null)
    {
        if (empty($_FILES['gambar']['name'])) {
            return null;
        }

        $path = FCPATH . 'uploads/berita';
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $config = [
            'upload_path'   => $path,
            'allowed_types' => 'jpg|jpeg|png|gif',
            'max_size'      => 0,
            'file_name'     => 'berita_' . time() . '_' . uniqid()
        ];

        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {
            if ($old_file && file_exists($path . '/' . $old_file)) {
                unlink($path . '/' . $old_file);
            }
            return $this->upload->data('file_name');
        } else {
            // Tampilkan error upload
            $error = $this->upload->display_errors('', '');
            $this->session->set_flashdata('error', 'Upload gagal: ' . $error);
            return null;
        }
    }
}
