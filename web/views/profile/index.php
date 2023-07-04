
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');
require_once(INCLUDE_BLOCK_PATH . 'common/head.php');
require_once(INCLUDE_BLOCK_PATH . 'common/start.php');
?>
<div class="l-main-whole-wrapper">
  <div class="l-config-wrapper">
    <?php require_once(INCLUDE_BLOCK_PATH . 'common/header.php'); ?>
    <?php require_once(INCLUDE_BLOCK_PATH . 'common/nav.php'); ?>
  </div>
  <div class="l-main-wrapper">
    <div class="g-page-head">
      <div class="c-contents-outer --g-page-head">
        <div class="c-contents-inner --g-page-head">
          <?php require_once(INCLUDE_BLOCK_PATH . 'common/page_name.php'); ?>
          <?php require_once(INCLUDE_BLOCK_PATH . 'common/field_create.php'); ?>
        </div>
      </div>
    </div>
    <div class="g-page-main">
      <div class="c-contents-outer --g-page-main">
        <div class="c-contents-inner --g-page-main">
          <?php require_once(INCLUDE_BLOCK_PATH . 'common/contents_head.php'); ?>
          <div class="profile-contents">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once(INCLUDE_BLOCK_PATH . 'common/footer.php'); ?>
<?php require_once(INCLUDE_BLOCK_PATH . 'common/end.php'); ?>