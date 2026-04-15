<!-- Detail Kegiatan -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-500 mb-6">
            <a href="<?php echo base_url(); ?>" class="hover:text-primary-700">Beranda</a>
            <svg class="h-4 w-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="<?php echo base_url('kegiatan'); ?>" class="hover:text-primary-700">Kegiatan</a>
            <svg class="h-4 w-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-gray-900 font-medium truncate"><?php echo $kegiatan->judul; ?></span>
        </div>

        <!-- Article -->
        <article class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
            <?php if ($kegiatan->gambar): ?>
                <img src="<?php echo base_url('uploads/kegiatan/' . $kegiatan->gambar); ?>" alt="<?php echo $kegiatan->judul; ?>" class="w-full h-64 md:h-96 object-cover">
            <?php endif; ?>

            <div class="p-8">
                <!-- Info Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6 p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <div>
                            <p class="text-xs text-gray-500">Tanggal</p>
                            <p class="text-sm font-semibold text-gray-900"><?php echo date('d F Y', strtotime($kegiatan->tanggal)); ?></p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <div>
                            <p class="text-xs text-gray-500">Waktu</p>
                            <p class="text-sm font-semibold text-gray-900"><?php echo $kegiatan->waktu ?: '-'; ?></p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <div>
                            <p class="text-xs text-gray-500">Lokasi</p>
                            <p class="text-sm font-semibold text-gray-900"><?php echo $kegiatan->lokasi ?: '-'; ?></p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <div>
                            <p class="text-xs text-gray-500">Peserta</p>
                            <p class="text-sm font-semibold text-gray-900"><?php echo $kegiatan->peserta ?: '-'; ?></p>
                        </div>
                    </div>
                </div>

                <!-- Status Badge -->
                <?php if ($kegiatan->status): ?>
                    <?php
                        $status_class = ['mendatang' => 'bg-blue-100 text-blue-800', 'aktif' => 'bg-green-100 text-green-800', 'selesai' => 'bg-gray-100 text-gray-800', 'ditunda' => 'bg-yellow-100 text-yellow-800'];
                        $class = $status_class[$kegiatan->status] ?? 'bg-gray-100 text-gray-800';
                    ?>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium <?php echo $class; ?> mb-6"><?php echo ucfirst($kegiatan->status); ?></span>
                <?php endif; ?>

                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6"><?php echo $kegiatan->judul; ?></h1>

                <div class="prose max-w-none text-gray-600 leading-relaxed space-y-4">
                    <?php echo nl2br(htmlspecialchars($kegiatan->deskripsi)); ?>
                </div>
            </div>
        </article>

        <!-- Back Button -->
        <div class="mt-8">
            <a href="<?php echo base_url('kegiatan'); ?>" class="inline-flex items-center text-primary-700 font-semibold hover:text-primary-800 transition">
                <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Kegiatan
            </a>
        </div>
    </div>
</section>

<?php if (!empty($kegiatan_lain)): ?>
<section class="py-16 bg-white fade-in">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Kegiatan Mendatang Lainnya</h2>
        <div class="space-y-4 max-w-4xl mx-auto">
            <?php foreach ($kegiatan_lain as $k): if ($k->id == $kegiatan->id) continue; ?>
                <a href="<?php echo base_url('kegiatan/' . $k->id); ?>" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center hover:shadow-md transition">
                    <div class="flex-shrink-0 bg-primary-100 rounded-lg p-4 text-center min-w-[80px]">
                        <p class="text-2xl font-bold text-primary-700"><?php echo date('d', strtotime($k->tanggal)); ?></p>
                        <p class="text-xs text-primary-600"><?php echo date('M Y', strtotime($k->tanggal)); ?></p>
                    </div>
                    <div class="ml-5 flex-1">
                        <h3 class="text-lg font-semibold text-gray-900 hover:text-primary-700 transition"><?php echo $k->judul; ?></h3>
                        <?php if ($k->lokasi): ?><p class="text-sm text-gray-500 mt-1">📍 <?php echo $k->lokasi; ?></p><?php endif; ?>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
