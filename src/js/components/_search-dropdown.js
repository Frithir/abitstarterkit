/* globals jQuery */

(function($) {
  $('.search-link').click(function(e) {
    e.preventDefault();
    if ($('.search-overlay').hasClass('active')) {
      $('.search-overlay').removeClass('active');
    } else {
      $('body').css({ 'overflow-y': 'hidden' });
      $('.search-overlay')
        .addClass('active')
        .find('.site-search')
        .focus();
      $('.search-overlay').animate({ opacity: 1 }, 300, 'linear');
    }
  });
  $('.search-overlay')
    .find('.close')
    .on('click', e => {
      e.stopPropagation();
      $('.search-overlay').animate({ opacity: 0 }, 300, 'linear', () => {
        $('.search-overlay').removeClass('active');
      });
      $('body').css({ 'overflow-y': 'auto' });
    });
  $('.search-overlay').on('click', e => {
    e.stopPropagation();
    if ($(e.target).hasClass('search-overlay')) {
      $('.search-overlay')
        .find('.close')
        .trigger('click');
    }
  });
})(jQuery);
