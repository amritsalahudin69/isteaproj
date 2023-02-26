<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
// $route['default_controller'] = 'Adm_core';
$route['default_controller'] = 'Adm_core';
$route['404_override'] = '';
//$route['translate_uri_dashes'] = FALSE; ori
$route['translate_uri_dashes'] = true;


$route['login'] = 'Adm_core'; //054a561

$route['koc'] = 'Adm_core/gantipassword';

$route['0'] = 'Adm_logout'; //023f564

$route['0036g56'] = 'Adm_home';
//
$route['054a562'] = 'Ads_dkredit';

$route['054a562add'] = 'Ads_dkredit_cud/add';
$route['054a562edit/(:num)'] = 'Ads_dkredit_cud/edit/$1';
$route['054a562del/(:num)'] = 'Ads_dkredit_cud/del/$1';

$route['054a452/(:num)'] = 'Ads_dfile/dfile/$1';
$route['054a452add/(:num)'] = 'Ads_dfile/add/$1';
$route['editnumberloan/(:num)'] = 'Ads_dfile/ubah/$1';
$route['deldet/(:num)'] = 'Ads_dfile/del/$1';

$route['coba'] = 'Ads_dfile/coba';


$route['054hj44/(:num)'] = 'Ads_file/view_all_file/$1';

$route['054hj44addimg/(:num)'] = 'Ads_file_cud/addimg/$1';
$route['054hj44adddok/(:num)'] = 'Ads_file_cud/adddok/$1';
$route['hapus/(:num)'] = 'Ads_file_cud/hapus/$1';

$route['054hj44edit/(:num)'] = 'Ads_file_cud/editimgdok/$1';

$route['888a562'] = 'Ads_resort';
$route['888a562add'] = 'Ads_resort/add';
$route['888a562edit/(:num)'] = 'Ads_resort/edit/$1';
$route['8880/(:num)'] = 'Ads_resort/st0/$1';
$route['8881/(:num)'] = 'Ads_resort/st1/$1';

$route['9696ip'] = 'Ads_enduserkrw';
$route['9696ipadd'] = 'Ads_enduserkrw/add';
$route['9696iedit/(:num)'] = 'Ads_enduserkrw/edit/$1';
$route['96960/(:num)'] = 'Ads_enduserkrw/st0/$1';
$route['96961/(:num)'] = 'Ads_enduserkrw/st1/$1';

$route['9696detail/(:num)'] = 'Ads_enddetail/detail/$1';


$route['6977'] = 'Adm_coreII'; //$route['logincoreii'] = 'Adm_coreII';
$route['697701'] = 'Adm_coreII/daftar';
$route['69'] = 'Adm_coreII/kluar';
$route['6912'] = 'Adm_coreII/gantipassword';

$route['2741724'] = 'User_home';

$route['274109'] = 'User_summacc';
$route['2741edit/(:num)'] = 'User_summacc/edit/$1';
$route['274100add/(:num)'] = 'User_summacc/detailadd/$1';
$route['274100edit/(:num)'] = 'User_summacc/detailedit/$1';
$route['2741fp/(:num)'] = 'User_summacc/profilephoto/$1';

$route['001'] = 'User_fileacc/dokumen';
$route['001/1'] = 'User_fileacc/dokadd';
$route['006'] = 'User_fileacc/gambar';
$route['006/6'] = 'User_fileacc/gamadd';

$route['356info?'] = 'Usr_info';
$route['356infoadd'] = 'Usr_info/add';
$route['356info/(:num)'] = 'Usr_info/edit/$1';
$route['356info80/(:num)'] = 'Usr_info/st0/$1';
$route['356info81/(:num)'] = 'Usr_info/st1/$1';

$route['ord01'] = 'Ads_order';
$route['90ordadd'] = 'Ads_order/add';
$route['ordac90/(:num)'] = 'Ads_order/st0/$1';
$route['ordac91/(:num)'] = 'Ads_order/st1/$1';

$route['1'] = 'un404';
