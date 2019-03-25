/* globals jQuery */

(function($) {
  $('.Accordion > .Accordion--item > h4').click(function() {
    if (
      $(this)
        .parent()
        .hasClass('active')
    ) {
      $(this)
        .parent()
        .removeClass('active')
    } else {
      $('.Accordion--item').removeClass('active')
      $(this)
        .parent()
        .addClass('active')
    }
  })
})(jQuery)
