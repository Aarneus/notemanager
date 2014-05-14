
<!-- A message pops up when created successfully -->
<?php if ($this->notification): ?>
<div class="notification">
    <?php echo SomeText::_('ACCOUNT CREATED'); ?>
    
</div>
<?php endif; ?>

<h2><?php echo SomeText::_('CREATE NEW ACCOUNT'); ?></h2>


<form name="accountform" action="index.php?app=users&view=createaccount" method="post">
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
            <td><?php echo SomeText::_('EMAIL'); ?>:</td>
            <td><input class="field" type="text" name="email" /></td>
        </tr>
        
        <tr>
            <td><?php echo SomeText::_('HOMEPAGE'); ?>:</td>
            <td><input class="field" type="text" name="homepage" /></td>
        </tr>
        
        <tr>
            <td colspan="2"><input class="submit" type="submit" value="Create" /></td>
            
        </tr>
        
    </table>
    
    
    
</form>