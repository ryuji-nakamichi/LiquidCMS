<?php
if (isset($routeMap['info']['name'])) {
  if (
    $routeMap['info']['name'] === 'contents_create' 
  || $routeMap['info']['name'] === 'contents_list' 
  || $routeMap['info']['name'] === 'contents_edit' 
  || $routeMap['info']['name'] === 'contents_group_list'
  || $routeMap['info']['name'] === 'contents_group_create'
  ) { ?>
<div class="item__blk-container" v-if="resFinishedFlg">
  <div class="item__blk" v-for="items in resGetJson.res.category">
    <ul class="g-menu-sub-list">
      <li class="sub-list__item" v-for="item in items">
        <div class="sub-list__item-contents">
          <div class="item__contents-inner">
            <span class="item__icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="21.234" height="20" viewBox="0 0 21.234 20">
                <g transform="translate(0 -14.874)">
                  <path d="M470.9,25.4h0l.013-.007Z" transform="translate(-451.371 -10.086)"
                    fill="#6c6c6c" />
                  <path
                    d="M20.67,15.34a1.155,1.155,0,0,0-1.14-.023l-1.809.98-2.369-1.284a1.154,1.154,0,0,0-1.1,0L11.885,16.3,9.517,15.014a1.153,1.153,0,0,0-1.1,0L6.05,16.3l-1.806-.979a1.153,1.153,0,0,0-1.7,1.014V31.483H3.727v-15.1l1.773.962a1.155,1.155,0,0,0,1.1,0l2.368-1.284,2.368,1.284a1.155,1.155,0,0,0,1.1,0L14.8,16.065l2.369,1.284a1.155,1.155,0,0,0,1.1,0l1.776-.962V31.815a1.873,1.873,0,0,1-1.873,1.873H3.956a2.77,2.77,0,0,1-2.77-2.77V18.568H0v12.35a3.956,3.956,0,0,0,3.956,3.956H18.175a3.059,3.059,0,0,0,3.059-3.059V16.331A1.154,1.154,0,0,0,20.67,15.34Z"
                    fill="#6c6c6c" />
                  <rect width="13.686" height="4.233" transform="translate(5.091 19.444)"
                    fill="#6c6c6c" />
                  <rect width="4.829" height="5.207" transform="translate(13.949 25.338)"
                    fill="#6c6c6c" />
                  <rect width="7.118" height="0.791" transform="translate(5.091 25.417)" fill="#6c6c6c" />
                  <rect width="7.118" height="0.791" transform="translate(5.091 29.675)" fill="#6c6c6c" />
                  <rect width="7.118" height="0.791" transform="translate(5.091 27.546)" fill="#6c6c6c" />
                </g>
              </svg>
            </span>
            <p class="item__ttl">
              <a class="item__link" :href="`/contents/${item.id }`">{{ item.name }}</a>
            </p>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>
<?php } ?>
<?php } ?>

<div class="item__blk-container" v-else>
  <?php foreach((array)$navView['category'] AS $key => $items) { ?>
  <div class="item__blk">
    <ul class="g-menu-sub-list">
      <?php foreach((array)$items AS $itemKey => $item) { ?>
      <li class="sub-list__item" data-test="<?=$itemKey?>">
        <div class="sub-list__item-contents">
          <div class="item__contents-inner">
            <span class="item__icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="21.234" height="20" viewBox="0 0 21.234 20">
                <g transform="translate(0 -14.874)">
                  <path d="M470.9,25.4h0l.013-.007Z" transform="translate(-451.371 -10.086)"
                    fill="#6c6c6c" />
                  <path
                    d="M20.67,15.34a1.155,1.155,0,0,0-1.14-.023l-1.809.98-2.369-1.284a1.154,1.154,0,0,0-1.1,0L11.885,16.3,9.517,15.014a1.153,1.153,0,0,0-1.1,0L6.05,16.3l-1.806-.979a1.153,1.153,0,0,0-1.7,1.014V31.483H3.727v-15.1l1.773.962a1.155,1.155,0,0,0,1.1,0l2.368-1.284,2.368,1.284a1.155,1.155,0,0,0,1.1,0L14.8,16.065l2.369,1.284a1.155,1.155,0,0,0,1.1,0l1.776-.962V31.815a1.873,1.873,0,0,1-1.873,1.873H3.956a2.77,2.77,0,0,1-2.77-2.77V18.568H0v12.35a3.956,3.956,0,0,0,3.956,3.956H18.175a3.059,3.059,0,0,0,3.059-3.059V16.331A1.154,1.154,0,0,0,20.67,15.34Z"
                    fill="#6c6c6c" />
                  <rect width="13.686" height="4.233" transform="translate(5.091 19.444)"
                    fill="#6c6c6c" />
                  <rect width="4.829" height="5.207" transform="translate(13.949 25.338)"
                    fill="#6c6c6c" />
                  <rect width="7.118" height="0.791" transform="translate(5.091 25.417)" fill="#6c6c6c" />
                  <rect width="7.118" height="0.791" transform="translate(5.091 29.675)" fill="#6c6c6c" />
                  <rect width="7.118" height="0.791" transform="translate(5.091 27.546)" fill="#6c6c6c" />
                </g>
              </svg>
            </span>
            <p class="item__ttl">
              <a class="item__link" href="/contents/<?=$item['id']?>"><?=$item['name']?></a>
            </p>
          </div>
        </div>
      </li>
      <?php } ?>
    </ul>
  </div>
  <?php } ?>
