'use strict';

(function($) {
  /*
   *  new_map
   */
  function new_map($el) {
    // const
    const $markers = $el.find('.marker');
    // consts
    const args = {
      zoom: 14,
      center: new google.maps.LatLng(0, 0),
      mapTypeControl: false,
      panControl: false,
      scrollwheel: false,
      zoomControlOptions: {
        style: google.maps.ZoomControlStyle.SMALL,
        position: google.maps.ControlPosition.RIGHT_CENTER
      },
      styles: [
        { featureType: 'administrative', elementType: 'all', stylers: [{ saturation: '-100' }] },
        { featureType: 'administrative.province', elementType: 'all', stylers: [{ visibility: 'off' }] },
        {
          featureType: 'landscape',
          elementType: 'all',
          stylers: [{ saturation: -100 }, { lightness: 65 }, { visibility: 'on' }]
        },
        {
          featureType: 'poi',
          elementType: 'all',
          stylers: [{ saturation: -100 }, { lightness: '50' }, { visibility: 'simplified' }]
        },
        { featureType: 'road', elementType: 'all', stylers: [{ saturation: '-100' }] },
        { featureType: 'road.highway', elementType: 'all', stylers: [{ visibility: 'simplified' }] },
        { featureType: 'road.arterial', elementType: 'all', stylers: [{ lightness: '30' }] },
        { featureType: 'road.local', elementType: 'all', stylers: [{ lightness: '40' }] },
        { featureType: 'transit', elementType: 'all', stylers: [{ saturation: -100 }, { visibility: 'simplified' }] },
        {
          featureType: 'water',
          elementType: 'geometry',
          stylers: [{ hue: '#ffff00' }, { lightness: -25 }, { saturation: -97 }]
        },
        { featureType: 'water', elementType: 'labels', stylers: [{ lightness: -25 }, { saturation: -100 }] }
      ]
    };
    // create map
    const map = new google.maps.Map($el[0], args);
    // add a markers reference
    map.markers = [];
    // add markers
    $markers.each(function() {
      add_marker($(this), map);
    });
    // center map
    center_map(map);
    // return
    return map;
  }

  /*
   *  add_marker
   */

  function add_marker($marker, map) {
    // const
    const latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
    const icon = $marker.attr('data-icon');
    //console.log(icon)
    // create marker
    const marker = new google.maps.Marker({
      position: latlng,
      map: map,
      icon: icon
    });
    // add to array
    map.markers.push(marker);
    // if marker contains HTML, add it to an infoWindow
    if ($marker.html()) {
      // create info window
      const infowindow = new google.maps.InfoWindow({
        content: $marker.html()
      });

      // show info window when marker is clicked
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
      });
    }
  }
  /*
   *  center_map
   */

  function center_map(map) {
    // consts
    const bounds = new google.maps.LatLngBounds();
    // loop through all markers and create bounds
    $.each(map.markers, function(i, marker) {
      const latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
      bounds.extend(latlng);
    });
    // only 1 marker?
    if (1 == map.markers.length) {
      // set center of map
      map.setCenter(bounds.getCenter());
      map.setZoom(14);
    } else {
      // fit to bounds
      map.fitBounds(bounds);
    }
  }
  /*
   *  document ready
   */
  // global let
  let map = null;
  $(document).ready(function() {
    $('.acf-map').each(function() {
      // create map
      map = new_map($(this));
    });
  });
})(jQuery);
