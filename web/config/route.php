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
    'path' => '/contents/create',
    'info' => [
      'name' => 'contents',
      'controller' => 'ContentssController',
      'params' => 'ContentssController',
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