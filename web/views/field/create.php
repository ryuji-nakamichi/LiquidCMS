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
          <div class="c-form-blk">
            <div class="g-contact-contents">
              <div class="g-contact-frame">
                <div id="status-erea" class="status-erea g-contact-lead">
                  <p id="status-erea-code" class="status-erea-txt g-contact-lead-txt"></p>
                  <p id="status-erea-status" class="status-erea-txt g-contact-lead-txt"></p>
                </div>
                <div id="result-erea" class="result-erea g-contact-lead">
                  <p id="result-erea-field__name" class="result-erea-txt g-contact-lead-txt"></p>
                  <p id="result-erea-field__id" class="result-erea-txt g-contact-lead-txt"></p>
                </div>
                <div id="result-res" class="result-res g-contact-lead">
                  <p id="result-res-txt" class="result-res-txt g-contact-lead-txt"></p>
                </div>
                <div id="result-host" class="result-host g-contact-lead">
                  <p id="result-host-txt" class="result-host-txt g-contact-lead-txt"></p>
                </div>
                <div id="result-err" class="result-err g-contact-lead">
                  <p id="result-err-txt" class="result-err-txt g-contact-lead-txt"></p>
                </div>
                <div id="result-cpl" class="result-cpl g-contact-lead">
                  <p id="result-cpl-txt" class="result-cpl-txt g-contact-lead-txt"></p>
                </div>
              </div>
              <div class="g-contact-frame --basic">
                <div class="g-contact-lead --basic">
                  <p class="g-contact-lead-txt">フィールドの基本情報を入力してください。</p>
                </div>
                <div class="g-contact-lead --detail">
                  <p class="g-contact-lead-txt">フィールドの詳細情報を入力してください。</p>
                </div>
                <div class="g-contact-lead --thanks">
                  <p class="g-contact-lead-txt">登録完了致しました。</p>
                </div>
            
                <div class="g-contact-form-container">
                  <form id="g-contact-form" class="g-contact-form" method="post">
                    <div class="g-contact-form-contents">
                      <!-- ステップ1 -->
                      <div class="g-contact-form-contents__switch">
                        <div class="g-contact-form-blk --field_name">
                          <div class="form-blk-lbl">
                            <label class="form-blk-lbl-name" for="field_name">フィールド名</label>
                            <span class="form-blk-lbl-status --required">必須</span>
                          </div>
                          <div class="form-blk-input --basic">
                            <input id="field_name" class="field_name form-blk-input-field js-post-field" type="text" name="field_name" value="" data-type="text">
                            <p class="form-blk-input-err"></p>
                          </div>
                          <div class="form-blk-input">
                            <p class="form-blk-confirm">ここにタイトルが入ります。</p>
                          </div>
                        </div>
                        <div class="g-contact-form-blk --field_id">
                          <div class="form-blk-lbl">
                            <label class="form-blk-lbl-name" for="field_id">フィールドID</label>
                            <span class="form-blk-lbl-status --required">必須</span>
                          </div>
                          <div class="form-blk-input --basic">
                            <input id="field_id" class="field_id form-blk-input-field js-post-field" type="text" name="field_id" value="" data-type="text">
                            <p class="form-blk-input-err"></p>
                          </div>
                          <div class="form-blk-input">
                            <p class="form-blk-confirm">ここにフィールドIDが入ります。</p>
                          </div>
                        </div>
                        <div class="g-contact-form-blk --submit-area --basic">
                          <div class="form-blk-input">
                            <div class="form-blk-input">
                              <div class="c-submit-btn-outer --col-1">
                                <div class="c-submit-btn-container">
                                  <button id="g-form-input" class="c-submit-btn" type="button">
                                    <span class="c-submit-btn__lbl">次へ</span>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- ステップ2 -->
                      <div class="g-contact-form-contents__switch">
                        <div class="g-contact-form-blk --submit-area --detail">
                          <div class="form-blk-input">
                            <div class="form-blk-input">
                              <div class="c-submit-btn-outer">
                                <div class="c-submit-btn-container --prev">
                                  <button id="g-form-back" class="c-submit-btn" type="button">
                                    <span class="c-submit-btn__lbl">戻る</span>
                                  </button>
                                </div>
                                <div class="c-submit-btn-container">
                                  <button id="g-form-submit" class="c-submit-btn" type="button">
                                    <span class="c-submit-btn__lbl">作成する</span>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
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
<?php require_once(INCLUDE_BLOCK_PATH . 'footer.php'); ?>
<?php require_once(INCLUDE_BLOCK_PATH . 'end.php'); ?>