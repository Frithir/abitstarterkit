/* globals jQuery masonry-layout  */

export default () => {
  const elem = document.querySelector('#content');
  if (!elem) {
    return;
  }
  new Masonry(elem, {
    // selector for entry content
    columnWidth: '.grid-sizer',
    itemSelector: '.overview-block',
    percentPosition: true
  });
};
