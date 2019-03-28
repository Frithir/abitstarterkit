/* globals jQuery flickity-imagesloaded  */

export default () => {
  const instagramFeed = document.querySelector('.InstagramFeed--row');
  if (!instagramFeed) return;
  new Flickity(instagramFeed, {
    setGallerySize: true,
    wrapAround: true,
    pageDots: false,
    prevNextButtons: false,
    imagesLoaded: true,
    freeScrollFriction: 10,
    selectedAttraction: 0.0001,
    autoPlay: 10000,
    friction: 0.1,
    cellAlign: 'left'
  });
};
