'use strict';

window.addEventListener('load', () => {
  mvSlider();
  workSlider();
  productsSlider();
  matchListHeight('.productsCard-list .list__item');
  
  // matchHeight('.productsCard-list');

  // const resize = () => {

  //   let timeoutID = 0;
  //   let delay = 500;

  //   window.addEventListener("resize", () => {
  //     clearTimeout(timeoutID);
  //     timeoutID = setTimeout(() => {

  //       //ここにリサイズした後に実行したい処理を記述
  //       console.log("resize");
  //       matchHeight('.productsCard-list');
  //     }, delay);
  //   }, false);
  // };

  // resize();
});

document.addEventListener('DOMContentLoaded', () => {
});

function mvSlider() {
  const mvSwiper = new Swiper(".js-mv-slider", {
    speed: 5000,
    autoplay: {
      delay: 3000,
    },
    effect: 'fade',
    loop: true,
    initialSlide: 0,
    navigation: {
      nextEl: ".swiper-button-next-mv",
      prevEl: ".swiper-button-prev-mv",
    },
  });
}

function workSlider() {
  const workSwiper = new Swiper(".js-work-slider", {
    speed: 500,
    // autoplay: {
    //   delay: 2000,
    // },
    loop: false,
    slidesPerView: 1,
    navigation: {
      nextEl: ".swiper-button-next-work",
      prevEl: ".swiper-button-prev-work",
    },
    breakpoints: {
      // スライドの表示枚数：500px以上の場合
      768: {
        slidesPerView: 3,
      }
    }
  });
}


function productsSlider() {
  const productsSwiper = new Swiper(".js-products-slider", {
    speed: 500,
    // autoplay: {
    //   delay: 2000,
    // },
    loop: false,
    slidesPerView: 1,
    navigation: {
      nextEl: ".swiper-button-next-products",
      prevEl: ".swiper-button-prev-products",
    },
    breakpoints: {
      // スライドの表示枚数：500px以上の場合
      768: {
        slidesPerView: 3,
      }
    },
  });
}

// 要素の高さ揃える
function matchListHeight(targetElement) {  
  $(targetElement).matchHeight();
}
window.addEventListener('load', () => {

})