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
$route['default_controller'] = 'Account/get_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['register'] 							= 'Account/get_register';
$route['post_register']						= 'Account/post_register';
$route['post_login']						= 'Account/post_login';
$route['logout'] 							= 'Logout/logout';

$route['super_admin/users']					='SuperAdmin/User_Credential/get_users';
$route['super_admin/get_users_all']			='SuperAdmin/User_Credential/get_users_all';
$route['super_admin/get_users_pending']		='SuperAdmin/User_Credential/get_users_pending';

$route['gss/head/po'] 						= 'GSS/Head/PO/get_po';
$route['gss/head/po/last_po'] 				= 'GSS/Head/PO/last_po';
$route['gss/head/po/all_po'] 				= 'GSS/Head/PO/all_po';
$route['gss/head/po/completed_po'] 			= 'GSS/Head/PO/completed_po';
$route['gss/head/po/pending_po'] 			= 'GSS/Head/PO/pending_po';
$route['gss/head/po/confirmed_po'] 			= 'GSS/Head/PO/confirmed_po';
$route['gss/head/po/rejected_po'] 			= 'GSS/Head/PO/rejected_po';
$route['gss/head/po/draft_po'] 				= 'GSS/Head/PO/draft_po';
$route['gss/head/po/cancelled_po'] 			= 'GSS/Head/PO/cancelled_po';
$route['gss/head/po/read_csv']				= 'GSS/Head/PO/read_csv';
$route['gss/head/po/inventory']				= 'GSS/Head/PO/inventory';
$route['gss/head/po/save_po']				= 'GSS/Head/PO/save_po';
$route['gss/head/po/post_cancel_po']		= 'GSS/Head/PO/post_cancel_po';
$route['gss/head/po/post_delete_po']		= 'GSS/Head/PO/post_delete_po';
$route['gss/head/po/edit_po']				= 'GSS/Head/PO/edit_po';
$route['gss/head/po/po_exist']				= 'GSS/Head/PO/po_exist';

$route['gss/head/iar'] 						= 'GSS/Head/IAR/get_iar';
$route['gss/head/iar/completed_iar'] 		= 'GSS/Head/IAR/completed_iar';
$route['gss/head/iar/incomplete_iar'] 		= 'GSS/Head/IAR/incomplete_iar'; //Added
$route['gss/head/iar/all_iar'] 				= 'GSS/Head/IAR/all_iar';		 //Added
$route['gss/head/iar/draft_iar'] 			= 'GSS/Head/IAR/draft_iar';
$route['gss/head/iar/all_po'] 				= 'GSS/Head/IAR/all_po';
$route['gss/head/iar/inventory']			= 'GSS/Head/IAR/inventory';
$route['gss/head/iar/save_iar']				= 'GSS/Head/IAR/save_iar';
$route['gss/head/iar/edit_iar']				= 'GSS/Head/IAR/edit_iar';
$route['gss/head/iar/last_iar']				= 'GSS/Head/IAR/last_iar';
$route['gss/head/iar/iar_exist']			= 'GSS/Head/IAR/iar_exist';

$route['gss/head/inventory'] 					= 'GSS/Head/Inventory/get_inventory';
$route['gss/head/inventory/inventory_record'] 	= 'GSS/Head/Inventory/inventory_record';
$route['gss/head/inventory/asset_inventory'] 	= 'GSS/Head/Inventory/asset_inventory';
$route['gss/head/inventory/gss_ppmp'] 			= 'GSS/Head/Inventory/gss_ppmp';
$route['gss/head/inventory/accounting_ppmp'] 	= 'GSS/Head/Inventory/accounting_ppmp';
$route['gss/head/inventory/it_ppmp'] 			= 'GSS/Head/Inventory/it_ppmp';

