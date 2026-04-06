<!-- Program Page -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Program Kami</h1>
            <div class="w-20 h-1 bg-primary-600 mx-auto mt-4 rounded"></div>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Program-program yang kami jalankan untuk membantu masyarakat Kabupaten Lumajang.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($programs as $program): ?>
            <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-lg transition border border-gray-100 group">
                <div class="text-5xl mb-5 group-hover:scale-110 transition-transform duration-300"><?php echo $program['icon']; ?></div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3"><?php echo $program['nama']; ?></h3>
                <p class="text-gray-500 text-sm leading-relaxed"><?php echo $program['deskripsi']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Kegiatan Yayasan Summary -->
        <div class="mt-16 bg-gradient-to-br from-primary-50 to-accent-50 rounded-xl p-8 border border-primary-100">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Kegiatan Utama Yayasan</h2>
            <div class="grid md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                <div class="flex items-start">
                    <div class="flex-shrink-0 bg-primary-600 rounded-lg p-2 mt-1">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="font-bold text-gray-900 mb-1">Pendidikan Bermutu</h3>
                        <p class="text-gray-600 text-sm">Membantu Pemerintah Kab. Lumajang dalam penyelenggaraan program pendidikan yang bermutu dan bermartabat menuju Lumajang unggul.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 bg-warning-500 rounded-lg p-2 mt-1">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="font-bold text-gray-900 mb-1">Sosial Kemasyarakatan</h3>
                        <p class="text-gray-600 text-sm">Untuk AUS-KM, Mahasiswa kurang mampu, Yatim piatu, Fakir miskin, dan Anak terlantar.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="mt-16 bg-gradient-to-r from-primary-700 to-primary-900 rounded-xl p-8 text-center text-white">
            <h2 class="text-2xl font-bold mb-3">Ingin Mendukung Program Kami?</h2>
            <p class="text-primary-200 mb-6">Setiap dukungan Anda sangat berarti bagi masa depan anak-anak.</p>
            <a href="<?php echo base_url('kontak'); ?>" class="inline-block bg-white text-primary-700 px-6 py-3 rounded-lg font-semibold hover:bg-primary-50 transition shadow-lg">Hubungi Kami</a>
        </div>
    </div>
</section>
