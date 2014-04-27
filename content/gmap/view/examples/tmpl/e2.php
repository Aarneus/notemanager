<h2>Tampere: 61.5000° N, 23.7667° E</h2>

<pre>
https://developers.google.com/maps/documentation/javascript/examples/marker-simple
</pre>
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
    		center: new google.maps.LatLng(61.5000, 23.7667)
  		};
		  
  		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

	};

	function addMarker() {
  	    var myLatlng = new google.maps.LatLng(61.500874,23.761024);
    	  var tre = new google.maps.Marker({
              position: myLatlng, 
              map: map,
              title:"Tampere!"
          }); 
    	
  	};
	
	jQuery("#addmarker").click(function() {
	  addMarker();	
	});


	initialize();

});
</script>

<h2>Example map</h2>

<div id="map-canvas"></div>


<button type="button" id="addmarker">Add Marker</button>