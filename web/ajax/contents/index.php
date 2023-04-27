<?php

header('Content-Type: application/json; charset=utf-8');

$data['res'] = [];
if ( // Ajax通信か判定
  isset($_SERVER['HTTP_X_REQUESTED_WITH'])
  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
) {

  $name = ($_POST['name']) ? $_POST['name']: '';
  $category = ($_POST['category']) ? $_POST['category']: '';

  $data['res']['posts'] = array(
    'name' => $name,
    'category' => $category,
  );
  $data['res']['status'] = 'ok';
} else {
  $data['res']['status'] = 'ng';
}

echo json_encode($data);
