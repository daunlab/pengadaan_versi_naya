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
 * master barang
 */
$route['barang'] = 'barangmanage';
$route['barang/tambah'] = 'barangmanage/goadd';
$route['barang/hittambah'] = 'barangmanage/doadd';
$route['hitinsertbrg'] = 'barangmanage/tambahbarang';
$route['barang/(:any)/edit'] = 'barangmanage/goedit/$1';
$route['barang/(:any)/hitedit'] = 'barangmanage/doedit/$1';
$route['barang/(:any)/hitremove'] = 'barangmanage/doremove/$1';

/**
 * transaksi barang masuk
 */
$route['masuk'] = 'masukmanage';
$route['masuk/tambah'] = 'masukmanage/goadd';
$route['masuk/hittambah'] = 'masukmanage/doadd';
$route['hitinsertbrgmasuk'] ='barangmanage/tambahdatamasuk/';
$route['masuk/(:any)/edit'] = 'barangmanage/yuedit/$1';
$route['masuk/(:any)/hitedit'] = 'barangmanage/diedit/$1';
$route['masuk/(:any)/hitremove'] = 'barangmanage/diremove/$1';

/**
 * transaksi barang keluar
 */
$route['keluar'] = 'keluarmanage';
$route['hitinsertbrgkeluar'] ='barangmanage/tambahdatakeluar/';
$route['barang/(:any)/edit'] = 'barangmanage/goedit/$1';
$route['barang/(:any)/hitedit'] = 'barangmanage/doedit/$1';
$route['barang/(:any)/hitremove'] = 'barangmanage/doremove/$1';

/**
 * transaksi convert barang
 */

/**
 * master suplier
 */

$route['hitlaporan'] ='barangmanage';

$route['dashboard'] = 'dashboard';
$route['hitdashboard'] ='barangmanage';

$route['login'] = 'authentication';
$route['hitlogin'] = 'authentication/login';
$route['hitlogout'] = 'authentication/logout';
