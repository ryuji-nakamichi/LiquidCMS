<div class="c-switch-contents --step-3" v-if="currentStep === 3">
  <div class="c-annouceList-wrapper">
    <div class="c-lead">
      <p class="c-lead-txt">以下が入力頂いた内容になります。<br>この内容で作成してもよろしいですか？</p>
    </div>
    <div class="c-annouceList-container">
      <ul class="c-annouceList">
        <li class="list__item">
          <p class="item__des">
            <span class="item__des-inner">コンテンツデータ名 : </span>
            <span id="result-name" class="item__des-inner" v-if="pageName == 'contents_edit'">変更不可なので変更なし</span>
            <span id="result-name" class="item__des-inner" v-else>
              {{ formData.posts[0].val.data !== '' ? formData.posts[0].val.lbl : '入力なし' }}
            </span>
          </p>
        </li>
        <li class="list__item">
          <p class="item__des">
            <span class="item__des-inner">コンテンツラベル名 : </span>
            <span id="result-name" class="item__des-inner">
              {{ formData.posts[1].val.data !== '' ? formData.posts[1].val.lbl : '入力なし' }}
            </span>
          </p>
        </li>
        <li class="list__item">
          <p class="item__des">
            <span class="item__des-inner">グループ設定 : </span>
            <span id="result-category" class="item__des-inner">
              {{ formData.posts[2].val.data !== 0 ? formData.posts[2].val.lbl : '選択なし' }}
            </span>
          </p>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="c-switch-contents --step-4" v-if="currentStep === 4">
  <div class="c-annouceList-wrapper --err" v-if="resFaildFlg === true">
    <div class="c-lead">
      <p class="c-lead-txt">処理が失敗しました。<br>以下が処理結果の内容になります。<br>お手数ですが、最初から操作をお願い致します。</p>
    </div>
    <div class="c-annouceList-container">
      <ul class="c-annouceList">
        <li class="list__item">
          <p class="item__des">
            <span class="item__des-inner">エラー内容 : </span>
            <span id="status-mode" class="item__des-inner">
              {{ errRes.response.data ? errRes.response.data : '不明' }}
            </span>
          </p>
        </li>
        <li class="list__item">
          <p class="item__des">
            <span class="item__des-inner">ステータスコード : </span>
            <span id="status-code" class="item__des-inner">
              {{ errRes.response.status ? errRes.response.status : '不明' }}
            </span>
          </p>
        </li>
        <li class="list__item">
          <p class="item__des">
            <span class="item__des-inner">Request : </span>
            <span id="result-response" class="item__des-inner">
              {{ errRes.request ? errRes.request : '不明' }}
            </span>
          </p>
        </li>
        <li class="list__item">
          <p class="item__des">
            <span class="item__des-inner">Message : </span>
            <span id="result-err" class="item__des-inner">
              {{ errRes.message ? errRes.message : '不明' }}
            </span>
          </p>
        </li>
        <li class="list__item">
          <p class="item__des">
            <span class="item__des-inner">処理状況 : </span>
            <span id="result-cpl" class="item__des-inner">
              {{ errRes.process ? errRes.process : '不明' }}
            </span>
          </p>
        </li>
      </ul>
    </div>
  </div>
  <div class="c-annouceList-wrapper --suc" v-if="resFaildFlg !== true">
    <div class="c-lead">
      <p class="c-lead-txt">完了致しました。<br>コンテンツ管理よりデータの登録をお願い致します。</p>
    </div>
  </div>
</div>