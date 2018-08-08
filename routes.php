<?php
//TODO: Add functions for editing stuff
//Staff routes
$router->post('staff/login', 'Authenticate@login', false);
$router->post('staff/logout', 'Authenticate@logout');
$router->post('staff/create', 'Authenticate@createuser');

//Client routes
$router->get('clients', 'ClientController@allClients');
$router->get('clients/{clientId}', 'ClientController@singleClient');
$router->post('clients/{clientId}', 'ClientController@editClient');
$router->post('clients', 'ClientController@addClient');

//Pets routes
$router->get('pets', 'PetsController@allPets');
$router->get('pets/{petId}', 'PetsController@singlePet');
$router->get('client/pets/{clientID}', 'PetsController@getAllClientPets');
$router->post('pets/{petId}', 'PetsController@editPet');
$router->post('pets', 'PetsController@addPet');
$router->get('pet/visits/{petId}', 'PetsController@getAllPetsVisits');

//Visit routes
$router->get('visits', 'VisitsController@allVisits');
$router->get('visits/today', 'VisitsController@todaysVisits');
$router->get('visits/{visitId}', 'VisitsController@singleVisit');
$router->post('visits/{visitId}', 'VisitsController@editVisit');
$router->post('visits', 'VisitsController@addVisit');

$router->get('breeds', 'PetsController@breeds');








//$router->get('trainings', 'ClientController@allTrainings');
//$router->get('trainings/training', 'ClientController@singleTraining');
//$router->get('contact', 'ClientController@contact');
//$router->get('products', 'ClientController@products');
//
//$router->post('task/add', 'ClientController@storeTask');
//
//$router->get('admin/login', "Authenticate@login");
//$router->get('admin/signup', "Authenticate@signup");
//$router->post('admin/createuser', "Authenticate@createuser");
//$router->post('admin/validate', "Authenticate@validate");
//$router->get('admin/logout', "Authenticate@logout", true);
//
//
//
//$router->get('admin/trainings', "ProductsController@index", true);
//$router->get('admin/trainings/create', "ProductsController@create", true);
//$router->post('admin/trainings', "ProductsController@store", true);
//$router->get('admin/trainings/show', "ProductsController@show", false);
//$router->get('admin/trainings/edit', "ProductsController@edit", true);
//$router->post('admin/products/update', "ProductsController@update", true);
//$router->post('admin/products/destroy', "ProductsController@destroy", true);



