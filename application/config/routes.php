<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| PUBLIC WEB PROFILE ROUTES (YPAB)
| -------------------------------------------------------------------------
*/
$route['tentang']        = 'home/tentang';
$route['kepengurusan']   = 'home/kepengurusan';
$route['program']        = 'home/program';
$route['berita']         = 'home/berita';
$route['berita/(:any)']  = 'home/detail_berita/$1';
$route['artikel']        = 'home/artikel';
$route['artikel/(:any)'] = 'home/detail_artikel/$1';
$route['kegiatan']       = 'home/kegiatan';
$route['kegiatan/(:any)']= 'home/detail_kegiatan/$1';
$route['publikasi']      = 'home/publikasi';
$route['kontak']         = 'home/kontak';
$route['donasi']         = 'home/donasi';

/*
| -------------------------------------------------------------------------
| ADMIN ROUTES
| -------------------------------------------------------------------------
*/
$route['login']               = 'login';
$route['login/proses']        = 'login/proses';
$route['logout']              = 'login/logout';
$route['admin']               = 'admin/dashboard';
$route['admin/kegiatan']      = 'admin/kegiatan';
$route['admin/kegiatan/tambah'] = 'admin/kegiatan/tambah';
$route['admin/kegiatan/edit/(:any)'] = 'admin/kegiatan/edit/$1';
$route['admin/kegiatan/hapus/(:any)'] = 'admin/kegiatan/hapus/$1';
$route['admin/artikel']       = 'admin/artikel';
$route['admin/artikel/tambah'] = 'admin/artikel/tambah';
$route['admin/artikel/edit/(:any)'] = 'admin/artikel/edit/$1';
$route['admin/artikel/hapus/(:any)'] = 'admin/artikel/hapus/$1';
$route['admin/publikasi']     = 'admin/publikasi';
$route['admin/publikasi/tambah'] = 'admin/publikasi/tambah';
$route['admin/publikasi/edit/(:any)'] = 'admin/publikasi/edit/$1';
$route['admin/publikasi/hapus/(:any)'] = 'admin/publikasi/hapus/$1';
$route['admin/berita']        = 'admin/berita';
$route['admin/berita/tambah'] = 'admin/berita/tambah';
$route['admin/berita/edit/(:any)'] = 'admin/berita/edit/$1';
