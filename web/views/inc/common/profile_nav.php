<div class="g-menu-container">
  <div class="c-contents-outer --g-menu">
    <div class="c-contents-inner --g-menu">
      <div class="g-menu-contents">
        <nav class="g-menu">
          <div id="nav-app">
            <ul class="g-menu-list">
              <li class="list__item">
                <div class="item__contents">
                  <div class="item__blk-container">
                    <div class="item__blk">
                      <div class="item__contents-inner">
                        <p class="item__main-ttl --sm --st">cr4ya3miq0</p>
                        <span class="item__main-icon">
                          <a class="item__link" href="#">
                            <?php require_once(INCLUDE_BLOCK_PATH . 'icon/setting.php'); ?>
                          </a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="list__item">
                <div class="item__contents">
                  <div class="item__blk">
                    <div class="item__contents-inner">
                      <p class="item__main-ttl">プロフィール</p>
                      <span class="item__main-icon"></span>
                    </div>
                  </div>
                  <div class="item__blk">
                    <ul class="g-menu-sub-list">
                      <li class="sub-list__item">
                        <div class="sub-list__item-contents">
                          <div class="item__contents-inner">
                            <span class="item__icon">
                              <?php require_once(INCLUDE_BLOCK_PATH . 'icon/pen.php'); ?>
                            </span>
                            <p class="item__ttl">
                              <a class="item__link" href="/profile/edit">プロフィール<br>編集</a>
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="list__item">
                <div class="item__contents">
                  <div class="item__blk">
                    <div class="item__contents-inner">
                      <p class="item__main-ttl">その他</p>
                      <span class="item__main-icon"></span>
                    </div>
                  </div>
                  <div class="item__blk">
                    <ul class="g-menu-sub-list">
                      <li class="sub-list__item" @click="logoutRun($event);">
                        <div class="sub-list__item-contents">
                          <div class="item__contents-inner">
                            <span class="item__icon">
                              <?php require_once(INCLUDE_BLOCK_PATH . 'icon/logout.php'); ?>
                            </span>
                            <p class="item__ttl">
                              <span class="item__link">ログアウト</span>
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="item__blk">
                    <ul class="g-menu-sub-list">
                      <li class="sub-list__item">
                        <div class="sub-list__item-contents">
                          <div class="item__contents-inner">
                            <span class="item__icon">
                              <?php require_once(INCLUDE_BLOCK_PATH . 'icon/member.php'); ?>
                            </span>
                            <p class="item__ttl">
                              <a class="item__link" href="#">退会</a>
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>