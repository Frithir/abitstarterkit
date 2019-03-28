/* globals jQuery flickity-imagesloaded  */

export default () => {
  const gallery = document.querySelector('.gallery');
  if (!gallery) return;
  new Flickity(gallery, {
    wrapAround: true,
    autoPlay: 4000,
    imagesLoaded: true,
    pageDots: false
    //cellAlign: 'left',
  });
};
