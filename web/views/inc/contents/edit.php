<input id="category-id" type="hidden" value="<?=$contentsEditView[0]['category']?>">
<input id="label-name" type="hidden" value="<?=$contentsEditView[0]['label']?>">
<?php /* ステップ1 */ ?>
<div class="c-switch-contents --step-1" data-step="1" v-if="currentStep === 1">
  <div class="g-contact-form-blk --name">
    <div class="form-blk-lbl">
      <label class="form-blk-lbl-name" for="name">コンテンツデータ名</label>
      <span class="form-blk-lbl-status --required">必須</span>
    </div>
    <div class="form-blk-input --des">
      <p class="form-blk-confirm">こちらに表示されている名称でデータを管理します。</p>
    </div>
    <div class="form-blk-input">
      <p id="name" class="name form-blk-input-field"><?=$contentsEditView[0]['name']?></p>
      <p class="form-blk-input-err"></p>
    </div>
    <div class="form-blk-input --err">
      <p class="form-blk-confirm">こちらのデータは変更不可になります。</p>
    </div>
  </div>
  <div class="g-contact-form-blk --label">
    <div class="form-blk-lbl">
      <label class="form-blk-lbl-name" for="label">コンテンツラベル名</label>
      <span class="form-blk-lbl-status --required">必須</span>
    </div>
    <div class="form-blk-input --des">
      <p class="form-blk-confirm">こちらに入力された名称で「コンテンツラベル名」を更新します。</p>
    </div>
    <div class="form-blk-input">
      <input id="label" class="label form-blk-input-field js-post-field" type="text" name="label" v-model="label" @input="getPosts('label'); checkErrPosts('label');" data-preg="text" data-num="2" data-tag="text">
      <p class="form-blk-input-err"></p>
    </div>
    <div class="form-blk-input --err" v-if="errData.posts[1].val.flg && label === ''">
      <p class="form-blk-confirm">コンテンツラベル名は必ずご入力ください。<br>また、空白文字（半角・全角スペースなど）は使用致しかねますますのでご注意ください。</p>
    </div>
  </div>
  <div class="g-contact-form-blk --submit-area">
    <div class="form-blk-input">
      <div class="form-blk-input">
        <div class="c-submit-btn-outer --col-1">
          <div class="c-submit-btn-container">
            <button id="g-form-input" class="c-submit-btn" type="button" data-mode="next" @click="getPosts('label'); changeNextStep();" v-if="!errData.posts[1].val.flg || label !== ''">
              <span class="c-submit-btn__lbl">次へ</span>
            </button>
            <button id="g-form-input" class="c-submit-btn" type="button" data-mode="next" v-else disabled>
              <span class="c-submit-btn__lbl">次へ</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /* ステップ2 */ ?>
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
      <?php if ($contentsEditView[0]['child_max'] === '0' && $contentsEditView[0]['group_flg'] === '0') { ?>
      <select id="category" name="category" class="category form-blk-input-field js-post-field" data-preg="integer" data-num="3" data-tag="select" v-model="selected" @change="getPosts('category'); checkErrPosts('category');">
        <option value="0">選択なし</option>
        <?php foreach ((array)$groupView AS $key => $val) { ?>
        <option value="<?=$val['id']?>"><?=$val['label']?>(<?=$val['name']?>)</option>
        <?php } ?>
      </select>
      <?php } ?>
      <p class="form-blk-input-err"></p>
    </div>
    <?php if ($contentsEditView[0]['child_max'] === '0' && $contentsEditView[0]['group_flg'] === '0') { ?>
    <div class="form-blk-input --err" v-if="errData.posts[2].val.flg">
      <p class="form-blk-confirm">グループ設定は必ずご選択ください。</p>
    </div>
    <?php } else { ?>
    <div class="form-blk-input --err">
      <p class="form-blk-confirm">こちらのデータは変更不可になります。<br>現在、こちらのグループに紐付いているデータが<?=$contentsEditView[0]['child_max']?>件あります。<br>グループを変更する場合は、先に紐付いているデータを別のグループに移動させ、紐付いているデータを削除し、グループ管理よりグループ登録を削除してください。</p>
    </div>
    <?php } ?>
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
            <button id="g-form-confirm" class="c-submit-btn" type="button" data-mode="next" @click="getPosts('category'); changeNextStep();" v-if="!errData.posts[2].val.flg || selected !== ''">
              <span class="c-submit-btn__lbl">確認する</span>
            </button>
            <button id="g-form-confirm" class="c-submit-btn" type="button" data-mode="next" v-else disabled>
              <span class="c-submit-btn__lbl">確認する</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /* ステップ3 */ ?>
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
            <button id="g-form-submit" class="c-submit-btn" type="button" data-mode="submit" @click="changeNextStep(); postsAjaxWithParamsRun($event);">
              <span class="c-submit-btn__lbl">更新する</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /* ステップ4 */ ?>
<div class="c-switch-contents --step-4" data-step="4" v-if="currentStep === 4">
  <div class="g-contact-form-blk --submit-area">
    <div class="form-blk-input">
      <div class="form-blk-input">
        <div class="c-submit-btn-outer">
          <div class="c-submit-btn-container --prev">
            <a class="c-submit-btn" href="<?=DOMAIN_URI?>">
              <span class="c-submit-btn__lbl">戻る</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>