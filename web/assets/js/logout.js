'use strict';

const { createApp } = Vue;

window.addEventListener('load', () => {
  loginVue();
});

document.addEventListener('DOMContentLoaded', () => {});

/**
 * フォームをVueで管理する
 * @return {object} data
 */
function loginVue() {
  const logoutApp = createApp({
    data() {
      return {
        resJson: {
          'res': [],
          'status': '',
        },
        resGetJson: {
          'res': [],
        },
        resFaildFlg: false,
        resFinishedFlg: false,
        
        // エラー内容表示用
        errRes: {
          'response': {
            'data': '',
            'status': '',
            'headers': '',
          },
          'request': '',
          'message': '',
          'config': '',
          'process': '',
        },
        logoutFlg: false,
        lginFailPopUpFlg: false,
      }
    },
    created: function () {
    },
    methods: {
      /**
       * Ajax送信用処理
       * 各inputやselectに入力された値をセットする
       * @returns {object} params
       */
      setParams() {
        const params = new URLSearchParams();

        params.append('mode', 'logout');
        params.append('mode_preg', 'alpha');

        return params;
      },
      /**
       * Ajax送信用処理（削除用）
       * 各inputやselectに入力された値をPHP側に送信する
       * @param {object} params 
       * @param {string} url 
       * @returns {void}
       */
      postsAjaxWithParams(params, url) {
        axios.post(url, params, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
        .then((res) => {
          if (res.data.res.logoutFlg) {
            this.logoutFlg = true;
          }
          this.resJson.res = res.data.res.posts; // POSTデータ
          this.resJson.status = res.data.res.status; // statusコード
          this.resJson.errFlg = res.data.res.errFlg; // 正規表現のフラグ
          this.resFaildFlg = (this.resJson.status === 'ng') ? true : false;
        })
        .catch(error => {
          this.resFaildFlg = true;
          if (error.response) {
            // リクエストが行われ、サーバーは 2xx の範囲から外れるステータスコードで応答しました
            this.errRes.response.data = error.response.data;
            this.errRes.response.status = error.response.status;
            this.errRes.response.headers = error.response.headers;
            // console.log(error.response.data);
            // console.log(error.response.status);
            // console.log(error.response.headers);
          } else if (error.request) {
            // リクエストは行われましたが、応答がありませんでした
            // `error.request` は、ブラウザでは XMLHttpRequest のインスタンスになり、
            // Node.js では http.ClientRequest のインスタンスになります。
            this.errRes.request = error.request;
            // console.log(error.request);
          } else {
            // エラーをトリガーしたリクエストの設定中に何かが発生しました
            this.errRes.message = error.message;
            // console.log('Error', error.message);
          }
          console.log(error);
        }).finally(() => {
          this.errRes.process = '完了';

          if (this.logoutFlg) {
            location.href = '/login/';
          }
        });
      },
      /**
       * Ajaxで送信してPHP側で処理させた後に結果を返却させる
       * 成功したか失敗したかをSTEPの最後にて表示させる
       * @returns {void}
       */
      postsAjaxWithParamsRun(e) {
        const params = this.setParams();
        this.postsAjaxWithParams(params, '/ajax/logout/common.php');
      },
    }
  });
  logoutApp.mount('#header-app');
}