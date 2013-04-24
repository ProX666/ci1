<?php
$route['news/create'] = 'news/create';
$route['news/edit/(:any)'] = 'news/edit/$1';
$route['news/delete/(:any)'] = 'news/delete/$1';


$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';
$route['news/index'] = 'news';
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';