
<!-- A message pops up when logging out -->
<?php if ($this->notification): ?>
<div class="notification">
    <?php echo SomeText::_('LOGGED OUT'); ?>
</div>
<?php endif; ?>



<h2><?php echo SomeText::_('LOG IN'); ?></h2>

<form name="loginform" action="index.php?app=users&view=login" method="post">
    <table class="note_editor">
        <tr>
            <td><?php echo SomeText::_('USERNAME'); ?>:</td>
            <td><input class="field" type="text" name="username" /></td>
        </tr>
        
        <tr>
            <td><?php echo SomeText::_('PASSWORD'); ?>:</td>
            <td><input class="field" type="password" name="password" /></td>
        </tr>
        
        <tr>
            <td colspan="2"><input class="submit" type="submit" value="<?php echo SomeText::_('LOG IN'); ?>" /></td>
            
        </tr>
        
    </table>
    
    <br />
    <?php echo SomeText::_('NO ACCOUNT'); ?> <a href='index.php?app=users&view=createaccount'><?php echo SomeText::_('CREATE ACCOUNT'); ?></a>
    
    
</form>