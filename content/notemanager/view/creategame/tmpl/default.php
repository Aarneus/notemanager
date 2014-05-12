
<!-- A message pops up when created successfully -->
<?php if ($this->notification): ?>
<div class="notification">
    <a href="index.php?view=game&id=<?php echo $this->game_id; ?>">
        <?php echo $this->game_name; ?>
    </a> created successfully!
</div>
<?php endif; ?>


<h2>Create a new game</h2>

<!-- Form for creating a new game -->
<form name="newgameform" action="index.php?app=notemanager&view=creategame" method="post">
    <table>
        <tr>
            <td>Name:</td><td><input type="text" name="name" /></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Submit" /></td>
        </tr>
        
        
    </table>
    
</form>



