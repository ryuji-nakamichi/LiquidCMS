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
                <div class="c-switch-contents --step-3">
                  <div class="c-annouceList-wrapper">
                    <div class="c-lead">
                      <p class="c-lead-txt">以下が入力頂いた内容になります。<br>この内容で作成してもよろしいですか？</p>
                    </div>
                    <div class="c-annouceList-container">
                      <ul class="c-annouceList">
                        <li class="list__item">
                          <p class="item__des">
                            <span class="item__des-inner">コンテンツ名 : </span>
                            <span id="result-name" class="item__des-inner"></span>
                          </p>
                        </li>
                        <li class="list__item">
                          <p class="item__des">
                            <span class="item__des-inner">グループ設定 : </span>
                            <span id="result-category" class="item__des-inner"></span>
                          </p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="c-switch-contents --step-4">
                  <div class="c-annouceList-wrapper --err">
                    <div class="c-lead">
                      <p class="c-lead-txt">処理が失敗しました。<br>以下が処理結果の内容になります。<br>お手数ですが、最初から操作をお願い致します。</p>
                    </div>
                    <div class="c-annouceList-container">
                      <ul class="c-annouceList">
                        <li class="list__item">
                          <p class="item__des">
                            <span class="item__des-inner">ステータス : </span>
                            <span id="status-mode" class="item__des-inner"></span>
                          </p>
                        </li>
                        <li class="list__item">
                          <p class="item__des">
                            <span class="item__des-inner">ステータスコード : </span>
                            <span id="status-code" class="item__des-inner"></span>
                          </p>
                        </li>
                        <li class="list__item">
                          <p class="item__des">
                            <span class="item__des-inner">Response : </span>
                            <span id="result-response" class="item__des-inner"></span>
                          </p>
                        </li>
                        <li class="list__item">
                          <p class="item__des">
                            <span class="item__des-inner">errorThrown : </span>
                            <span id="result-err" class="item__des-inner"></span>
                          </p>
                        </li>
                        <li class="list__item">
                          <p class="item__des">
                            <span class="item__des-inner">処理状況 : </span>
                            <span id="result-cpl" class="item__des-inner"></span>
                          </p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="c-annouceList-wrapper --suc">
                    <div class="c-lead">
                      <p class="c-lead-txt">完了致しました。<br>コンテンツ管理よりデータの登録をお願い致します。</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="g-contact-frame">
                <div class="c-switch-contents --step-1" data-step="1">
                  <div class="g-contact-lead --step-1">
                    <p class="g-contact-lead-txt">コンテンツ名を入力してください。</p>
                  </div>
                </div>
                <div class="c-switch-contents --step-2" data-step="2">
                  <div class="g-contact-lead --step-2">
                    <p class="g-contact-lead-txt">コンテンツ名の詳細情報を入力してください。</p>
                  </div>
                </div>
                <div class="c-switch-contents --step-3" data-step="3">
                  <div class="g-contact-lead --step-3">
                    <p class="g-contact-lead-txt">登録完了致しました。</p>
                  </div>
                </div>
            
                
                <div class="g-contact-form-container">
                  <form id="g-contact-form" class="g-contact-form" method="post">
                    <div class="g-contact-form-contents">
                      <!-- ステップ1 -->
                      <div class="c-switch-contents --step-1" data-step="1">
                        <div class="g-contact-form-blk --name">
                          <div class="form-blk-lbl">
                            <label class="form-blk-lbl-name" for="name">コンテンツ名</label>
                            <span class="form-blk-lbl-status --required">必須</span>
                          </div>
                          <div class="form-blk-input --des">
                            <p class="form-blk-confirm">こちらに入力された名称が「コンテンツ管理」に登録されます。</p>
                          </div>
                          <div class="form-blk-input">
                            <input id="name" class="name form-blk-input-field js-post-field" type="text" name="name" value="" data-type="text">
                            <p class="form-blk-input-err"></p>
                          </div>
                          <div class="form-blk-input --err">
                            <p class="form-blk-confirm">ここにコンテンツ名が入ります。</p>
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
                      <!-- ステップ2 -->
                      <div class="c-switch-contents --step-2" data-step="2">
                        <div class="g-contact-form-blk --category">
                          <div class="form-blk-lbl">
                            <label class="form-blk-lbl-name" for="category">グループ設定</label>
                            <span class="form-blk-lbl-status --required">必須</span>
                          </div>
                          <div class="form-blk-input --des">
                            <p class="form-blk-confirm">どのコンテンツ管理にグルーピングさせるか選択します。</p>
                          </div>
                          <div class="form-blk-input">
                            <select id="category" name="category" class="category form-blk-input-field js-post-field" data-type="text">
                              <option value="">なし</option>
                              <option value="大カテゴリー">大カテゴリー</option>
                            </select>
                            <p class="form-blk-input-err"></p>
                          </div>
                          <div class="form-blk-input --err">
                            <p class="form-blk-confirm">ここにコンテンツ名が入ります。</p>
                          </div>
                        </div>
                        <div class="g-contact-form-blk --submit-area">
                          <div class="form-blk-input">
                            <div class="form-blk-input">
                              <div class="c-submit-btn-outer">
                                <div class="c-submit-btn-container --prev">
                                  <button class="c-submit-btn" type="button" data-mode="prev">
                                    <span class="c-submit-btn__lbl">戻る</span>
                                  </button>
                                </div>
                                <div class="c-submit-btn-container">
                                  <button id="g-form-confirm" class="c-submit-btn" type="button" data-mode="next">
                                    <span class="c-submit-btn__lbl">確認する</span>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- ステップ3 -->
                      <div class="c-switch-contents --step-3" data-step="3">
                        <div class="g-contact-form-blk --submit-area">
                          <div class="form-blk-input">
                            <div class="form-blk-input">
                              <div class="c-submit-btn-outer">
                                <div class="c-submit-btn-container --prev">
                                  <button class="c-submit-btn" type="button" data-mode="prev">
                                    <span class="c-submit-btn__lbl">戻る</span>
                                  </button>
                                </div>
                                <div class="c-submit-btn-container">
                                  <button id="g-form-submit" class="c-submit-btn" type="button" data-mode="submit">
                                    <span class="c-submit-btn__lbl">作成する</span>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- ステップ4 -->
                      <div class="c-switch-contents --step-4" data-step="4">
                        <div class="g-contact-form-blk --submit-area">
                          <div class="form-blk-input">
                            <div class="form-blk-input">
                              <div class="c-submit-btn-outer">
                                <div class="c-submit-btn-container --prev">
                                  <a class="c-submit-btn" href="/">
                                    <span class="c-submit-btn__lbl">戻る</span>
                                  </a>
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