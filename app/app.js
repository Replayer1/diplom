$(document).ready(function () {
  $(document).scroll(function () {
    let scroll = $(window).scrollTop();
    if (scroll == 0) {
      $('header').addClass('header__all')
      $('.header__logo').removeClass('mini')
      $('.sort').removeClass('sort-mini')
    } else {
      $('header').removeClass('header__all')
      $('.header__logo').addClass('mini')
      $('.sort').addClass('sort-mini')
    }
    console.log(scroll)
  });
});
