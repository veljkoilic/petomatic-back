<?php
//Staff routes
$router->post('staff/login', 'Authenticate@login', false);
$router->post('staff/logout', 'Authenticate@logout', false);
$router->post('staff/create', 'Authenticate@createuser', false);

//Client routes
$router->get('clients', 'ClientController@allClients', false);
$router->get('clients/{clientId}', 'ClientController@singleClient', false);
$router->post('clients/{clientId}', 'ClientController@editClient', false);
$router->post('clients', 'ClientController@addClient', false);

//Pets routes
$router->get('pets', 'PetsController@getAllPets', false);
$router->get('pets/{petId}', 'PetsController@singlePet', false);
$router->get('client/pets/{clientID}', 'PetsController@getAllClientPets', false);
$router->post('pets/{petId}', 'PetsController@editPet', false);
$router->post('pets', 'PetsController@addPet', false);
$router->get('pet/visits/{petId}', 'PetsController@getAllPetsVisits', false);

//Visit routes
$router->get('visits', 'VisitsController@allVisits', false);
$router->get('visits/today', 'VisitsController@todaysVisits', false);
$router->get('visits/{visitId}', 'VisitsController@singleVisit', false);
$router->post('visits/{visitId}', 'VisitsController@editVisit', false);
$router->post('visits', 'VisitsController@addVisit', false);

$router->get('breeds', 'PetsController@breeds', false);
$router->post('breeds', 'PetsController@addBreed', false);

$router->get('types', 'VisitsController@type', false);
$router->post('types', 'VisitsController@addType', false);



