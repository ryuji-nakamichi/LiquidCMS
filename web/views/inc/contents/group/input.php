<?php /* ステップ1 */ ?>
<div class="c-switch-contents --step-1" data-step="1" v-if="currentStep === 1">
  <div class="g-contact-form-blk --category">
    <div class="form-blk-lbl">
      <label class="form-blk-lbl-name" for="category">グループ登録</label>
      <span class="form-blk-lbl-status --required">必須</span>
    </div>
    <div class="form-blk-input --des">
      <p class="form-blk-confirm">コンテンツ管理の「グループ設定」に表示させることが可能です。</p>
    </div>
    <div class="form-blk-input">
      <select id="category" name="category" class="category form-blk-input-field js-post-field" data-preg="integer" data-num="1" data-tag="select" v-model="selected" @change="getPosts('category'); checkErrPosts('category');">
        <?php foreach ((array)$groupView AS $key => $val) { ?>
        <option value="<?=$val['id']?>"><?=$val['label']?>(<?=$val['name']?>)</option>
        <?php } ?>
      </select>
      <p class="form-blk-input-err"></p>
    </div>
    <div class="form-blk-input --err" v-if="errData.posts[0].val.flg">
      <p class="form-blk-confirm">グループ登録は必ずご選択ください。</p>
    </div>
  </div>
  <div class="g-contact-form-blk --submit-area">
    <div class="form-blk-input">
      <div class="form-blk-input">
        <div class="c-submit-btn-outer">
          <div class="c-submit-btn-container">
            <button id="g-form-confirm" class="c-submit-btn" type="button" data-mode="next" @click="changeNextStep();" v-if="!errData.posts[0].val.flg">
              <span class="c-submit-btn__lbl">確認する</span>
            </button>
            <button id="g-form-confirm" class="c-submit-btn" type="button" data-mode="next" v-else="errData.posts[0].val.flg" disabled>
              <span class="c-submit-btn__lbl">確認する</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /* ステップ2 */ ?>
<div class="c-switch-contents --step-2" data-step="2" v-if="currentStep === 2">
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
<?php /* ステップ3 */ ?>
<div class="c-switch-contents --step-3" data-step="3" v-if="currentStep === 3">
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