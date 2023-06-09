<?php
// echo '<pre>';
// print_r($routeMap);
// echo '</pre>';

$metaArr = [];
$routeName = (isset($routeMap['info']['name'])) ? $routeMap['info']['name']: '';
switch ($routeName) {
  case 'login':
    $metaArr = [
      'title' => 'ユーザーログイン｜LiquidCMS',
      'description' => 'LiquidCMSのユーザーログイン画面です。LiquidCMSアカウント情報を入力し、ログインしてください。アカウントをお持ちでない方は、新規会員登録画面よりユーザー登録お願いします。',
      'keywords' => 'LiquidCMS,ヘッドレスCMS,安い,使いやすい,マルチプラットフォーム対応',
    ];
    break;

  case 'home':
    $metaArr = [
      'title' => 'LiquidCMS',
      'description' => 'LiquidCMS',
      'keywords' => 'LiquidCMS,ヘッドレスCMS,安い,使いやすい,マルチプラットフォーム対応',
    ];
    break;

  case 'profile_edit':
    $metaArr = [
      'title' => 'プロフィール｜LiquidCMS',
      'description' => 'LiquidCMSのプロフィール編集画面です。LiquidCMSアカウント情報を編集可能です。また、この画面からログアウトすることができます。',
      'keywords' => 'LiquidCMS,ヘッドレスCMS,安い,使いやすい,マルチプラットフォーム対応',
    ];
    break;

  case 'contents_list':
    $metaArr = [
      'title' => 'コンテンツ一覧｜LiquidCMS',
      'description' => 'LiquidCMSのコンテンツ一覧です。編集したいコンテンツを選択してください。',
      'keywords' => 'LiquidCMS,ヘッドレスCMS,安い,使いやすい,マルチプラットフォーム対応',
    ];
    break;

  case 'contents_create':
    $metaArr = [
      'title' => 'コンテンツ追加｜LiquidCMS',
      'description' => 'LiquidCMSのコンテンツ追加です。新しいコンテンツを追加してからフィールド追加をしてください。',
      'keywords' => 'LiquidCMS,ヘッドレスCMS,安い,使いやすい,マルチプラットフォーム対応',
    ];
    break;

  case 'contents_edit':
    $metaArr = [
      'title' => 'コンテンツ編集｜LiquidCMS',
      'description' => 'LiquidCMSのコンテンツ編集です。現在のコンテンツを編集をすることができます。',
      'keywords' => 'LiquidCMS,ヘッドレスCMS,安い,使いやすい,マルチプラットフォーム対応',
    ];
    break;

  case 'contents_group_list':
    $metaArr = [
      'title' => 'グループ一覧｜LiquidCMS',
      'description' => 'LiquidCMSのグループ一覧です。編集したいグループを選択してください。',
      'keywords' => 'LiquidCMS,ヘッドレスCMS,安い,使いやすい,マルチプラットフォーム対応',
    ];
    break;

  case 'contents_group_create':
    $metaArr = [
      'title' => 'グループ追加｜LiquidCMS',
      'description' => 'LiquidCMSのグループ追加です。新しいグループを追加すると、コンテンツ管理の「グループ設定」より選択が可能になります。',
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