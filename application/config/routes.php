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
$route['artikel']        = 'home/artikel';
$route['publikasi']      = 'home/publikasi';
$route['kontak']         = 'home/kontak';
$route['donasi']         = 'home/donasi';
