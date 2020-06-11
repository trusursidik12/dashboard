<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//frontend indoor
$route['indoor/sukoharjo']				= 'b_sukoharjo/index';


//laporan harian
$route['laporan/data/hari']				= 'b_harian/idstasiun_data';
$route['laporan/ispu/hari']				= 'b_harian/idstasiun_ispu';

//laporan bulanan
$route['laporan/data/bulan']			= 'b_bulanan/idstasiun_data';
$route['laporan/ispu/bulan']			= 'b_bulanan/idstasiun_ispu';

//laporan tahunan
$route['laporan/data/tahun']			= 'b_tahunan/idstasiun_data';
$route['laporan/ispu/tahun']			= 'b_tahunan/idstasiun_ispu';


// backend
$route['aqmispu/(:any)']				= 'b_aqmispu/idstasiun/$1';
$route['ajax/aqmispu']					= 'b_aqmispu/get_ajax';

//monitoring
$route['monitoring/aqmdata/(:any)']		= 'b_aqmdata/idstasiun_monitoring/$1';
$route['monitoring/aqmispu/(:any)']		= 'b_aqmispu/idstasiun_monitoring/$1';

$route['aqmdata/(:any)']				= 'b_aqmdata/idstasiun/$1';
$route['ajax/aqmdata']					= 'b_aqmdata/get_ajax';

$route['monitoring']					= 'b_dashboard/monitoring';
$route['wellcome']						= 'b_dashboard/wellcome';
$route['dashboard']						= 'b_dashboard/index';

$route['login']							= 'b_acc_login/login';
$route['process']						= 'b_acc_login/process';
$route['logout']						= 'b_acc_login/logout';

$route['accounts/users/list']			= 'b_acc_users/index';
$route['accounts/users/add']			= 'b_acc_users/add';
$route['accounts/users/edit/(:any)']	= 'b_acc_users/edit/$1';
$route['accounts/users/delete/(:any)']	= 'b_acc_users/delete/$1';

$route['accounts/levels/list']			= 'b_acc_levels/index';
$route['accounts/levels/add']			= 'b_acc_levels/add';
$route['accounts/levels/edit/(:any)']	= 'b_acc_levels/edit/$1';
$route['accounts/levels/delete/(:any)']	= 'b_acc_levels/delete/$1';

$route['default_controller'] 			= 'b_dashboard';
$route['404_override'] 					= '';
$route['translate_uri_dashes'] 			= FALSE;
