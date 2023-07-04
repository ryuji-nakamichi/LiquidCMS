<?php
$cssArr = [];
$routeName = (isset($routeMap['info']['name'])) ? $routeMap['info']['name']: '';
switch ($routeName) {
  case 'login':
    $cssArr = [
      '<link rel="stylesheet" href="/assets/css/login.css">'
    ];
    break;

  case 'home':
    $cssArr = [
      '<link rel="stylesheet" href="/assets/css/home.css">'
    ];
    break;

  case 'profile_edit':
    $jsArr = [
      '<link rel="stylesheet" href="/assets/css/profile/index.css">'
    ];
    break;


  case 'field':
    $cssArr = [
      ''
    ];
    break;

  default:
    $cssArr = [
      ''
    ];
}
?>
<link rel="stylesheet" href="/assets/css/reset.css">
<link rel="stylesheet" href="/assets/css/setting.css">
<link rel="stylesheet" href="/assets/css/utility.css">
<link rel="stylesheet" href="/assets/css/components.css">
<link rel="stylesheet" href="/assets/css/layouts.css">
<link rel="stylesheet" href="/assets/css/common.css">
<link rel="stylesheet" href="/assets/css/form.css">
<?php foreach($cssArr AS $key => $val) { ?>
<?=$val?>
<?php } ?>
<link rel="stylesheet" href="/assets/css/animation.css">
<link rel="stylesheet" href="/assets/css/customize.css">