<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Urls';

$route['login'] = 'User/Login';
$route['logout'] = 'User/Logout';
$route['user'] = 'User/Index';
$route['user/register'] = 'User/Register';
$route['my-urls'] = 'User/Urls';
$route['change-pass'] = 'User/UpdatePassword';
$route['(:any)'] = 'Urls/Go';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
