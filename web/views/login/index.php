
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');
require_once(INCLUDE_BLOCK_PATH . 'common/head.php');
require_once(INCLUDE_BLOCK_PATH . 'common/start.php');
?>
<div class="login-container">
  <div class="login-frame">
    <div class="login-wrapper">
      <div class="login-logo">
        <p class="login-logo__logo">
          <img src="/assets/img/common/logo_liquidcms.svg" alt="LiquidCMSのロゴ">
        </p>
      </div>
      <div class="login-lead">
        <p class="login-lead__txt">LiquidCMSアカウント情報を入力し、<br class="u-show-sp">ログインしてください。<br>アカウントをお持ちでない方は、<br class="u-show-sp"><a class="login-lead__txt-link" href="#">こちらからご登録可能</a>です。</p>
      </div>
      <div class="login-contents">
        <div class="form-blk-inner">
          <div class="g-contact-form-blk --name">
            <div class="form-blk-lbl">
              <label class="form-blk-lbl-name" for="user">ユーザー名</label>
            </div>
            <div class="form-blk-input">
              <input id="user" class="user form-blk-input-field js-post-field" type="text" name="user" data-preg="alpha" data-num="1" data-tag="text">
              <p class="form-blk-input-err"></p>
            </div>
          </div>
          <div class="g-contact-form-blk --password">
            <div class="form-blk-lbl">
              <label class="form-blk-lbl-name" for="password">パスワード</label>
            </div>
            <div class="form-blk-input">
              <input id="password" class="password form-blk-input-field js-post-field" type="text" name="password" data-preg="alpha" data-num="2" data-tag="text">
              <p class="form-blk-input-err"></p>
            </div>
          </div>
          <div class="g-contact-form-blk --submit-area">
            <div class="form-blk-input">
              <div class="form-blk-input">
                <div class="c-submit-btn-outer --col-1">
                  <div class="c-submit-btn-container">
                    <button id="g-form-input" class="c-submit-btn" type="button" data-mode="next">
                      <span class="c-submit-btn__lbl">次へ</span>
                    </button>
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