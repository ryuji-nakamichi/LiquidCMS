<?php
$jsArr = [];
$routeName = (isset($routeMap['info']['name'])) ? $routeMap['info']['name']: '';
switch ($routeName) {
  case 'home':
    $jsArr = [
      '<script src="/assets/js/home.js"></script>'
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
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
crossorigin="anonymous"></script>
<script src="/assets/js/form.js"></script>
<script src="/assets/js/common.js"></script>
<?php foreach($jsArr AS $key => $val) { ?>
<?=$val?>
<?php } ?>
<script src="/assets/js/animation.js"></script>
<script src="/assets/js/customize.js"></script>