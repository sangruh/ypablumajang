<!-- Detail Berita -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-500 mb-6">
            <a href="<?php echo base_url(); ?>" class="hover:text-primary-700">Beranda</a>
            <svg class="h-4 w-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="<?php echo base_url('berita'); ?>" class="hover:text-primary-700">Berita</a>
            <svg class="h-4 w-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-gray-900 font-medium truncate"><?php echo $berita->judul; ?></span>
        </div>

        <!-- Article -->
        <article class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
            <?php if ($berita->gambar): ?>
                <img src="<?php echo base_url('uploads/berita/' . $berita->gambar); ?>" alt="<?php echo $berita->judul; ?>" class="w-full h-64 md:h-96 object-cover">
            <?php endif; ?>

            <div class="p-8">
                <div class="flex items-center text-sm text-gray-400 mb-4 space-x-4">
                    <span class="flex items-center">
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <?php echo date('d F Y', strtotime($berita->tanggal)); ?>
                    </span>
                    <?php if ($berita->kategori): ?>
                    <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-primary-100 text-primary-700"><?php echo ucfirst($berita->kategori); ?></span>
                    <?php endif; ?>
                    <span class="flex items-center">
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        <?php echo $berita->dilihat; ?> kali
                    </span>
                </div>

                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6"><?php echo $berita->judul; ?></h1>

                <div class="prose max-w-none text-gray-600 leading-relaxed space-y-4">
                    <?php echo nl2br(htmlspecialchars($berita->konten)); ?>
                </div>
            </div>
        </article>

        <!-- Back Button -->
        <div class="mt-8">
            <a href="<?php echo base_url('berita'); ?>" class="inline-flex items-center text-primary-700 font-semibold hover:text-primary-800 transition">
                <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Berita
            </a>
        </div>
    </div>
</section>

<?php if (!empty($berita_lain)): ?>
<section class="py-16 bg-white fade-in">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Berita Terkait</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ($berita_lain as $b): if ($b->id == $berita->id) continue; ?>
                <a href="<?php echo base_url('berita/' . $b->id); ?>" class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition">
                    <?php if ($b->gambar): ?>
                        <img src="<?php echo base_url('uploads/berita/' . $b->gambar); ?>" alt="<?php echo $b->judul; ?>" class="w-full h-40 object-cover">
                    <?php endif; ?>
                    <div class="p-5">
                        <p class="text-xs text-gray-400 mb-1"><?php echo date('d F Y', strtotime($b->tanggal)); ?></p>
                        <h3 class="text-base font-semibold text-gray-900 line-clamp-2"><?php echo $b->judul; ?></h3>
                        <p class="text-gray-500 text-sm mt-2 line-clamp-2"><?php echo substr($b->konten, 0, 80); ?>...</p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<style>.line-clamp-2{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;}</style>
