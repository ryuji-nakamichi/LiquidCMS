<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');
require_once(INCLUDE_BLOCK_PATH . 'head.php');
require_once(INCLUDE_BLOCK_PATH . 'start.php');
?>
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
          <div class="c-annouceList-wrapper">
            <div class="c-lead">
              <p class="c-lead-txt">もしかしたら以下の可能性がございます。</p>
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
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once(INCLUDE_BLOCK_PATH . 'footer.php'); ?>
<?php require_once(INCLUDE_BLOCK_PATH . 'end.php'); ?>