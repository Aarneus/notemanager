<?php
$game = $this->game;
$notes = $this->notes;
?>

<h2><?php echo $game->name; ?></h2>
<span class="backlink">back to <a href="index.php">Games</a></span><br />

<table>
    <tr>
        
        <!-- List containing all the notes for this game -->
        <td class="panel">
            <?php if (!is_null($notes)): ?>
            <div id="accordion">
                

                <?php foreach ($notes as $note): ?>
                
                
                <?php 
                    //Whether the user can read the secret notes 
                    if (!$note->secret || RBAC::hasAccess('readsecret', $game->id)):
                ?>

                <!-- Note header -->
                <h3><?php echo $note->title; ?>
                
                
                    <?php if (RBAC::hasAccess('edit', $game->id)): ?>
                    
                    <!-- Note management icons -->
                    <a href="index.php?view=deletenote&id=<?php echo $note->id; ?>">
                        <img class="icon" alt="Delete" src="./template/default/icon_delete.png" />
                    </a>
                    <a href="index.php?view=editnote&id=<?php echo $note->game_id; ?>&note_id=<?php echo $note->id; ?>">
                        <img class="icon" alt="Edit" src="./template/default/icon_edit.png" />
                    </a>
                    <a href="#" class="visibility_toggle" note_id="<?php echo $note->id; ?>">
                        <img class="icon" alt="Toggle secret"
                             state="<?php echo $note->secret ? 'hidden' : 'unhidden'; ?>"
                             src="./template/default/icon_<?php echo $note->secret ? 'hidden' : 'unhidden'; ?>.png" />
                    </a>
                    
                    <?php endif; ?>
                    
                
                
                </h3>
                
                
                <!-- Note body -->
                <div>
                    
                    <?php echo $note->body; ?>
                    
                    <br />
                    &nbsp;
                    <br />
                    
                    <a href="index.php?view=image&note_id=<?php echo $note->id; ?>">
                        
                        <?php if (!is_null($note->image)): ?>
                        <img class="thumbnail" src="./content/notemanager/images/thumbnails/<?php echo $note->image; ?>" />
                        <?php elseif (RBAC::hasAccess('edit', $game->id)): ?>
                        <img class="thumbnail" src="./content/notemanager/images/thumbnails/no_image.png" />
                        <?php endif; ?>
                    </a>
                    <span class="tags">Tags: <?php echo $note->tags; ?></span>
                    
                </div>

                <?php endif; ?>
                
                <?php endforeach; ?>


            </div>


            <!-- No notes, display message -->
            <?php else: ?>
            No notes yet.
            <?php endif; ?>
        </td>

        
        <!-- Command list -->
        <td class="panel">
            
            <?php if (RBAC::hasAccess('edit', $game->id)): ?>
            <a href="index.php?view=editnote&id=<?php echo $game->id; ?>">Create a new note</a><br />
            <?php endif; ?>
            <br />
            <?php if (RBAC::hasAccess('delete', $game->id)): ?>
            <a href="index.php?view=deletegame&id=<?php echo $game->id; ?>">Delete <?php echo $game->name; ?></a><br />
            <?php endif; ?>
        </td>

    </tr>
</table>


<script type="text/javascript">
    // Creates the JQuery UI accordion from the note list
    $("#accordion").accordion({ collapsible : true, heightStyle : 'content' }); 
    
    // Stops icons from activating the accordion 
    $('h3 a').click(function(event) {
        event.stopPropagation();
    });
    
    
    // Dynamically changes the state of a note's visibility and send an AJAX call to change it
    $('.visibility_toggle').click(function(event) {
        var state = $(this).children('img').attr('state');
        
        var geturl = 'index.php?app=notemanager&view=setsecret&id=' + $(this).attr('note_id');
        geturl += "&secret=" + ((state === 'unhidden') ? 'true' : 'false');
        $.get(geturl);
        
        if (state === 'hidden') {
            $(this).children('img').attr('src', './template/default/icon_unhidden.png');
            $(this).children('img').attr('state', 'unhidden');
        }
        
        else {
            $(this).children('img').attr('src', './template/default/icon_hidden.png');
            $(this).children('img').attr('state', 'hidden');
        }
    })
    
</script>