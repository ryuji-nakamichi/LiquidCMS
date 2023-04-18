<?php
// echo '<pre>';
// print_r($routeMap);
// echo '</pre>';

$metaArr = [];
$routeName = (isset($routeMap['info']['name'])) ? $routeMap['info']['name']: '';
switch ($routeName) {
  case 'home':
    $metaArr = [
      'title' => 'LiquidCMS',
      'description' => 'LiquidCMS',
      'keywords' => 'LiquidCMS,ヘッドレスCMS,安い,使いやすい,マルチプラットフォーム対応',
    ];
    break;

  case 'contents':
    $metaArr = [
      'title' => 'コンテンツ追加｜LiquidCMS',
      'description' => 'LiquidCMSのコンテンツ追加です。新らしいコンテンツを追加してからフィールド追加をしてください。',
      'keywords' => 'LiquidCMS,ヘッドレスCMS,安い,使いやすい,マルチプラットフォーム対応',
    ];
    break;

  case 'field':
    $metaArr = [
      'title' => 'フィールド追加｜LiquidCMS',
      'description' => 'LiquidCMSのフィールド追加です。新着情報や商品情報など、様々なコンテンツを自身のHPに組み込むことが可能です。',
      'keywords' => 'LiquidCMS,ヘッドレスCMS,安い,使いやすい,マルチプラットフォーム対応',
    ];
    break;

  default:
    $metaArr = [
      'title' => 'ページが見つかりません｜LiquidCMS',
      'description' => 'お探しのページが見つかりません。URIをご確認いただき、再度アクセスをお願いいたします。それでも解決できない場合は、お手数ですがサポートへご連絡いただければ幸いです。',
      'keywords' => 'LiquidCMS,ヘッドレスCMS,安い,使いやすい,マルチプラットフォーム対応',
    ];
}
?>


<title><?=$metaArr['title']?></title>
<meta name="description" content="<?=$metaArr['description']?>">
<meta name=”keywords” content=”<?=$metaArr['keywords']?>”>