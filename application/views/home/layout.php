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
        .fade-in { opacity: 0; transform: translateY(30px); transition: opacity 0.6s ease, transform 0.6s ease; }
        .fade-in.visible { opacity: 1; transform: translateY(0); }
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
                <a href="<?php echo base_url(); ?>" class="flex items-center space-x-3">
                    <img src="<?php echo base_url('assets/img/logo-ypab.png'); ?>" alt="Logo YPAB" class="h-10 w-10">
                    <div><span class="text-lg font-bold text-primary-800">YPAB</span><span class="block text-xs text-gray-500 -mt-1">Kab. Lumajang</span></div>
                </a>
                <div class="hidden md:flex items-center space-x-1">
                    <a href="<?php echo base_url(); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo ($uri1 == '' || $uri1 == 'home') ? 'text-primary-700 bg-primary-50' : 'text-gray-600 hover:text-primary-600 hover:bg-gray-100'; ?> transition">Beranda</a>
                    <a href="<?php echo base_url('tentang'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('tentang'); ?> transition">Tentang</a>
                    <a href="<?php echo base_url('kepengurusan'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('kepengurusan'); ?> transition">Kepengurusan</a>
                    <a href="<?php echo base_url('program'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('program'); ?> transition">Program</a>
                    <a href="<?php echo base_url('berita'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('berita'); ?> transition">Berita</a>
                    <a href="<?php echo base_url('kegiatan'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('kegiatan'); ?> transition">Kegiatan</a>
                    <a href="<?php echo base_url('artikel'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('artikel'); ?> transition">Artikel</a>
                    <a href="<?php echo base_url('publikasi'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('publikasi'); ?> transition">Publikasi</a>
                    <a href="<?php echo base_url('donasi'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('donasi'); ?> transition">Donasi</a>
                    <a href="<?php echo base_url('kontak'); ?>" class="px-3 py-2 rounded-md text-sm font-medium <?php echo $active('kontak'); ?> transition">Kontak</a>
                </div>
                <button onclick="toggleMobileMenu()" class="md:hidden p-2 rounded-md text-gray-600 hover:bg-gray-100">
                    <svg id="menu-open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg id="menu-close" class="h-6 w-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="<?php echo base_url(); ?>" onclick="closeMobileMenu()" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700 <?php echo ($uri1 == '' || $uri1 == 'home') ? 'text-primary-700 bg-primary-50' : ''; ?>">Beranda</a>
                <a href="<?php echo base_url('tentang'); ?>" onclick="closeMobileMenu()" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700 <?php echo $active('tentang'); ?>">Tentang</a>
                <a href="<?php echo base_url('kepengurusan'); ?>" onclick="closeMobileMenu()" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700 <?php echo $active('kepengurusan'); ?>">Kepengurusan</a>
                <a href="<?php echo base_url('program'); ?>" onclick="closeMobileMenu()" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700 <?php echo $active('program'); ?>">Program</a>
                <a href="<?php echo base_url('berita'); ?>" onclick="closeMobileMenu()" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700 <?php echo $active('berita'); ?>">Berita</a>
                <a href="<?php echo base_url('kegiatan'); ?>" onclick="closeMobileMenu()" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700 <?php echo $active('kegiatan'); ?>">Kegiatan</a>
                <a href="<?php echo base_url('artikel'); ?>" onclick="closeMobileMenu()" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700 <?php echo $active('artikel'); ?>">Artikel</a>
                <a href="<?php echo base_url('publikasi'); ?>" onclick="closeMobileMenu()" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700 <?php echo $active('publikasi'); ?>">Publikasi</a>
                <a href="<?php echo base_url('donasi'); ?>" onclick="closeMobileMenu()" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700 <?php echo $active('donasi'); ?>">Donasi</a>
                <a href="<?php echo base_url('kontak'); ?>" onclick="closeMobileMenu()" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-700 <?php echo $active('kontak'); ?>">Kontak</a>
            </div>
        </div>
    </nav>

    <script>
        function toggleMobileMenu() { document.getElementById('mobile-menu').classList.toggle('hidden'); document.getElementById('menu-open').classList.toggle('hidden'); document.getElementById('menu-close').classList.toggle('hidden'); }
        function closeMobileMenu() { document.getElementById('mobile-menu').classList.add('hidden'); document.getElementById('menu-open').classList.remove('hidden'); document.getElementById('menu-close').classList.add('hidden'); }
        window.addEventListener('scroll', function() { const btn = document.getElementById('back-to-top'); if (window.scrollY > 400) btn.classList.remove('hidden'); else btn.classList.add('hidden'); });
        function scrollToTop() { window.scrollTo({ top: 0, behavior: 'smooth' }); }
        const observer = new IntersectionObserver((entries) => { entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); }); }, { threshold: 0.1 });
        document.addEventListener('DOMContentLoaded', () => { document.querySelectorAll('.fade-in').forEach(el => observer.observe(el)); });
    </script>

    <main><?php echo $content; ?></main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="<?php echo base_url('assets/img/logo-ypab.png'); ?>" alt="Logo YPAB" class="h-10 w-10">
                        <div><h3 class="text-lg font-bold text-white">YPAB Kabupaten Lumajang</h3><p class="text-xs text-gray-400">Yayasan Peduli Anak Bangsa</p></div>
                    </div>
                    <p class="text-sm text-gray-400 leading-relaxed">Yayasan Peduli Anak Bangsa (YPAB) Kabupaten Lumajang merupakan perubahan dari Yayasan Gerakan Nurani Orang Tua Asuh (Y-GNOTA). Bergerak di bidang sosial untuk membantu anak-anak yang membutuhkan.</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Menu</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="<?php echo base_url('tentang'); ?>" class="hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="<?php echo base_url('program'); ?>" class="hover:text-white transition">Program</a></li>
                        <li><a href="<?php echo base_url('berita'); ?>" class="hover:text-white transition">Berita</a></li>
                        <li><a href="<?php echo base_url('kegiatan'); ?>" class="hover:text-white transition">Kegiatan</a></li>
                        <li><a href="<?php echo base_url('artikel'); ?>" class="hover:text-white transition">Artikel</a></li>
                        <li><a href="<?php echo base_url('publikasi'); ?>" class="hover:text-white transition">Publikasi</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-start"><svg class="h-5 w-5 mr-2 mt-0.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg><span>Jl. Alun-Alun Selatan No. 09, Kel. Ditotrunan, Kec. Lumajang, 67313</span></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm text-gray-500">&copy; <?php echo date('Y'); ?> YPAB Kabupaten Lumajang. All rights reserved.</p>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition" aria-label="Facebook"><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>
                    <a href="#" class="text-gray-400 hover:text-pink-500 transition" aria-label="Instagram"><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                    <a href="#" class="text-gray-400 hover:text-red-500 transition" aria-label="YouTube"><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating -->
    <a href="https://wa.me/6281234567890?text=Halo%20YPAB%20Lumajang" target="_blank" class="fixed bottom-6 left-6 z-50 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-2xl hover:shadow-green-500/50 transition hover:scale-110" aria-label="Chat WhatsApp">
        <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    </a>

    <!-- Back to Top -->
    <button id="back-to-top" onclick="scrollToTop()" class="fixed bottom-6 right-6 z-50 bg-primary-600 hover:bg-primary-700 text-white p-3 rounded-full shadow-xl hidden transition" aria-label="Kembali ke atas">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
    </button>

</body>
</html>
