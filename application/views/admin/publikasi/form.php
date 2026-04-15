<?php
$edit = isset($publikasi) && !empty($publikasi);
$action = $edit ? base_url('admin/publikasi/update/' . $publikasi->id) : base_url('admin/publikasi/simpan');
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
            <a href="<?php echo base_url('admin'); ?>" class="hover:text-purple-700">Dashboard</a>
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="<?php echo base_url('admin/publikasi'); ?>" class="hover:text-purple-700">Publikasi</a>
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-900 font-medium"><?php echo $edit ? 'Edit Publikasi' : 'Tambah Publikasi'; ?></span>
        </div>
        <h3 class="text-2xl font-bold text-gray-900"><?php echo $edit ? 'Edit Publikasi' : 'Tambah Publikasi Baru'; ?></h3>
        <p class="text-sm text-gray-500 mt-1"><?php echo $edit ? 'Perbarui informasi publikasi' : 'Upload dokumen publikasi yayasan'; ?></p>
    </div>
    <a href="<?php echo base_url('admin/publikasi'); ?>" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition">
        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali
    </a>
</div>

<!-- Form Card -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="px-6 py-4 border-b border-gray-200">
        <h4 class="text-lg font-semibold text-gray-900">Informasi Publikasi</h4>
        <p class="text-sm text-gray-500 mt-1">Semua field bertanda (*) wajib diisi</p>
    </div>

    <form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
        <div class="p-6 space-y-6">

            <!-- Judul Publikasi -->
            <div>
                <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">
                    Judul Publikasi <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    id="judul"
                    name="judul"
                    required
                    value="<?php echo $edit ? htmlspecialchars($publikasi->judul) : ''; ?>"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition"
                    placeholder="Masukkan judul publikasi"
                >
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">
                    Deskripsi
                </label>
                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    rows="4"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition resize-none"
                    placeholder="Deskripsi singkat tentang dokumen..."
                ><?php echo $edit ? htmlspecialchars($publikasi->deskripsi) : ''; ?></textarea>
            </div>

            <!-- Kategori -->
            <div>
                <label for="kategori" class="block text-sm font-semibold text-gray-700 mb-2">
                    Kategori Dokumen <span class="text-red-500">*</span>
                </label>
                <select
                    id="kategori"
                    name="kategori"
                    required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition"
                >
                    <option value="">Pilih Kategori</option>
                    <option value="laporan" <?php echo ($edit && $publikasi->kategori == 'laporan') ? 'selected' : ''; ?>>Laporan</option>
                    <option value="sk" <?php echo ($edit && $publikasi->kategori == 'sk') ? 'selected' : ''; ?>>Surat Keputusan</option>
                    <option value="pedoman" <?php echo ($edit && $publikasi->kategori == 'pedoman') ? 'selected' : ''; ?>>Pedoman/Panduan</option>
                    <option value="presentasi" <?php echo ($edit && $publikasi->kategori == 'presentasi') ? 'selected' : ''; ?>>Presentasi</option>
                    <option value="lainnya" <?php echo ($edit && $publikasi->kategori == 'lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                </select>
            </div>

            <!-- Upload File -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Upload Dokumen <span class="text-red-500">*</span>
                </label>

                <?php if ($edit && !empty($publikasi->file)): ?>
                    <div class="mb-3 p-3 bg-purple-50 rounded-lg border border-purple-200">
                        <div class="flex items-center">
                            <svg class="h-8 w-8 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-gray-900"><?php echo $publikasi->file; ?></p>
                                <p class="text-xs text-gray-500"><?php echo $publikasi->ukuran_file; ?> - <?php echo strtoupper($publikasi->tipe_file); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div id="upload-area" class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-purple-500 transition cursor-pointer" onclick="document.getElementById('file-input').click();">
                    <svg id="upload-icon" class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    <p id="upload-text" class="mt-2 text-sm text-gray-600">
                        <span class="font-medium text-purple-600 hover:text-purple-700">Klik untuk upload</span> atau drag & drop
                    </p>
                    <p class="mt-1 text-xs text-gray-500">PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX (Maks. 10MB)</p>
                    <p id="file-name" class="mt-2 text-sm font-medium text-purple-700 hidden"></p>
                    <input type="file" id="file-input" name="file" class="hidden" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx" onchange="showFileName(this);">
                </div>
            </div>

        </div>

        <!-- Form Footer -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-end space-x-3">
            <a href="<?php echo base_url('admin/publikasi'); ?>" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-100 transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-purple-800 transition shadow-sm">
                <svg class="h-5 w-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                </svg>
                <?php echo $edit ? 'Perbarui Publikasi' : 'Upload Publikasi'; ?>
            </button>
        </div>

    </form>
</div>

<!-- Script Upload -->
<script>
function showFileName(input) {
    const fileName = input.files[0]?.name;
    const fileSize = input.files[0]?.size;
    const fileNameEl = document.getElementById('file-name');
    const uploadText = document.getElementById('upload-text');
    const uploadIcon = document.getElementById('upload-icon');

    if (fileName) {
        const sizeMB = (fileSize / (1024 * 1024)).toFixed(2);
        fileNameEl.textContent = 'File terpilih: ' + fileName + ' (' + sizeMB + ' MB)';
        fileNameEl.classList.remove('hidden');
        uploadText.innerHTML = '<span class="font-medium text-purple-600">File siap diupload</span>';
        uploadIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>';
        uploadIcon.classList.add('text-green-500');
        uploadIcon.classList.remove('text-gray-400');
    }
}
</script>
