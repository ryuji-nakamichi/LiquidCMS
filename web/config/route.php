<?php

$routeMap = [
  [
    'path' => '/',
    'info' => [
      'name' => 'home',
      'controller' => 'HomeController',
      'params' => 'test',
    ]
  ],
  [
    'path' => '/field/create',
    'info' => [
      'name' => 'field',
      'controller' => 'FieldsController',
      'params' => 'FieldsController',
    ]
  ],
];