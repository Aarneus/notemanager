
<div class="notification">
    
    
    <?php //A confirmation dialog ?>
    <?php if ($this->delete_confirmed == false): ?>
    Deleting the game <?php echo $this->game_name; ?>. All the game's notes will be lost as well.
    <br />
    <a href="index.php?view=deletegame&id=<?php echo $this->game_id; ?>&confirm=1&token=<?php echo CSRF::getToken(); ?>">OK</a>
    <a href="index.php?view=game&id=<?php echo $this->game_id; ?>">Cancel</a>
    
    <?php //Deletion message ?>
    <?php else: ?>
    <?php echo $this->game_name; ?> deleted successfully.
    <?php endif; ?>
    
    
</div>







