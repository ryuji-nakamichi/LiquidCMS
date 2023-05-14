<div class="c-recordList-container">
  <div class="c-recordList-icon-list">
    <span class="list__item">
      <a class="item__link" href="/contents/create">
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
      <div class="c-recordList-blk" v-for="items in resGetJson.res.category">
        <p class="c-recordList-ttl">{{ items[0].name }}</p>
        <ul class="c-recordList">
          <li class="list__item --public" v-for="item in items">
            <div class="item__contents" :data-id="`${item.id}`">
              <a class="item__link" :href="`/contents/edit/${item.id}`">
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
              </a>
              <div class="item__btn" v-if="item.category_flg === '1'">
                <div class="c-btn-container js-delete-contents --danger --small" @click="postsAjaxWithParamsRun($event);">
                  <div class="c-btn">
                    <span class="c-btn__link">
                      <span class="c-btn__lbl">削除</span>
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
      <?php foreach((array)$navView['category'] AS $key => $items) { ?>
      <div class="c-recordList-blk">
        <p class="c-recordList-ttl"><?=$items[0]['name']?></p>
        <ul class="c-recordList">
          <?php foreach((array)$items AS $itemKey => $item) { ?>
          <li class="list__item --public">
            <div class="item__contents" data-id="<?=$item['id']?>">
              <a class="item__link" href="/contents/edit/<?=$item['id']?>">
                <div class="item__status">
                  <span class="item__status-icon --public"></span>
                  <p class="item__status-txt">公開中</p>
                </div>
                <div class="item__rows">
                  <div class="item__row">
                    <p class="item__row-txt"><?=$item['updated_at']?></p>
                  </div>
                  <div class="item__row">
                    <p class="item__row-txt"><?=$item['name']?></p>
                  </div>
                  <div class="item__row">
                    <p class="item__row-txt"><?=$item['label']?></p>
                  </div>
                </div>
              </a>
              <?php if ($item['category_flg']) { ?>
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
      <?php } ?>
    </div>
  </div>
</div>