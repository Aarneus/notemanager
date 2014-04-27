<?php
include dirname(__FILE__) . DS. "index.php";

?>

<h1>Effects</h1>
<pre>
http://jqueryui.com/effect/

http://api.jqueryui.com/category/effects/
</pre>

<script>
jQuery(document).ready(function() {

	// highlight from effects. copy highlights what get copied
	// if product was added, higlight basket
	if (<?php echo SomeRequest::getCmd('add', 'false') ?>) {
		jQuery("#mybasket").effect('highlight', 5000);
	}
	
});
</script>

<div id="mybasket" style="float:right">
	<h3>Your things</h3>
	<p>X items in your basket
	</p>
	<p><a href="#">continue to checkout</a><p>
	</div>

<h2>Add product to basket</h2>
<div id="content">
	<table>
		<tr><td>Ultimate product 1, must buy</td><td><a href="index.php?app=dhtmlexamples&view=examples&example=effects&add=true">Add to basket</a></td></tr>
		<tr><td>Ultimate product 2, must buy</td><td><a href="index.php?app=dhtmlexamples&view=examples&example=effects&add=true">Add to basket</a></td></tr>
		<tr><td>Ultimate product 3, must buy</td><td><a href="index.php?app=dhtmlexamples&view=examples&example=effects&add=true">Add to basket</a></td></tr>
	</table>			
</div>