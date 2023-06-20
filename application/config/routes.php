<?php
defined('BASEPATH') OR exit('No direct script access allowed');




$route['admin'] = 'Admin';
$route['userhome'] = 'userhome';
$route['login'] = 'Auth/login';
$route['login/post'] = 'Auth/login_post';
$route['register'] = 'Auth/register';
$route['register/post'] = 'Auth/register_post';
$route['logout'] = 'Auth/logout';
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
