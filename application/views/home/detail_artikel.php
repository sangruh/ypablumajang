<!-- Detail Artikel -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-500 mb-6">
            <a href="<?php echo base_url(); ?>" class="hover:text-primary-700">Beranda</a>
            <svg class="h-4 w-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="<?php echo base_url('artikel'); ?>" class="hover:text-primary-700">Artikel</a>
            <svg class="h-4 w-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-gray-900 font-medium truncate"><?php echo $artikel->judul; ?></span>
        </div>

        <!-- Article -->
        <article class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
            <?php if ($artikel->gambar): ?>
                <img src="<?php echo base_url('uploads/artikel/' . $artikel->gambar); ?>" alt="<?php echo $artikel->judul; ?>" class="w-full h-64 md:h-96 object-cover">
            <?php endif; ?>

            <div class="p-8">
                <div class="flex items-center text-sm text-gray-400 mb-4 space-x-4">
                    <span class="flex items-center">
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <?php echo $artikel->penulis; ?>
                    </span>
                    <span class="flex items-center">
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <?php echo date('d F Y', strtotime($artikel->created_at)); ?>
                    </span>
                    <?php if ($artikel->kategori): ?>
                    <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-accent-100 text-accent-700"><?php echo ucfirst($artikel->kategori); ?></span>
                    <?php endif; ?>
                </div>

                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6"><?php echo $artikel->judul; ?></h1>

                <div class="prose max-w-none text-gray-600 leading-relaxed space-y-4">
                    <?php echo nl2br(htmlspecialchars($artikel->konten)); ?>
                </div>
            </div>
        </article>

        <!-- Back Button -->
        <div class="mt-8">
            <a href="<?php echo base_url('artikel'); ?>" class="inline-flex items-center text-primary-700 font-semibold hover:text-primary-800 transition">
                <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Artikel
            </a>
        </div>
    </div>
</section>

<?php if (!empty($artikel_lain)): ?>
<section class="py-16 bg-white fade-in">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Artikel Terkait</h2>
        <div class="space-y-6">
            <?php foreach ($artikel_lain as $a): if ($a->id == $artikel->id) continue; ?>
                <a href="<?php echo base_url('artikel/' . $a->id); ?>" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition block">
                    <div class="flex items-center text-sm text-gray-400 mb-2 space-x-4">
                        <span><?php echo $a->penulis; ?></span>
                        <span><?php echo date('d F Y', strtotime($a->created_at)); ?></span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900"><?php echo $a->judul; ?></h3>
                    <p class="text-gray-500 text-sm mt-1"><?php echo substr($a->konten, 0, 120); ?>...</p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
