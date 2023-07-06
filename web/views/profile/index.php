
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

            <div class="c-form-blk">
              <div class="g-contact-contents"> 

                <?php require_once(INCLUDE_BLOCK_PATH . 'step.php'); ?>

                <div class="g-contact-frame">
                  <?php require_once(INCLUDE_BLOCK_PATH . 'profile/result.php'); ?>
                </div>

                <div class="profile-contents">
                  <input id="data-id" type="hidden" value="<?=$userView[0]['id']?>">
                  <input id="data-name" type="hidden" value="<?=$userView[0]['name']?>">
                  <input id="data-mail" type="hidden" value="<?=$userView[0]['mail']?>">
                  <?php /* ステップ1 */ ?>
                  <div class="c-switch-contents --step-1" data-step="1" v-if="currentStep === 1">
                    <div class="g-contact-form-blk --name">
                      <div class="form-blk-lbl">
                        <label class="form-blk-lbl-name" for="name">名前</label>
                        <span class="form-blk-lbl-status --required">必須</span>
                      </div>
                      <div class="form-blk-input">
                        <input id="name" class="name form-blk-input-field js-post-field" type="text" name="name" v-model="name" @input="getPosts('name'); checkErrPosts('name');" data-preg="text" data-num="1" data-tag="text">
                        <p class="form-blk-input-err"></p>
                      </div>
                      <div class="form-blk-input --err" v-if="errData.posts[0].val.flg">
                        <p class="form-blk-confirm">名前は必ずご入力ください。<br>また、空白文字（半角・全角スペースなど）は使用致しかねますますのでご注意ください。</p>
                      </div>
                    </div>
                    <div class="g-contact-form-blk --mail">
                      <div class="form-blk-lbl">
                        <label class="form-blk-lbl-name" for="mail">メールアドレス</label>
                        <span class="form-blk-lbl-status --required">必須</span>
                      </div>
                      <div class="form-blk-input">
                        <input id="mail" class="mail form-blk-input-field js-post-field" type="text" name="mail" v-model="mail" @input="getPosts('mail'); checkErrPosts('mail');" data-preg="mailaddress" data-num="2" data-tag="text">
                        <p class="form-blk-input-err"></p>
                      </div>
                      <div class="form-blk-input --err" v-if="errData.posts[1].val.flg">
                        <p class="form-blk-confirm">ユーザー名はメールアドレス形式になります。</p>
                      </div>
                    </div>
                    <div class="g-contact-form-blk --submit-area">
                      <div class="form-blk-input">
                        <div class="form-blk-input">
                          <div class="c-submit-btn-outer --col-1">
                            <div class="c-submit-btn-container">
                              <button id="g-form-input" class="c-submit-btn" type="button" data-mode="next" @click="getPosts('name'); getPosts('mail'); changeNextStep();" v-if="(!errData.posts[0].val.flg && !errData.posts[1].val.flg)">
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
  </div>
</div>
<?php require_once(INCLUDE_BLOCK_PATH . 'common/footer.php'); ?>
<?php require_once(INCLUDE_BLOCK_PATH . 'common/end.php'); ?>