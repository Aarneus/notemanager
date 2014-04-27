<?php
echo $this->loadTemplate('navi');

?>
<script src="www/spectrum/spectrum.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="www/spectrum/spectrum.css" />
<script>
jQuery(document).ready(function() {

$("#picker").spectrum({
    color: "#f00",
    change: function(color) {
        $("#basic-log").text("change called: " + color.toHexString());
        // put value to hidden field
        jQuery("input[name=thecolor]").val(color.toHexString());
    }
});

});
</script>
<form>

<input type='text' id="picker"/>
<input type="hidden" name="thecolor" value="" />
</form>