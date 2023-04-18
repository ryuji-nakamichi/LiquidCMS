
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
          <div class="c-infoList-blkContents">
            <div class="c-infoList-blk">
              <?php require_once(INCLUDE_BLOCK_PATH . 'contents_head.php'); ?>
              <div class="c-infoList-container">
                <ul class="c-infoList">
                  <li class="list__item">
                    <a class="item__link" href="#">
                      <div class="item__contents">
                        <p class="item__date">
                          <time class="item__date-time" datetime="2021-03-25">2021.03.25</time>
                        </p>
                        <p class="item__des">
                          <span class="item__des-txt">LiquidCMS ver.1.0.0 がリリースされました。</span>
                        </p>
                      </div>
                    </a>
                  </li>
                  <li class="list__item">
                    <a class="item__link" href="#">
                      <div class="item__contents">
                        <p class="item__date">
                          <time class="item__date-time" datetime="2021-03-25">2021.03.25</time>
                        </p>
                        <p class="item__des">
                          <span class="item__des-txt">LiquidCMS ver.1.0.0 がリリースされました。</span>
                        </p>
                      </div>
                    </a>
                  </li>
                  <li class="list__item">
                    <a class="item__link" href="#">
                      <div class="item__contents">
                        <p class="item__date">
                          <time class="item__date-time" datetime="2021-03-25">2021.03.25</time>
                        </p>
                        <p class="item__des">
                          <span class="item__des-txt">LiquidCMS ver.1.0.0 がリリースされました。</span>
                        </p>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="c-btn-container">
                <div class="c-btn">
                  <a class="c-btn__link" href="#">
                    <span class="c-btn__lbl">More Read</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="c-infoList-blk">
              <div class="g-page-mainTtl c-head-lv">
                <h2 class="mainTtl-txt c-head-lv-2">運営からのお知らせ</h2>
              </div>
              <div class="c-infoList-container">
                <ul class="c-infoList">
                  <li class="list__item">
                    <a class="item__link" href="">
                      <div class="item__contents">
                        <p class="item__date">
                          <time class="item__date-time" datetime="2021-03-25">2021.03.25</time>
                        </p>
                        <p class="item__des">
                          <span class="item__des-txt">運営からのメッセージが届いております。<br>ご確認いただきますようにお願い致します。</span>
                        </p>
                      </div>
                    </a>
                  </li>
                  <li class="list__item">
                    <a class="item__link" href="#">
                      <div class="item__contents">
                        <p class="item__date">
                          <time class="item__date-time" datetime="2021-03-25">2021.03.25</time>
                        </p>
                        <p class="item__des">
                          <span class="item__des-txt">運営からのメッセージが届いております。<br>ご確認いただきますようにお願い致します。</span>
                        </p>
                      </div>
                    </a>
                  </li>
                  <li class="list__item">
                    <a class="item__link" href="#">
                      <div class="item__contents">
                        <p class="item__date">
                          <time class="item__date-time" datetime="2021-03-25">2021.03.25</time>
                        </p>
                        <p class="item__des">
                          <span class="item__des-txt">運営からのメッセージが届いております。<br>ご確認いただきますようにお願い致します。</span>
                        </p>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="c-btn-container">
                <div class="c-btn">
                  <a class="c-btn__link" href="#">
                    <span class="c-btn__lbl">More Read</span>
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
<?php require_once(INCLUDE_BLOCK_PATH . 'footer.php'); ?>
<?php require_once(INCLUDE_BLOCK_PATH . 'end.php'); ?>