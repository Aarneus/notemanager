
<script type="text/javascript" src="www/tinymcejq/js/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript">
        $(function() {
                $('#thequote').tinymce({
                        // Location of TinyMCE script
                        script_url : 'www/tinymcejq/js/tinymce/tinymce.min.js',

                        plugins: [
                                  
                        ],

                        toolbar1: "bold italic underline strikethrough",
                                  
                        menubar: false,
                        toolbar_items_size: 'small'
                });
        });
</script>
<h1>
<?php
$id       = $this->quote->getId();
$thequote = $this->quote->getThequote();
$bywhom   = $this->quote->getBywhom();
$whenyear = $this->quote->getWhenyear();


 if ($id) {
	echo SomeText::sprintf('QUOTE FORM EDIT',$id);
 } else {
	echo SomeText::_('QUOTE FORM NEW');
 }
?>
</h1>
<?php
	if (!empty($this->errors)) {
		echo "<div id='errorbox'>";
		foreach ($this->errors as $error) {
			echo "<div id='erroritem'>". $error . "</div>";
		}
		echo "</div>";
	}
?>
<div class="clearfix"></div>
<style>
.formrow label {
	width:200px;
	display:block;
	float:left;
}
</style>
<form action="index.php" method="post">
	<input type="hidden" name="app" value="quotes" />
	<input type="hidden" name="view" value="<?php if ($id === null) echo "create"; else echo "update"; ?>" />
	<input type="hidden" name="issubmit" value="1" />
	<input type="hidden" name="id" value="<?php echo $id; ?>" />
	
	<div class="formrow">
	<label for="thequote"><?php echo SomeText::_('QUOTETH QUOTE') ?>:</label><br />
	<textarea id="thequote" name="thequote"><?php echo $thequote; ?></textarea>
	</div>
	
	<div class="formrow">
	<label for="bywhom"><?php echo SomeText::_('QUOTETH WHO') ?>:</label>
	<input type="text" name="bywhom" value="<?php echo $bywhom; ?>" />
	</div>

	<div class="formrow">
	<label for="whenyear"><?php echo SomeText::_('QUOTETH WHEN') ?>:</label>
	<input type="text" name="whenyear" value="<?php echo $whenyear; ?>" />
	</div>
	
	<div class="formrow">
	<input type="submit" value="<?php echo SomeText::_('SEND') ?>" />
	</div>

	
</form>
 