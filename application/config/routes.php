<?php
$route['news/create'] = 'news/create';
$route['news/edit/(:any)'] = 'news/create/$1';
$route['news/delete/(:any)'] = 'news/delete/$1';


$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';