/**$route['gss/head/ris/pending_sai'] 				= 'GSS/Head/RIS/pending_sai';
$route['gss/head/ris/confirmed_sai'] 			= 'GSS/Head/RIS/confirmed_sai';
$route['gss/head/ris/rejected_sai'] 			= 'GSS/Head/RIS/rejected_sai';
$route['gss/head/ris/post_confirm_ris'] 			= 'GSS/Head/RIS/post_confirm_ris';
$route['gss/head/ris/post_reject_ris'] 			= 'GSS/Head/RIS/post_reject_ris';
$route['gss/head/ris/all_pending_sai'] 				= 'GSS/Head/RIS/all_pending_sai';
$route['gss/head/ris/all_confirmed_sai'] 			= 'GSS/Head/RIS/all_confirmed_sai';
$route['gss/head/ris/all_rejected_sai'] 			= 'GSS/Head/RIS/all_rejected_sai';
$route['gss/head/ris/draft_sai'] 				= 'GSS/Head/RIS/draft_sai';
$route['gss/head/ris/cancelled_sai'] 			= 'GSS/Head/RIS/cancelled_sai';
$route['gss/head/ris/post_cancel_sai'] 			= 'GSS/Head/RIS/post_cancel_sai';
$route['gss/head/ris/last_sai'] 				= 'GSS/Head/RIS/last_sai';
$route['gss/head/ris/save_sai'] 				= 'GSS/Head/RIS/save_sai';
$route['gss/head/ris/inventory']				= 'GSS/Head/RIS/inventory';**/

$route['gss/head/ris'] 							= 'GSS/Head/RIS/get_ris';
$route['gss/head/ris/get_ppmp']					= 'GSS/Head/RIS/get_ppmp';

$route['gss/head/par'] 							= 'GSS/Head/PAR/get_par';
$route['gss/head/par/save_par']					= 'GSS/Head/PAR/save_par';
$route['gss/head/par/last_par'] 				= 'GSS/Head/PAR/last_par';
$route['gss/head/par/inventory']				= 'GSS/Head/PAR/inventory';
$route['gss/head/par/completed_par'] 			= 'GSS/Head/PAR/completed_par';
$route['gss/head/par/draft_par'] 				= 'GSS/Head/PAR/draft_par';
$route['gss/head/par/edit_par'] 				= 'GSS/Head/PAR/edit_par';
$route['gss/head/par/all_dept'] 				= 'GSS/Head/PAR/all_dept';
$route['gss/head/par/all_emp'] 					= 'GSS/Head/PAR/all_emp';

$route['gss/head/pc']                             = 'GSS/Head/PC/get_pc';
$route['gss/head/pc/save_pc']                     = 'GSS/Head/PC/save_pc';
$route['gss/head/pc/generated_pc']                 = 'GSS/Head/PC/generated_pc';
$route['gss/head/pc/last_pc']                     = 'GSS/Head/PC/last_pc';
$route['gss/head/invoice'] 						= 'GSS/Head/Invoice/get_invoice';

$route['gss/head/oejwo'] 						= 'GSS/Head/OEJWO/get_oejwo';
$route['gss/head/wmr'] 							= 'GSS/Head/WMR/get_wmr';
$route['gss/head/disposed'] 					= 'GSS/Head/Disposed/get_disposed';
$route['gss/head/asset'] 						= 'GSS/Head/Asset/get_asset';

$route['accounting/head/po']					= 'Accounting/Head/PO/get_po';
$route['accounting/head/po/all_po']				= 'Accounting/Head/PO/all_po';
$route['accounting/head/po/completed_po']		= 'Accounting/Head/PO/completed_po';
$route['accounting/head/po/pending_po']			= 'Accounting/Head/PO/pending_po';
$route['accounting/head/po/confirmed_po']		= 'Accounting/Head/PO/confirmed_po';
$route['accounting/head/po/rejected_po']		= 'Accounting/Head/PO/rejected_po';
$route['accounting/head/po/post_confirm_po']	= 'Accounting/Head/PO/post_confirm_po';
$route['accounting/head/po/post_reject_po']		= 'Accounting/Head/PO/post_reject_po';

$route['accounting/head/iar']					= 'Accounting/Head/IAR/get_iar';
$route['accounting/head/iar/completed_iar'] 	= 'Accounting/Head/IAR/completed_iar';

