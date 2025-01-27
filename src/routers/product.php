<?php

$router->map('GET', '/product', 'ProductController#index');
$router->map('POST', '/product', 'ProductController#add');
$router->map('DELETE', '/product/[i:id]', 'ProductController#delete');
$router->map('GET', '/product/[i:id]/edit', 'ProductController#edit');
$router->map('PUT', '/product/[i:id]', 'ProductController#update');