/* globals google jQuery masonry-layout lodash/throttle */

import _throttle from 'lodash/throttle';
// import Masonry from 'masonry-layout';

const storeLocator = () => {
  let map = null,
    markers = [],
    autocomplete,
    countryRestrict = { country: ['au', 'us'] },
    zoomed = false;

  const mapElement = document.querySelector('.store-locator--map'),
    markerElements = Array.from(document.querySelectorAll('.store-locator--map .store-locator--marker')),
    //resultsElement = document.querySelector('.store-locator--results'),
    autocompleteElement = document.querySelector('.store-locator--inputs--location input');

  if (!mapElement) return false;

  // get options passed from php
  const options = JSON.parse(mapElement.dataset.options),
    args = {
      center: options.center || {
        lat: 0,
        lng: 25
      },
      styles: [
        {
          featureType: 'administrative',
          elementType: 'all',
          stylers: [{ visibility: 'on' }, { saturation: -100 }, { lightness: 20 }]
        },
        {
          featureType: 'road',
          elementType: 'all',
          stylers: [{ visibility: 'on' }, { saturation: -100 }, { lightness: 40 }]
        },
        {
          featureType: 'water',
          elementType: 'all',
          stylers: [{ visibility: 'on' }, { saturation: -10 }, { lightness: 30 }]
        },
        {
          featureType: 'landscape.man_made',
          elementType: 'all',
          stylers: [{ visibility: 'simplified' }, { saturation: -60 }, { lightness: 10 }]
        },
        {
          featureType: 'landscape.natural',
          elementType: 'all',
          stylers: [{ visibility: 'simplified' }, { saturation: -60 }, { lightness: 60 }]
        },
        {
          featureType: 'poi',
          elementType: 'all',
          stylers: [{ visibility: 'off' }, { saturation: -100 }, { lightness: 60 }]
        },
        {
          featureType: 'transit',
          elementType: 'all',
          stylers: [{ visibility: 'off' }, { saturation: -100 }, { lightness: 60 }]
        }
      ],
      zoom: 2,
      scrollwheel: options.scrollwheel === undefined ? true : options.scrollwheel,
      draggable: options.draggable || false,
      disableDefaultUI: options.disableDefaultUI || false
    },
    initMap = () => {
      map = new google.maps.Map(mapElement, args);
      markerElements.forEach(markerEl => addMarker(markerEl, map));
      initMasonryGrid();
      initAutocomplete();
      addListeners();

      // Try HTML5 geolocation.
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          position => {
            const pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            map.panTo(pos);
            map.setZoom(5);
            zoomed = true;
          },
          err => console.log('Geolocation failed', err)
        );
      } else {
        // Browser doesn't support Geolocation
        console.log("Browser doesn't support Geolocation");
      }
    },
    initMasonryGrid = () => {
      if (document.getElementsByClassName('locations-grid')) {
        const elements = document.getElementsByClassName('locations-grid');
        for (let i = 0; i < elements.length; i++) {
          const width = jQuery(window).width();
          jQuery(window).load(() => {
            new Masonry(elements[i], {
              columnWidth: '.locations-grid-sizer',
              itemSelector: '.locations-grid-item',
              percentPosition: true,
              gutter: 830 < width ? 50 : 10
            });
            jQuery('.locations-grid').animate({ opacity: 1 }, 300);
          });
        }
      }
    },
    initAutocomplete = () => {
      autocomplete = new google.maps.places.Autocomplete(/** @type {!HTMLInputElement} */ (autocompleteElement), {
        types: ['(regions)'],
        componentRestrictions: countryRestrict
      });
    },
    addListeners = () => {
      map.addListener('bounds_changed', _throttle(updateVisible, 200));
      autocomplete.addListener('place_changed', onPlaceChanged);
    },
    onPlaceChanged = () => {
      const place = autocomplete.getPlace();
      zoomed = false;
      if (place && place.geometry) {
        map.panTo(place.geometry.location);
        map.setZoom(args.zoom);
      } else {
        autocompleteElement.placeholder = 'Enter a city';
      }
    },
    updateVisible = () => {
      const bounds = map.getBounds();
      markers.forEach(marker => {
        const isVisible = bounds.contains(marker.getPosition());
        marker.setVisible(isVisible);
        if (!isVisible) marker.infowindow.close();
      });

      if ('undefined' !== autocomplete.getPlace() && !zoomed) {
        //console.log(autocomplete.getPlace().geometry.viewport)
        map.fitBounds(autocomplete.getPlace().geometry.viewport);
        zoomed = true;
      }
      // renderResults()
    },
    // renderResults = () => {
    //   let results = []
    //   markers.forEach(marker => {
    //     console.log(marker)
    //     if (!marker.visible) return
    //     const markerHTML = `<div class="store-locator--results--item">${
    //       marker.infowindow.content
    //     }</div>`
    //     results.push(markerHTML)
    //   })
    //   resultsElement.innerHTML = results.join('')
    // },
    addMarker = (markerEl, map) => {
      const center = JSON.parse(markerEl.dataset.center),
        latlng = new google.maps.LatLng(center.lat, center.lng),
        icon = {
          url: `${window.wpGlobal.templateUrl}/images/marker.svg`,
          scaledSize: new google.maps.Size(60 / 2, 54 / 2),
          anchor: new google.maps.Point(60 / 2 / 2, 54 / 2 / 2)
        },
        marker = new google.maps.Marker({
          position: latlng,
          map: map,
          icon: icon
        });

      markers.push(marker);

      if (markerEl.innerHTML) {
        marker.infowindow = new google.maps.InfoWindow({
          content: markerEl.innerHTML
        });
        google.maps.event.addListener(marker, 'click', () => {
          marker.infowindow.open(map, marker);
        });
      }
    };

  initMap();
};

export default storeLocator;
