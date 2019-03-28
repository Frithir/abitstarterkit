/* globals jQuery */

(function($) {
  $('.icon.burger').click(function() {
    $('body').css({ overflow: 'hidden' });
    $('.mobile-nav-overlay')
      .css({ display: 'flex' })
      .animate(
        {
          opacity: 1
        },
        300
      );
  });
  $('.mobile-nav-overlay .close').on('click', () => {
    $('.mobile-nav-overlay').animate({ opacity: 0 }, 300, () => {
      $('.mobile-nav-overlay').css({ display: 'none' });
      $('body').css({ overflow: 'auto' });
    });
  });
})(jQuery);
