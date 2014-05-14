
<div class="notification">
    
    
    <?php //A confirmation dialog ?>
    <?php if ($this->delete_confirmed == false): ?>
    Deleting the note <?php echo $this->note_title; ?>. 
    <br />
    <a href="index.php?view=deletenote&id=<?php echo $this->note_id; ?>&confirm=1&token=<?php echo CSRF::getToken(); ?>">OK</a>
    <a href="index.php?view=game&id=<?php echo $this->game_id; ?>">Cancel</a>
    
    <?php //Deletion message ?>
    <?php else: ?>
    Note <?php echo $this->note_title; ?> deleted successfully.
    <?php endif; ?>
    
    
</div>







