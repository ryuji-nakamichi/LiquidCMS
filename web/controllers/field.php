<?php

header('Content-Type: application/json; charset=utf-8');

$data['res'] = [];
if (
  isset($_SERVER['HTTP_X_REQUESTED_WITH'])
  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
) {

  $name = ($_POST['name']) ? $_POST['name']: '';
  $category = ($_POST['category']) ? $_POST['category']: '';

  $data['res']['posts'] = array(
    'name' => $name,
    'category' => $category,
  );
  $data['res']['status'] = 200;
}

echo json_encode($data);
