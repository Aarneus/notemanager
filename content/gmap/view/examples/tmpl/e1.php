<style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 400px; width: 300px }
    </style>


<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?sensor=true">
</script>

<script>
jQuery(document).ready(function() {
var map;
function initialize() {
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(-34.397, 150.644)
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}

initialize();

});
</script>

<h2>Example map</h2>

<div id="map-canvas"></div>
