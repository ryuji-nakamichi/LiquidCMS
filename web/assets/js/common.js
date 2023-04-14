'use strict';

window.addEventListener('load', () => {
  smoothScroll();
});

document.addEventListener('DOMContentLoaded', () => {
  openMenu();
  closeSpMenu();
});

function smoothScroll () {
  const smoothScrollTrigger = document.querySelectorAll('.js-scroll');
  for (let i = 0; i < smoothScrollTrigger.length; i++){
    smoothScrollTrigger[i].addEventListener('click', (e) => {
      e.preventDefault();
      let href = smoothScrollTrigger[i].getAttribute('href');
      let targetElement = document.getElementById(href.replace('#', ''));
      const rect = targetElement.getBoundingClientRect().top;
      const offset = window.pageYOffset;
      const gap = 60; // 固定ヘッダーの高さ
      const target = rect + offset - gap;
      window.scrollTo({
        top: target,
        behavior: 'smooth',
      });
    });
  }
}


function openMenu() {
  $('.js-open-hamburger-menu').on('click', function() {
    if ($('.g-header').hasClass('is-open')) {
      $('.g-header').removeClass('is-open');
    } else {
      $('.g-header').addClass('is-open');
    }
  });
}


function closeSpMenu() {
  const $menuList = document.querySelectorAll('.js-scroll');
  const $header = document.querySelector('.g-header');
  for (let i = 0; i < $menuList.length; i++){
    $menuList[i].addEventListener('click', (e) => {
      e.preventDefault();
      if ($header.classList.contains('is-open')) {
        $header.classList.remove('is-open');
      }
    });
  }
}
