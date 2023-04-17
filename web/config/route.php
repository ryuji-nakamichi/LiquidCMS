<?php

$routMap = [
  [
    'path' => '/',
    'info' => [
      'name' => 'home',
      'controller' => 'HomeController',
      'params' => 'test',
    ]
  ],
  [
    'path' => '/contents',
    'info' => [
      'name' => 'contents',
      'controller' => 'ContentsController',
      'params' => 'contents-test',
    ]
  ],
  [
    'path' => '/contents/{page}',
    'info' => [
      'name' => 'contents',
      'controller' => 'ContentsController',
      'params' => 'contents-test',
    ]
  ],
  [
    'path' => '/articles/{page}/page',
    'info' => [
      'name' => 'articles',
      'controller' => 'ArticlesController',
      'params' => 'articles-test',
    ]
  ],
  [
    'path' => '/test/{page}/tetst1/{id}',
    'info' => [
      'name' => 'articles',
      'controller' => 'TestController',
      'params' => 'articles-test',
    ]
  ],
];