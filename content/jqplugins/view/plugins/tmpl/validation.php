<?php
echo $this->loadTemplate('navi');

?>
<script src="www/validation/jquery.validate.js" type="text/javascript"></script>

<script>
jQuery(document).ready(function() {
// http://bassistance.de/jquery-plugins/jquery-plugin-validation/
	
	$("#myform").validate({
		rules: {
			personname: "required",
			personage: "required"
		},
		messages: {
			personname: "Please enter your name",
			personage: "Please enter your age"
		}
	});

});
</script>


        
<form id="myform" method="post">
    <table>
    <tr><td>Name</td><td><input type="text" name="personname" /></td></tr>
    <tr><td>Age</td><td><input type="text" name="personage" /></td></tr>
    <tr><td>Favourite Color</td><td><input type="text" name="personcolor" /></td></tr>
    
    </table>
    <input type="submit" />
</form>