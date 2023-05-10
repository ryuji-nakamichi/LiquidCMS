<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');
require_once(INCLUDE_BLOCK_PATH . 'head.php');
require_once(INCLUDE_BLOCK_PATH . 'start.php');
?>
<div id="contents-app">
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
                    <ul class="c-recordList">
                      <?php foreach ((array) $groupListView AS $key => $val) { ?>
                      <li class="list__item --public">
                        <a class="item__link" href="/contents/edit/<?=$val['id']?>">
                          <div class="item__contents">
                            <div class="item__status">
                              <span class="item__status-icon --public"></span>
                              <p class="item__status-txt">公開中</p>
                            </div>
                            <div class="item__rows">
                              <div class="item__row">
                                <p class="item__row-txt"><?=date('Y.m.d', strtotime($val['updated_at']))?></p>
                              </div>
                              <div class="item__row">
                                <p class="item__row-txt"><?=$val['name']?></p>
                              </div>
                              <div class="item__row">
                                <p class="item__row-txt"><?=$val['label']?></p>
                              </div>
                            </div>
                          </div>
                        </a>
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
<?php require_once(INCLUDE_BLOCK_PATH . 'footer.php'); ?>
<?php require_once(INCLUDE_BLOCK_PATH . 'end.php'); ?>