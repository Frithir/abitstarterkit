/* globals jQuery */

import allSlider from './components/_flickity-sliders';
import gallerySlider from './components/_featured-slider';
import instagramFeed from './components/_InstagramFeed-slider';
import gallery from './components/_Gallery';

import lazyLoad from './_lazyLoad';
import homeNav from './_home-nav';
import popup from './_popup';
import navScroll from './_navScroll';
import storeLocator from './components/_storeLocator';
import popupVideo from './_popupVideo';

import './_mobileNav';
import './_quantity';
import './_tab';
import './components/_accordion';
import './components/_search-dropdown';
import './components/_woo-gallery';

function init() {
  jQuery('input[type="submit"]').each((i, e) => {
    let attrStr = '',
      text = '';
    jQuery.each(e.attributes, function(i, elem) {
      if ('value' === elem.name) text = elem.value;
      else attrStr += ' ' + elem.name + '="' + elem.value + '"';
    });
    jQuery(e).replaceWith('<button' + attrStr + '>' + text + '</button>');
  });

  storeLocator();
  allSlider();
  gallerySlider();
  instagramFeed();
  lazyLoad();
  homeNav();
  popup();
  navScroll();
  gallery();
  popupVideo();
}

init();
