

<!-- A message pops up when created successfully -->
<?php if ($this->notification): ?>
<div class="notification">
    Image is too large or not of appropriate type!
</div>
<?php endif; ?>

<h2>Image for note <?php echo $this->note_title; ?></h2>

<span class="backlink">back to <a href="index.php?view=game&id=<?php echo $this->game_id; ?>"><?php echo $this->game_name; ?></a></span><br />

<!-- Form for uploading the image -->
<form name="imageuploadform"
      enctype="multipart/form-data"
      action="index.php?app=notemanager&view=image&note_id=<?php echo $this->note_id; ?>&token=<?php echo CSRF::getToken(); ?>" 
      method="post">
    
    <table class="note_editor">
        
        <!-- Current image, if there is one -->
        <tr>
            <td>
                <?php if (!is_null($this->image_url)): ?>
                <img class='note_image' src='./content/notemanager/images/<?php echo $this->image_url; ?>' />
                <?php else: ?>
                <img class='note_image' src='./content/notemanager/images/no_image.png' />
                <?php endif; ?>
                
                
                
            </td>
        </tr>
        
        
        <!-- Image uploading inputs -->
        
        <?php if (RBAC::hasAccess('edit', $this->game_id)): ?>
        <tr>
            <td>
                <input type="hidden" name="MAX_FILE_SIZE" value="524288" />
                <input name="imagefile_<?php echo $this->note_id; ?>" type="file" />
            </td>
        </tr>
        
        <tr>
            <td><input class="submit" type="submit" value="Upload" /></td>
        </tr>
        
        <tr>
            <td>Only JPG, GIF and PNG that are smaller than 0.5 megabytes files are allowed.</td>
        </tr>
        
        <?php endif; ?>
        
        
    </table>
    
</form>




