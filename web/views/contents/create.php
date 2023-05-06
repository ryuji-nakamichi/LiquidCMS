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
                <div>
                  <?php require_once(INCLUDE_BLOCK_PATH . 'step.php'); ?>
                  <div class="g-contact-frame">
                    <?php require_once(INCLUDE_BLOCK_PATH . 'contents/result.php'); ?>
                  </div>
                  <div class="g-contact-frame">
                    <?php require_once(INCLUDE_BLOCK_PATH . 'contents/head.php'); ?>
                    <div class="g-contact-form-container">
                      <form id="g-contact-form" class="g-contact-form" method="post">
                        <div class="g-contact-form-contents">
                          <?php require_once(INCLUDE_BLOCK_PATH . 'contents/input.php'); ?>
                        </div>
                      </form>
                    </div>
                  </div>
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