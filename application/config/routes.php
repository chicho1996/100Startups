<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Nav/home';

$route['blog/(:any)'] = 'main/$1';

$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;
