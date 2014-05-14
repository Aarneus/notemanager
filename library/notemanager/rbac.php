<?php


/**
 * Class that handles Role-Based Access Control for the NoteManager app
 */
class RBAC {
    
    
    
    /*
     * Returns true if the current user has access to this action on the game
     */
    public static function hasAccess($action, $game_id=null) {
        
        // Get the current user
        $user = SomeFactory::getUser();
        
        // Get the rule first
        $sql = "SELECT 1 FROM access WHERE userrole='".$user->userrole."' AND action='".$action."'";
            
        $database = SomeFactory::getDBO();
        $statement = $database->prepare($sql);
        $statement->execute();
        $row = $statement->fetch();
        
        $valid = $row[0] == 1;
        
        // Check access to target game
        if (!is_null($game_id)) {
            
            // Check for access to all games first
            if (RBAC::hasAccess($action.'all')) {
                $valid = true;
            }
            
            // Check for access to specific game if no access to all
            else if ($valid) {
                $owner = SomeRow::getRow('owner');
                $owner->game_id = $game_id;
                $owner->user_id = $user->getId();
                $valid = $owner->readFromGameAndUserId();
            }
        }
        
        
        return $valid;
        
    }
    
    
    
    
}







?>


