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
                  <div class="item__blk-container">
                    <div class="item__blk">
                      <div class="item__contents-inner">
                        <p class="item__main-ttl">
                          <a href="/contents/list">コンテンツ管理</a>
                        </p>
                        <span class="item__main-icon">
                          <a class="item__link" href="/contents/create">
                            <?php require_once(INCLUDE_BLOCK_PATH . 'icon/plus.php'); ?>
                          </a>
                        </span>
                      </div>
                    </div>
                    <div class="item__blk">
                      <div class="item__contents-inner">
                        <p class="item__main-ttl">
                          <a href="/contents/group/list">グループ管理</a>
                        </p>
                        <span class="item__main-icon">
                          <a class="item__link" href="/contents/group/create">
                            <?php require_once(INCLUDE_BLOCK_PATH . 'icon/plus.php'); ?>
                          </a>
                        </span>
                      </div>
                    </div>
                  </div>
                <?php require_once(INCLUDE_BLOCK_PATH . 'parts/contents_item.php'); ?>
                </div>
              </li>
              <li class="list__item">
                <div class="item__contents">
                  <div class="item__blk">
                    <div class="item__contents-inner">
                      <p class="item__main-ttl">レビュー</p>
                      <span class="item__main-icon"></span>
                    </div>
                  </div>
                  <div class="item__blk">
                    <ul class="g-menu-sub-list">
                      <li class="sub-list__item">
                        <div class="sub-list__item-contents">
                          <div class="item__contents-inner">
                            <span class="item__icon">
                              <?php require_once(INCLUDE_BLOCK_PATH . 'icon/review.php'); ?>
                            </span>
                            <p class="item__ttl">
                              <a class="item__link" href="#">0件の申請</a>
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