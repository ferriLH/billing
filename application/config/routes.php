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
$route['default_controller']    = 'C_Login';
$route['login']    				= 'C_Login';
$route['forgotMyPassword']    	= 'C_Login/forget';
$route['forgotMyPassword/auth'] = 'C_Login/forgetAuth';
$route['forgotMyPasswordForm/(:any)'] = 'C_Login/forgetForm/$1';
$route['forgotMyPasswordForm/auth/(:any)'] = 'C_Login/forgetFormAuth/$1';
$route['login/auth']    		= 'C_Login/auth';
$route['inadmin']    			= 'C_Inadmin';
$route['inadmin/auth']    		= 'C_Inadmin/auth';
$route['admin']    				= 'C_Admin';
$route['profile/(:any)'] 		= 'C_Profile';
$route['logoutPartner']         = 'C_Home/signoutPartner';
$route['logoutAdmin']         	= 'C_Home/signoutAdmin';

$route['home']                  = 'C_Home';
$route['rbtcontent']            = 'C_Rbtcontent';
$route['rbtcontent/add']        = 'C_Rbtcontent/add';

$route['partner']            	= 'C_Partner';
$route['partner/tablealias']    = 'C_Partner/table_alias';
$route['partner/tablealias/export'] = 'C_Partner/export_alias';
$route['partner/add']          	= 'C_Partner/add';
$route['partner/add/auth']      = 'C_Partner/addAuth';
$route['partner/delete/(:any)'] = 'C_Partner/delete/$1';
$route['partner/edit/(:any)']   = 'C_Partner/edit/$1';
$route['partner/edit/auth/(:any)'] = 'C_Partner/editAuth/$1';

$route['pencipta']            	= 'C_Pencipta';
$route['pencipta/add']          = 'C_Pencipta/add';
$route['pencipta/add/auth']     = 'C_Pencipta/addAuth';
$route['pencipta/delete/(:any)']= 'C_Pencipta/delete/$1';
$route['pencipta/edit/(:any)']	= 'C_Pencipta/edit/$1';
$route['pencipta/edit/auth/(:any)']	= 'C_Pencipta/editAuth/$1';
$route['pencipta/tablealias']		= 'C_Pencipta/tabel_alias';

$route['rbtsubmit']            	= 'C_Rbtsubmit';
$route['rbtsubmit/commit']	    = 'C_Rbtsubmit/rbtsubmit';
$route['traffic']            	= 'C_Traffic';
$route['traffic/commit']       	= 'C_Traffic/commit';
$route['traffic/data']       	= 'C_Traffic/data';

$route['sharepartner']          = 'C_Sharepartner';
$route['sharepartner/tableshare']= 'C_Sharepartner/tableshare';
$route['sharepencipta/tableshare']   = 'C_Sharepencipta/tableshare';

$route['sharepencipta']        			= 'C_Sharepencipta';
$route['summary']            			= 'C_Summary';
$route['summary/table']         		= 'C_Summary/table';
$route['summary/RevenuePartner/(:any)/(:any)']	= 'C_Summary/RevenuePartner';
$route['summary/RevenuePencipta/(:any)/(:any)']		= 'C_Summary/RevenuePencipta';

$route['payment']            	= 'C_Payment';
$route['payment/tablePartner']  = 'C_Payment/tablePartner';
$route['payment/tablePencipta'] = 'C_Payment/tablePencipta';

$route['rbttsel']            	= 'C_Rbttsel';
$route['rbttsel/commit']		= 'C_Rbttsel/rbttsel_submit';

$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;
