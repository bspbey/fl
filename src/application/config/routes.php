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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//
$route['api/oylama'] = "Anasayfa/oylama";
//
//
$route['sitemap\.xml'] = "Sitemap/index";
//
$route['admin'] = 'admin/Admin/index';
$route['admin/index'] = 'admin/Admin/index';
$route['admin/giris'] = 'admin/Admin/giris_yap';
$route['admin/cikis'] = 'admin/Admin/cikis_yap';
//
$route['default_controller'] = 'Anasayfa';
$route['anasayfa'] = 'Anasayfa/index';
$route['arama'] = 'Anasayfa/arama';
$route['yorum-ekle'] = 'Anasayfa/yorum_ekle/insert';
$route['iletisim'] = 'Piletisim/index';
$route['iletisim/gonder'] = 'Piletisim/form_gonder';
$route['film/(:any)'] = 'Anasayfa/film_icerik/$1';
$route['arama'] = 'Anasayfa/arama';
$route['kategori/(:any)'] = 'Anasayfa/kategori/$1';
$route['etiket/(:any)'] = 'Anasayfa/etiket/$1';
$route['sayfa/(:any)'] = 'Anasayfa/sayfa/$1';
$route['en-cok-izlenenler'] = 'Anasayfa/en_cok_izlenenler';
$route['en-cok-begenilenler'] = 'Anasayfa/en_cok_begenilenler';
//
$route['admin/filmler'] = 'admin/filmler/index';
$route['admin/filmler/ekle'] = 'admin/filmler/insert_form';
$route['admin/filmler/ekle/insert'] = 'admin/filmler/insert';
$route['admin/filmler/duzenle'] = 'admin/filmler/update_form';
$route['admin/filmler/duzenle/(:any)'] = 'admin/filmler/update_form/$1';
$route['admin/filmler/duzenle/update/(:any)'] = 'admin/filmler/update/$1';
$route['admin/filmler/sil/(:any)'] = 'admin/filmler/delete/$1';
//
$route['admin/film_kaynak'] = 'admin/film_kaynak/index';
$route['admin/film_kaynak/ekle'] = 'admin/film_kaynak/insert_form';
$route['admin/film_kaynak/ekle/insert'] = 'admin/film_kaynak/insert';
$route['admin/film_kaynak/duzenle'] = 'admin/film_kaynak/update_form';
$route['admin/film_kaynak/duzenle/(:any)'] = 'admin/film_kaynak/update_form/$1';
$route['admin/film_kaynak/duzenle/update/(:any)'] = 'admin/film_kaynak/update/$1';
$route['admin/film_kaynak/sil/(:any)'] = 'admin/film_kaynak/delete/$1';
//
$route['admin/yoneticiler'] = 'admin/yoneticiler/index';
$route['admin/yoneticiler/ekle'] = 'admin/yoneticiler/insert_form';
$route['admin/yoneticiler/ekle/insert'] = 'admin/yoneticiler/insert';
$route['admin/yoneticiler/duzenle'] = 'admin/yoneticiler/update_form';
$route['admin/yoneticiler/duzenle/(:any)'] = 'admin/yoneticiler/update_form/$1';
$route['admin/yoneticiler/duzenle/update/(:any)'] = 'admin/yoneticiler/update/$1';
$route['admin/yoneticiler/sil/(:any)'] = 'admin/yoneticiler/delete/$1';
//
$route['admin/yorumlar'] = 'admin/yorumlar/index';
$route['admin/yorumlar/duzenle'] = 'admin/yorumlar/update_form';
$route['admin/yorumlar/duzenle/(:any)'] = 'admin/yorumlar/update_form/$1';
$route['admin/yorumlar/duzenle/update/(:any)'] = 'admin/yorumlar/update/$1';
$route['admin/yorumlar/sil/(:any)'] = 'admin/yorumlar/delete/$1';
//
$route['admin/ayarlar'] = 'admin/ayarlar/index';
$route['admin/ayarlar/update'] = 'admin/ayarlar/update';

//
$route['admin/iletisim'] = 'admin/piletisim/index';
$route['admin/iletisim/(:num)'] = 'admin/piletisim/iletisim_icerik/$1';
$route['admin/iletisim/sil/(:any)'] = 'admin/piletisim/delete/$1';

//Kategoriler
$route['admin/kategoriler'] = 'admin/kategoriler/index';
$route['admin/kategoriler/ekle'] = 'admin/kategoriler/insert_form';
$route['admin/kategoriler/ekle/insert'] = 'admin/kategoriler/insert';
$route['admin/kategoriler/duzenle'] = 'admin/kategoriler/update_form';
$route['admin/kategoriler/duzenle/(:any)'] = 'admin/kategoriler/update_form/$1';
$route['admin/kategoriler/duzenle/update/(:any)'] = 'admin/kategoriler/update/$1';
$route['admin/kategoriler/sil/(:any)'] = 'admin/kategoriler/delete/$1';
//Kategoriler

//Sayfalar
$route['admin/sayfalar'] = 'admin/sayfalar/index';
$route['admin/sayfalar/ekle'] = 'admin/sayfalar/insert_form';
$route['admin/sayfalar/ekle/insert'] = 'admin/sayfalar/insert';
$route['admin/sayfalar/duzenle'] = 'admin/sayfalar/update_form';
$route['admin/sayfalar/duzenle/(:any)'] = 'admin/sayfalar/update_form/$1';
$route['admin/sayfalar/duzenle/update/(:any)'] = 'admin/sayfalar/update/$1';
$route['admin/sayfalar/sil/(:any)'] = 'admin/sayfalar/delete/$1';
//Sayfalar

//Reklamlar
$route['admin/reklamlar'] = 'admin/reklamlar/index';
$route['admin/reklamlar/duzenle'] = 'admin/reklamlar/update_form';
$route['admin/reklamlar/duzenle/(:any)'] = 'admin/reklamlar/update_form/$1';
$route['admin/reklamlar/duzenle/update/(:any)'] = 'admin/reklamlar/update/$1';
$route['admin/reklamlar/sil/(:any)'] = 'admin/reklamlar/delete/$1';
//Reklamlar

//Film Botu
$route['admin/film-botu'] = 'admin/film_botu/index';
//Film Botu
