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
$route['default_controller'] = 'Driving';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// =====================for frontend  pages=================================

$route['Driving'] = 'Driving/index';
$route['Privacy-Policy'] = 'Driving/pp';
$route['Terms-Conditions'] = 'Driving/tt';//for instructor
$route['Terms-Conditions2'] = 'Driving/tt2';//for student
$route['covid'] = 'Driving/covid';
$route['Book-Class'] = 'Driving/book_class';
$route['Login'] = 'Driving/login';
$route['Logout'] = 'Driving/logout';
$route['Filter'] = 'Driving/filter';


// =====================for Student pages=================================

$route['Student-Login'] = 'Student/login';
$route['Student-Signin'] = 'Student/signin';
$route['Student-Signup'] = 'Student/signup';
$route['Student-Ready'] = 'Student/ready';
$route['Student-UpdateProfile'] = 'Student/updateprofile';
$route['Student-MyProfile/(:num)'] = 'Student/myprofile/$1';
$route['Verification/(:num)'] = 'Student/VerificationEmail/$1';
$route['user_login_page/(:any)'] = 'front_controller/login_page';
$route['ProfileImage'] = 'Student/instimageupdate';


// =====================for Instructor  pages=================================
$route['updateaddpostcode/(:any)/(:any)'] = 'Instructor/ready/$1/$2';
$route['Deletetimeslot/(:any)/(:any)'] = 'Instructor/ready/$1/$2';
$route['Instructor-Ready'] = 'Instructor/ready';
$route['Instructor-Login'] = 'Instructor/login';
$route['Instructor-Signin'] = 'Instructor/signin';
$route['Instructor-Signup'] = 'Instructor/signup';
$route['Instructor-ImageUpdate'] = 'Instructor/instimageupdate';
$route['MyProfile/(:any)'] = 'Instructor/myprofile/$1';
$route['Instructor-UpdateProfile'] = 'Instructor/updateprofile';
$route['Instructor-InsertManualCharges'] = 'Instructor/InsertmanualCharges';
$route['Instructor-InsertAutoCharges'] = 'Instructor/InsertautoCharges';
$route['Instructor-InsertCharges'] = 'Instructor/InsertCharges';
$route['Verification-Email/(:num)'] = 'Instructor/VerificationEmail/$1';
 
 