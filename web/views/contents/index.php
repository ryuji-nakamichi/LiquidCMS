<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');
require_once(INCLUDE_BLOCK_PATH . 'head.php');
require_once(INCLUDE_BLOCK_PATH . 'start.php');
?>
<div id="contents-app">
  <div class="l-main-whole-wrapper">
    <div class="l-config-wrapper">
      <?php require_once(INCLUDE_BLOCK_PATH . 'header.php'); ?>
      <?php require_once(INCLUDE_BLOCK_PATH . 'nav.php'); ?>
    </div>
    <div class="l-main-wrapper">
      <div class="g-page-head">
        <div class="c-contents-outer --g-page-head">
          <div class="c-contents-inner --g-page-head">
            <?php require_once(INCLUDE_BLOCK_PATH . 'page_name.php'); ?>
            <?php require_once(INCLUDE_BLOCK_PATH . 'field_create.php'); ?>
          </div>
        </div>
      </div>
      <div class="g-page-main">
        <div class="c-contents-outer --g-page-main">
          <div class="c-contents-inner --g-page-main">
            <?php require_once(INCLUDE_BLOCK_PATH . 'contents_head.php'); ?>
            <div class="c-form-blk">
              <div class="g-contact-contents">
                <div class="g-contact-frame --input">
                  <div class="g-contact-lead --input">
                    <p class="g-contact-lead-txt">以下の編集したいレコードを選択してください。</p>
                  </div>
                  <?php require_once(INCLUDE_BLOCK_PATH . 'contents/record_list.php'); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once(INCLUDE_BLOCK_PATH . 'footer.php'); ?>
<?php require_once(INCLUDE_BLOCK_PATH . 'end.php'); ?>