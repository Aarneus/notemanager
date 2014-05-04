

<h2>All games</h2>


<table>
    <tr>
        
        <!-- List containing all the games on the server -->
        <td class="panel">
            <ul>
                <?php

                $games = $this->games;
                if (!is_null($games)) {

                    foreach ($games as $game) {
                        $li = '<a href="index.php?view=game&id='.$game->id.'">'.$game->name.'</a>';
                        echo "<li>".$li."</li>";
                    }

                }
                else {
                    echo "<li>No games yet</li>";
                }
                ?>
            </ul>
        </td>


        <!-- Command menu -->
        <td class="panel">
            
            <?php if (RBAC::hasAccess('create')): ?>
            <a href="index.php?view=creategame">Create a new game</a><br />
            <?php endif; ?>
        </td>
    </tr>
</table>
