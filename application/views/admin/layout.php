<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Dashboard Admin - YPAB'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            300: '#6ee7b7',
                            400: '#34d399',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b'
                        },
                        accent: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a'
                        },
                        warning: {
                            50: '#fefce8',
                            100: '#fef9c3',
                            200: '#fef08a',
                            300: '#fde047',
                            400: '#facc15',
                            500: '#eab308',
                            600: '#ca8a04',
                            700: '#a16207',
                            800: '#854d0e',
                            900: '#713f12'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        .sidebar-link.active {
            background: linear-gradient(90deg, rgba(16, 185, 129, 0.1) 0%, transparent 100%);
            border-left: 3px solid #059669;
            color: #059669;
        }
    </style>
</head>

<body class="bg-gray-50">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-white shadow-xl flex flex-col transition-all duration-300 fixed h-full z-20">

            <!-- Sidebar Header / Logo -->
            <div class="bg-white border-b border-gray-200" style="height: 64px; display: flex; align-items: center;">
                <div class="flex items-center space-x-3 px-6 w-full">
                    <img src="<?php echo base_url('assets/img/logo-ypab.png'); ?>" alt="Logo" class="h-10 w-10">
                    <div>
                        <h1 class="text-base font-bold text-primary-700">YPAB Admin</h1>
                        <p class="text-xs text-gray-500">Panel Manajemen</p>
                    </div>
                </div>
            </div>

            <!-- User Profile -->
            <div class="px-4 py-3 border-b border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-primary-500 to-primary-700 flex items-center justify-center text-white font-semibold">
                            <?php echo strtoupper(substr($this->session->userdata('nama_lengkap'), 0, 1)); ?>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-900 truncate"><?php echo $this->session->userdata('nama_lengkap'); ?></p>
                        <p class="text-xs text-gray-500 truncate"><?php echo $this->session->userdata('email'); ?></p>
                    </div>
                </div>

                <?php
                $uri = $this->uri->segment(1) . '/' . $this->uri->segment(2);
                $active_menu = function ($menu) use ($uri) {
                    return $uri === $menu ? 'active' : '';
                };
                ?>

                <!-- Navigation Menu -->
                <nav class="flex-1 overflow-y-auto py-4">

                    <!-- Main Menu -->
                    <div class="px-4 mb-2">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Menu Utama</p>
                    </div>

                    <a href="<?php echo base_url('admin'); ?>" class="sidebar-link <?php echo $active_menu('admin/dashboard'); ?> flex items-center px-4 py-3 text-sm font-medium transition hover:bg-primary-50 hover:text-primary-700">
                        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>

                    <!-- Konten Menu -->
                    <div class="px-4 mt-6 mb-2">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Manajemen Konten</p>
                    </div>

                    <a href="<?php echo base_url('admin/berita'); ?>" class="sidebar-link <?php echo $active_menu('admin/berita'); ?> flex items-center px-4 py-3 text-sm font-medium text-gray-700 transition hover:bg-primary-50 hover:text-primary-700">
                        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        Berita
                    </a>

                    <a href="<?php echo base_url('admin/artikel'); ?>" class="sidebar-link <?php echo $active_menu('admin/artikel'); ?> flex items-center px-4 py-3 text-sm font-medium text-gray-700 transition hover:bg-primary-50 hover:text-primary-700">
                        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Artikel
                    </a>

                    <a href="<?php echo base_url('admin/kegiatan'); ?>" class="sidebar-link <?php echo $active_menu('admin/kegiatan'); ?> flex items-center px-4 py-3 text-sm font-medium text-gray-700 transition hover:bg-primary-50 hover:text-primary-700">
                        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Kegiatan
                    </a>

                    <a href="<?php echo base_url('admin/publikasi'); ?>" class="sidebar-link <?php echo $active_menu('admin/publikasi'); ?> flex items-center px-4 py-3 text-sm font-medium text-gray-700 transition hover:bg-primary-50 hover:text-primary-700">
                        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        Publikasi
                    </a>

                    <!-- Settings Menu -->
                    <!-- <div class="px-4 mt-6 mb-2">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Pengaturan</p>
                    </div>

                    <a href="<?php echo base_url('admin/pengguna'); ?>" class="sidebar-link <?php echo $active_menu('admin/pengguna'); ?> flex items-center px-4 py-3 text-sm font-medium text-gray-700 transition hover:bg-primary-50 hover:text-primary-700">
                        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Pengguna
                    </a>

                    <a href="<?php echo base_url('admin/konfigurasi'); ?>" class="sidebar-link <?php echo $active_menu('admin/konfigurasi'); ?> flex items-center px-4 py-3 text-sm font-medium text-gray-700 transition hover:bg-primary-50 hover:text-primary-700">
                        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Konfigurasi
                    </a> -->

                </nav>

                <!-- Sidebar Footer -->
                <div class="p-4 border-t border-gray-200">
                    <a href="<?php echo base_url(); ?>" target="_blank" class="flex items-center text-sm text-gray-600 hover:text-primary-700 transition">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        Lihat Website
                    </a>
                </div>

        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col ml-64">

            <!-- Top Navbar -->
            <header class="bg-white sticky top-0" style="height: 64px; box-shadow: 0 1px 3px 0 rgba(0,0,0,0.07), 0 1px 2px -1px rgba(0,0,0,0.07); z-index: 50;">
                <div class="flex items-center justify-between px-6" style="height: 64px;">

                    <!-- Left: Page Title -->
                    <div>
                        <h2 class="text-xl font-bold text-gray-900"><?php echo isset($page_title) ? $page_title : 'Dashboard'; ?></h2>
                    </div>

                    <!-- Right: Actions -->
                    <div class="flex items-center space-x-4">

                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-500 hover:text-primary-700 hover:bg-primary-50 rounded-full transition">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute top-1 right-1 h-2 w-2 bg-red-500 rounded-full"></span>
                        </button>

                        <!-- User Dropdown -->
                        <div class="relative">
                            <button onclick="document.getElementById('user-menu').classList.toggle('hidden')" class="flex items-center space-x-2 p-2 hover:bg-gray-100 rounded-lg transition">
                                <div class="h-8 w-8 rounded-full bg-gradient-to-br from-primary-500 to-primary-700 flex items-center justify-center text-white text-sm font-semibold">
                                    <?php echo strtoupper(substr($this->session->userdata('nama_lengkap'), 0, 1)); ?>
                                </div>
                                <span class="text-sm font-medium text-gray-700 hidden md:inline"><?php echo $this->session->userdata('nama_lengkap'); ?></span>
                                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-200 py-1" style="z-index: 9999;">
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700 transition">
                                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Profil Saya
                                </a>
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700 transition">
                                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Pengaturan
                                </a>
                                <div class="border-t border-gray-200 my-1"></div>
                                <a href="<?php echo base_url('logout'); ?>" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Logout
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                <?php echo isset($content) ? $content : ''; ?>
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between text-sm text-gray-500">
                    <p>&copy; <?php echo date('Y'); ?> YPAB Kabupaten Lumajang</p>
                    <p>Panel Admin v1.0</p>
                </div>
            </footer>

        </div>

    </div>

</body>

</html>