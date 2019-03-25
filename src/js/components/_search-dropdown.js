/* globals jQuery */

(function($) {
  $('.search-link').click(function(e) {
    e.preventDefault()
    if ($('.search-drop-down').hasClass('active')) {
      $('.search-drop-down').removeClass('active')
    } else {
      $('.search-drop-down').addClass('active')
    }
  })
})(jQuery)
