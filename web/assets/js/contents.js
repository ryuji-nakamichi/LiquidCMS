'use strict';

window.addEventListener('load', () => {
  // initial();
  // moveContentsStep();
  // getInputVal();
  // contentsCreate();
  stepVue();
});

document.addEventListener('DOMContentLoaded', () => {
  
});

/**
 * フォームをVueで管理する
 * @return {object} data
 */
function stepVue() {
  const { createApp } = Vue;
  createApp({
    data() {
      return {
        currentStep: 1,
        formData: {
          'posts' :
            [
              { name: '' },
              { category: '' }
            ]
        },
        errData: {
          'posts':
            [
              { name: false },
              { category: false }
            ]
        }
      }
    },
    created: function () {
      console.log('created');
      console.log(this.errData.posts);
    },
    methods: {
      changeNextStep() {
        this.currentStep++;
      },
      changeBackStep() {
        this.currentStep--;
      },
      getContentsName() {
        this.formData.posts.name = $('#name').val();
      },
      getCategory() {
        this.formData.posts.category = $('#category').val();
      },
      checkContentsName(e) {
        this.errData.posts.name = (this.formData.posts.name) ? true : false;
      },
      checkCategory(e) {
        this.errData.posts.category = (this.formData.posts.category) ? true : false;
      },
    }
  }).mount('#contents-app');
}

/**
 * 初期設定として、入力画面を表示する
 * @return {void}
 */
function initial () {
  $('.c-switch-contents.--step-1').addClass('--current')
}

/**
 * 入力された値を確認画面に出力する
 * @return {void}
 */
function getInputVal() {
  $('#g-form-confirm').on('click', function () {
    // ループ処理で入力済みの値を取得するjs-post-field
    $('.js-post-field').each(function (index, value) {
      let data = ($(value).val()) ? $(value).val() : 'なし';
      $('#result-' + $(value).attr('id')).text(data);
    });
  });
}


/**
 * ステップ1からステップ4まで遷移させる
 * @return {void}
 */
function moveContentsStep() {
  let modeStr;
  let modeInt;
  let btnMode = '';
  $('.c-submit-btn').on('click', function () {
    modeStr = $(this).closest('.c-switch-contents.--current').attr('data-step');
    modeInt = parseInt(modeStr);
    btnMode = $(this).attr('data-mode');

    if (btnMode === 'next') {
      $('.c-switch-contents.--step-' + (modeInt)).removeClass('--current');
      $('.c-switch-contents.--step-' + (modeInt + 1)).addClass('--current');
    } else if (btnMode === 'prev') {
      $('.c-switch-contents.--step-' + (modeInt)).removeClass('--current');
      $('.c-switch-contents.--step-' + (modeInt - 1)).addClass('--current');
    }
    
  });
}


/**
 * Ajax送信の実行
 */
function contentsCreate() {
  $('#g-form-submit').on('click', function() {
    contentsCreateAjax();
  });
}


/**
 * 入力された値をAjax送信処理
 */
function contentsCreateAjax() {
  $.ajax({
    url: "/apis/contents.php", // 通信先のURL
    type: "POST",		// 使用するHTTPメソッド
    data: $("#g-contact-form").serialize(), // 送信するデータ
    dataType: "json", // 応答のデータの種類 
    // (xml/html/script/json/jsonp/text)
    timespan: 1000, 		// 通信のタイムアウトの設定(ミリ秒)
    // async: false, 同期にする場合はasync:falseを追加する
    // 2. doneは、通信に成功した時に実行される
    //  引数のresは、通信で取得したデータ
    //  引数のtextStatusは、通信結果のステータス
    //  引数のjqXHRは、XMLHttpRequestオブジェクト
  }).done(function (res, textStatus, jqXHR) {
    $("#status-code").text(jqXHR.status); //例：200
    $("#result-response").text(jqXHR.status); //例：Response
    $("#status-mode").text(textStatus); //例：success
    $("#result-err").text('エラーなし'); //例：NOT FOUND


    // 3. キーを指定して値を表示 
    $("#result-name").text(res["form"]["name"]);
    $("#result-group").text(res["form"]["category"]);


    // 4. JavaScriptオブジェクトをJSONに変換
    let res_json = JSON.stringify(res);


    // 5.JSONをJavaScriptオブジェクトにし、
    // キーを指定して値(httpbin.org)を表示
    let res_parse = JSON.parse(res_json);

    console.log('成功');

    $('.c-switch-contents').removeClass('--current');
    $('.c-switch-contents:last-child').addClass('--current');
    $('.c-switch-contents:last-child .c-annouceList-wrapper.--suc').addClass('--current');

    // 6. failは、通信に失敗した時に実行される
  }).fail(function (jqXHR, textStatus, errorThrown) {
    $("#status-code").text(jqXHR.status); //例：404
    $("#result-response").text(jqXHR.status); //例：Response
    $("#status-mode").text(textStatus); //例：error
    $("#result-err").text(errorThrown); //例：NOT FOUND

    console.log('失敗');

    $('.c-switch-contents').removeClass('--current');
    $('.c-switch-contents:last-child').addClass('--current');
    $('.c-switch-contents:last-child .c-annouceList-wrapper.--err').addClass('--current');

    // 7. alwaysは、成功/失敗に関わらず実行される
  }).always(function () {
    console.log('完了');
    $("#result-cpl").text("complete");
  });
}