$route['accounting/head/sai']					= 'Accounting/Head/SAI/get_sai';
$route['accounting/head/sai/post_confirm_sai'] 	= 'Accounting/Head/SAI/post_confirm_sai';
$route['accounting/head/sai/pending_sai'] 		= 'Accounting/Head/SAI/pending_sai';
$route['accounting/head/sai/confirmed_sai'] 	= 'Accounting/Head/SAI/confirmed_sai';
$route['accounting/head/sai/rejected_sai'] 		= 'Accounting/Head/SAI/rejected_sai';
$route['accounting/head/sai/my_pending_sai'] 	= 'Accounting/Head/SAI/my_pending_sai';
$route['accounting/head/sai/my_confirmed_sai'] 	= 'Accounting/Head/SAI/my_confirmed_sai';
$route['accounting/head/sai/my_rejected_sai'] 	= 'Accounting/Head/SAI/my_rejected_sai';
$route['accounting/head/sai/my_draft_sai'] 		= 'Accounting/Head/SAI/my_draft_sai';
$route['accounting/head/sai/my_cancelled_sai'] 	= 'Accounting/Head/SAI/my_cancelled_sai';
$route['accounting/head/sai/post_cancel_sai'] 	= 'Accounting/Head/SAI/post_cancel_sai';
$route['accounting/head/sai/last_sai'] 			= 'Accounting/Head/SAI/last_sai';
$route['accounting/head/sai/save_sai'] 			= 'Accounting/Head/SAI/save_sai';
$route['accounting/head/sai/inventory']			= 'Accounting/Head/SAI/inventory';
$route['accounting/head/sai/post_reject_sai'] 	= 'Accounting/Head/SAI/post_reject_sai';
$route['accounting/head/ris']					= 'Accounting/Head/RIS/get_ris';
$route['accounting/head/invoice']				= 'Accounting/Head/Invoice/get_invoice';

$route['accounting/head/oejwo']					= 'Accounting/Head/OEJWO/get_oejwo';
$route['accounting/head/asset']					= 'Accounting/Head/Asset/get_asset';

$route['accounting/head/ris/pending_sai'] 			= 'Accounting/Head/RIS/pending_sai';
$route['accounting/head/ris/confirmed_sai'] 		= 'Accounting/Head/RIS/confirmed_sai';
$route['accounting/head/ris/rejected_sai'] 			= 'Accounting/Head/RIS/rejected_sai';
$route['accounting/head/ris/draft_sai'] 			= 'Accounting/Head/RIS/draft_sai';
$route['accounting/head/ris/cancelled_sai'] 		= 'Accounting/Head/RIS/cancelled_sai';
$route['accounting/head/ris/post_cancel_sai'] 		= 'Accounting/Head/RIS/post_cancel_sai';
$route['accounting/head/ris/last_sai'] 				= 'Accounting/Head/RIS/last_sai';
$route['accounting/head/ris/save_sai'] 				= 'Accounting/Head/RIS/save_sai';
$route['accounting/head/ris'] 						= 'Accounting/Head/RIS/get_sai';
$route['accounting/head/ris/inventory']				= 'Accounting/Head/RIS/inventory';

$route['it/oejwo']							= 'IT/OEJWO/get_oejwo';
$route['it/sai']							= 'IT/SAI/get_sai';
$route['it/ris']							= 'IT/RIS/get_ris';
$route['it/invoice']						= 'IT/Invoice/get_invoice';
$route['it/accounts_departments']						= 'IT/Accounts/get_accounts';
$route['it/all_accounts']					= 'IT/Accounts/get_all_accounts';
$route['it/accounts/all_departments']		= 'IT/Accounts/get_all_departments';
$route['it/add_user']						= 'IT/Accounts/add_user';
$route['it/edit_user']						= 'IT/Accounts/edit_user';
$route['it/all_departments']				= 'IT/Departments/all_departments';
$route['it/add_departments']				= 'IT/Departments/add_departments';

