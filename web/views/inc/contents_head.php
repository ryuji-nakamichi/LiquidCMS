<?php
// echo '<pre>';
// print_r($routeMap);
// echo '</pre>';

$contentsHeadInfoArr = [];
$routeName = (isset($routeMap['info']['name'])) ? $routeMap['info']['name']: '';
switch ($routeName) {
  case 'home':
    $contentsHeadInfoArr = [
      'title' => 'ダッシュボード',
    ];
    break;

  case 'contents_list':
    $contentsHeadInfoArr = [
      'title' => 'コンテンツ一覧',
    ];
    break;

  case 'contents_create':
    $contentsHeadInfoArr = [
      'title' => 'コンテンツ登録',
    ];
    break;

  case 'field':
    $contentsHeadInfoArr = [
      'title' => '新規登録',
    ];
    break;

  default;
    $contentsHeadInfoArr = [
      'title' => 'ページが見つかりません',
    ];
}
?>
<div class="g-page-mainTtl c-head-lv">
  <h2 class="mainTtl-txt c-head-lv-2"><?=$contentsHeadInfoArr['title']?></h1>
</div>