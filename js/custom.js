(function ($) {
$( document ).ready(function() {

$("#handheld-btn").click(function() {
  $(this).toggleClass("active");
  if ($("#handheld-btn").hasClass("closed")) {
    $(this).removeClass("closed");
    $(this).addClass("open");
    $("#page-wrap").animate({
      left: '70%'
    }, 200);
  } else if ($("#handheld-btn").hasClass("open")) {
    $(this).removeClass("open");
    $(this).addClass("closed");
    $("#page-wrap").animate({
      left: '0'
    }, 200);
  }
  event.preventDefault();
});

$(window).on("resize", function() {
  if ($("#handheld-btn").hasClass("open") && $(window).width() > 768) {
    $("#handheld-btn").removeClass("open");
    $("#handheld-btn").addClass("closed");
    $("#page-wrap").animate({
      left: '0'
    }, 500);
  }
});

$('a#menu-site-search').text('');
$("a#menu-site-search").click(function(e) {
 $(this).toggleClass('active');
 $('#site-search').toggle();
 $('#search-site input[type=search]:first').focus();
return event.preventDefault();
});

$(function() {
    $('.match-height').matchHeight();
});

$('#menu-site-search').click(function(){
    $('form#search-block-form input[type=text]').focus();
});


  var cookie_notice;
  cookie_notice = function() {
    if ($.cookie('euromod_seen_cookie_notice') === void 0) {
      $('#page-wrap').before('<p class="cookie-notice">EUROMOD uses cookies to improve your browsing experience. By continuing to browse this site you are agreeing to our use of cookies. <a href="/privacy/cookies">Find out more about cookies</a> <a href="#" class="close">x</a></p>');
      $.cookie('euromod_seen_cookie_notice', 'yes', {
        expires: 9999
      });
      return $('.cookie-notice a.close').on('click', (function(_this) {
        return function(e) {
          $('.cookie-notice').slideUp('fast');
          return false;
        };
      })(this));
    }
  };
  return cookie_notice();

});

})(jQuery);
