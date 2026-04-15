<!-- Berita Page -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Berita & Kegiatan</h1>
            <div class="w-20 h-1 bg-primary-600 mx-auto mt-4 rounded"></div>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Informasi terkini tentang kegiatan dan program YPAB Kabupaten Lumajang.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($berita as $b): ?>
            <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition border border-gray-100">
                <?php if ($b->gambar): ?>
                <img src="<?php echo base_url('uploads/berita/' . $b->gambar); ?>" alt="<?php echo $b->judul; ?>" class="w-full h-48 object-cover">
                <?php else: ?>
                <div class="w-full h-48 bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center">
                    <svg class="h-16 w-16 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
                <?php endif; ?>
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-400 mb-3">
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <?php echo date('d F Y', strtotime($b->tanggal)); ?>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                        <a href="<?php echo base_url('berita/' . $b->id); ?>" class="hover:text-primary-700 transition"><?php echo $b->judul; ?></a>
                    </h3>
                    <p class="text-gray-500 text-sm line-clamp-3"><?php echo substr($b->konten, 0, 120); ?>...</p>
                    <a href="<?php echo base_url('berita/' . $b->id); ?>" class="inline-flex items-center mt-3 text-primary-700 text-sm font-semibold hover:text-primary-800 transition">
                        Baca selengkapnya
                        <svg class="h-4 w-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <?php if (empty($berita)): ?>
        <div class="text-center py-16">
            <svg class="h-20 w-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            <p class="text-gray-500 text-lg">Belum ada berita untuk ditampilkan.</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<style>
.line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
.line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
</style>
