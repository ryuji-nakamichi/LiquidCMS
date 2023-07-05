
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');
require_once(INCLUDE_BLOCK_PATH . 'common/head.php');
require_once(INCLUDE_BLOCK_PATH . 'common/start.php');
?>
<div id="contents-app">
  <div class="l-main-whole-wrapper">
    <div class="l-config-wrapper">
      <?php require_once(INCLUDE_BLOCK_PATH . 'common/header.php'); ?>
      <?php require_once(INCLUDE_BLOCK_PATH . 'common/profile_nav.php'); ?>
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
              <input id="data-id" type="hidden" value="">
              <input id="name" type="hidden" value="">
              <input id="mail" type="hidden" value="">
              <?php /* ステップ1 */ ?>
              <div class="c-switch-contents --step-1" data-step="1" v-if="currentStep === 1">
                <div class="g-contact-form-blk --name">
                  <div class="form-blk-lbl">
                    <label class="form-blk-lbl-name" for="name">名前</label>
                    <span class="form-blk-lbl-status --required">必須</span>
                  </div>
                  <div class="form-blk-input">
                    <input id="name" class="name form-blk-input-field js-post-field" type="text" name="name" v-model="name" data-preg="alpha" data-num="1" data-tag="text">
                    <p class="form-blk-input-err"></p>
                  </div>
                  <div class="form-blk-input --err" v-if="errData.posts[0].val.flg && name === ''">
                    <p class="form-blk-confirm">コンテンツラベル名は必ずご入力ください。<br>また、空白文字（半角・全角スペースなど）は使用致しかねますますのでご注意ください。</p>
                  </div>
                </div>
                <div class="g-contact-form-blk --mail">
                  <div class="form-blk-lbl">
                    <label class="form-blk-lbl-name" for="mail">メールアドレス</label>
                    <span class="form-blk-lbl-status --required">必須</span>
                  </div>
                  <div class="form-blk-input">
                    <input id="mail" class="mail form-blk-input-field js-post-field" type="text" name="mail" v-model="mail" @input="getPosts('mail'); checkErrPosts('mail');" data-preg="text" data-num="2" data-tag="text">
                    <p class="form-blk-input-err"></p>
                  </div>
                  <div class="form-blk-input --err" v-if="errData.posts[1].val.flg && mail === ''">
                    <p class="form-blk-confirm">コンテンツラベル名は必ずご入力ください。<br>また、空白文字（半角・全角スペースなど）は使用致しかねますますのでご注意ください。</p>
                  </div>
                </div>
                <div class="g-contact-form-blk --submit-area">
                  <div class="form-blk-input">
                    <div class="form-blk-input">
                      <div class="c-submit-btn-outer --col-1">
                        <div class="c-submit-btn-container">
                          <button id="g-form-input" class="c-submit-btn" type="button" data-mode="next" @click="getPosts('mail'); changeNextStep();" v-if="!errData.posts[0].val.flg || mail !== ''">
                            <span class="c-submit-btn__lbl">次へ</span>
                          </button>
                          <button id="g-form-input" class="c-submit-btn" type="button" data-mode="next" v-else disabled>
                            <span class="c-submit-btn__lbl">次へ</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php /* ステップ2 */ ?>
              <div class="c-switch-contents --step-2" data-step="2" v-if="currentStep === 2">
                <div class="g-contact-form-blk --submit-area">
                  <div class="form-blk-input">
                    <div class="form-blk-input">
                      <div class="c-submit-btn-outer">
                        <div class="c-submit-btn-container --prev">
                          <button class="c-submit-btn" type="button" data-mode="prev" @click="changeBackStep()">
                            <span class="c-submit-btn__lbl">戻る</span>
                          </button>
                        </div>
                        <div class="c-submit-btn-container">
                          <button id="g-form-submit" class="c-submit-btn" type="button" data-mode="submit" @click="changeNextStep(); postsAjaxWithParamsRun($event);">
                            <span class="c-submit-btn__lbl">更新する</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php /* ステップ3 */ ?>
              <div class="c-switch-contents --step-3" data-step="3" v-if="currentStep === 3">
                <div class="g-contact-form-blk --submit-area">
                  <div class="form-blk-input">
                    <div class="form-blk-input">
                      <div class="c-submit-btn-outer">
                        <div class="c-submit-btn-container --prev">
                          <a class="c-submit-btn" href="<?=DOMAIN_URI?>">
                            <span class="c-submit-btn__lbl">戻る</span>
                          </a>
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
  </div>
</div>
<?php require_once(INCLUDE_BLOCK_PATH . 'common/footer.php'); ?>
<?php require_once(INCLUDE_BLOCK_PATH . 'common/end.php'); ?>