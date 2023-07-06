
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');
require_once(INCLUDE_BLOCK_PATH . 'common/head.php');
require_once(INCLUDE_BLOCK_PATH . 'common/start.php');
?>
<div id="contents-app">
  <div class="login-container c-popup-container">
    <div class="login-frame c-popup-frame">
      <div class="login-wrapper c-popup-wrapper">
        <div class="login-logo">
          <p class="login-logo__logo">
            <img src="/assets/img/common/logo_liquidcms.svg" alt="LiquidCMSのロゴ">
          </p>
        </div>
        <div class="login-lead c-popup-login-lead">
          <p class="login-lead__txt c-popup-login-lead__txt">LiquidCMSアカウント情報を入力し、<br class="u-show-sp">ログインしてください。<br>アカウントをお持ちでない方は、<br class="u-show-sp"><a class="login-lead__txt-link" href="#">こちらからご登録可能</a>です。</p>
        </div>
        <div class="login-contents">
          <div class="form-blk-inner">
            <div class="g-contact-form-blk --name">
              <div class="form-blk-lbl">
                <label class="form-blk-lbl-name" for="user">ユーザー名</label>
              </div>
              <div class="form-blk-input">
                <input id="user" class="user form-blk-input-field js-post-field" type="text" name="user" placeholder="mailaddress@liqsyst.com" v-model="formData.posts[0].val.data" @input="getPosts('user'); checkErrPosts('user');" data-preg="mailaddress" data-num="1" data-tag="text">
                <p class="form-blk-input-err"></p>
              </div>
              <div class="form-blk-input --err" v-if="errData.posts[0].val.flg">
                <p class="form-blk-confirm">ユーザー名はメールアドレス形式になります。</p>
              </div>
            </div>
            <div class="g-contact-form-blk --password">
              <div class="form-blk-lbl">
                <label class="form-blk-lbl-name" for="password">パスワード</label>
              </div>
              <div class="form-blk-input">
                <input id="password" class="password form-blk-input-field js-post-field" type="text" name="password" placeholder="********" v-model="formData.posts[1].val.data" @input="getPosts('password'); checkErrPosts('password');" data-preg="alpha-8" data-num="2" data-tag="text">
                <p class="form-blk-input-err"></p>
              </div>
              <div class="form-blk-input --err" v-if="errData.posts[1].val.flg">
                <p class="form-blk-confirm">パスワードは半角英数字8文字以上です。</p>
              </div>
            </div>
            <div class="g-contact-form-blk --submit-area">
              <div class="form-blk-input">
                <div class="form-blk-input">
                  <div class="c-submit-btn-outer --col-1">
                    <div class="c-submit-btn-container">
                      <button id="g-form-input" class="c-submit-btn" type="button" @click="postsAjaxWithParamsRun($event);" v-if="(!errData.posts[0].val.flg && !errData.posts[1].val.flg) && (formData.posts[0].val.data && formData.posts[1].val.data)">
                        <span class="c-submit-btn__lbl">ログイン</span>
                      </button>
                      <button id="g-form-input" class="c-submit-btn" type="button" v-else disabled>
                        <span class="c-submit-btn__lbl">ログイン</span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="login-annotation c-popup-annotation">
            <p class="login-annotation__txt c-popup-annotation__txt">
              <a class="login-annotation__txt-link c-popup-annotation__txt-link" href="#">パスワードをお忘れの方はこちらへ</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="toastr" class="c-toastr" v-if="lginFailPopUpFlg">
    <i class="c-toastr-icon" @click="delToastr();"></i>
    <div class="c-toastr-contents --danger">
      <i class="toastr-contents__icon --info"></i>
      <p class="toastr-contents__txt">ログインできませんでした。<br>ユーザー名またはパスワード、<br>もしくは両方が間違っている可能性があります。<br>再度お試しください。</p>
    </div>
  </div>
</div>
<?php require_once(INCLUDE_BLOCK_PATH . 'common/footer.php'); ?>
<?php require_once(INCLUDE_BLOCK_PATH . 'common/end.php'); ?>