<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->view('home/layout', array('page_title' => 'YPAB Kabupaten Lumajang - Beranda', 'content' => $this->load->view('home/index', '', true)));
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
            array(
                'nama' => 'Pendampingan Anak Asuh',
                'deskripsi' => 'Memberikan pendampingan dan pembinaan kepada anak-anak asuh agar mendapat kehidupan yang layak.',
                'icon' => '👨‍👩‍👧‍👦'
            ),
            array(
                'nama' => 'Beasiswa Pendidikan',
                'deskripsi' => 'Menyalurkan bantuan beasiswa bagi anak-anak kurang mampu untuk melanjutkan pendidikan.',
                'icon' => '📚'
            ),
            array(
                'nama' => 'Bantuan Sosial',
                'deskripsi' => 'Menyalurkan bantuan sosial kepada masyarakat yang membutuhkan melalui program yang terstruktur.',
                'icon' => '🤝'
            ),
            array(
                'nama' => 'Pemberdayaan Masyarakat',
                'deskripsi' => 'Program pemberdayaan masyarakat untuk meningkatkan kemandirian ekonomi dan sosial.',
                'icon' => '💪'
            ),
            array(
                'nama' => 'Kesehatan & Gizi',
                'deskripsi' => 'Program peningkatan kesehatan dan gizi anak melalui pemeriksaan rutin dan pemberian makanan bergizi.',
                'icon' => '🏥'
            ),
            array(
                'nama' => 'Pelatihan Keterampilan',
                'deskripsi' => 'Pelatihan keterampilan bagi anak asuh dan keluarga untuk meningkatkan kapasitas diri.',
                'icon' => '🛠️'
            )
        );
        $this->load->view('home/layout', array('page_title' => 'Program Kami - YPAB Kabupaten Lumajang', 'content' => $this->load->view('home/program', $data, true)));
    }

    public function berita($offset = 0)
    {
        $limit = 6;
        // Placeholder data - nanti bisa diganti dengan query database
        $data['berita'] = array(
            array(
                'judul' => 'Pelantikan Pengurus YPAB Masa Bhakti 2025-2030',
                'tanggal' => '2026-01-15',
                'ringkasan' => 'Pengurus Yayasan Peduli Anak Bangsa Kabupaten Lumajang resmi dilantik untuk masa bhakti 2025-2030.',
                'gambar' => ''
            ),
            array(
                'judul' => 'Penyaluran Bantuan Sosial Tahap I Tahun 2026',
                'tanggal' => '2026-01-10',
                'ringkasan' => 'Yayasan menyalurkan bantuan sosial tahap pertama kepada 100 penerima manfaat di Kabupaten Lumajang.',
                'gambar' => ''
            ),
            array(
                'judul' => 'Rapat Koordinasi Program Kerja 2026',
                'tanggal' => '2026-01-05',
                'ringkasan' => 'Pengurus YPAB menggelar rapat koordinasi untuk menyusun program kerja tahun 2026.',
                'gambar' => ''
            )
        );
        $data['total'] = count($data['berita']);
        $this->load->view('home/layout', array('page_title' => 'Berita - YPAB Kabupaten Lumajang', 'content' => $this->load->view('home/berita', $data, true)));
    }

    public function artikel()
    {
        // Placeholder data - nanti bisa diganti dengan query database
        $data['artikel'] = array(
            array(
                'judul' => 'Pentingnya Pendidikan Karakter bagi Anak Asuh',
                'penulis' => 'Dwi Sriyantini',
                'tanggal' => '2026-01-12',
                'ringkasan' => 'Pendidikan karakter menjadi fondasi penting dalam membentuk kepribadian anak asuh yang tangguh dan berakhlak mulia.'
            ),
            array(
                'judul' => 'Peran Yayasan dalam Mewujudkan Kesejahteraan Anak',
                'penulis' => 'Rachmaniah',
                'tanggal' => '2026-01-08',
                'ringkasan' => 'Yayasan memiliki peran strategis dalam menjembatani donatur dengan anak-anak yang membutuhkan bantuan.'
            ),
            array(
                'judul' => 'Strategi Penggalian Dana untuk Program Sosial',
                'penulis' => 'Yuni Irwanto',
                'tanggal' => '2025-12-20',
                'ringkasan' => 'Berbagai strategi penggalian dana yang dapat diterapkan oleh yayasan sosial untuk keberlangsungan program.'
            )
        );
        $this->load->view('home/layout', array('page_title' => 'Artikel - YPAB Kabupaten Lumajang', 'content' => $this->load->view('home/artikel', $data, true)));
    }

    public function publikasi()
    {
        // Placeholder data - nanti bisa diganti dengan query database
        $data['publikasi'] = array(
            array(
                'judul' => 'Laporan Tahunan YPAB 2025',
                'jenis' => 'Laporan Tahunan',
                'tanggal' => '2025-12-31',
                'file' => ''
            ),
            array(
                'judul' => 'SK Pengurus Masa Bhakti 2025-2030',
                'jenis' => 'Surat Keputusan',
                'tanggal' => '2026-01-01',
                'file' => ''
            ),
            array(
                'judul' => 'Pedoman Pengelolaan Bantuan Sosial',
                'jenis' => 'Pedoman',
                'tanggal' => '2025-11-15',
                'file' => ''
            )
        );
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
            'pembina' => array(
                'ketua' => 'Ir. Indah Amperawati, M.Si.',
                'anggota' => array('Bambang Hidayat', 'Nugroho Dwi Atmoko')
            ),
            'pengawas' => array(
                'ketua' => 'Aan Dityatama',
                'anggota' => array()
            ),
            'pengurus_harian' => array(
                'ketua' => 'Rachmaniah',
                'wakil_ketua' => 'M. Nur Sjahid',
                'sekretaris_umum' => 'Dwi Sriyantini',
                'sekretaris_1' => 'Gatot Suprabowo',
                'bendahara_umum' => 'Dinuk Iswahyuningsih',
                'bendahara_1' => 'Eko Yudiantoro Ilyas'
            ),
            'bidang' => array(
                array(
                    'nama' => 'Organisasi, Data dan Informasi',
                    'anggota' => array('Heppy Septevin Gumilang', 'Edi Nanang Sofyan Hadi', 'Saiful Bahri')
                ),
                array(
                    'nama' => 'Penggalian Dana',
                    'anggota' => array('Yuni Irwanto', 'Ester Pramedina', 'Dyah Kusumaningrum')
                ),
                array(
                    'nama' => 'Penyaluran Bantuan',
                    'anggota' => array('Syamsul Hadi', 'Ria Cancerina', 'Sumariadi')
                )
            )
        );
        $this->load->view('home/layout', array('page_title' => 'Kepengurusan - YPAB Kabupaten Lumajang', 'content' => $this->load->view('home/kepengurusan', $data, true)));
    }
}
