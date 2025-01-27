<?php

$router->map('GET', '/company', 'CompanyController#index');
$router->map('POST', '/company', 'CompanyController#add');
$router->map('DELETE', '/company/[i:id]', 'CompanyController#delete');
$router->map('GET', '/company/[i:id]/edit', 'CompanyController#edit');
$router->map('PUT', '/company/[i:id]', 'CompanyController#update');