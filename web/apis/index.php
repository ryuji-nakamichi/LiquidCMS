<?php

require_once('config.php');
require_once('function.php');

$posts = $_POST;
$data = getFormVal($posts);


// メール送信
mb_language("Japanese");
mb_internal_encoding("UTF-8");

$common_reply_footer = <<<EOM

-------------------------------
このメールは、{$config['subject.prefix']}(${config['site.url']})のお問い合わせフォームから送信されました

EOM;

$admin_reply_header = <<<EOM

以下の問い合わせがありました。

EOM;

$user_reply_header = <<<EOM

{$config['subject.prefix']}からのメールです。
お問い合わせありがとうございました。

EOM;

$common_reply_content = <<<EOM

お問い合わせ内容は以下になります。

お問い合わせ種別 : {$data['type']}
お名前 : {$data['name']}
ふりがな : {$data['kana']}
TEL : {$data['tel']}
メールアドレス : {$data['email']}
お問い合わせ内容 : {$data['message']}
個人情報保護の同意 : {$data['privacy-agree']}

EOM;

$admin_reply_body = <<<EOM

{$admin_reply_header}

{$common_reply_content}

{$common_reply_footer}

EOM;

$user_reply_body = <<<EOM

{$user_reply_header}

{$common_reply_content}

{$common_reply_footer}

EOM;

$reply_email = $data['email'];
$reply_title = $config['subject.prefix'];


// $header  = 'MIME-Version: 1.0' . "\r\n";
// $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
// $header .= 'From: '. $config['from'] . "\r\n" . 'Reply-To: ' . $config['from']. "\r\n" . 'X-Mailer: PHP/' . phpversion();

// $header = '';
// $header .= "Content-Type: text/plain \r\n";
// $header .= "Return-Path: " . $config['from'] . " \r\n";
// $header .= "From: " . $reply_title ." \r\n";
// $header .= "Sender: " . $config['from'] ." \r\n";
// $header .= "Reply-To: " . $config['admin.email'] . " \r\n";
// $header .= "Organization: " . $reply_title . " \r\n";
// $header .= "X-Sender: " . $config['from'] . " \r\n";
// $header .= "X-Priority: 3 \r\n";

$header = "From:{$config['admin.email']}";

try {
  mb_send_mail($config['admin.email'], $reply_title, $admin_reply_body, $header);
  mb_send_mail($reply_email, $reply_title, $user_reply_body, $header);

  echo json_encode(['status' => 200, 'send_flag' => 1]);
} catch(\Trowable $th) {
  echo json_encode([
      'status' => 403,
      'message' => '送信エラーが発生しました。お手数ですが、少しお待ちしてからリロードして再度フォームのご入力をお願いします。',
      'error' => $th
  ]);
}

// echo json_encode($data);
