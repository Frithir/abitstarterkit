import Flickity from 'flickity-imagesloaded'

export default () => {
  (function() {
    const fullwidthGallery = document.querySelector('.featured-slider')
    if (!fullwidthGallery) {
      return
    }
    const slides = fullwidthGallery.querySelectorAll('.overview-block-product')
    if (fullwidthGallery && slides.length > 1) {
      new Flickity(fullwidthGallery, {
        setGallerySize: true,
        wrapAround: true,
        pageDots: false,
        prevNextButtons: true,
        autoPlay: 34000,
        imagesLoaded: true,
        cellAlign: 'left',
        arrowShape: {
          x0: 10,
          x1: 60,
          y1: 50,
          x2: 60,
          y2: 45,
          x3: 15
        }
      })
    } else {
      fullwidthGallery.classList.remove('flickity')
    }
  })()
}
