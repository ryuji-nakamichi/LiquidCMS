'use strict';

window.addEventListener('load', () => {
});

document.addEventListener('DOMContentLoaded', () => {
  formSend();
});

/**
 * フォームのバリデーションメッセージを出力する
 * @param {object} formObj バリデーション対象のオブジェクト（各フォーム要素が格納された配列とバリデーション通過フラグ）
 * @param {string} mode エラーメッセージ表示モード（確認画面などで非表示にしたいならhideにする）
 */
function validateMsgControl (formObj = {}, mode = 'show') {
  const _mode = mode;
  const _formObj = formObj;
  let item;
  let $target
  for (let i = 0; i < _formObj.formData.length; i++) {
    item = _formObj.formData[i];
    $target = document.getElementById(item.name).closest(".g-contact-form-blk").querySelector('.form-blk-input-err');
    
    if (_mode === 'show') {
      if (!item.validate.check_flg) {
        $target.textContent = item.validate.message;
      } else {
        $target.textContent = '';
      }
    } else {
      $target.textContent = '';
    }
    
  }
}

/**
 * フォームのバリデーション
 * @param {string} id バリデーション対象のフォームのid属性値
 * @return {object} result バリデーション対象のオブジェクト（各フォーム要素が格納された配列とバリデーション通過フラグ）
 */
 function validate (id = 'g-contact-form') {

  // フォーム要素の取得（複数のformがある場合）
  const $form = document.getElementById(id);
  const $inputBtn = document.getElementById('g-form-input');

  // バリデーション対象の要素定義
  const $name = document.getElementById('name');
  const $kana = document.getElementById('kana');
  const $tel = document.getElementById('tel');
  const $email = document.getElementById('email');
  const $message = document.getElementById('message');
  const $privacy_agree = document.getElementById('privacy-agree');

  let result = {};

  const formInputArr = [
    { 'name': 'name', 'el': $name, 'validate': { 'method': 'required', 'message': '必ず入力してください。', 'check_flg': false } },
    { 'name': 'kana', 'el': $kana, 'validate': { 'method': 'required', 'message': '必ず入力してください。', 'check_flg': false } },
    { 'name': 'tel', 'el': $tel, 'validate': { 'method': 'required', 'message': '必ず入力してください。', 'check_flg': false }},
    {'name': 'email', 'el':$email, 'validate': {'method': 'required', 'message': '必ず入力してください。', 'check_flg': false}},
    {'name': 'message', 'el':$message, 'validate': {'method': 'required', 'message': '必ず入力してください。', 'check_flg': false}},
    {'name': 'privacy-agree', 'el':$privacy_agree, 'validate': {'method': 'required', 'message': '必ずチェックしてください。', 'check_flg': false}},
  ];

  let flg = false; // 各ループ内でのチェックフラグ
  let flg_arr = []; // 各ループを総合してのフラグ配列
  let result_flg = false; // 最終的にバリデーションを通過できたかのフラグ
  let check_flg = false; // フォームのオブジェクト内に設定するフラグ

  let item;
  
  // 各対象にバリデーション処理を実行
  for (let i = 0; i < formInputArr.length; i++) {
    item = formInputArr[i];
    flg = checkValidate(item);
    flg_arr[i] = flg;

    if (flg) {
      item.validate.check_flg = true;
    }
  }

  // フラグをチェックして判定
  for (let i = 0; i < flg_arr.length; i++) {
    if (flg_arr[i]) {
      result_flg = true;
    } else {
      result_flg = false; // 一つでもfalseならループが終了（バリデーション通過できないルート）
      break;
    }
  }

  result.formData = formInputArr;
  result.flg = result_flg;

  return result;
    

  /**
   * バリデーション処理関数
   * @param {string} item バリデーション対象のフォームが格納された配列
   * @return {boolean} check_flg バリデーション結果フラグ
  */
  function checkValidate (item) {
    const _el = item.el;
    const _method = item.validate.method;
    let input_val = '';
    let type;

    input_val = _el.value;
    type = _el.getAttribute('data-type');

    if (_method === 'required') {
      if (type === 'text') {
        check_flg = (input_val !== '') ? true: false;
      } else if (type === 'textarea') {
        check_flg = (input_val !== '') ? true: false;
      } else if (type === 'privacy-agree') { 
        check_flg = (_el.checked) ? true: false;
      }
    }

    return check_flg;
  }
  
 }

/**
 * フォーム要素の位置までアンカー移動
 * @param {string} id フォームのid
 */
function moveScrollContact (id = 'g-contact') {
  const $form = document.getElementById(id);
  const rect = $form.getBoundingClientRect().top;
  const offset = window.pageYOffset;
  const gap = 60; // 固定ヘッダーの高さ
  const target = rect + offset - gap;

  window.scrollTo({
    top: target,
    behavior: 'smooth',
  });
}


/**
 * radioボタンの選択されている値のみを取得
 * @param {string} class_name radio要素のclass名
 * @return {array} 各radio要素の値が格納された配列（radioなので一つしかないが）
 */
function getRadioVal (class_name = '') {
  const _class_name = class_name;
  let radios_val = []; // array
  let radios_clean_val = [] // array
  const radios = document.querySelectorAll('.' + _class_name);
  for (let i = 0; i < radios.length; i++) {
    if (radios[i].checked) {
      radios_val[i] = radios[i].value;
    }
  }

  radios_clean_val = radios_val.filter(Boolean);

  return radios_clean_val;
}


/**
 * 各フォームの値を取得する（radio、checkboxは別メソッドを本メソッド内で実行し取得）
 * @param {string} formTagIdName form要素のid名
 */
