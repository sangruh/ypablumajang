<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publikasi extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('publikasi_model');
        $this->load->library(['upload', 'pagination']);
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');
        $per_page = 10;

        $config['base_url'] = base_url('admin/publikasi');
        $config['per_page'] = $per_page;
        $config['total_rows'] = $this->publikasi_model->count_search($keyword);
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;

        $config['full_tag_open'] = '<div class="flex gap-2">';
        $config['full_tag_close'] = '</div>';
        $config['next_tag_open'] = '<button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 font-medium">';
        $config['next_tag_close'] = '</button>';
        $config['prev_tag_open'] = '<button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 font-medium">';
        $config['prev_tag_close'] = '</button>';
        $config['cur_tag_open'] = '<button class="px-3 py-1 border border-purple-500 rounded-md text-sm text-white bg-purple-600 font-medium">';
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
        $data['publikasi'] = $this->publikasi_model->search($keyword, $per_page, $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['keyword'] = $keyword;

        $this->load->view('admin/layout', array(
            'page_title' => 'Manajemen Publikasi - Admin YPAB',
            'content' => $this->load->view('admin/publikasi/index', $data, true)
        ));
    }

    public function tambah()
    {
        $this->load->view('admin/layout', array(
            'page_title' => 'Tambah Publikasi - Admin YPAB',
            'content' => $this->load->view('admin/publikasi/form', array(), true)
        ));
    }

    public function simpan()
    {
        $file = $this->_upload();

        $data = array(
            'judul' => $this->input->post('judul', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'kategori' => $this->input->post('kategori', true),
            'file' => $file['file_name'],
            'tipe_file' => $file['file_type'],
            'ukuran_file' => $file['file_size']
        );

        $this->publikasi_model->insert($data);
        $this->session->set_flashdata('success', 'Publikasi berhasil diupload!');
        redirect('admin/publikasi');
    }

    public function edit($id)
    {
        $data['publikasi'] = $this->publikasi_model->get_by_id($id);
        $this->load->view('admin/layout', array(
            'page_title' => 'Edit Publikasi - Admin YPAB',
            'content' => $this->load->view('admin/publikasi/form', $data, true)
        ));
    }

    public function update($id)
    {
        $old = $this->publikasi_model->get_by_id($id);
        $file = $this->_upload($old);

        $data = array(
            'judul' => $this->input->post('judul', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'kategori' => $this->input->post('kategori', true)
        );

        if ($file) {
            $data['file'] = $file['file_name'];
            $data['tipe_file'] = $file['file_type'];
            $data['ukuran_file'] = $file['file_size'];
        }

        $this->publikasi_model->update($id, $data);
        $this->session->set_flashdata('success', 'Publikasi berhasil diperbarui!');
        redirect('admin/publikasi');
    }

    public function hapus($id)
    {
        $publikasi = $this->publikasi_model->get_by_id($id);

        if ($publikasi && $publikasi->file) {
            $path = FCPATH . 'uploads/publikasi/' . $publikasi->file;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->publikasi_model->delete($id);
        $this->session->set_flashdata('success', 'Publikasi berhasil dihapus!');
        redirect('admin/publikasi');
    }

    private function _upload($old_data = null)
    {
        if (empty($_FILES['file']['name'])) {
            return null;
        }

        $path = FCPATH . 'uploads/publikasi';
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'pdf|doc|docx|xls|xlsx|ppt|pptx',
            'max_size'      => 10240,
            'file_name'     => 'publikasi_' . time() . '_' . uniqid()
        );

        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            if ($old_data && file_exists($path . '/' . $old_data->file)) {
                unlink($path . '/' . $old_data->file);
            }
            return $this->upload->data();
        } else {
            $error = $this->upload->display_errors('', '');
            $this->session->set_flashdata('error', 'Upload gagal: ' . $error);
            return null;
        }
    }
}
