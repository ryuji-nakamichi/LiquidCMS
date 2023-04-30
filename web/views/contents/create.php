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
              <div id="contents-app">
                <?php require_once(INCLUDE_BLOCK_PATH . 'step.php'); ?>
                <div class="g-contact-frame">
                  <div class="c-switch-contents --step-3" v-if="currentStep === 3">
                    <div class="c-annouceList-wrapper">
                      <div class="c-lead">
                        <p class="c-lead-txt">以下が入力頂いた内容になります。<br>この内容で作成してもよろしいですか？</p>
                      </div>
                      <div class="c-annouceList-container">
                        <ul class="c-annouceList">
                          <li class="list__item">
                            <p class="item__des">
                              <span class="item__des-inner">コンテンツ名 : </span>
                              <span id="result-name" class="item__des-inner">
                                {{ formData.posts[0].val.data !== '' ? formData.posts[0].val.lbl : '入力なし' }}
                              </span>
                            </p>
                          </li>
                          <li class="list__item">
                            <p class="item__des">
                              <span class="item__des-inner">グループ設定 : </span>
                              <span id="result-category" class="item__des-inner">{{ formData.posts[1].val.data !== '' ? formData.posts[1].val.lbl : '選択なし' }}</span>
                            </p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="c-switch-contents --step-4" v-if="currentStep === 4">
                    <div class="c-annouceList-wrapper --err" v-if="resFaildFlg === true">
                      <div class="c-lead">
                        <p class="c-lead-txt">処理が失敗しました。<br>以下が処理結果の内容になります。<br>お手数ですが、最初から操作をお願い致します。</p>
                      </div>
                      <div class="c-annouceList-container">
                        <ul class="c-annouceList">
                          <li class="list__item">
                            <p class="item__des">
                              <span class="item__des-inner">エラー内容 : </span>
                              <span id="status-mode" class="item__des-inner">
                                {{ errRes.response.data ? errRes.response.data : '不明' }}
                              </span>
                            </p>
                          </li>
                          <li class="list__item">
                            <p class="item__des">
                              <span class="item__des-inner">ステータスコード : </span>
                              <span id="status-code" class="item__des-inner">
                                {{ errRes.response.status ? errRes.response.status : '不明' }}
                              </span>
                            </p>
                          </li>
                          <li class="list__item">
                            <p class="item__des">
                              <span class="item__des-inner">Request : </span>
                              <span id="result-response" class="item__des-inner">
                                {{ errRes.request ? errRes.request : '不明' }}
                              </span>
                            </p>
                          </li>
                          <li class="list__item">
                            <p class="item__des">
                              <span class="item__des-inner">Message : </span>
                              <span id="result-err" class="item__des-inner">
                                {{ errRes.message ? errRes.message : '不明' }}
                              </span>
                            </p>
                          </li>
                          <li class="list__item">
                            <p class="item__des">
                              <span class="item__des-inner">処理状況 : </span>
                              <span id="result-cpl" class="item__des-inner">
                                {{ errRes.process ? errRes.process : '不明' }}
                              </span>
                            </p>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="c-annouceList-wrapper --suc" v-if="resFaildFlg !== true">
                      <div class="c-lead">
                        <p class="c-lead-txt">完了致しました。<br>コンテンツ管理よりデータの登録をお願い致します。</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="g-contact-frame">
                  <div class="c-switch-contents --step-1" data-step="1" v-if="currentStep === 1">
                    <div class="g-contact-lead --step-1">
                      <p class="g-contact-lead-txt">コンテンツ名を入力してください。</p>
                    </div>
                  </div>
                  <div class="c-switch-contents --step-2" data-step="2" v-if="currentStep === 2">
                    <div class="g-contact-lead --step-2">
                      <p class="g-contact-lead-txt">コンテンツ名の詳細情報を入力してください。</p>
                    </div>
                  </div>              
                  
                  <div class="g-contact-form-container">
                    <form id="g-contact-form" class="g-contact-form" method="post">
                      <div class="g-contact-form-contents">
                        <!-- ステップ1 -->
                        <div class="c-switch-contents --step-1" data-step="1" v-if="currentStep === 1">
                          <div class="g-contact-form-blk --name">
                            <div class="form-blk-lbl">
                              <label class="form-blk-lbl-name" for="name">コンテンツ名</label>
                              <span class="form-blk-lbl-status --required">必須</span>
                            </div>
                            <div class="form-blk-input --des">
                              <p class="form-blk-confirm">こちらに入力された名称が「コンテンツ管理」に登録されます。</p>
                            </div>
                            <div class="form-blk-input">
                              <input id="name" class="name form-blk-input-field js-post-field" type="text" name="name" v-model="formData.posts[0].val.data" @input="getContentsPosts('name'); checkContentsName(); " data-preg="text" data-num="1">
                              <p class="form-blk-input-err"></p>
                            </div>
                            <div class="form-blk-input --err" v-if="!errData.posts[0].val.data">
                              <p class="form-blk-confirm">コンテンツ名は必ずご入力ください。</p>
                            </div>
                          </div>
                          <div class="g-contact-form-blk --submit-area">
                            <div class="form-blk-input">
                              <div class="form-blk-input">
                                <div class="c-submit-btn-outer --col-1">
                                  <div class="c-submit-btn-container">
                                    <button id="g-form-input" class="c-submit-btn" type="button" data-mode="next" @click="changeNextStep();" v-if="errData.posts[0].val.data">
                                      <span class="c-submit-btn__lbl">次へ</span>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- ステップ2 -->
                        <div class="c-switch-contents --step-2" data-step="2" v-if="currentStep === 2">
                          <div class="g-contact-form-blk --category">
                            <div class="form-blk-lbl">
                              <label class="form-blk-lbl-name" for="category">グループ設定</label>
                              <span class="form-blk-lbl-status --required">必須</span>
                            </div>
                            <div class="form-blk-input --des">
                              <p class="form-blk-confirm">どのコンテンツ管理にグルーピングさせるか選択します。</p>
                            </div>
                            <div class="form-blk-input">
                              <select id="category" name="category" class="category form-blk-input-field js-post-field" data-preg="integer" data-num="2" v-model="selected" @change="getContentsPosts('category'); checkCategory();">
                                <option value="" disabled>以下からご選択ください</option>
                                <option value="0">所属させない</option>
                                <option value="1">大カテゴリー</option>
                              </select>
                              <p class="form-blk-input-err"></p>
                            </div>
                            <div class="form-blk-input --err" v-if="!errData.posts[1].val.data">
                              <p class="form-blk-confirm">グループ設定は必ずご選択ください。</p>
                            </div>
                          </div>
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
                                    <button id="g-form-confirm" class="c-submit-btn" type="button" data-mode="next" @click="changeNextStep();" v-if="errData.posts[1].val.data">
                                      <span class="c-submit-btn__lbl">確認する</span>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- ステップ3 -->
                        <div class="c-switch-contents --step-3" data-step="3" v-if="currentStep === 3">
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
                                    <button id="g-form-submit" class="c-submit-btn" type="button" data-mode="submit" @click="changeNextStep(); jsonShow();">
                                      <span class="c-submit-btn__lbl">作成する</span>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- ステップ4 -->
                        <div class="c-switch-contents --step-4" data-step="4" v-if="currentStep === 4">
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
</div>
<?php require_once(INCLUDE_BLOCK_PATH . 'footer.php'); ?>
<?php require_once(INCLUDE_BLOCK_PATH . 'end.php'); ?>