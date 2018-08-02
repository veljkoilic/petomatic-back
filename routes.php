<?php

$router->get('trainings', 'PagesController@allTrainings');
$router->get('trainings/training', 'PagesController@singleTraining');
$router->get('contact', 'PagesController@contact');
$router->get('products', 'PagesController@products');

$router->post('task/add', 'PagesController@storeTask');

$router->get('admin/login', "Authenticate@login");
$router->get('admin/signup', "Authenticate@signup");
$router->post('admin/createuser', "Authenticate@createuser");
$router->post('admin/validate', "Authenticate@validate");
$router->get('admin/logout', "Authenticate@logout", true);



$router->get('admin/trainings', "ProductsController@index", true);
$router->get('admin/trainings/create', "ProductsController@create", true);
$router->post('admin/trainings', "ProductsController@store", true);
$router->get('admin/trainings/show', "ProductsController@show", false);
$router->get('admin/trainings/edit', "ProductsController@edit", true);
$router->post('admin/products/update', "ProductsController@update", true);
$router->post('admin/products/destroy', "ProductsController@destroy", true);



