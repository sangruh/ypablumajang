<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['berita_model', 'artikel_model', 'publikasi_model', 'kegiatan_model']);
    }

    public function index()
    {
        $data['berita_terbaru'] = $this->berita_model->get_published(3);
        $data['kegiatan_mendatang'] = $this->kegiatan_model->get_upcoming(3);
        $data['artikel_terbaru'] = $this->artikel_model->get_published(3);

        $this->load->view('home/layout', array(
            'page_title' => 'YPAB Kabupaten Lumajang - Beranda',
            'content' => $this->load->view('home/index', $data, true)
        ));
    }

    public function tentang()
    {
        $data['sk_info'] = array(
            'akta_notaris' => 'Denny Irtanto, S.H., M. Kn. No. 23 Tanggal 08 November 2025',
            'sk_menkumham' => 'AHU-0024217.AH.01.04.Tahun 2025',
            'alamat' => 'Jalan Alun-Alun Selatan No. 09, Kel. Ditotrunan, Kec. Lumajang, 67313',
            'masa_bhakti' => '2025 - 2030'
        );
        $this->load->view('home/layout', array('page_title' => 'Tentang Kami - YPAB Kabupaten Lumajang', 'content' => $this->load->view('home/tentang', $data, true)));
    }

    public function program()
    {
        $data['programs'] = array(
            array('nama' => 'Pendampingan Anak Asuh', 'deskripsi' => 'Memberikan pendampingan dan pembinaan kepada anak-anak asuh agar mendapat kehidupan yang layak.', 'icon' => '👨‍👩‍👧‍👦'),
            array('nama' => 'Beasiswa Pendidikan', 'deskripsi' => 'Menyalurkan bantuan beasiswa bagi anak-anak kurang mampu untuk melanjutkan pendidikan.', 'icon' => '📚'),
            array('nama' => 'Bantuan Sosial', 'deskripsi' => 'Menyalurkan bantuan sosial kepada masyarakat yang membutuhkan melalui program yang terstruktur.', 'icon' => '🤝'),
            array('nama' => 'Pemberdayaan Masyarakat', 'deskripsi' => 'Program pemberdayaan masyarakat untuk meningkatkan kemandirian ekonomi dan sosial.', 'icon' => '💪'),
            array('nama' => 'Kesehatan & Gizi', 'deskripsi' => 'Program peningkatan kesehatan dan gizi anak melalui pemeriksaan rutin dan pemberian makanan bergizi.', 'icon' => '🏥'),
            array('nama' => 'Pelatihan Keterampilan', 'deskripsi' => 'Pelatihan keterampilan bagi anak asuh dan keluarga untuk meningkatkan kapasitas diri.', 'icon' => '🛠️')
        );
        $this->load->view('home/layout', array('page_title' => 'Program Kami - YPAB Kabupaten Lumajang', 'content' => $this->load->view('home/program', $data, true)));
    }

    public function berita()
    {
        $data['berita'] = $this->berita_model->get_published(10);
        $data['total'] = $this->berita_model->count_by_status('publish');
        $this->load->view('home/layout', array('page_title' => 'Berita - YPAB Kabupaten Lumajang', 'content' => $this->load->view('home/berita', $data, true)));
    }

    public function detail_berita($id)
    {
        $data['berita'] = $this->berita_model->get_by_id($id);
        if (!$data['berita'] || $data['berita']->status != 'publish') {
            show_404();
        }
        $this->berita_model->update($id, array('dilihat' => $data['berita']->dilihat + 1));
        $data['berita_lain'] = $this->berita_model->get_published(3);
        $this->load->view('home/layout', array('page_title' => $data['berita']->judul . ' - YPAB Kabupaten Lumajang', 'content' => $this->load->view('home/detail_berita', $data, true)));
    }

    public function artikel()
    {
        $data['artikel'] = $this->artikel_model->get_published(10);
        $this->load->view('home/layout', array('page_title' => 'Artikel - YPAB Kabupaten Lumajang', 'content' => $this->load->view('home/artikel', $data, true)));
    }

    public function detail_artikel($id)
    {
        $data['artikel'] = $this->artikel_model->get_by_id($id);
        if (!$data['artikel'] || $data['artikel']->status != 'publish') {
            show_404();
        }
        $data['artikel_lain'] = $this->artikel_model->get_published(3);
        $this->load->view('home/layout', array('page_title' => $data['artikel']->judul . ' - YPAB Kabupaten Lumajang', 'content' => $this->load->view('home/detail_artikel', $data, true)));
    }

    public function kegiatan()
    {
        $data['kegiatan'] = $this->kegiatan_model->get_all_kegiatan(20);
        $this->load->view('home/layout', array('page_title' => 'Kegiatan - YPAB Kabupaten Lumajang', 'content' => $this->load->view('home/kegiatan', $data, true)));
    }

    public function detail_kegiatan($id)
    {
        $data['kegiatan'] = $this->kegiatan_model->get_by_id($id);
        if (!$data['kegiatan']) {
            show_404();
        }
        $data['kegiatan_lain'] = $this->kegiatan_model->get_upcoming(3);
        $this->load->view('home/layout', array('page_title' => $data['kegiatan']->judul . ' - YPAB Kabupaten Lumajang', 'content' => $this->load->view('home/detail_kegiatan', $data, true)));
    }

    public function publikasi()
    {
        $data['publikasi'] = $this->publikasi_model->get_all(10);
        $this->load->view('home/layout', array('page_title' => 'Publikasi - YPAB Kabupaten Lumajang', 'content' => $this->load->view('home/publikasi', $data, true)));
    }

    public function donasi()
    {
        $this->load->view('home/layout', array('page_title' => 'Donasi - YPAB Kabupaten Lumajang', 'content' => $this->load->view('home/donasi', array(), true)));
    }

    public function kontak()
    {
        $this->load->view('home/layout', array('page_title' => 'Kontak - YPAB Kabupaten Lumajang', 'content' => $this->load->view('home/kontak', array(), true)));
    }

    public function kepengurusan()
    {
        $data['pengurus'] = array(
            'pembina' => array('ketua' => 'Ir. Indah Amperawati, M.Si.', 'anggota' => array('Bambang Hidayat', 'Nugroho Dwi Atmoko')),
            'pengawas' => array('ketua' => 'Aan Dityatama', 'anggota' => array()),
            'pengurus_harian' => array(
                'ketua' => 'Rachmaniah', 'wakil_ketua' => 'M. Nur Sjahid', 'sekretaris_umum' => 'Dwi Sriyantini',
                'sekretaris_1' => 'Gatot Suprabowo', 'bendahara_umum' => 'Dinuk Iswahyuningsih', 'bendahara_1' => 'Eko Yudiantoro Ilyas'
            ),
            'bidang' => array(
                array('nama' => 'Organisasi, Data dan Informasi', 'anggota' => array('Heppy Septevin Gumilang', 'Edi Nanang Sofyan Hadi', 'Saiful Bahri')),
                array('nama' => 'Penggalian Dana', 'anggota' => array('Yuni Irwanto', 'Ester Pramedina', 'Dyah Kusumaningrum')),
                array('nama' => 'Penyaluran Bantuan', 'anggota' => array('Syamsul Hadi', 'Ria Cancerina', 'Sumariadi'))
            )
        );
        $this->load->view('home/layout', array('page_title' => 'Kepengurusan - YPAB Kabupaten Lumajang', 'content' => $this->load->view('home/kepengurusan', $data, true)));
    }
}
