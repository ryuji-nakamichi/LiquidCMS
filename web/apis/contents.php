<?php

header("Content-type: text/plain; charset=UTF-8");

$data['form'] = '';

if (
  isset($_SERVER['HTTP_X_REQUESTED_WITH'])
  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
) {

  $name = ($_POST['name']) ? $_POST['name']: '';
  $category = ($_POST['category']) ? $_POST['category']: '';

  $data['form'] = array(
    'name' => $name,
    'category' => $category,
  );
}
echo json_encode($data);
