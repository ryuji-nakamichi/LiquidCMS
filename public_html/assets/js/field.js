'use strict';

window.addEventListener('load', () => {
  fieldCreate();
});

document.addEventListener('DOMContentLoaded', () => {
  
});


function fieldCreate() {
  $('#g-form-submit').on('click', function() {
    fieldCreateAjax();
  });
}


function fieldCreateAjax() {
  const postsObj = {};
  $.ajax({
    url: "http://httpbin.org/post", // 通信先のURL
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
    $("#status-erea-code").text(jqXHR.status); //例：200
    $("#status-erea-status").text(textStatus); //例：success


    // 3. キーを指定して値を表示 
    $("#result-erea-field__name").text(res["form"]["field_name"]);
    $("#result-erea-field__id").text(res["form"]["field_id"]);


    // 4. JavaScriptオブジェクトをJSONに変換
    let res_json = JSON.stringify(res);


    // 5.JSONをJavaScriptオブジェクトにし、
    // キーを指定して値(httpbin.org)を表示
    let res_parse = JSON.parse(res_json);
    $("#result-host-txt").text(res_parse["headers"]["Host"]);


    // 6. failは、通信に失敗した時に実行される
  }).fail(function (jqXHR, textStatus, errorThrown) {
    $("#status-erea-code").text(jqXHR.status); //例：404
    $("#status-erea-status").text(textStatus); //例：error
    $("#result-err-txt").text(errorThrown); //例：NOT FOUND

    // 7. alwaysは、成功/失敗に関わらず実行される
  }).always(function () {
    $("#result-cpl-txt").text("complete");
  });
}