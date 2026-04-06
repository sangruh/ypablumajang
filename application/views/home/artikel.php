<!-- Artikel Page -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Artikel</h1>
            <div class="w-20 h-1 bg-primary-600 mx-auto mt-4 rounded"></div>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Tulisan dan pemikiran seputar dunia sosial, pendidikan, dan pemberdayaan anak.</p>
        </div>

        <div class="space-y-6 max-w-4xl mx-auto">
            <?php foreach ($artikel as $item): ?>
            <article class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition border border-gray-100">
                <div class="flex items-center text-sm text-gray-400 mb-3 space-x-4">
                    <span class="flex items-center">
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <?php echo $item['penulis']; ?>
                    </span>
                    <span class="flex items-center">
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <?php echo date('d F Y', strtotime($item['tanggal'])); ?>
                    </span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2"><?php echo $item['judul']; ?></h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4"><?php echo $item['ringkasan']; ?></p>
                <a href="#" class="inline-flex items-center text-primary-700 text-sm font-semibold hover:text-primary-800 transition">
                    Baca selengkapnya
                    <svg class="h-4 w-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </article>
            <?php endforeach; ?>
        </div>

        <?php if (empty($artikel)): ?>
        <div class="text-center py-16">
            <svg class="h-20 w-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            <p class="text-gray-500 text-lg">Belum ada artikel untuk ditampilkan.</p>
        </div>
        <?php endif; ?>
    </div>
</section>
