/* globals jQuery PhotoSwipe PhotoSwipeUI_Default masonry-layout  */

export default () => {
  const container = [],
    init = () => {
      if (!jQuery('.madi-brides .grid').length) return;
      initGrid();
      jQuery('.madi-brides .grid').animate({ opacity: 1 }, 3);
      // jQuery(window).load(() => {
      //   initGrid()
      //   jQuery('.madi-brides .grid').animate({ opacity: 1 }, 300)
      // })
      getGalleryItems();
      bindClickEvent();
    },
    initGrid = () => {
      new Masonry(document.querySelector('.grid'), {
        columnWidth: '.grid-sizer',
        itemSelector: '.grid-item',
        percentPosition: true,
        gutter: 10
      });
    },
    getGalleryItems = () => {
      jQuery('.grid')
        .find('figure')
        .each(function() {
          const $link = jQuery(this).find('img'),
            item = {
              src: $link.data('hd'),
              w: $link.data('w'),
              h: $link.data('h'),
              title: $link.data('title')
            };
          container.push(item);
        });
    },
    bindClickEvent = () => {
      jQuery('.grid-item').on('click', e => {
        e.preventDefault();
        const $pswp = jQuery('.pswp')[0],
          options = {
            index: jQuery(e.currentTarget).index() - 1,
            bgOpacity: 0.85,
            showHideOpacity: true
          },
          gallery = new PhotoSwipe($pswp, PhotoSwipeUI_Default, container, options);
        gallery.init();
      });
    };
  init();
};
