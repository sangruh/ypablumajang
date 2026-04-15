<!-- Kegiatan Page -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Kegiatan</h1>
            <div class="w-20 h-1 bg-primary-600 mx-auto mt-4 rounded"></div>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Informasi kegiatan dan acara Yayasan Peduli Anak Bangsa Kabupaten Lumajang.</p>
        </div>

        <div class="space-y-6 max-w-4xl mx-auto">
            <?php if (!empty($kegiatan)): ?>
                <?php foreach ($kegiatan as $k): ?>
                    <a href="<?php echo base_url('kegiatan/' . $k->id); ?>" class="block bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                        <div class="p-6 flex items-center">
                            <div class="flex-shrink-0 bg-primary-100 rounded-lg p-4 text-center min-w-[80px]">
                                <p class="text-2xl font-bold text-primary-700"><?php echo date('d', strtotime($k->tanggal)); ?></p>
                                <p class="text-xs text-primary-600"><?php echo date('M Y', strtotime($k->tanggal)); ?></p>
                            </div>
                            <div class="ml-5 flex-1">
                                <h3 class="text-lg font-semibold text-gray-900 hover:text-primary-700 transition"><?php echo $k->judul; ?></h3>
                                <?php if ($k->lokasi): ?><p class="text-sm text-gray-500 mt-1">📍 <?php echo $k->lokasi; ?></p><?php endif; ?>
                                <?php if ($k->waktu): ?><p class="text-sm text-gray-500">🕐 <?php echo $k->waktu; ?></p><?php endif; ?>
                                <p class="text-gray-500 text-sm mt-2 line-clamp-2"><?php echo substr($k->deskripsi, 0, 150); ?>...</p>
                            </div>
                            <?php if ($k->status): ?>
                                <div class="flex-shrink-0 ml-4">
                                    <?php
                                        $status_class = ['mendatang' => 'bg-blue-100 text-blue-800', 'aktif' => 'bg-green-100 text-green-800', 'selesai' => 'bg-gray-100 text-gray-800', 'ditunda' => 'bg-yellow-100 text-yellow-800'];
                                        $class = $status_class[$k->status] ?? 'bg-gray-100 text-gray-800';
                                    ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo $class; ?>"><?php echo ucfirst($k->status); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center py-16 bg-white rounded-xl border border-gray-100">
                    <svg class="h-20 w-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <p class="text-gray-500 text-lg">Belum ada kegiatan untuk ditampilkan.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>.line-clamp-2{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;}</style>
