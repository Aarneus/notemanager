<?php
someloader("some.database.row");

/**
 * Description of SomeRowGame
 *
 * @author Aarne Uotila
 */
class SomeRowGame extends SomeRow {
    
    public $table = "game";
    public $primary = "id";
    public $columns = array(
        'id',
        'name'
    );
    
    public $id = null;
    public $name = null;
    
    
   
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
            return $this->primary;
    }

    
}

?>
