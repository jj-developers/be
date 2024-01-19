// Create the script tag, set the appropriate attributes
var script = document.createElement('script');
script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCc8JXHTWeK1HLEkH0-ayrxBZTBp90BPB4&callback=initMap';
script.async = true;

// Attach your callback function to the `window` object
window.initMap = function() {
  map = new Map(document.getElementById('map'), {
  center: {lat: -34.397, lng: 150.644},
  zoom: 8
  });
  // JS API is loaded and available
};

// Append the 'script' element to 'head'
document.head.appendChild(script);