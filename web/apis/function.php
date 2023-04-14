<?php

function getFormVal ($data = []) {

  $_data = $data;

  // ラジオボタンの値取得
  $types = $_data['type'];
  foreach ((array)$types AS $key => $val) {
    if ($val) {
      $type = $val;
    }
  }

  $name = ($_data['name']) ? $_data['name']: '';
  $kana = ($_data['kana']) ? $_data['kana']: '';
  $tel = ($_data['tel']) ? $_data['tel']: '';
  $email = ($_data['email']) ? $_data['email']: '';
  $message = ($_data['message']) ? $_data['message']: '';
  $privacy_agree = ($_data['privacy-agree']) ? $_data['privacy-agree']: '';


  $_data['type'] = htmlspecialchars($type, ENT_QUOTES, 'UTF-8');
  $_data['name'] = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
  $_data['kana'] = htmlspecialchars($kana, ENT_QUOTES, 'UTF-8');
  $_data['tel'] = htmlspecialchars($tel, ENT_QUOTES, 'UTF-8');
  $_data['email'] = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
  $_data['message'] = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
  $_data['privacy-agree'] = htmlspecialchars($privacy_agree, ENT_QUOTES, 'UTF-8');

  return $_data;
}