<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');
require_once(INCLUDE_BLOCK_PATH . 'common/head.php');
require_once(INCLUDE_BLOCK_PATH . 'common/start.php');
?>
<div id="contents-app">
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
            <div class="c-form-blk">
              <div class="g-contact-contents">
                <div>
                  <?php if (count($contentsEditView)) { ?>
                  <?php require_once(INCLUDE_BLOCK_PATH . 'step.php'); ?>
                  <?php } ?>

                  <?php if (count($contentsEditView)) { ?>
                  <div class="g-contact-frame">
                    <?php require_once(INCLUDE_BLOCK_PATH . 'contents/result.php'); ?>
                  </div>
                  <?php } ?>

                  <div class="g-contact-frame">
                    <?php if (count($contentsEditView)) { ?>
                    <?php require_once(INCLUDE_BLOCK_PATH . 'contents/head.php'); ?>
                    <?php } ?>
                    <?php if (count($contentsEditView)) { ?>
                    <div class="g-contact-form-container">
                      <form id="g-contact-form" class="g-contact-form" method="post">
                        <div class="g-contact-form-contents">
                          <?php require_once(INCLUDE_BLOCK_PATH . 'contents/edit.php'); ?>
                        </div>
                      </form>
                    </div>
                    <?php } else { ?>
                    <div class="c-annouceList-wrapper">
                      <div class="c-lead">
                        <p class="c-lead-txt">お探しのデータは現在、登録されていないようです。</p>
                        <p class="c-lead-txt">また、下記の可能性もございますので、ご確認いただきますようお願い致します。</p>
                      </div>
                      <div class="c-annouceList-container">
                        <ul class="c-annouceList">
                          <li class="list__item">
                            <p class="item__des">
                              <span class="item__des-inner">アクセスされているURIが違う</span>
                            </p>
                            <p class="item__des">
                              <span class="item__mark">※</span>
                              <span class="item__des-inner">アドレスバーに表示されているURIをご確認ください。</span>
                            </p>
                          </li>
                          <li class="list__item">
                            <p class="item__des">
                              <span class="item__des-inner">「コンテンツ管理」より追加されたコンテンツ管理ページが削除されてしまった。</span>
                            </p>
                            <p class="item__des">
                              <span class="item__mark">※</span>
                              <span class="item__des-inner">複数人で管理されている場合は他の担当者の方がリアルタイムで削除なさった可能性もございますので、その場合はその方へご連絡をお取り合ってご確認ください。</span>
                            </p>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <?php } ?>
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
<?php require_once(INCLUDE_BLOCK_PATH . 'common/footer.php'); ?>
<?php require_once(INCLUDE_BLOCK_PATH . 'common/end.php'); ?>