function getFormItemsVal (formTagIdName = 'g-contact-form') {
  // const $formTagIdName = formTagIdName;

  // 各項目の値を取得する
  let postVals = []; // array
  let type_vals = []; // array
  let name_val;
  let kana_val;
  let tel_val;
  let email_val;
  let message_val;
  let privacyAgree_val;
  let postVals_json;
  let postData_json;


  // ラジオボタンの値取得
  type_vals = getRadioVal('type');

  name_val = document.getElementById('name').value;
  kana_val = document.getElementById('kana').value;
  tel_val = document.getElementById('tel').value;
  email_val = document.getElementById('email').value;
  message_val = document.getElementById('message').value;
  privacyAgree_val = document.getElementById('privacy-agree').value;


  // フォームの値を配列にセットする（確認画面用）
  postVals[0] = {'key' : 'type', 'value' : type_vals};
  postVals[1] = {'key': 'name', 'value': name_val };
  postVals[2] = {'key': 'kana', 'value': kana_val };
  postVals[3] = {'key' : 'tel', 'value' : tel_val};
  postVals[4] = {'key' : 'email', 'value' : email_val};
  postVals[5] = {'key' : 'message', 'value' : message_val};
  postVals[6] = {'key' : 'privacy-agree', 'value' : privacyAgree_val};

  postVals_json = JSON.stringify(postVals);

  localStorage.setItem('form_posts', postVals_json);
}


/**
 * フォームの表示を確認画面に切り替える
 */
function formSwitchConfirm () {
  const postData_json = localStorage.getItem('form_posts');
  const postData = JSON.parse(postData_json);
  const _postData = postData;
  const $form = document.getElementById('g-contact');
  const input_class = '--input';
  const confirm_class = '--confirm';
  const $input_classes = $form.querySelectorAll('.' + input_class);
  const $formBlock = $form.querySelector('.g-contact-frame');


  // 確認画面に切り替える
  if ($formBlock.classList.contains(input_class)) {
    $formBlock.classList.remove(input_class);
    $formBlock.classList.add(confirm_class);

    localStorage.setItem('form_flg', true);
    moveScrollContact();
  }

  // 確認画面で表示する各input,textareaなどの入力内容を表示する
  for (let i = 0; i < _postData.length; i++) {
    let $target = document.getElementById(_postData[i].key).closest(".g-contact-form-blk").querySelector('.form-blk-confirm');
    $target.textContent = _postData[i].value;
  }

  let flg = localStorage.getItem('form_flg');
}


/**
 * フォームの値を再入力できるように入力画面に切り替える
 */
function formSwitchInput () {
  const $form = document.getElementById('g-contact');
  const $backBtn = document.getElementById('g-form-back');
  const input_class = '--input';
  const confirm_class = '--confirm';
  const $formBlock = $form.querySelector('.g-contact-frame');

  $backBtn.addEventListener('click', function(e) {
    if ($formBlock.classList.contains(confirm_class)) {
      $formBlock.classList.remove(confirm_class);
      $formBlock.classList.add(input_class);
    }
    localStorage.setItem('form_flg', false);
    moveScrollContact();
  }, false);
}


/**
 * フォームの値を送信画面に切り替える
 * @param {object} postDataAll form各要素の値のオブジェクト
 */
function formSwitchSend () {
  const $form = document.getElementById('g-contact');
  const $submitBtn = document.getElementById('g-form-submit');
  // const input_class = '--input';
  const send_class = '--thanks';
  const confirm_class = '--confirm';
  const $formBlock = $form.querySelector('.g-contact-frame');

  let flg;
  let Timer;
  const url = './apis/index.php';
  let data;
  let postData_json;
  let postData;

  $submitBtn.addEventListener('click', function(e) {
    let posts_json = localStorage.getItem('form_posts');
    let posts = JSON.parse(posts_json);

    let postData = new FormData();

    // フォームの値をオブジェクトにセットする（Fetch用）
    postData.set('type', posts[0].value[0]); // array
    postData.set('name', posts[1].value);
    postData.set('kana', posts[2].value);
    postData.set('tel', posts[3].value);
    postData.set('email', posts[4].value);
    postData.set('message', posts[5].value);
    postData.set('privacy-agree', posts[6].value);
    
    data = {
      method: 'POST',
      body: postData
    };

    flg = localStorage.getItem('form_flg');
    if (flg) {
      if (Timer) {
        clearTimeout(Timer);
      }
      Timer = setTimeout(function() {
        fetch(url, data)
        .then(
          (res) => {
            return res.json();
          }
        )
        .then(
          (res) => {

            if ($formBlock.classList.contains(confirm_class)) {
              $formBlock.classList.remove(confirm_class);
              $formBlock.classList.add(send_class);
            }
            moveScrollContact();
            console.log(res);
            localStorage.setItem('form_flg', false);
            localStorage.setItem('form_posts', []);
          }
        );
      }, 500);
    }

  }, false);
}


/**
 * フォームの値をFetchで非同期的に送信する
 */
function formSend () {
  const $fetchForm = document.getElementById('g-contact-form');
  const $inputBtn = document.getElementById('g-form-input');

  localStorage.setItem('form_flg', false); // 送信可能フラグを初期化
  localStorage.setItem('form_posts', []); // 送信データを初期化

  let validateObj = {};

  $inputBtn.addEventListener('click', function(e) {
    e.preventDefault();
    getFormItemsVal('g-contact-form'); // 各項目の値を取得する
    validateObj = validate();
    if (validateObj.flg) {
      formSwitchConfirm(); // 確認画面に切り替える
      validateMsgControl(validateObj, 'hide'); // バリデーションメッセージを非表示
    } else {
      validateMsgControl(validateObj, 'show'); // バリデーションメッセージを表示
    }
  }, false);
  formSwitchInput(); // 入力画面に切り替える
  formSwitchSend(); // 送信画面に切り替える
  
}