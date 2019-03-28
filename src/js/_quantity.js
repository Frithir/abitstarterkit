/* globals jQuery */

(function($) {
  $('.plusminuslabel').click(function() {
    var $button = $(this);
    var oldValue = $button
      .parent()
      .find('.input-text.qty')
      .val();
    var newVal;
    if ($button.hasClass('pluslabel')) {
      newVal = parseFloat(oldValue) + 1;
    } else {
      // Don't allow decrementing below zero
      if (0 < oldValue) {
        newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 0;
      }
    }
    $button
      .parent()
      .find('.input-text.qty')
      .val(newVal);
  });
})(jQuery);
