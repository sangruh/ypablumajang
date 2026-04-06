<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'YPAB Kabupaten Lumajang'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 50:'#ecfdf5',100:'#d1fae5',200:'#a7f3d0',300:'#6ee7b7',400:'#34d399',500:'#10b981',600:'#059669',700:'#047857',800:'#065f46',900:'#064e3b' },
                        accent:  { 50:'#eff6ff',100:'#dbeafe',200:'#bfdbfe',300:'#93c5fd',400:'#60a5fa',500:'#3b82f6',600:'#2563eb',700:'#1d4ed8',800:'#1e40af',900:'#1e3a8a' },
                        warning: { 50:'#fefce8',100:'#fef9c3',200:'#fef08a',300:'#fde047',400:'#facc15',500:'#eab308',600:'#ca8a04',700:'#a16207',800:'#854d0e',900:'#713f12' }
                    }
                }
            }
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">

    <?php
    $uri1 = $this->uri->segment(1);
    $active = function($route) use ($uri1) {
        return $uri1 === $route ? 'text-primary-700 bg-primary-50' : 'text-gray-600 hover:text-primary-600 hover:bg-gray-100';
    };
    ?>

    <!-- Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="<?php echo base_url(); ?>" class="flex items-center space-x-3">
                    <img src="<?php echo base_url('assets/img/logo-ypab.png'); ?>" alt="Logo YPAB" class="h-10 w-10">
                    <div>
                        <span class="text-lg font-bold text-primary-800">YPAB</span>
                        <span class="block text-xs text-gray-500 -mt-1">Kab. Lumajang</span>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="<?php echo base_url(); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo ($uri1 == '' || $uri1 == 'home') ? 'text-primary-700 bg-primary-50' : 'text-gray-600 hover:text-primary-600 hover:bg-gray-100'; ?> transition">Beranda</a>
                    <a href="<?php echo base_url('tentang'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('tentang'); ?> transition">Tentang</a>
                    <a href="<?php echo base_url('kepengurusan'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('kepengurusan'); ?> transition">Kepengurusan</a>
                    <a href="<?php echo base_url('program'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('program'); ?> transition">Program</a>
                    <a href="<?php echo base_url('berita'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('berita'); ?> transition">Berita</a>
                    <a href="<?php echo base_url('artikel'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('artikel'); ?> transition">Artikel</a>
                    <a href="<?php echo base_url('publikasi'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('publikasi'); ?> transition">Publikasi</a>
                    <a href="<?php echo base_url('donasi'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('donasi'); ?> transition">Donasi</a>
                    <a href="<?php echo base_url('kontak'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('kontak'); ?> transition">Kontak</a>
                </div>

                <!-- Mobile menu button -->
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="md:hidden p-2 rounded-md text-gray-600 hover:bg-gray-100 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="<?php echo base_url(); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700">Beranda</a>
                <a href="<?php echo base_url('tentang'); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700">Tentang</a>
                <a href="<?php echo base_url('kepengurusan'); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700">Kepengurusan</a>
                <a href="<?php echo base_url('program'); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700">Program</a>
                <a href="<?php echo base_url('berita'); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700">Berita</a>
                <a href="<?php echo base_url('artikel'); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700">Artikel</a>
                <a href="<?php echo base_url('publikasi'); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700">Publikasi</a>
                <a href="<?php echo base_url('donasi'); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700">Donasi</a>
                <a href="<?php echo base_url('kontak'); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <?php echo $content; ?>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="<?php echo base_url('assets/img/logo-ypab.png'); ?>" alt="Logo YPAB" class="h-10 w-10">
                        <div>
                            <h3 class="text-lg font-bold text-white">YPAB Kabupaten Lumajang</h3>
                            <p class="text-xs text-gray-400">Yayasan Peduli Anak Bangsa</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        Yayasan Peduli Anak Bangsa (YPAB) Kabupaten Lumajang merupakan perubahan dari Yayasan Gerakan Nurani Orang Tua Asuh (Y-GNOTA).
                        Bergerak di bidang sosial untuk membantu anak-anak yang membutuhkan.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-semibold mb-4">Menu</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="<?php echo base_url('tentang'); ?>" class="hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="<?php echo base_url('program'); ?>" class="hover:text-white transition">Program</a></li>
                        <li><a href="<?php echo base_url('berita'); ?>" class="hover:text-white transition">Berita</a></li>
                        <li><a href="<?php echo base_url('artikel'); ?>" class="hover:text-white transition">Artikel</a></li>
                        <li><a href="<?php echo base_url('publikasi'); ?>" class="hover:text-white transition">Publikasi</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-white font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 mr-2 mt-0.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>Jl. Alun-Alun Selatan No. 09, Kel. Ditotrunan, Kec. Lumajang, 67313</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-500">
                <p>&copy; <?php echo date('Y'); ?> YPAB Kabupaten Lumajang. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
