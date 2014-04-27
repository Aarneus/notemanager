<?php
someloader("some.database.row");

/**
 * Description of SomeRowNote
 *
 * @author Aarne Uotila
 */
class SomeRowNote extends SomeRow {
    
    public $table = "note";
    public $primary = "id";
    public $columns = array(
        'id',
        'game_id',
        'title',
        'body',
        'secret',
        'tags',
        'image'
    );
    
    public $id = null;
    public $game_id = null;
    public $title = null;
    public $body = null;
    public $secret = null;
    public $tags = null;
    public $image = null;
    
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

    public function check() {
            return true;
    }
    
}

?>
