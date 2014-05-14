
<!-- A message pops up when logging out -->
<?php if ($this->notification): ?>
<div class="notification">
    <?php echo SomeText::_('LOGGED IN'); ?>
</div>
<?php endif; ?>



<h2><?php echo $this->user_name; ?></h2>
<?php echo SomeText::_('BACK TO'); ?> <a href="index.php?app=users&view=users"><?php echo SomeText::_('USER LIST'); ?></a><br />

<table>
    <tr>
        
        <td class="panel">
            <?php echo SomeText::_('PRIVILEGES'); ?>: <?php echo SomeText::_(($this->user_role === 'member') ? 'MEMBER' : 'ADMIN'); ?><br />
            <?php echo SomeText::_('EMAIL'); ?>: <a href="mailto:<?php echo $this->user_email; ?>"><?php echo $this->user_email; ?></a><br />
            <?php echo SomeText::_('HOMEPAGE'); ?>: <a href="<?php echo $this->user_homepage; ?>"><?php echo $this->user_homepage; ?></a><br />
            
            <br />
            <?php echo SomeText::_('GAMES'); ?>:
            <?php if (is_array($this->games)): ?>
            
                <?php foreach ($this->games as $game_id => $game_name): ?>
                    <br />
                    <a href="index.php?view=game&id=<?php echo $game_id; ?>"><?php echo $game_name; ?></a>
                <?php endforeach; ?>
            
            <?php else: ?>
                    <?php echo SomeText::_('NONE'); ?>
            
            <?php endif; ?>
        </td>
        
        
        <td class="panel">
            <?php  if ($this->access_delete): ?>
            <a href="index.php?app=users&view=deleteaccount&id=<?php echo $this->user_id; ?>"><?php echo SomeText::_('DELETE ACCOUNT'); ?></a><br />
            <?php endif; ?>
            <?php if (RBAC::hasAccess('modifyaccount')): ?>
            <a href="index.php?app=users&view=modify&to=admin&id=<?php echo $this->user_id; ?>"><?php echo SomeText::_('UPGRADE TO ADMIN'); ?></a><br />
            <a href="index.php?app=users&view=modify&to=member&id=<?php echo $this->user_id; ?>"><?php echo SomeText::_('DOWNGRADE TO MEMBER'); ?></a><br />
            <?php endif; ?>
            
        </td>
    </tr>
</table>