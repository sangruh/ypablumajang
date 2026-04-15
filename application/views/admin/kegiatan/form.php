<?php
$edit = isset($kegiatan) && !empty($kegiatan);
$action = $edit ? base_url('admin/kegiatan/update/' . $kegiatan->id) : base_url('admin/kegiatan/simpan');
?>

<!-- Flash Messages -->
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
<div class="flex items-center justify-between mb-6">
    <div>
        <div class="flex items-center space-x-2 text-sm text-gray-500 mb-2">
            <a href="<?php echo base_url('admin'); ?>" class="hover:text-primary-700">Dashboard</a>
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="<?php echo base_url('admin/kegiatan'); ?>" class="hover:text-primary-700">Kegiatan</a>
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-900 font-medium"><?php echo $edit ? 'Edit Kegiatan' : 'Tambah Kegiatan'; ?></span>
        </div>
        <h3 class="text-2xl font-bold text-gray-900"><?php echo $edit ? 'Edit Kegiatan' : 'Tambah Kegiatan Baru'; ?></h3>
        <p class="text-sm text-gray-500 mt-1"><?php echo $edit ? 'Perbarui informasi kegiatan' : 'Isi informasi kegiatan dengan lengkap'; ?></p>
    </div>
    <a href="<?php echo base_url('admin/kegiatan'); ?>" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition">
        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali
    </a>
</div>

<!-- Form Card -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="px-6 py-4 border-b border-gray-200">
        <h4 class="text-lg font-semibold text-gray-900">Informasi Kegiatan</h4>
        <p class="text-sm text-gray-500 mt-1">Semua field bertanda (*) wajib diisi</p>
    </div>

    <form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
        <div class="p-6 space-y-6">

            <!-- Judul Kegiatan -->
            <div>
                <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">
                    Judul Kegiatan <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    id="judul"
                    name="judul"
                    required
                    value="<?php echo $edit ? htmlspecialchars($kegiatan->judul) : ''; ?>"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition"
                    placeholder="Masukkan judul kegiatan"
                >
            </div>

            <!-- Tanggal & Waktu -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="tanggal" class="block text-sm font-semibold text-gray-700 mb-2">
                        Tanggal Kegiatan <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="date"
                        id="tanggal"
                        name="tanggal"
                        required
                        value="<?php echo $edit ? $kegiatan->tanggal : ''; ?>"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition"
                    >
                </div>
                <div>
                    <label for="waktu" class="block text-sm font-semibold text-gray-700 mb-2">
                        Waktu <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="time"
                        id="waktu"
                        name="waktu"
                        required
                        value="<?php echo $edit ? $kegiatan->waktu : ''; ?>"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition"
                    >
                </div>
            </div>

            <!-- Lokasi -->
            <div>
                <label for="lokasi" class="block text-sm font-semibold text-gray-700 mb-2">
                    Lokasi Kegiatan <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    id="lokasi"
                    name="lokasi"
                    required
                    value="<?php echo $edit ? htmlspecialchars($kegiatan->lokasi) : ''; ?>"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition"
                    placeholder="Masukkan lokasi kegiatan"
                >
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">
                    Deskripsi Kegiatan <span class="text-red-500">*</span>
                </label>
                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    rows="6"
                    required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition resize-none"
                    placeholder="Tuliskan deskripsi lengkap kegiatan..."
                ><?php echo $edit ? htmlspecialchars($kegiatan->deskripsi) : ''; ?></textarea>
                <p class="mt-1 text-xs text-gray-500">Minimal 50 karakter</p>
            </div>

            <!-- Upload Gambar -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Gambar Cover
                </label>

                <?php if ($edit && !empty($kegiatan->gambar)): ?>
                    <div class="mb-3">
                        <img src="<?php echo base_url('uploads/kegiatan/' . $kegiatan->gambar); ?>" alt="Gambar saat ini" class="max-w-xs rounded-lg border border-gray-200">
                        <p class="text-xs text-gray-500 mt-1">Gambar saat ini: <?php echo $kegiatan->gambar; ?></p>
                    </div>
                <?php endif; ?>

                <div id="upload-area" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-primary-500 transition cursor-pointer" onclick="document.getElementById('gambar-input').click();">
                    <svg id="upload-icon" class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p id="upload-text" class="mt-2 text-sm text-gray-600">
                        <span class="font-medium text-primary-600 hover:text-primary-700">Klik untuk upload</span> atau drag & drop
                    </p>
                    <p class="mt-1 text-xs text-gray-500">PNG, JPG, JPEG (Maks. 2MB)</p>
                    <p id="file-name" class="mt-2 text-sm font-medium text-primary-700 hidden"></p>
                    <input type="file" id="gambar-input" name="gambar" class="hidden" accept="image/*" onchange="showFileName(this);">
                </div>
            </div>

            <!-- Peserta -->
            <div>
                <label for="peserta" class="block text-sm font-semibold text-gray-700 mb-2">
                    Target Peserta
                </label>
                <input
                    type="text"
                    id="peserta"
                    name="peserta"
                    value="<?php echo $edit ? htmlspecialchars($kegiatan->peserta) : ''; ?>"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition"
                    placeholder="Contoh: Seluruh Pengurus YPAB"
                >
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                    Status Kegiatan <span class="text-red-500">*</span>
                </label>
                <select
                    id="status"
                    name="status"
                    required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition"
                >
                    <option value="">Pilih Status</option>
                    <option value="mendatang" <?php echo ($edit && $kegiatan->status == 'mendatang') ? 'selected' : ''; ?>>Mendatang</option>
                    <option value="aktif" <?php echo ($edit && $kegiatan->status == 'aktif') ? 'selected' : ''; ?>>Aktif</option>
                    <option value="selesai" <?php echo ($edit && $kegiatan->status == 'selesai') ? 'selected' : ''; ?>>Selesai</option>
                    <option value="ditunda" <?php echo ($edit && $kegiatan->status == 'ditunda') ? 'selected' : ''; ?>>Ditunda</option>
                </select>
            </div>

        </div>

        <!-- Form Footer -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-end space-x-3">
            <a href="<?php echo base_url('admin/kegiatan'); ?>" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-100 transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-primary-600 to-primary-700 text-white rounded-lg font-semibold hover:from-primary-700 hover:to-primary-800 transition shadow-sm">
                <svg class="h-5 w-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <?php echo $edit ? 'Perbarui Kegiatan' : 'Simpan Kegiatan'; ?>
            </button>
        </div>

    </form>
</div>

<!-- Script Upload -->
<script>
function showFileName(input) {
    const fileName = input.files[0]?.name;
    const fileNameEl = document.getElementById('file-name');
    const uploadText = document.getElementById('upload-text');
    const uploadIcon = document.getElementById('upload-icon');

    if (fileName) {
        fileNameEl.textContent = 'File terpilih: ' + fileName;
        fileNameEl.classList.remove('hidden');
        uploadText.innerHTML = '<span class="font-medium text-primary-600">File siap diupload</span>';
        uploadIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>';
        uploadIcon.classList.add('text-green-500');
        uploadIcon.classList.remove('text-gray-400');
    }
}
</script>
