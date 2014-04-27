<?php
echo $this->loadTemplate('navi');


?>

<script>
$(function() {
	var availableTags = [
	"ActionScript",
	"AppleScript",
	"Asp",
	"BASIC",
	"C",
	"C++",
	"Clojure",
	"COBOL",
	"ColdFusion",
	"Erlang",
	"Fortran",
	"Groovy",
	"Haskell",
	"Java",
	"JavaScript",
	"Lisp",
	"Perl",
	"PHP",
	"Python",
	"Ruby",
	"Scala",
	"Scheme"
	];

	
	$( "#tags" ).autocomplete({
		source: availableTags
	});
	

	/**
	ALTERNATIVE, ajax source
	$( "#tags" ).autocomplete({
		source: "index.php?app=ajaxexamples&view=autocompletedata"
	});
	*/
	
});
</script>

<div class="ui-widget">
<label for="tags">Tags: </label>
<input id="tags">
</div>
