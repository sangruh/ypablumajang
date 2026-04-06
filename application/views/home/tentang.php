<!-- Tentang Page -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Tentang YPAB</h1>
            <div class="w-20 h-1 bg-primary-600 mx-auto mt-4 rounded"></div>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Mengenal lebih dekat Yayasan Peduli Anak Bangsa Kabupaten Lumajang</p>
        </div>

        <!-- Logo -->
        <div class="flex justify-center mb-10">
            <img src="<?php echo base_url('assets/img/logo-ypab.png'); ?>" alt="Logo YPAB" class="h-32 w-32 md:h-40 md:w-40">
        </div>

        <!-- Sejarah -->
        <div class="bg-white rounded-xl shadow-sm p-8 mb-8 border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                <svg class="h-6 w-6 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                Sejarah
            </h2>
            <p class="text-gray-600 leading-relaxed">
                Yayasan Peduli Anak Bangsa (YPAB) Kabupaten Lumajang merupakan perubahan dari 
                <strong>Yayasan Gerakan Nurani Orang Tua Asuh (Y-GNOTA)</strong> Kabupaten Lumajang. 
                Transformasi ini dilakukan untuk memperluas cakupan dan meningkatkan kualitas layanan 
                sosial bagi anak-anak yang membutuhkan di wilayah Kabupaten Lumajang.
            </p>
        </div>

        <!-- Dasar Hukum -->
        <div class="bg-white rounded-xl shadow-sm p-8 mb-8 border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                <svg class="h-6 w-6 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Dasar Hukum
            </h2>
            <div class="space-y-4">
                <div class="bg-primary-50 rounded-lg p-5 border border-primary-100">
                    <p class="text-sm text-primary-600 font-semibold mb-1">Akta Notaris</p>
                    <p class="text-gray-800"><?php echo $sk_info['akta_notaris']; ?></p>
                </div>
                <div class="bg-primary-50 rounded-lg p-5 border border-primary-100">
                    <p class="text-sm text-primary-600 font-semibold mb-1">SK. MENKUMHAM RI</p>
                    <p class="text-gray-800">Nomor: <?php echo $sk_info['sk_menkumham']; ?></p>
                </div>
            </div>
        </div>

        <!-- Visi Misi -->
        <div class="grid md:grid-cols-2 gap-8 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                    <svg class="h-6 w-6 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    Visi
                </h2>
                <p class="text-gray-600 leading-relaxed italic">
                    Mewujudkan masyarakat yang peduli terhadap anak-anak yang membutuhkan, 
                    terutama di Kabupaten Lumajang, sehingga setiap anak berhak mendapat 
                    kehidupan yang layak.
                </p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                    <svg class="h-6 w-6 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                    Misi
                </h2>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-start"><svg class="h-5 w-5 text-primary-600 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>Menyelenggarakan program sosial untuk anak-anak yang membutuhkan</li>
                    <li class="flex items-start"><svg class="h-5 w-5 text-primary-600 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>Menjembatani donatur dengan penerima manfaat secara transparan</li>
                    <li class="flex items-start"><svg class="h-5 w-5 text-primary-600 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>Meningkatkan kualitas pendidikan dan kehidupan anak asuh</li>
                    <li class="flex items-start"><svg class="h-5 w-5 text-primary-600 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>Memberdayakan masyarakat untuk kemandirian sosial dan ekonomi</li>
                </ul>
            </div>
        </div>

        <!-- Kegiatan Yayasan -->
        <div class="bg-white rounded-xl shadow-sm p-8 mb-8 border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                <svg class="h-6 w-6 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                Kegiatan Yayasan
            </h2>
            <p class="text-gray-600 mb-6">Untuk mencapai maksud dan tujuan tersebut, Yayasan menjalankan kegiatan sebagai berikut:</p>

            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div class="bg-gradient-to-br from-primary-50 to-accent-50 rounded-lg p-6 border border-primary-100">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 bg-primary-600 rounded-lg p-2">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-bold text-gray-900 mb-2">Pendidikan Bermutu & Bermartabat</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Membantu Pemerintah Kabupaten Lumajang dalam rangka penyelenggaraan program pendidikan yang bermutu dan bermartabat menuju <strong>Lumajang unggul</strong>.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-warning-50 to-primary-50 rounded-lg p-6 border border-warning-100">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 bg-warning-500 rounded-lg p-2">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-bold text-gray-900 mb-2">Kegiatan Sosial Kemasyarakatan</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Menyelenggarakan kegiatan sosial kemasyarakatan untuk membantu masyarakat yang membutuhkan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Penerima Manfaat -->
            <h3 class="text-lg font-bold text-gray-900 mb-4">Penerima Manfaat:</h3>
            <div class="grid sm:grid-cols-2 gap-4">
                <div class="flex items-center p-4 bg-gray-50 rounded-lg border border-gray-100">
                    <div class="flex-shrink-0 bg-accent-100 rounded-full p-2">
                        <svg class="h-5 w-5 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold text-gray-900 text-sm">AUS-KM</p>
                        <p class="text-xs text-gray-500">Anak Usia Sekolah Kurang Mampu</p>
                    </div>
                </div>
                <div class="flex items-center p-4 bg-gray-50 rounded-lg border border-gray-100">
                    <div class="flex-shrink-0 bg-primary-100 rounded-full p-2">
                        <svg class="h-5 w-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold text-gray-900 text-sm">Mahasiswa Kurang Mampu</p>
                        <p class="text-xs text-gray-500">Beasiswa & bantuan biaya pendidikan</p>
                    </div>
                </div>
                <div class="flex items-center p-4 bg-gray-50 rounded-lg border border-gray-100">
                    <div class="flex-shrink-0 bg-warning-100 rounded-full p-2">
                        <svg class="h-5 w-5 text-warning-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold text-gray-900 text-sm">Yatim Piatu</p>
                        <p class="text-xs text-gray-500">Santunan & pendampingan</p>
                    </div>
                </div>
                <div class="flex items-center p-4 bg-gray-50 rounded-lg border border-gray-100">
                    <div class="flex-shrink-0 bg-accent-100 rounded-full p-2">
                        <svg class="h-5 w-5 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold text-gray-900 text-sm">Fakir Miskin</p>
                        <p class="text-xs text-gray-500">Bantuan sosial & pemberdayaan</p>
                    </div>
                </div>
                <div class="flex items-center p-4 bg-gray-50 rounded-lg border border-gray-100 sm:col-span-2 sm:max-w-md sm:mx-auto">
                    <div class="flex-shrink-0 bg-primary-100 rounded-full p-2">
                        <svg class="h-5 w-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold text-gray-900 text-sm">Anak Terlantar</p>
                        <p class="text-xs text-gray-500">Perlindungan & rehabilitasi</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alamat -->
        <div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                <svg class="h-6 w-6 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Alamat Sekretariat
            </h2>
            <p class="text-gray-600"><?php echo $sk_info['alamat']; ?></p>
        </div>
    </div>
</section>
