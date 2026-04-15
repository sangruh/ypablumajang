<!-- Welcome Message -->
<div class="mb-6 rounded-xl p-6 text-white shadow-lg relative overflow-hidden" style="background: linear-gradient(135deg, #047857 0%, #065f46 100%);">
    <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=%2732%27 height=%2732%27 viewBox=%270 0 32 32%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cpath d=%27M16 0L32 16L16 32L0 16L16 0z%27 fill=%27none%27 stroke=%27%23ffffff%27 stroke-width=%270.5%27 opacity=%270.3%27/%3E%3C/svg%3E'); background-size: 32px 32px;"></div>
    <div class="relative z-10">
        <h3 class="text-2xl font-bold mb-2">Selamat Datang, <?php echo $this->session->userdata('nama_lengkap'); ?>! 👋</h3>
        <p class="text-primary-100">Kelola konten website YPAB Kabupaten Lumajang dengan mudah dan efisien.</p>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <!-- Total Berita -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Berita</p>
                <p class="text-3xl font-bold text-gray-900"><?php echo $total_berita; ?></p>
            </div>
            <div class="h-14 w-14 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center">
                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Total Artikel -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Artikel</p>
                <p class="text-3xl font-bold text-gray-900"><?php echo $total_artikel; ?></p>
            </div>
            <div class="h-14 w-14 bg-gradient-to-br from-accent-500 to-accent-600 rounded-xl flex items-center justify-center">
                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Total Kegiatan -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Kegiatan</p>
                <p class="text-3xl font-bold text-gray-900"><?php echo $total_kegiatan; ?></p>
            </div>
            <div class="h-14 w-14 bg-gradient-to-br from-warning-500 to-warning-600 rounded-xl flex items-center justify-center">
                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Total Publikasi -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Publikasi</p>
                <p class="text-3xl font-bold text-gray-900"><?php echo $total_publikasi; ?></p>
            </div>
            <div class="h-14 w-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
    </div>

</div>

<!-- Main Grid -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    <!-- Recent Activities -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Aktivitas Terbaru</h3>
        </div>
        <div class="divide-y divide-gray-100">
            <?php if (!empty($recent_activities)): ?>
                <?php foreach ($recent_activities as $act): ?>
                    <div class="px-6 py-4 hover:bg-gray-50 transition">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="h-9 w-9 rounded-full bg-<?php echo $act['icon']; ?>-100 flex items-center justify-center">
                                    <?php if ($act['type'] == 'berita'): ?>
                                        <svg class="h-5 w-5 text-<?php echo $act['icon']; ?>-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                        </svg>
                                    <?php elseif ($act['type'] == 'artikel'): ?>
                                        <svg class="h-5 w-5 text-<?php echo $act['icon']; ?>-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    <?php else: ?>
                                        <svg class="h-5 w-5 text-<?php echo $act['icon']; ?>-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <p class="text-sm font-medium text-gray-900"><?php echo ucfirst($act['type']); ?> ditambahkan</p>
                                <p class="text-xs text-gray-500 mt-1"><?php echo $act['title']; ?></p>
                                <p class="text-xs text-gray-400 mt-1"><?php echo time_ago($act['date']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="px-6 py-8 text-center">
                    <p class="text-sm text-gray-500">Belum ada aktivitas</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Aksi Cepat</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-2 gap-4">

                <a href="<?php echo base_url('admin/berita/tambah'); ?>" class="group block p-4 bg-gradient-to-br from-primary-50 to-primary-100 rounded-xl border border-primary-200 hover:shadow-md transition">
                    <div class="flex flex-col items-center text-center">
                        <div class="h-12 w-12 bg-primary-600 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-900">Tambah Berita</span>
                    </div>
                </a>

                <a href="<?php echo base_url('admin/artikel/tambah'); ?>" class="group block p-4 bg-gradient-to-br from-accent-50 to-accent-100 rounded-xl border border-accent-200 hover:shadow-md transition">
                    <div class="flex flex-col items-center text-center">
                        <div class="h-12 w-12 bg-accent-600 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-900">Tambah Artikel</span>
                    </div>
                </a>

                <a href="<?php echo base_url('admin/kegiatan/tambah'); ?>" class="group block p-4 bg-gradient-to-br from-warning-50 to-warning-100 rounded-xl border border-warning-200 hover:shadow-md transition">
                    <div class="flex flex-col items-center text-center">
                        <div class="h-12 w-12 bg-warning-600 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-900">Tambah Kegiatan</span>
                    </div>
                </a>

                <a href="<?php echo base_url('admin/publikasi/tambah'); ?>" class="group block p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl border border-purple-200 hover:shadow-md transition">
                    <div class="flex flex-col items-center text-center">
                        <div class="h-12 w-12 bg-purple-600 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-900">Tambah Publikasi</span>
                    </div>
                </a>

            </div>

            <div class="mt-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <span class="text-sm font-medium text-gray-700">Lihat Website Publik</span>
                    </div>
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </div>
            </div>

        </div>
    </div>

</div>

<!-- Upcoming Events -->
<div class="mt-6 bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900">Kegiatan Mendatang</h3>
    </div>
    <div class="divide-y divide-gray-100">
        <?php if (!empty($upcoming_events)): ?>
            <?php foreach ($upcoming_events as $event): ?>
                <div class="px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-primary-100 rounded-lg p-3">
                            <svg class="h-6 w-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-semibold text-gray-900"><?php echo $event->nama ?? $event->judul; ?></p>
                            <p class="text-xs text-gray-500 mt-1"><?php echo $event->lokasi ?? 'YPAB Lumajang'; ?></p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-semibold text-primary-700"><?php echo date('d M Y', strtotime($event->tanggal)); ?></p>
                        <p class="text-xs text-gray-500"><?php echo $event->waktu ?? '09:00 WIB'; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="px-6 py-8 text-center">
                <p class="text-sm text-gray-500">Tidak ada kegiatan mendatang</p>
            </div>
        <?php endif; ?>
    </div>
</div>
