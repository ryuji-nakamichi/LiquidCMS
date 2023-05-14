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
                <div class="g-contact-frame --input">
                  <div class="g-contact-lead --input">
                    <p class="g-contact-lead-txt">以下の編集したいレコードを選択してください。</p>
                  </div>
                  <div class="c-recordList-container">
                    <div class="c-recordList-icon-list">
                      <span class="list__item">
                        <a class="item__link" href="/contents/group/create">
                          <span class="item__icon --plus">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                              <g transform="translate(-227 -70.5)">
                                <rect width="20" height="1" transform="translate(227 80)" fill="#6c6c6c" />
                                <rect width="20" height="1" transform="translate(237 70.5) rotate(90)" fill="#6c6c6c" />
                              </g>
                            </svg>
                          </span>
                        </a>
                      </span>
                    </div>
                    <div id="js-contents-list">
                      <div v-if="resFinishedFlg">
                        <div class="c-recordList-blk">
                          <ul class="c-recordList">
                            <li class="list__item --public" v-for="item in resGetJson.groupListView">
                              <div class="item__contents" :data-id="`${item.id}`">
                                <div class="item__link">
                                  <div class="item__status">
                                    <span class="item__status-icon --public"></span>
                                    <p class="item__status-txt">公開中</p>
                                  </div>
                                  <div class="item__rows">
                                    <div class="item__row">
                                      <p class="item__row-txt">{{ item.updated_at }}</p>
                                    </div>
                                    <div class="item__row">
                                      <p class="item__row-txt">{{ item.name }}</p>
                                    </div>
                                    <div class="item__row">
                                      <p class="item__row-txt">{{ item.label }}</p>
                                    </div>
                                  </div>
                                </div>
                                <div class="item__btn" v-if="item.child_max === '0'">
                                  <div class="c-btn-container js-delete-contents --danger --small" @click="postsAjaxWithParamsRun($event);">
                                    <div class="c-btn">
                                      <span class="c-btn__link">
                                        <span class="c-btn__lbl">削除</span>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                                <div class="item__btn" v-else>
                                  <div class="c-btn-container js-delete-contents --small --disabled">
                                    <div class="c-btn">
                                      <span class="c-btn__link">
                                        <span class="c-btn__lbl">削除不可</span>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div v-else>
                        <div class="c-recordList-blk">
                          <ul class="c-recordList">
                            <?php foreach ((array) $groupListView AS $key => $val) { ?>
                            <li class="list__item --public">
                              <div class="item__contents" data-id="<?=$val['id']?>">
                                <div class="item__link">
                                  <div class="item__status">
                                    <span class="item__status-icon --public"></span>
                                    <p class="item__status-txt">公開中</p>
                                  </div>
                                  <div class="item__rows">
                                    <div class="item__row">
                                      <p class="item__row-txt"><?=$val['updated_at']?></p>
                                    </div>
                                    <div class="item__row">
                                      <p class="item__row-txt"><?=$val['name']?></p>
                                    </div>
                                    <div class="item__row">
                                      <p class="item__row-txt"><?=$val['label']?></p>
                                    </div>
                                  </div>
                                </div>
                                <?php if (intval($val['child_max']) === 0) { ?>
                                <div class="item__btn">
                                  <div class="c-btn-container js-delete-contents --danger --small" @click="postsAjaxWithParamsRun($event);">
                                    <div class="c-btn">
                                      <span class="c-btn__link">
                                        <span class="c-btn__lbl">削除</span>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                                <?php } else { ?>
                                <div class="item__btn">
                                  <div class="c-btn-container js-delete-contents --small --disabled">
                                    <div class="c-btn">
                                      <span class="c-btn__link">
                                        <span class="c-btn__lbl">削除不可</span>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                                <?php } ?>
                              </div>
                            </li>
                            <?php } ?>
                          </ul>
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