<!-- Flash Message -->
<?php if ($this->session->flashdata('success')): ?>
    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<!-- Page Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
    <div>
        <h3 class="text-2xl font-bold text-gray-900">Manajemen Artikel</h3>
        <p class="text-sm text-gray-500 mt-1">Kelola semua artikel dan tulisan</p>
    </div>
    <a href="<?php echo base_url('admin/artikel/tambah'); ?>" class="mt-4 sm:mt-0 inline-flex items-center px-4 py-2 bg-gradient-to-r from-accent-600 to-accent-700 text-white rounded-lg font-semibold hover:from-accent-700 hover:to-accent-800 transition shadow-sm">
        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Tambah Artikel
    </a>
</div>

<!-- Filters & Search -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex-1">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input type="text" id="search-input" value="<?php echo htmlspecialchars($keyword ?? ''); ?>" placeholder="Cari artikel..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-accent-500 outline-none">
            </div>
        </div>
    </div>
</div>

<script>
let searchTimeout;
document.getElementById('search-input').addEventListener('input', function() {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        const keyword = this.value;
        window.location.href = '<?php echo base_url('admin/artikel?keyword='); ?>' + keyword;
    }, 500);
});
</script>

<!-- Table -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <?php if (!empty($artikel)): ?>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Gambar</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Judul Artikel</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Penulis</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $no = 1;
                    foreach ($artikel as $row): ?>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $no++; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php if (!empty($row->gambar)): ?>
                                    <a href="<?php echo base_url('uploads/artikel/' . $row->gambar); ?>" target="_blank">
                                        <img src="<?php echo base_url('uploads/artikel/' . $row->gambar); ?>" alt="Gambar" class="h-12 w-16 object-cover rounded border border-gray-200">
                                    </a>
                                <?php else: ?>
                                    <div class="h-12 w-16 bg-gray-100 rounded border border-gray-200 flex items-center justify-center">
                                        <span class="text-xs text-gray-400">No Image</span>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <p class="text-sm font-semibold text-gray-900"><?php echo $row->judul; ?></p>
                                        <p class="text-xs text-gray-500 mt-0.5"><?php echo $row->kategori; ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <p class="text-sm text-gray-900"><?php echo $row->penulis; ?></p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <p class="text-sm text-gray-900"><?php echo date('d F Y', strtotime($row->created_at)); ?></p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php if ($row->status == 'publish'): ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Publikasi</span>
                                <?php elseif ($row->status == 'draft'): ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Draft</span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Arsip</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="<?php echo base_url('admin/artikel/edit/' . $row->id); ?>" class="text-accent-600 hover:text-accent-700 p-1 hover:bg-accent-50 rounded transition" title="Edit">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <button onclick="confirmDelete(<?php echo $row->id; ?>, '<?php echo addslashes($row->judul); ?>')" class="text-red-600 hover:text-red-700 p-1 hover:bg-red-50 rounded transition" title="Hapus">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <p class="mt-2 text-sm text-gray-500">Belum ada artikel</p>
            <a href="<?php echo base_url('admin/artikel/tambah'); ?>" class="mt-4 inline-flex items-center px-4 py-2 bg-accent-600 text-white rounded-lg text-sm font-medium hover:bg-accent-700 transition">
                Tambah Artikel Pertama
            </a>
        </div>
    <?php endif; ?>

    <?php if (!empty($pagination) || count($artikel ?? []) > 0): ?>
        <div class="bg-gray-50 px-6 py-4 flex items-center justify-between border-t border-gray-200">
            <div class="text-sm text-gray-500">
                Menampilkan <span class="font-medium"><?php echo count($artikel ?? []); ?></span> dari <span class="font-medium"><?php echo $this->artikel_model->count_search($keyword ?? null); ?></span> artikel
            </div>
            <div>
                <?php echo $pagination; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Confirm Delete Script -->
<script>
    function confirmDelete(id, judul) {
        if (confirm('Yakin ingin menghapus artikel "' + judul + '"?')) {
            window.location.href = '<?php echo base_url("admin/artikel/hapus/"); ?>' + id;
        }
    }
</script>
