<?php /* ステップ1 */ ?>
<div class="c-switch-contents --step-1" data-step="1" v-if="currentStep === 1">
  <div class="g-contact-form-blk --name">
    <div class="form-blk-lbl">
      <label class="form-blk-lbl-name" for="name">コンテンツデータ名</label>
      <span class="form-blk-lbl-status --required">必須</span>
    </div>
    <div class="form-blk-input --des">
      <p class="form-blk-confirm">こちらに入力された名称でデータを管理します。</p>
    </div>
    <div class="form-blk-input">
      <input id="name" class="name form-blk-input-field js-post-field" type="text" name="name" v-model="formData.posts[0].val.data" @input="getPosts('name'); checkErrPosts('name');" data-preg="alpha" data-num="1" data-tag="text">
      <p class="form-blk-input-err"></p>
    </div>
    <div class="form-blk-input --err" v-if="errData.posts[0].val.flg">
      <p class="form-blk-confirm">コンテンツデータ名は必ずご入力ください。<br>また、アルファベットとアンダースコア（_）以外は使用致しかねますますのでご注意ください。</p>
    </div>
  </div>
  <div class="g-contact-form-blk --label">
    <div class="form-blk-lbl">
      <label class="form-blk-lbl-name" for="label">コンテンツラベル名</label>
      <span class="form-blk-lbl-status --required">必須</span>
    </div>
    <div class="form-blk-input --des">
      <p class="form-blk-confirm">こちらに入力された名称が「コンテンツ管理」に表示されます。</p>
    </div>
    <div class="form-blk-input">
      <input id="label" class="label form-blk-input-field js-post-field" type="text" name="label" v-model="formData.posts[1].val.data" @input="getPosts('label'); checkErrPosts('label');" data-preg="text" data-num="2" data-tag="text">
      <p class="form-blk-input-err"></p>
    </div>
    <div class="form-blk-input --err" v-if="errData.posts[1].val.flg">
      <p class="form-blk-confirm">コンテンツラベル名は必ずご入力ください。<br>また、空白文字（半角・全角スペースなど）は使用致しかねますますのでご注意ください。</p>
    </div>
  </div>
  <div class="g-contact-form-blk --submit-area">
    <div class="form-blk-input">
      <div class="form-blk-input">
        <div class="c-submit-btn-outer --col-1">
          <div class="c-submit-btn-container">
            <button id="g-form-input" class="c-submit-btn" type="button" data-mode="next" @click="changeNextStep();" v-if="!errData.posts[0].val.flg && !errData.posts[1].val.flg">
              <span class="c-submit-btn__lbl">次へ</span>
            </button>
            <button id="g-form-input" class="c-submit-btn" type="button" data-mode="next" v-else="errData.posts[0].val.flg && errData.posts[1].val.flg" disabled>
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
      <select id="category" name="category" class="category form-blk-input-field js-post-field" data-preg="integer" data-num="3" data-tag="select" v-model="selected" @change="getPosts('category'); checkErrPosts('category');">
        <option value="0">選択なし</option>
        <?php foreach ((array)$groupView AS $key => $val) { ?>
        <option value="<?=$val['id']?>"><?=$val['label']?>(<?=$val['name']?>)</option>
        <?php } ?>
      </select>
      <p class="form-blk-input-err"></p>
    </div>
    <div class="form-blk-input --err" v-if="errData.posts[2].val.flg">
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
            <button id="g-form-confirm" class="c-submit-btn" type="button" data-mode="next" @click="changeNextStep();" v-if="!errData.posts[2].val.flg">
              <span class="c-submit-btn__lbl">確認する</span>
            </button>
            <button id="g-form-confirm" class="c-submit-btn" type="button" data-mode="next" v-else="errData.posts[2].val.flg" disabled>
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
              <span class="c-submit-btn__lbl">作成する</span>
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