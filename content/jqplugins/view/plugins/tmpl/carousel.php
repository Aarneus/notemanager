<?php
echo $this->loadTemplate('navi');

?>
<script src="www/carousel/carousel.js" type="text/javascript"></script>

<script>
jQuery(document).ready(function() {
// http://www.gmarwaha.com/jquery/jcarousellite/#install
	$("#mycarousel").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev"
    });

});
</script>


<button class="prev">prev</button>
<button class="next">next</button>
        
<div id="mycarousel">
    <ul>
        <li><img src="www/images/carousel/1.jpg" alt="" width="100" height="100" ></li>
        <li><img src="www/images/carousel/2.jpg" alt="" width="100" height="100" ></li>
        <li><img src="www/images/carousel/3.jpg" alt="" width="100" height="100" ></li>
        <li><img src="www/images/carousel/4.jpg" alt="" width="100" height="100" ></li>
    </ul>
</div>

