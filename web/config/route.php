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
    'path' => '/contents/list',
    'info' => [
      'name' => 'contents_list',
      'controller' => 'Contents/ContentsListController',
      'params' => 'ContentsListController',
    ]
  ],
  [
    'path' => '/contents/create',
    'info' => [
      'name' => 'contents_create',
      'controller' => 'Contents/ContentsCreateController',
      'params' => 'ContentsCreateController',
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