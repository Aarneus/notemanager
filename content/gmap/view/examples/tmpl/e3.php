<h2>KLM file</h2>

<pre>
https://developers.google.com/maps/documentation/javascript/examples/layer-kml
</pre>
<style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 600px; width: 450px }
    </style>


<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?sensor=true">
</script>

<script>


jQuery(document).ready(function() {

	var map;

	function initialize() {

		var mapOptions = {
    		zoom: 5,
    		center: new google.maps.LatLng(61.5000, 23.7667)
  		};
		  
  		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  		var ctaLayer = new google.maps.KmlLayer({
  		    url: 'http://www-programming-with-php.com/tnlocations2.kml'
  		  });
  		  ctaLayer.setMap(map);
  					

  	};

	initialize();

});
</script>

<h2>Example map</h2>

<div id="map-canvas"></div>


<button type="button" id="addmarker">Add Marker</button>