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
// $route['default_controller'] = 'welcome';
$route['default_controller'] = 'logincontroller';
$route['404_override'] = '';

/*
| -------------------------------------------------------------------------
| Login controllers and Logout
| -------------------------------------------------------------------------
*/
$route['login'] = "logincontroller";
$route['check-user']="logincontroller/check_login";
$route['logout']="logincontroller/logout";

/*
| -------------------------------------------------------------------------
| admin functionality
| -------------------------------------------------------------------------

*/
$route['admin-dashboard'] = "admin_user/dashboard";
//location view 
$route['Add-visiting_location-form']="admin_user/visit_location";
// checking location 
$route['location_checks']="admin_user/check_locations";
// location name save in data base
$route['Add-Location']="admin_user/Add_locatin_save";
//update status of place 
$route['update-location-status/(:any)/(:any)']='admin_user/update_location_status/$1/$2';

//add view gates 
$route['Add-visiting-gate-location-form']="admin_user/Add_visiting_gate_location_form";
// gate_checks
$route['gate-checks']="admin_user/gate_checks";
// Add-Gate insert
$route['Add-Gate']="admin_user/Add_Gate_save";

// View-payment-pending-Application
$route['View-payment-pending-Application']="admin_user/View_payment_pending_Application";
// update-payment-status
$route['update-payment-fail-status/(:any)/(:any)/(:any)']="admin_user/update_payment_fail_status/$1/$2/$3";
//View-received-Application
$route['View-received-Application']="admin_user/View_received_Application";
// view-received-applivation-details
$route['view-received-application-details/(:any)']="admin_user/View_received_Application_details/$1";
//save-details-conform-personal
 $route['save-details-conform-personal']="admin_user/save_details_confirm_personal";

//View_received_approved_personal_Application
$route['View-received-approved-personal-Application']="admin_user/View_received_approved_personal_Application";
//view-personal-approved-application-details
$route['view-personal-approved-application-details/(:any)']="admin_user/view_personal_approved_application_details/$1";
// save-details-conform-Vehicle
$route['save-details-conform-Vehicle']="admin_user/save_details_conform_Vehicle";
// enereate-Pass-list
$route['genereate-Pass-list']="admin_user/genereate_Pass_list";
// admin-generate-pass
$route['admin-generate-pass/(:any)']="admin_user/admin_generate_pass/$1";
//
$route['translate_uri_dashes'] = FALSE;
/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
