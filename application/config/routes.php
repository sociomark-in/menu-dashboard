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
$route['default_controller'] = 'pages';

$route['login'] = 'pages/login';
$route['logout'] = 'auth/logout';

$route['api-auth-login'] = 'auth/login';
$route['api-auth-register'] = 'auth/register';

$route['api-menu-item/new'] = 'MenuController/menu_item_add';
$route['api-menu-item/(:any)/delete'] = 'MenuController/menu_item_delete/$1';
$route['api-menu-item/(:any)/edit'] = 'MenuController/menu_item_edit/$1';

$route['api-category/new'] = 'MenuController/category_add';
$route['api-category/(:any)/delete'] = 'MenuController/category_delete/$1';
$route['api-category/(:any)/edit'] = 'MenuController/category_edit/$1';

$route['register'] = 'dashboard/register';

$route['trl-admin'] = 'dashboard/index';
$route['trl-admin/menu'] = 'dashboard/menu_master';
$route['trl-admin/menu/categories'] = 'dashboard/categories_all';
$route['trl-admin/menu/category/(:any)/menu-items'] = 'dashboard/menu_items/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
