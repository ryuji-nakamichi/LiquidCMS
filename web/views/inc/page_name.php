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

  case 'field':
    $pageInfoArr = [
      'title' => 'フィールド新規登録',
      'description' => 'フィールド新規登録画面です。',
    ];
    break;

  default;
    $pageInfoArr = [
      'title' => 'ページが見つかりません｜LiquidCMS',
      'description' => 'お探しのページが見つかりません。URIをご確認いただき、再度アクセスをお願いいたします。それでも解決できない場合は、お手数ですがサポートへご連絡いただければ幸いです。',
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