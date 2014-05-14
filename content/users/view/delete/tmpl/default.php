
<div class="notification">
    
    
    <?php //A confirmation dialog ?>
    <?php if ($this->delete_confirmed == false): ?>
    <?php echo SomeText::sprintf('DELETING ACCOUNT', $this->user_name); ?>
    <br />
    <a href="index.php?app=users&view=deleteaccount&id=<?php echo $this->user_id; ?>&confirm=1&token=<?php echo CSRF::getToken(); ?>"><?php echo SomeText::_('OK'); ?></a>
    <a href="index.php?app=users&view=account&id=<?php echo $this->user_id; ?>"><?php echo SomeText::_('CANCEL'); ?></a>
    
    <?php //Deletion message ?>
    <?php else: ?>
    <?php echo SomeText::sprintf('ACCOUNT DELETED', $this->user_name); ?>
    <?php endif; ?>
    
    
</div>







