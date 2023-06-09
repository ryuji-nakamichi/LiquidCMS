<?php
$jsArr = [];
$routeName = (isset($routeMap['info']['name'])) ? $routeMap['info']['name']: '';
switch ($routeName) {
  case 'login':
    $jsArr = [
      '<script src="/assets/js/login.js"></script>'
    ];
    break;

  case 'home':
    $jsArr = [
      '<script src="/assets/js/home.js"></script>'
    ];
    break;

  case 'profile_edit':
    $jsArr = [
      '<script src="/assets/js/profile/index.js"></script>'
    ];
    break;

  case 'contents_list':
    $jsArr = [
      '<script src="/assets/js/contents/list.js"></script>'
    ];
    break;

  case 'contents_edit':
    $jsArr = [
      '<script src="/assets/js/contents/edit.js"></script>'
    ];
    break;

  case 'contents_create':
    $jsArr = [
      '<script src="/assets/js/contents/create.js"></script>'
    ];
    break;

  case 'contents_group_list':
    $jsArr = [
      '<script src="/assets/js/contents/group/list.js"></script>'
    ];
    break;

  case 'contents_group_create':
    $jsArr = [
      '<script src="/assets/js/contents/group/create.js"></script>'
    ];
    break;

  case 'field':
    $jsArr = [
      '<script src="/assets/js/field.js"></script>'
    ];
    break;

  default:
    $jsArr = [
      ''
    ];
}
?>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
crossorigin="anonymous"></script>
<script src="/assets/js/common.js"></script>
<?php foreach($jsArr AS $key => $val) { ?>
<?=$val?>
<?php } ?>
<script src="/assets/js/animation.js"></script>
<script src="/assets/js/customize.js"></script>