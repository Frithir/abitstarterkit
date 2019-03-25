/* globals jQuery */

(function($) {
  $('.icon').click(function() {
    $('.top-menu').toggleClass('top-animate')
    $('.mid-menu').toggleClass('mid-animate')
    $('.bottom-menu').toggleClass('bottom-animate')
    $('body').toggleClass('open-nav')
    $('.mobile-menu').slideToggle()
    $(this).toggleClass('open')
  })
  /*var window_size = $(document).height()
  $('.mobile-menu').css({'height': window_size + 'px'})*/
  $('.mobile-menu .menu-item-has-children > a').append(
    '&nbsp&nbsp <i class="fa fa-plus"></i>'
  )
  $('.mobile-menu .sub-menu').hide()
  // Click the + icon to expand the subnav
  $('.mobile-menu .menu-item-has-children > a .fa').click(function(event) {
    event.preventDefault()
    $(this)
      .closest('li')
      .find('.sub-menu')
      .slideToggle()
    $(this).toggleClass('fa-minus')
  })
})(jQuery)
