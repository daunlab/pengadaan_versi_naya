<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'barangmanage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/**
 * API
 */
$route['api/barang/(:any)/get'] = 'apibarang/get/$1';
$route['api/petugas/(:any)/get'] = 'apipetugas/get/$1';
$route['api/masuk/(:any)/getdetail'] = 'apimasuk/getdetail/$1';
$route['api/keluar/(:any)/getdetail'] = 'apikeluar/getdetail/$1';
$route['api/perubahan/(:any)/getinfo'] = 'apiperubahan/getinfo/$1';
$route['api/perubahan/(:any)/getpetugas'] = 'apiperubahan/getpetugas/$1';
$route['api/perubahan/(:any)/getmentah'] = 'apiperubahan/getmentah/$1';
$route['api/perubahan/(:any)/getjadi'] = 'apiperubahan/getjadi/$1';

/**
 * master barang
 */
$route['barang'] = 'barangmanage';
$route['barang/tambah'] = 'barangmanage/goadd';
$route['barang/hittambah'] = 'barangmanage/doadd';
$route['barang/(:any)/edit'] = 'barangmanage/goedit/$1';
$route['barang/(:any)/hitedit'] = 'barangmanage/doedit/$1';
$route['barang/(:any)/hitremove'] = 'barangmanage/doremove/$1';

/**
 * master suplier
 */
$route['suplier'] = 'supliermanage';
$route['suplier/tambah'] = 'supliermanage/goadd';
$route['suplier/hittambah'] = 'supliermanage/doadd';
$route['suplier/(:any)/edit'] = 'supliermanage/goedit/$1';
$route['suplier/(:any)/hitedit'] = 'supliermanage/doedit/$1';
$route['suplier/(:any)/hitremove'] = 'supliermanage/doremove/$1';

/**
 * master suplier
 */
$route['pembeli'] = 'pembelimanage';
$route['pembeli/tambah'] = 'pembelimanage/goadd';
$route['pembeli/hittambah'] = 'pembelimanage/doadd';
$route['pembeli/(:any)/edit'] = 'pembelimanage/goedit/$1';
$route['pembeli/(:any)/hitedit'] = 'pembelimanage/doedit/$1';
$route['pembeli/(:any)/hitremove'] = 'pembelimanage/doremove/$1';

/**
 * master tukang
 */
$route['tukang'] = 'tukangmanage';
$route['tukang/tambah'] = 'tukangmanage/goadd';
$route['tukang/hittambah'] = 'tukangmanage/doadd';
$route['tukang/(:any)/edit'] = 'tukangmanage/goedit/$1';
$route['tukang/(:any)/hitedit'] = 'tukangmanage/doedit/$1';
$route['tukang/(:any)/hitremove'] = 'tukangmanage/doremove/$1';

/**
 * transaksi barang masuk
 */
$route['masuk'] = 'masukmanage';
$route['masuk/tambah'] = 'masukmanage/goadd';
$route['masuk/hittambah'] = 'masukmanage/doadd';
$route['masuk/(:any)/edit'] = 'masukmanage/goedit/$1';
$route['masuk/(:any)/hitedit'] = 'masukmanage/doedit/$1';
$route['masuk/(:any)/hitremove'] = 'masukmanage/doremove/$1';

/**
 * transaksi barang keluar
 */
$route['keluar'] = 'keluarmanage';
$route['keluar/tambah'] = 'keluarmanage/goadd';
$route['keluar/hittambah'] = 'keluarmanage/doadd';
$route['keluar/(:any)/edit'] = 'keluarmanage/goedit/$1';
$route['keluar/(:any)/hitedit'] = 'keluarmanage/doedit/$1';
$route['keluar/(:any)/hitremove'] = 'keluarmanage/doremove/$1';

/**
 * transaksi perubahan
 */
$route['perubahan'] = 'perubahanmanage';
$route['perubahan/tambah'] = 'perubahanmanage/goadd';
$route['perubahan/hittambah'] = 'perubahanmanage/doadd';
$route['perubahan/(:any)/edit'] = 'perubahanmanage/goedit/$1';
// $route['perubahan/(:any)/hitedit'] = 'perubahanmanage/doedit/$1';
$route['perubahan/(:any)/hitremove'] = 'perubahanmanage/doremove/$1';

/**
 * transaksi convert barang
 */

/**
 * master suplier
 */

$route['laporan'] ='laporanmanage';
$route['laporan/cetak/barang'] ='laporanmanage/doCetakBarang';
<<<<<<< Updated upstream
$route['laporan/cetak/barang2'] ='laporanmanage/doCetakBarang2';
=======
$route['laporan/cetak/masuk'] ='laporanmanage/doCetakMasuk';
$route['laporan/cetak/tukang'] ='laporanmanage/doCetakTukang';
>>>>>>> Stashed changes

$route['dashboard'] = 'dashboard';
$route['hitdashboard'] ='barangmanage';

$route['login'] = 'authentication';
$route['hitlogin'] = 'authentication/login';
$route['hitlogout'] = 'authentication/logout';
