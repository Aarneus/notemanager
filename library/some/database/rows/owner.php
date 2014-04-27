<?php
someloader("some.database.row");

/**
 * Description of SomeRowOwner
 *
 * @author Aarne Uotila
 */
class SomeRowOwner extends SomeRow {
    
    public $table = "owner";
    public $columns = array(
       'game_id',
       'user_id'
    );
    
    public $game_id = null;
    public $user_id = null;
    
    
    public function __construct() {
            parent::__construct();
    }

    public function getColumns() {
            return $this->columns;
    }

    public function getTable() {
            return $this->table;
    }

    public function getPrimary() {
            return "game_id,user_id";
    }

    public function check() {
            return true;
    }
    
}

?>
