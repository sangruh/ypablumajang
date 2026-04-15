<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Custom Helper - SPPG Inspektorat
 * 
 * Berisi helper functions yang sering digunakan
 */

/**
 * Generate CSRF token hidden input field
 * Usage: echo csrf_field();
 * 
 * @return string
 */
if (!function_exists('csrf_field')) {
    function csrf_field()
    {
        $CI =& get_instance();
        $token_name = $CI->security->get_csrf_token_name();
        $token_hash = $CI->security->get_csrf_hash();
        
        return '<input type="hidden" name="' . $token_name . '" value="' . $token_hash . '">' . PHP_EOL;
    }
}

/**
 * Get CSRF token name
 * Usage: echo csrf_token();
 * 
 * @return string
 */
if (!function_exists('csrf_token')) {
    function csrf_token()
    {
        $CI =& get_instance();
        return $CI->security->get_csrf_token_name();
    }
}

/**
 * Get CSRF token hash
 * Usage: echo csrf_hash();
 * 
 * @return string
 */
if (!function_exists('csrf_hash')) {
    function csrf_hash()
    {
        $CI =& get_instance();
        return $CI->security->get_csrf_hash();
    }
}

/**
 * Escape output untuk mencegah XSS
 * Usage: echo e($data);
 * 
 * @param string $str
 * @return string
 */
if (!function_exists('e')) {
    function e($str)
    {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }
}

/**
 * Format tanggal Indonesia
 * Usage: echo tanggal_indo($date);
 * 
 * @param string $date
 * @return string
 */
if (!function_exists('tanggal_indo')) {
    function tanggal_indo($date)
    {
        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        
        $timestamp = strtotime($date);
        $tanggal = date('j', $timestamp);
        $bulan_nama = $bulan[(int)date('n', $timestamp)];
        $tahun = date('Y', $timestamp);
        
        return $tanggal . ' ' . $bulan_nama . ' ' . $tahun;
    }
}

/**
 * Format rupiah
 * Usage: echo rupiah($angka);
 * 
 * @param float|int $angka
 * @return string
 */
if (!function_exists('rupiah')) {
    function rupiah($angka)
    {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}

/**
 * Format angka dengan separator titik
 * Usage: echo format_angka($angka);
 * 
 * @param float|int $angka
 * @return string
 */
if (!function_exists('format_angka')) {
    function format_angka($angka)
    {
        return number_format($angka, 0, ',', '.');
    }
}

/**
 * Get user role name (pretty)
 * Usage: echo role_name($role);
 * 
 * @param string $role
 * @return string
 */
if (!function_exists('role_name')) {
    function role_name($role)
    {
        $roles = [
            'super_admin' => 'Super Admin',
            'kepala_sppg' => 'Kepala SPPG',
            'koordinator' => 'Koordinator',
            'sppg' => 'Petugas SPPG',
            'sekolah' => 'Sekolah'
        ];
        
        return isset($roles[$role]) ? $roles[$role] : ucfirst($role);
    }
}

/**
 * Status badge HTML generator
 * Usage: echo status_badge('approved');
 *
 * @param string $status
 * @return string
 */
if (!function_exists('status_badge')) {
    function status_badge($status)
    {
        $statuses = [
            'pending' => ['class' => 'status-pending', 'label' => 'Pending'],
            'approved' => ['class' => 'status-approved', 'label' => 'Approved'],
            'rejected' => ['class' => 'status-rejected', 'label' => 'Rejected'],
            'terkirim' => ['class' => 'status-info', 'label' => 'Terkirim'],
            'selesai' => ['class' => 'status-success', 'label' => 'Selesai'],
            'batal' => ['class' => 'status-danger', 'label' => 'Batal'],
            'unanswered' => ['class' => 'status-warning', 'label' => 'Belum Dijawab'],
            'answered' => ['class' => 'status-success', 'label' => 'Sudah Dijawab'],
        ];

        $status_lower = strtolower($status);
        $config = isset($statuses[$status_lower]) ? $statuses[$status_lower] : ['class' => '', 'label' => ucfirst($status)];

        return '<span class="status-badge ' . $config['class'] . '">' . $config['label'] . '</span>';
    }
}

/**
 * Time ago format
 * Usage: echo time_ago($timestamp);
 *
 * @param string $timestamp
 * @return string
 */
if (!function_exists('time_ago')) {
    function time_ago($timestamp)
    {
        $now = time();
        $time = strtotime($timestamp);
        $diff = $now - $time;

        if ($diff < 60) return 'Baru saja';
        if ($diff < 3600) return floor($diff / 60) . ' menit yang lalu';
        if ($diff < 86400) return floor($diff / 3600) . ' jam yang lalu';
        if ($diff < 2592000) return floor($diff / 86400) . ' hari yang lalu';
        if ($diff < 31536000) return floor($diff / 2592000) . ' bulan yang lalu';
        return floor($diff / 31536000) . ' tahun yang lalu';
    }
}
