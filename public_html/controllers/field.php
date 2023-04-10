<?php

header("Content-type: text/plain; charset=UTF-8");

$data['form'] = '';

if (
  isset($_SERVER['HTTP_X_REQUESTED_WITH'])
  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
) {

  $field_name = ($_POST['field_name']) ? $_POST['field_name']: '';
  $field_id = ($_POST['field_id']) ? $_POST['field_id']: '';

  $data['form'] = array(
    'field_id' => $field_id,
    'field_name' => $field_name,
  );
}
echo json_encode($data);
