/* globals jQuery */

($ => {
  let lastActiveItem = false,
    activeItem = false;

  const init = () => {
      if (!$('.single-product').length) return;
      initStickyContent();
      initThumbnailClick();
      setActiveItem();

      $('.woo-gallery-item:not(.video)').each((i, e) => {
        $(e)
          .zoom({ on: 'click' })
          .css({ cursor: 'zoom-in' });
      });
    },
    initStickyContent = () => {
      const initStickyKit = () => {
        if (830 <= $(window).width()) {
          $('.sticky-item').stick_in_parent({ offset_top: 80 });
        } else {
          $('.sticky-item[data-responsive!="desktop-only"]').stick_in_parent({
            offset_top: 75
          });
        }
      };
      $(window).on('resize', () => {
        $('.sticky-item').trigger('sticky_kit:detach');
        initStickyKit();
      });
      initStickyKit();
    },
    initThumbnailClick = () => {
      $('.woo-gallery-thumbnail').on('click', e => {
        e.preventDefault();
        const $element = $('.woo-gallery-item:nth-child(' + ($(e.currentTarget).index() + 1) + ')');
        scrollToElement($element);
      });
    },
    scrollToElement = $element => {
      $([document.documentElement, document.body])
        .stop()
        .animate(
          {
            scrollTop: $element.offset().top - $('header').height() / 2 + $element.height() / 2 - $(window).height() / 2
          },
          1000
        );
    },
    setActiveItem = () => {
      let trashHold = $(window).height() / 2;
      $(
        '.woo-gallery-sidebar .woo-gallery-thumbnail:first-of-type, .woo-gallery-items .woo-gallery-item:first-of-type'
      ).addClass('active');
      $(window).on('scroll', e => {
        trashHold = e.currentTarget.scrollY + $(window).height() / 2;
        handleVideoPlay(trashHold);
        changeActiveItem(trashHold);
      });
      handleVideoPlay(trashHold);
      changeActiveItem(trashHold);
    },
    handleVideoPlay = trashHold => {
      $('.woo-gallery-item.video').each((i, e) => {
        const $video = $(e)
          .find('video')
          .get(0);
        if ($(e).offset().top + $(e).height() < trashHold || $(e).offset().top > trashHold) {
          $video.pause();
        } else {
          $video.play();
        }
      });
    },
    changeActiveItem = trashHold => {
      $('.woo-gallery-item').each((i, e) => {
        if ($(e).offset().top < trashHold) activeItem = e;
      });
      if (activeItem !== lastActiveItem) {
        $('.woo-gallery-item, .woo-gallery-thumbnail').removeClass('active');
        $(activeItem).addClass('active');
        $('.woo-gallery-thumbnail:nth-child(' + ($(activeItem).index() + 1) + ')').addClass('active');
        lastActiveItem = activeItem;
      }
    };

  init();
})(jQuery);
