'use strict';

const { createApp } = Vue;

window.addEventListener('load', () => {
  stepVue();
});

document.addEventListener('DOMContentLoaded', () => {});

/**
 * フォームをVueで管理する
 * @return {object} data
 */
function stepVue() {
  const app1 = createApp({
    data() {
      return {
        stepMax: 4,
        formItemMax: 2,
        currentStep: 1,
        formData: {
          posts:
            []
        },
        errData: {
          posts:
            []
        },
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
        editFlg: true,
        pageName: 'contents_edit',
        id: '', // データID
        selected: '', // グループ設定の初期値になる
        label: '', // コンテンツラベル名の初期値になる
      }
    },
    created: function () {
      this.setInitPostsData(this.formItemMax);
      this.setInitErrsData(this.formItemMax);
    },
    mounted: function () {
      this.getIdData('data-id');
      this.getSelectData('category-id');
      this.getLabelData('label-name');
    },
    methods: {
      changeNextStep() {
        this.currentStep++;
      },
      changeBackStep() {
        this.currentStep--;
      },
      /**
       * 初期設定として配列に値を格納しておく
       * 何かしら設定しおかないと、Vue側でエラーが発生するため
       * @param {integer} max
       * @returns {void}
       */
      setInitPostsData(max) {
        for (let i = 0; i < max; i++) {
          this.formData.posts[i] = {
            val: {
              data: '',
              key: '',
              lbl: '',
              preg: '',
            }
          }
        }
      },
      /**
       * 初期設定として配列に値を格納しておく
       * 何かしら設定しおかないと、Vue側でエラーが発生するため
       * @param {integer} max
       * @returns {void}
       */
      setInitErrsData(max) {
        for (let i = 0; i < max; i++) {
          this.errData.posts[i] = {
            val: {
              data: '',
              key: '',
              preg: '',
              msg: '',
              flg: true,
            }
          }
        }
      },
      /**
       * 各inputやselectに入力された値を取得する
       * 取得した値を配列に格納する
       * ※対応する添字部分にオブジェクトを格納するので、
       * 該当部分にてループ処理は途中で終了する
       * @param {string} name 
       * @returns {void}
       */
      getPosts(name) {
        const $el = $('#' + name);
        const elVal = $el.val();
        const elPreg = $el.data('preg');
        const elTxt = this.getPostsLbl(name);
        const elNum = Number($el.data('num')) - 1;
        const max = $('.js-post-field').length;
        
        for (let i = 0; i < max; i++) {
          this.formData.posts[elNum] = {
            val: {
              data: elVal,
              key: name,
              lbl: elTxt,
              preg: elPreg,
            }
          }
          break;
        }
      },
      /**
       * 引数のHTMLタグに入力された値のテキストを取得する
       * inputならvalue属性の値、sekectならtext部分を取得する
       * @param {string} el 
       * @returns {string} lbl
       */
      getPostsLbl(el) {
        const $el = $('#' + el);
        let lbl;
        const elTag = $el.data('tag');
        if (elTag === 'text') {
          lbl = $el.val();
        } else if (elTag === 'select') {
          lbl = $('#' + el + ' option:selected').text();
        }
        return lbl;
      },
      /**
       * 引数を元に正規表現を動的に生成する
       * @param {string} str 
       * @returns {RegExp} regExp
       */
      setRegExp(str) {
        let regExp;
        if (str === 'alpha') {
          regExp = /^[a-zA-Z]+[_]?[a-zA-Z]+$/;
        } else if (str === 'integerNotZero') {
          regExp = /^[1-9]{1}[0-9]*$/;
        } else if (str === 'integer') {
          regExp = /^[0-9]+$/;
        } else if (str === 'text') {
          regExp = /^[^\s\t<>＜＞=\'\"”’^]+$/;
        }
        return regExp;
      },
      /**
       * 各inputやselectに入力された値を検査する
       * 取得した値を配列に格納する
       * ※対応する添字部分にオブジェクトを格納するので、
       * 該当部分にてループ処理は途中で終了する
       * @param {string} name 
       * @returns {void}
       */
      checkErrPosts(name) {
        const $el = $('#' + name);
        const elVal = $el.val();
        const elPreg = $el.data('preg');
        const elNum = Number($el.data('num')) - 1;
        const max = $('.js-post-field').length;
        let flg = true;
        const pregMatchPattern = this.setRegExp(elPreg);

        if (pregMatchPattern === void 0) {
          // throw new Error("適切でない値が混入された可能性があります。お手数ですが最初から入力をお願い致します。");
        }

        const pregMatchResult = pregMatchPattern.test(elVal);
        if (!pregMatchResult) {
          // throw new Error("入力された値が適切でない可能性があります。お手数ですが最初から入力をお願い致します。");
        }

        for (let i = 0; i < max; i++) {
          flg = (pregMatchResult) ? false : true;
          this.errData.posts[elNum] = {
            val: {
              data: elVal,
              key: name,
              preg: elPreg,
              msg: name + 'は必ずご入力ください。',
              flg: flg,
            }
          }
          break;
        }
      },
      /**
       * Ajax送信用処理（更新用）
       * 各inputやselectに入力された値をセットする
       * 
       * @returns {object} params
       */
      setParams() {
        const params = new URLSearchParams();
        const max = this.formData.posts.length;
        params.append('mode', 'update');
        params.append('mode_preg', 'alpha');
        params.append('id', this.id);
        params.append('id_preg', 'integerNotZero');
        console.log(params);

        for (let i = 0; i < max; i++) {
          if (this.formData.posts[i].val.key) {
            params.append(this.formData.posts[i].val.key, this.formData.posts[i].val.data);
            params.append(this.formData.posts[i].val.key + '_preg', this.formData.posts[i].val.preg);
          }
        }

        return params;
      },
      /**
       * Ajax送信用処理（登録用）
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
          // console.log(res.data);
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
          console.log(this.errRes);
        }).finally(() => {
          this.errRes.process = '完了';

          if (!this.resFaildFlg) {
            this.getsAjaxContentsRun();
            this.resFinishedFlg = true;
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
        this.postsAjaxWithParams(params, '/ajax/contents/common.php');
      },
      /**
       * Ajax送信用処理（取得用）
       * コンテンツ管理のデータを取得して表示する
       * @returns {void}
       */
      getsAjaxContents(url) {
        const reqParams = new URLSearchParams();
        reqParams.append('mode', 'select');
        reqParams.append('mode_preg', 'alpha');
        axios.post(url, reqParams, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
          .then((res) => {
            this.resJson.res = res.data.res.posts;
            this.resGetJson.res = res.data.res.query;
            console.log(this.resGetJson.res);
          })
          .catch(error => {
            if (error.response) {
            } else if (error.request) {

            } else {
            }
          }).finally(() => {
            this.errRes.process = '完了';
          });
      },
      /**
       * Ajaxで送信してPHP側で取得したデータを表示させる
       * @returns {void}
       */
      getsAjaxContentsRun() {
        this.getsAjaxContents('/ajax/contents/common.php');
      },
      /**
       * IDの値を取得する
       * @param {string} name
       * @returns {void}
       */
      getIdData(name) {
        this.id = document.getElementById(name) ? document.getElementById(name).value : ''
      },
      /**
       * セレクトボックスの値を取得する
       * @param {string} name
       * @returns {void}
       */
      getSelectData(name) {
        this.selected = document.getElementById(name) ? document.getElementById(name).value : ''
      },
      /**
       * コンテンツラベル名の値を取得する
       * @param {string} name
       * @returns {void}
       */
      getLabelData(name) {
        this.label = document.getElementById(name) ? document.getElementById(name).value : ''
      },
    }
  });
  app1.mount('#contents-app');
}