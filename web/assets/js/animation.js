'use strict';

window.addEventListener('load', () => {

  // mvAnimation();
  scrollAnimation();
});


/**
 * MVのアニメーションを非同期に実行する
 */
async function mvAnimation() {

  // MVの各要素を取得
  // const $loading = document.querySelector('.loading-container');
  // const $mvTxt01 = document.querySelector('.js-mv-intro-txt.--01');
  // const $mvTxt02 = document.querySelector('.js-mv-intro-txt.--02');
  // const $mvTxt03 = document.querySelector('.js-mv-intro-txt.--03');
  // const $mvBg = document.querySelector('.js-mv-intro-bg');
  // const $logo = document.querySelector('.g-header-logo');

  // scene01
  // const scene_01 = await new Promise((resolve) => setTimeout(() => {
  //   $mvTxt01.classList.add('is-show');
  //   resolve(true);
  // }, 1000));

  // // scene02
  // const scene_02 = await new Promise((resolve) => setTimeout(() => {
  //   $mvTxt02.classList.add('is-show');
  //   resolve(true);
  // }, 1000));
  

  // // scene03
  // const scene_03 = await new Promise((resolve) => setTimeout(() => {
  //   $mvTxt03.classList.add('is-show');
  //   resolve(true);
  // }, 1000));


  // // scene04
  // const scene_04 = await new Promise((resolve) => setTimeout(() => {
  //   $mvBg.classList.add('is-show');
  //   resolve(true);
  // }, 10000));


  // // scene05
  // const scene_05 = await new Promise((resolve) => setTimeout(() => {
  //   $loading.classList.add('is-show');
  //   resolve(true);
  // }, 1000));


  // // scene06
  // const scene_06 = await new Promise((resolve) => setTimeout(() => {
  //   $loading.remove();
  //   resolve(true);
  // }, 2000));


  // // scene07
  // const scene_07 = await new Promise((resolve) => setTimeout(() => {
  //   $logo.classList.add('is-show');
  //   resolve(true);
  // }, 1000));


  // scene08
  // const scene_08 = await new Promise((resolve) => setTimeout(() => {
  //   mvSlider(); // ローディングアニメーションが完了してからスライダーを動かす
  //   resolve(true);
  // }, 3000));

}

document.addEventListener('DOMContentLoaded', () => {
});


function productsAnimation () {

  const mediaQuery = window.matchMedia('(min-width: 768px)');

  gsap.registerPlugin(ScrollTrigger);

  const productsArea = document.querySelector(".products-list-container");
  const productsList = document.querySelector(".js-products-list");
  const items = document.querySelectorAll(".js-products-list .list__item");
  const itemHeight = document.querySelector(".products-list-container").offsetHeight / items.length;
  const itemsMax = items.length;
  const productsListHeight = document.querySelector(".products-list-container").offsetHeight;

  if (mediaQuery.matches) {

    //横幅を指定
    gsap.set(productsList, { width: itemsMax * 100 + "%" });
    gsap.set(items, { width: 100 / itemsMax + "%" });

    gsap.to(items, {
      // xPercent: -100 * (itemsMax - 1 ), //x方向に移動させる
      ease: "none",
      scrollTrigger: {
        trigger: productsArea, //トリガー
        start: "top top", //開始位置
        pin: true, //ピン留め
        scrub: true, //スクロール量に応じて動かす
        end: () => "+=" + itemHeight - productsListHeight, // アニメーションの終了タイミング
      }
    });

  }
}


function scrollAnimation (class_name = 'js-anima') {
  let _class_name;
  let data_anima;

  let currentScrollPos;
  let currentScrollPosBottom;
  let targetPos;
  let elemtop;
  let windowPosCenter;

  const $anima = document.querySelectorAll('.js-anima');
  _class_name = class_name;

  window.addEventListener('scroll', (e) => {
    currentScrollPos = window.pageYOffset; // 現在のスクロール量（画面の最上部）
    currentScrollPosBottom = window.pageYOffset + screen.availHeight; // 現在のスクロール量（画面の最下部）
    windowPosCenter = currentScrollPosBottom - (screen.height / 2);
    for (let i = 0; i < $anima.length; i++){
      targetPos = $anima[i].getBoundingClientRect();
      elemtop = targetPos.top + window.pageYOffset;
      if (elemtop < windowPosCenter) {
        $anima[i].classList.add('is-show');
      }
      
    }

  });
}