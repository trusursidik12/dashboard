<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//frontend indoor
$route['indoor/sukoharjo']				= 'f_sukoharjo/index';
$route['indoor/sukoharjo2']				= 'f_sukoharjo2/index';
$route['indoor/sukoharjo3']				= 'f_sukoharjo3/index';
$route['indoor/dlhcilegon']				= 'f_cilegon/index';
$route['indoor/kieccilegon']			= 'f_cilegon/cilegonkiec';

//frontend controller sukoharjo3
$route['indoor/sukoharjo3/cemsrum']		= 'f_sukoharjo3/cemsrum';
$route['indoor/sukoharjo3/status']	    = 'f_sukoharjo3/status';

//frontend controller sukoharjo2
$route['indoor/sukoharjo2/cemsrum']		= 'f_sukoharjo2/cemsrum';
$route['indoor/sukoharjo2/camsrum']		= 'f_sukoharjo2/camsrum';
$route['indoor/sukoharjo2/camsgupit']	= 'f_sukoharjo2/camsgupit';
$route['indoor/sukoharjo2/camsplesan']	= 'f_sukoharjo2/camsplesan';
$route['indoor/sukoharjo2/camscelep']	= 'f_sukoharjo2/camscelep';
$route['indoor/sukoharjo2/camspengkol']	= 'f_sukoharjo2/camspengkol';
$route['indoor/sukoharjo2/status']	    = 'f_sukoharjo2/status';

//frontend controller cilegon
$route['indoor/cilegon/pci']			= 'f_cilegon/pci';
$route['indoor/cilegon/simpang']		= 'f_cilegon/simpang';
$route['indoor/cilegon/ciwandan']		= 'f_cilegon/ciwandan';
$route['indoor/cilegon/merak']			= 'f_cilegon/merak';
$route['indoor/cilegon/kiec']			= 'f_cilegon/kiec';

//frontend controller sukoharjo
$route['indoor/sukoharjo/cemsrum']		= 'f_sukoharjo/cemsrum';
$route['indoor/sukoharjo/camsrum']		= 'f_sukoharjo/camsrum';
$route['indoor/sukoharjo/camsgupit']	= 'f_sukoharjo/camsgupit';
$route['indoor/sukoharjo/camsplesan']	= 'f_sukoharjo/camsplesan';

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
$route['aqmispu/kiec/(:any)']			= 'b_aqmispu/idstasiun_kiec/$1';
$route['ajax/aqmispu']					= 'b_aqmispu/get_ajax';

//monitoring
$route['monitoring/aqmdata/(:any)']		= 'b_aqmdata/idstasiun_monitoring/$1';
$route['monitoring/aqmispu/(:any)']		= 'b_aqmispu/idstasiun_monitoring/$1';

$route['aqmdata/(:any)']				= 'b_aqmdata/idstasiun/$1';
$route['aqmdata/kiec/(:any)']			= 'b_aqmdata/idstasiun_kiec/$1';
$route['ajax/aqmdata']					= 'b_aqmdata/get_ajax';

$route['monitoring']					= 'b_dashboard/monitoring';
$route['wellcome']						= 'b_dashboard/wellcome';
$route['dashboard']						= 'b_dashboard/index';

$route['login']							= 'b_acc_login/login';
$route['process']						= 'b_acc_login/process';
$route['logout']						= 'b_acc_login/logout';

$route['stations/list']			        = 'b_stations/index';
$route['stations/add']			        = 'b_stations/add';
$route['stations/edit/(:any)']	        = 'b_stations/edit/$1';
$route['stations/delete/(:any)']	    = 'b_stations/delete/$1';

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
