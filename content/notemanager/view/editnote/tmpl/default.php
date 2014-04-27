

<!-- A message pops up when created successfully -->
<?php if (property_exists($this, 'notification')): ?>
<div class="notification">
    Note <?php echo $this->note_title; ?> <?php echo $this->new ? 'created' : 'saved'; ?> successfully!
    
</div>
<?php endif; ?>

<?php if ($this->new): ?>
<h2>Create a new note</h2>
<?php else: ?>
<h2>Editing note: <?php echo $this->note_title; ?></h2>
<?php endif; ?>


<span class="backlink">back to <a href="index.php?view=game&id=<?php echo $this->game_id; ?>"><?php echo $this->game_name; ?></a></span><br />

<!-- Form for creating a new note -->
<form name="newnoteform" 
      action="index.php?app=notemanager&view=editnote&id=<?php 
      echo $this->game_id; 
      if (!$this->new) {
          echo '&note_id=';
          echo $this->note_id;
      }
      ?>" 
      method="post">
    <table class="note_editor">
        <tr>
            <td>Title:</td>
            <td><input class="field" type="text" name="title"
                                      value="<?php if (!$this->new) { echo $this->note_title; } ?>"/><td>
        </tr>
        
        
        <tr>
            <td>Body:</td><td><textarea id="wysiwyg" name="body"></textarea></td>
        </tr>
        
        <tr>
            <td>Secret:</td><td><input type="checkbox" name="secret" 
                                       <?php if (!$this->new) { echo $this->note_secret ? 'checked' : ''; }?>/></td>
        </tr>
        
        <tr>
            <td>Tags:</td><td><input class="field "type="text" name="tags"
                                     value="<?php if (!$this->new) { echo $this->note_tags; } ?>" /></td>
        </tr>
        
        <tr>
            <td colspan="2"><input class="submit" type="submit" value="Save" /></td>
        </tr>
        
        
    </table>
    
</form>




<script type="text/javascript">
    //TinyMCE callback content loading taken from: https://stackoverflow.com/questions/16508001/how-to-set-tinymce-default-content
    tinymce.init({
        selector: "#wysiwyg",
        width: 512,
        init_instance_callback: set_contents
     });

    function set_contents(inst) {
        <?php if (!$this->new): ?>
        inst.setContent('<?php echo $this->note_body; ?>');
        <?php endif; ?>
    }
</script>

