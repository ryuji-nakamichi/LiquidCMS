<?php
// echo '<pre>';
// print_r($routeMap);
// echo '</pre>';

$pageInfoArr = [];
$routeName = (isset($routeMap['info']['name'])) ? $routeMap['info']['name']: '';
switch ($routeName) {
  case 'home':
    $pageInfoArr = [
      'title' => 'ダッシュボード',
      'description' => 'ログイン後のHOME画面です。',
    ];
    break;

  case 'profile_edit':
    $pageInfoArr = [
      'title' => 'プロフィール',
      'description' => 'プロフィールの編集画面です。',
    ];
    break;

  case 'contents_list':
    $pageInfoArr = [
      'title' => 'コンテンツ一覧',
      'description' => 'コンテンツ一覧画面です。',
    ];
    break;

  case 'contents_create':
    $pageInfoArr = [
      'title' => 'コンテンツ新規登録',
      'description' => 'コンテンツ新規登録画面です。',
    ];
    break;

  case 'contents_edit':
    $pageInfoArr = [
      'title' => 'コンテンツ編集',
      'description' => 'コンテンツ編集画面です。',
    ];
    break;

  case 'contents_group_list':
    $pageInfoArr = [
      'title' => 'グループ一覧',
      'description' => 'グループ一覧画面です。',
    ];
    break;

  case 'contents_group_create':
    $pageInfoArr = [
      'title' => 'グループ新規登録',
      'description' => 'グループ新規登録画面です。',
    ];
    break;

  case 'field':
    $pageInfoArr = [
      'title' => 'フィールド新規登録',
      'description' => 'フィールド新規登録画面です。',
    ];
    break;

  default;
    $pageInfoArr = [
      'title' => 'ページが見つかりません',
      'description' => "お探しのページが見つかりません。URIをご確認いただき、再度アクセスをお願いいたします。<br>それでも解決できない場合は、お手数ですがサポートへご連絡いただければ幸いです。",
    ];
}
?>

<div class="g-page-head__contents">
  <div class="g-page-head__pageName c-head-lv">
    <h1 class="pageName-ttl c-head-lv-1"><?=$pageInfoArr['title']?></h1>
  </div>
  <div class="g-page-head__pageDes c-lead">
    <p class="pageDes-txt c-lead-txt"><?=$pageInfoArr['description']?></p>
  </div>
</div>