</div>
<!-- <div class="item__blk">
  <ul class="g-menu-sub-list">
    <li class="sub-list__item">
      <div class="sub-list__item-contents">
        <div class="item__contents-inner">
          <span class="item__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="21.234" height="20" viewBox="0 0 21.234 20">
              <g transform="translate(0 -14.874)">
                <path d="M470.9,25.4h0l.013-.007Z" transform="translate(-451.371 -10.086)"
                  fill="#6c6c6c" />
                <path
                  d="M20.67,15.34a1.155,1.155,0,0,0-1.14-.023l-1.809.98-2.369-1.284a1.154,1.154,0,0,0-1.1,0L11.885,16.3,9.517,15.014a1.153,1.153,0,0,0-1.1,0L6.05,16.3l-1.806-.979a1.153,1.153,0,0,0-1.7,1.014V31.483H3.727v-15.1l1.773.962a1.155,1.155,0,0,0,1.1,0l2.368-1.284,2.368,1.284a1.155,1.155,0,0,0,1.1,0L14.8,16.065l2.369,1.284a1.155,1.155,0,0,0,1.1,0l1.776-.962V31.815a1.873,1.873,0,0,1-1.873,1.873H3.956a2.77,2.77,0,0,1-2.77-2.77V18.568H0v12.35a3.956,3.956,0,0,0,3.956,3.956H18.175a3.059,3.059,0,0,0,3.059-3.059V16.331A1.154,1.154,0,0,0,20.67,15.34Z"
                  fill="#6c6c6c" />
                <rect width="13.686" height="4.233" transform="translate(5.091 19.444)"
                  fill="#6c6c6c" />
                <rect width="4.829" height="5.207" transform="translate(13.949 25.338)"
                  fill="#6c6c6c" />
                <rect width="7.118" height="0.791" transform="translate(5.091 25.417)" fill="#6c6c6c" />
                <rect width="7.118" height="0.791" transform="translate(5.091 29.675)" fill="#6c6c6c" />
                <rect width="7.118" height="0.791" transform="translate(5.091 27.546)" fill="#6c6c6c" />
              </g>
            </svg>
          </span>
          <p class="item__ttl">
            <a class="item__link" href="/record/">お知らせ</a>
          </p>
        </div>
      </div>
    </li>
    <li class="sub-list__item">
      <div class="sub-list__item-contents">
        <div class="item__contents-inner">
          <span class="item__icon">
          </span>
          <p class="item__ttl">
            <a class="item__link" href="#">大カテゴリー</a>
          </p>
        </div>
      </div>
    </li>
    <li class="sub-list__item">
      <div class="sub-list__item-contents">
        <div class="item__contents-inner">
          <span class="item__icon">
          </span>
          <p class="item__ttl">
            <a class="item__link" href="#">小カテゴリー</a>
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
            <svg xmlns="http://www.w3.org/2000/svg" width="21.234" height="20" viewBox="0 0 21.234 20">
              <g transform="translate(0 -14.874)">
                <path d="M470.9,25.4h0l.013-.007Z" transform="translate(-451.371 -10.086)"
                  fill="#6c6c6c" />
                <path
                  d="M20.67,15.34a1.155,1.155,0,0,0-1.14-.023l-1.809.98-2.369-1.284a1.154,1.154,0,0,0-1.1,0L11.885,16.3,9.517,15.014a1.153,1.153,0,0,0-1.1,0L6.05,16.3l-1.806-.979a1.153,1.153,0,0,0-1.7,1.014V31.483H3.727v-15.1l1.773.962a1.155,1.155,0,0,0,1.1,0l2.368-1.284,2.368,1.284a1.155,1.155,0,0,0,1.1,0L14.8,16.065l2.369,1.284a1.155,1.155,0,0,0,1.1,0l1.776-.962V31.815a1.873,1.873,0,0,1-1.873,1.873H3.956a2.77,2.77,0,0,1-2.77-2.77V18.568H0v12.35a3.956,3.956,0,0,0,3.956,3.956H18.175a3.059,3.059,0,0,0,3.059-3.059V16.331A1.154,1.154,0,0,0,20.67,15.34Z"
                  fill="#6c6c6c" />
                <rect width="13.686" height="4.233" transform="translate(5.091 19.444)"
                  fill="#6c6c6c" />
                <rect width="4.829" height="5.207" transform="translate(13.949 25.338)"
                  fill="#6c6c6c" />
                <rect width="7.118" height="0.791" transform="translate(5.091 25.417)" fill="#6c6c6c" />
                <rect width="7.118" height="0.791" transform="translate(5.091 29.675)" fill="#6c6c6c" />
                <rect width="7.118" height="0.791" transform="translate(5.091 27.546)" fill="#6c6c6c" />
              </g>
            </svg>
          </span>
          <p class="item__ttl">
            <a class="item__link" href="#">ブログ</a>
          </p>
        </div>
      </div>
    </li>
    <li class="sub-list__item">
      <div class="sub-list__item-contents">
        <div class="item__contents-inner">
          <span class="item__icon">
          </span>
          <p class="item__ttl">
            <a class="item__link" href="#">カテゴリー</a>
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
            <svg xmlns="http://www.w3.org/2000/svg" width="19.995" height="19.995"
              viewBox="0 0 19.995 19.995">
              <rect width="11.664" height="4.166" transform="translate(4.166 4.166)" fill="#6c6c6c" />
              <path id="article-icon-path-01" data-name="article-icon-path-01"
                d="M0,0V20H20V0ZM17.913,17.913H2.083V2.083h15.83v15.83Z" fill="#6c6c6c" />
              <rect width="5.832" height="1.25" transform="translate(9.998 10.831)" fill="#6c6c6c" />
              <rect width="5.832" height="1.25" transform="translate(9.998 14.163)" fill="#6c6c6c" />
              <rect width="4.166" height="4.582" transform="translate(4.166 10.831)" fill="#6c6c6c" />
            </svg>
          </span>
          <p class="item__ttl">
            <a class="item__link" href="#">施工事例</a>
          </p>
        </div>
      </div>
    </li>
    <li class="sub-list__item">
      <div class="sub-list__item-contents">
        <div class="item__contents-inner">
          <span class="item__icon">
          </span>
          <p class="item__ttl">
            <a class="item__link" href="#">カテゴリー</a>
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
            <svg xmlns="http://www.w3.org/2000/svg" width="19.995" height="19.995"
              viewBox="0 0 19.995 19.995">
              <rect width="11.664" height="4.166" transform="translate(4.166 4.166)" fill="#6c6c6c" />
              <path id="article-icon-path-01" data-name="article-icon-path-01"
                d="M0,0V20H20V0ZM17.913,17.913H2.083V2.083h15.83v15.83Z" fill="#6c6c6c" />
              <rect width="5.832" height="1.25" transform="translate(9.998 10.831)" fill="#6c6c6c" />
              <rect width="5.832" height="1.25" transform="translate(9.998 14.163)" fill="#6c6c6c" />
              <rect width="4.166" height="4.582" transform="translate(4.166 10.831)" fill="#6c6c6c" />
            </svg>
          </span>
          <p class="item__ttl">
            <a class="item__link" href="#">お客様の声</a>
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
            <svg xmlns="http://www.w3.org/2000/svg" width="19.997" height="21.095"
              viewBox="0 0 19.997 21.095">
              <g transform="translate(0 -19.703)">
                <path
                  d="M83.561,220.093h16.876a.91.91,0,0,0,.776-.4.649.649,0,0,0-.056-.765l-3.646-4.468a1.862,1.862,0,0,0-1.471-.638,1.839,1.839,0,0,0-1.443.686l-1.04,1.383-2.891-3.542a1.86,1.86,0,0,0-1.472-.64,1.837,1.837,0,0,0-1.443.686l-4.928,6.557a.642.642,0,0,0-.028.753A.907.907,0,0,0,83.561,220.093Z"
                  transform="translate(-81.852 -183.439)" fill="#6c6c6c" />
                <path
                  d="M281.666,141.909a1.915,1.915,0,1,0-1.916-1.916A1.916,1.916,0,0,0,281.666,141.909Z"
                  transform="translate(-269.138 -113.091)" fill="#6c6c6c" />
                <path d="M0,19.7V40.8H20V19.7ZM18.02,38.538H1.977V21.963H18.02Z"
                  transform="translate(0 0)" fill="#6c6c6c" />
              </g>
            </svg>
          </span>
          <p class="item__ttl">
            <a class="item__link" href="#">メディア</a>
          </p>
        </div>
      </div>
    </li>
  </ul>
</div> -->