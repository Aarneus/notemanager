
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
<form id="newgameform" action="index.php?app=notemanager&view=creategame" method="post">
    <table>
        <tr>
            <td colspan="2">
                <!-- Notification for name validation -->
                <span id="validation_note">The name must not be empty or the name of an already existing game!</span>
            </td>
        </tr>
        
        <tr>
            <td>Name:</td><td><input type="text" id="namefield" name="name" /></td>
        </tr>
        
        <tr>
            <td colspan="2"><input type="submit" id="submit" value="Submit" /></td>
        </tr>
        
        
    </table>
    
</form>



<script type="text/javascript">
    
    var games = new Array();
    <?php foreach ($this->games as $game): ?>
    games.push('<?php echo $game->name; ?>');
    <?php endforeach; ?>
    
    // Validate the form input before submitting it
    $("#newgameform").submit(function(e) {
        var field = $("#namefield").prop('value');
        var already_exists = false;
        
        if (field !== '') {
            var len = games.length;
            for (var i = 0; i < len; i++) {
                if (games[i] === field) {
                    already_exists = true;
                    break;
                }
            }
        }
        
        if (field === '' || already_exists) {
            e.preventDefault();
            $("#validation_note").css({'display':'inline'});
        }
        
        else {
            games.push(field);
            $("#validation_note").css({'display':'none'});
        }
    });
    
    
    
</script>

