
<!-- A message pops up when logging out -->
<?php if (property_exists($this, 'notification')): ?>
<div class="notification">
    Logged in!
</div>
<?php endif; ?>



<h2><?php echo $this->user_name; ?></h2>
back to <a href="index.php?app=users&view=users">User list</a><br />

<table>
    <tr>
        
        <td class="panel">
            Privileges: <?php echo $this->user_role; ?><br />
            Email: <a href="mailto:<?php echo $this->user_email; ?>"><?php echo $this->user_email; ?></a><br />
            Homepage: <a href="<?php echo $this->user_homepage; ?>"><?php echo $this->user_homepage; ?></a><br />
            
            <br />
            Games:
            <?php if (is_array($this->games)): ?>
            
                <?php foreach ($this->games as $game_id => $game_name): ?>
                    <br />
                    <a href="index.php?view=game&id=<?php echo $game_id; ?>"><?php echo $game_name; ?></a>
                <?php endforeach; ?>
            
            <?php else: ?>
                    None
            
            <?php endif; ?>
        </td>
        
        
        <td class="panel">
            <?php  if ($this->access_delete): ?>
            <a href="index.php?app=users&view=deleteaccount&id=<?php echo $this->user_id; ?>">Delete this account</a><br />
            <?php endif; ?>
            <?php if (RBAC::hasAccess('modifyaccount')): ?>
            <a href="index.php?app=users&view=modify&to=admin&id=<?php echo $this->user_id; ?>">Upgrade this account to admin</a><br />
            <a href="index.php?app=users&view=modify&to=member&id=<?php echo $this->user_id; ?>">Downgrade this account to member</a><br />
            <?php endif; ?>
            
        </td>
    </tr>
</table>