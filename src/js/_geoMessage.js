/*global jQuery*/
jQuery.getJSON('https://freegeoip.net/json/', function(data) {
  const countryCode = data.country_code;
  const countryName = data.country_name;
  const shippingNotice = jQuery('.shipping-notice');

  if ('AU' === countryCode) {
    shippingNotice.html('<span class="pink">Free Express Shipping</span> on Orders Over $80 – Australia');
  } else if ('NZ' === countryCode) {
    shippingNotice.html('<span class="pink">Free Express Shipping</span> on Orders Over $80 – Australia');
  } else if ('US' === countryCode || 'CA' === countryCode || 'SG' === countryCode) {
    shippingNotice.html(
      '<span class="pink">Free International Express Shipping</span> on Orders Over $180 AUD – ' + countryName
    );
  } else if (
    'AL' === countryCode ||
    'AD' === countryCode ||
    'AT' === countryCode ||
    'BY' === countryCode ||
    'BE' === countryCode ||
    'BA' === countryCode ||
    'BG' === countryCode ||
    'HR' === countryCode ||
    'CY' === countryCode ||
    'CZ' === countryCode ||
    'DK' === countryCode ||
    'EE' === countryCode ||
    'FO' === countryCode ||
    'FI' === countryCode ||
    'FR' === countryCode ||
    'DE' === countryCode ||
    'GI' === countryCode ||
    'GR' === countryCode ||
    'HU' === countryCode ||
    'IS' === countryCode ||
    'IE' === countryCode ||
    'IM' === countryCode ||
    'IT' === countryCode ||
    'LV' === countryCode ||
    'LI' === countryCode ||
    'LT' === countryCode ||
    'LU' === countryCode ||
    'MK' === countryCode ||
    'MT' === countryCode ||
    'MD' === countryCode ||
    'MC' === countryCode ||
    'ME' === countryCode ||
    'NL' === countryCode ||
    'NO' === countryCode ||
    'PL' === countryCode ||
    'PT' === countryCode ||
    'RO' === countryCode ||
    'RU' === countryCode ||
    'SM' === countryCode ||
    'RS' === countryCode ||
    'SK' === countryCode ||
    'SI' === countryCode ||
    'ES' === countryCode ||
    'SE' === countryCode ||
    'CH' === countryCode ||
    'UA' === countryCode ||
    'GB' === countryCode ||
    'VA' === countryCode
  ) {
    shippingNotice.html('<span class="pink">Free Express Shipping</span> on Orders Over $180 – Australia');
  } else {
    shippingNotice.html('<span class="pink">Free Express Shipping</span> on Orders Over $80 – Australia');
  }
});
