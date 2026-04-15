<?php
$edit = isset($artikel) && !empty($artikel);
$action = $edit ? base_url('admin/artikel/update/' . $artikel->id) : base_url('admin/artikel/simpan');
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

<?php if ($this->session->flashdata('warning')): ?>
    <div class="mb-6 bg-yellow-50 border border-yellow-200 text-yellow-700 px-4 py-3 rounded-lg">
        <?php echo $this->session->flashdata('warning'); ?>
    </div>
<?php endif; ?>

<!-- Page Header -->
<div class="flex items-center justify-between mb-6">
    <div>
        <div class="flex items-center space-x-2 text-sm text-gray-500 mb-2">
            <a href="<?php echo base_url('admin'); ?>" class="hover:text-accent-700">Dashboard</a>
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="<?php echo base_url('admin/artikel'); ?>" class="hover:text-accent-700">Artikel</a>
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-900 font-medium"><?php echo $edit ? 'Edit Artikel' : 'Tambah Artikel'; ?></span>
        </div>
        <h3 class="text-2xl font-bold text-gray-900"><?php echo $edit ? 'Edit Artikel' : 'Tambah Artikel Baru'; ?></h3>
        <p class="text-sm text-gray-500 mt-1"><?php echo $edit ? 'Perbarui informasi artikel' : 'Tulis artikel dengan informatif'; ?></p>
    </div>
    <a href="<?php echo base_url('admin/artikel'); ?>" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition">
        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali
    </a>
</div>

<!-- Form Card -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="px-6 py-4 border-b border-gray-200">
        <h4 class="text-lg font-semibold text-gray-900">Informasi Artikel</h4>
        <p class="text-sm text-gray-500 mt-1">Semua field bertanda (*) wajib diisi</p>
    </div>

    <form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
        <div class="p-6 space-y-6">

            <!-- Judul Artikel -->
            <div>
                <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">
                    Judul Artikel <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    id="judul"
                    name="judul"
                    required
                    value="<?php echo $edit ? htmlspecialchars($artikel->judul) : ''; ?>"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-accent-500 outline-none transition"
                    placeholder="Masukkan judul artikel"
                >
            </div>

            <!-- Kategori & Penulis -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="kategori" class="block text-sm font-semibold text-gray-700 mb-2">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <select
                        id="kategori"
                        name="kategori"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-accent-500 outline-none transition"
                    >
                        <option value="">Pilih Kategori</option>
                        <option value="edukasi" <?php echo ($edit && $artikel->kategori == 'edukasi') ? 'selected' : ''; ?>>Edukasi</option>
                        <option value="sosial" <?php echo ($edit && $artikel->kategori == 'sosial') ? 'selected' : ''; ?>>Sosial</option>
                        <option value="kegiatan" <?php echo ($edit && $artikel->kategori == 'kegiatan') ? 'selected' : ''; ?>>Kegiatan</option>
                        <option value="parenting" <?php echo ($edit && $artikel->kategori == 'parenting') ? 'selected' : ''; ?>>Parenting</option>
                    </select>
                </div>
                <div>
                    <label for="penulis" class="block text-sm font-semibold text-gray-700 mb-2">
                        Penulis <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="penulis"
                        name="penulis"
                        required
                        value="<?php echo $edit ? htmlspecialchars($artikel->penulis) : ''; ?>"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-accent-500 outline-none transition"
                        placeholder="Nama penulis"
                    >
                </div>
            </div>

            <!-- Konten Artikel -->
            <div>
                <label for="konten" class="block text-sm font-semibold text-gray-700 mb-2">
                    Konten Artikel <span class="text-red-500">*</span>
                </label>
                <textarea
                    id="konten"
                    name="konten"
                    rows="12"
                    required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-accent-500 outline-none transition resize-none"
                    placeholder="Tuliskan konten artikel lengkap..."
                ><?php echo $edit ? htmlspecialchars($artikel->konten) : ''; ?></textarea>
                <p class="mt-1 text-xs text-gray-500">Minimal 200 karakter</p>
            </div>

            <!-- Upload Gambar -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Gambar Thumbnail
                </label>

                <?php if ($edit && !empty($artikel->gambar)): ?>
                    <div class="mb-3">
                        <img src="<?php echo base_url('uploads/artikel/' . $artikel->gambar); ?>" alt="Gambar saat ini" class="max-w-xs rounded-lg border border-gray-200">
                        <p class="text-xs text-gray-500 mt-1">Gambar saat ini: <?php echo $artikel->gambar; ?></p>
                    </div>
                <?php endif; ?>

                <div id="upload-area" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-accent-500 transition cursor-pointer" onclick="document.getElementById('gambar-input').click();">
                    <svg id="upload-icon" class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p id="upload-text" class="mt-2 text-sm text-gray-600">
                        <span class="font-medium text-accent-600 hover:text-accent-700">Klik untuk upload</span> atau drag & drop
                    </p>
                    <p class="mt-1 text-xs text-gray-500">PNG, JPG, JPEG (Maks. 2MB)</p>
                    <p id="file-name" class="mt-2 text-sm font-medium text-accent-700 hidden"></p>
                    <input type="file" id="gambar-input" name="gambar" class="hidden" accept="image/*" onchange="showFileName(this);">
                </div>
            </div>

            <!-- Status Publikasi -->
            <div>
                <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                    Status Publikasi <span class="text-red-500">*</span>
                </label>
                <select
                    id="status"
                    name="status"
                    required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-accent-500 outline-none transition"
                >
                    <option value="">Pilih Status</option>
                    <option value="publish" <?php echo ($edit && $artikel->status == 'publish') ? 'selected' : ''; ?>>Publish</option>
                    <option value="draft" <?php echo ($edit && $artikel->status == 'draft') ? 'selected' : ''; ?>>Draft</option>
                    <option value="arsip" <?php echo ($edit && $artikel->status == 'arsip') ? 'selected' : ''; ?>>Arsip</option>
                </select>
            </div>

        </div>

        <!-- Form Footer -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-end space-x-3">
            <a href="<?php echo base_url('admin/artikel'); ?>" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-100 transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-accent-600 to-accent-700 text-white rounded-lg font-semibold hover:from-accent-700 hover:to-accent-800 transition shadow-sm">
                <svg class="h-5 w-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <?php echo $edit ? 'Perbarui Artikel' : 'Simpan Artikel'; ?>
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
        uploadText.innerHTML = '<span class="font-medium text-accent-600">File siap diupload</span>';
        uploadIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>';
        uploadIcon.classList.add('text-green-500');
        uploadIcon.classList.remove('text-gray-400');
    }
}
</script>