$route['gss/head/ppmp']						= 'GSS/Head/PPMP/get_ppmp';
$route['gss/head/ppmp/first_quarter']		= 'GSS/Head/PPMP/first_quarter';
$route['gss/head/ppmp/second_quarter']		= 'GSS/Head/PPMP/second_quarter';
$route['gss/head/ppmp/third_quarter']		= 'GSS/Head/PPMP/third_quarter';
$route['gss/head/ppmp/fourth_quarter']		= 'GSS/Head/PPMP/fourth_quarter';
$route['gss/head/ppmp/first_quarter_filename']		= 'GSS/Head/PPMP/first_quarter_filename';
$route['gss/head/ppmp/second_quarter_filename']		= 'GSS/Head/PPMP/second_quarter_filename';
$route['gss/head/ppmp/third_quarter_filename']		= 'GSS/Head/PPMP/third_quarter_filename';
$route['gss/head/ppmp/fourth_quarter_filename']		= 'GSS/Head/PPMP/fourth_quarter_filename';
$route['gss/head/ppmp/save_ppmp']			= 'GSS/Head/PPMP/save_ppmp';
$route['gss/head/ppmp/delete_ppmp']			= 'GSS/Head/PPMP/delete_ppmp';
$route['gss/head/ppmp/activate_ppmp']		= 'GSS/Head/PPMP/activate_ppmp';
$route['gss/head/ppmp/deactivate_ppmp']		= 'GSS/Head/PPMP/deactivate_ppmp';
$route['accounting/head/ppmp']						= 'Accounting/Head/PPMP/get_ppmp';
$route['accounting/head/ppmp/first_quarter']		= 'Accounting/Head/PPMP/first_quarter';
$route['accounting/head/ppmp/second_quarter']		= 'Accounting/Head/PPMP/second_quarter';
$route['accounting/head/ppmp/third_quarter']		= 'Accounting/Head/PPMP/third_quarter';
$route['accounting/head/ppmp/fourth_quarter']		= 'Accounting/Head/PPMP/fourth_quarter';
$route['accounting/head/ppmp/save_ppmp']			= 'Accounting/Head/PPMP/save_ppmp';
$route['accounting/head/ppmp/delete_ppmp']			= 'Accounting/Head/PPMP/delete_ppmp';
$route['accounting/head/ppmp/activate_ppmp']		= 'Accounting/Head/PPMP/activate_ppmp';
$route['head/ppmp']							= 'Head/PPMP/get_ppmp';
$route['head/ppmp/first_quarter']			= 'Head/PPMP/first_quarter';
$route['head/ppmp/second_quarter']			= 'Head/PPMP/second_quarter';
$route['head/ppmp/third_quarter']			= 'Head/PPMP/third_quarter';
$route['head/ppmp/fourth_quarter']			= 'Head/PPMP/fourth_quarter';
$route['head/ppmp/save_ppmp']				= 'Head/PPMP/save_ppmp';
$route['head/ppmp/delete_ppmp']				= 'Head/PPMP/delete_ppmp';
$route['head/ppmp/activate_ppmp']			= 'Head/PPMP/activate_ppmp';

$route['head/ris/pending_sai'] 				= 'Head/RIS/pending_sai';
$route['head/ris/confirmed_sai'] 			= 'Head/RIS/confirmed_sai';
$route['head/ris/rejected_sai'] 			= 'Head/RIS/rejected_sai';
$route['head/ris/draft_sai'] 				= 'Head/RIS/draft_sai';
$route['head/ris/cancelled_sai'] 			= 'Head/RIS/cancelled_sai';
$route['head/ris/post_cancel_sai'] 			= 'Head/RIS/post_cancel_sai';
$route['head/ris/last_sai'] 				= 'Head/RIS/last_sai';
$route['head/ris/save_sai'] 				= 'Head/RIS/save_sai';
$route['head/ris'] 							= 'Head/RIS/get_sai';
$route['head/ris/inventory']				= 'Head/RIS/inventory';

$route['head/sai']							= 'Head/SAI/get_sai';
$route['head/ris']							= 'Head/RIS/get_ris';
$route['head/invoice']						= 'Head/Invoice/get_invoice';
$route['head/items']						= 'Head/Items/get_items';
$route['head/current_quarter_items']		= 'Head/Items/current_quarter_items';

$route['head/oejwo']						= 'Head/OEJWO/get_oejwo';
$route['head/asset']						= 'Head/Asset/get_asset';
$route['head/account']						= 'Head/Account/get_account';

$route['user/sai']							= 'User/SAI/get_sai';
$route['user/sai/all_sai']					= 'User/SAI/all_sai';
$route['user/sai/last_sai']					= 'User/SAI/last_sai';
$route['user/sai/ppmp_items']				= 'User/SAI/ppmp_items';
$route['user/sai/save_sai']					= 'User/SAI/save_sai';

$route['user/ris']							= 'User/RIS/get_ris';
$route['user/invoice']						= 'User/Invoice/get_invoice';
$route['user/asset']						= 'User/Asset/get_asset';

$route['user/oejwo']						= 'User/OEJWO/get_oejwo';

