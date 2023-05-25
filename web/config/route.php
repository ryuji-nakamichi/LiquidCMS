<?php

$routeMap = [
  [
    'path' => '/',
    'info' => [
      'name' => 'home',
      'controller' => 'HomeController',
      'params' => 'HomeController',
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
    'path' => '/contents/{id}',
    'info' => [
      'name' => 'contents_edit',
      'controller' => 'Contents/ContentsEditController',
      'params' => 'ContentsEditController',
    ]
  ],
  [
    'path' => '/contents/group/list',
    'info' => [
      'name' => 'contents_group_list',
      'controller' => 'Contents/ContentsGroupListController',
      'params' => 'ContentsGroupListController',
    ]
  ],
  [
    'path' => '/contents/group/create',
    'info' => [
      'name' => 'contents_group_create',
      'controller' => 'Contents/ContentsGroupCreateController',
      'params' => 'ContentsGroupCreateController',
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