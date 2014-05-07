
<div class="notification">
    
    
    <?php //A confirmation dialog ?>
    <?php if ($this->delete_confirmed == false): ?>
    Deleting the account <?php echo $this->user_name; ?>. 
    <br />
    <a href="index.php?app=users&view=deleteaccount&id=<?php echo $this->user_id; ?>&confirm=1">OK</a>
    <a href="index.php?app=users&view=account&id=<?php echo $this->user_id; ?>">Cancel</a>
    
    <?php //Deletion message ?>
    <?php else: ?>
    <?php echo $this->user_name; ?> deleted successfully.
    <?php endif; ?>
    
    
</div>







