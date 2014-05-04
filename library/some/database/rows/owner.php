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
        'id',
       'game_id',
       'user_id'
    );
    
    public $id = null;
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
            return "id";
    }

    public function check() {
            return true;
    }
    
    public function readFromGameAndUserId() {
           $sql = "SELECT * FROM ".$this->getTable(). " WHERE game_id=" . $this->game_id ." AND user_id=".$this->user_id;

           $database = SomeFactory::getDBO();
           $statement = $database->prepare($sql);

           $statement->execute();

           $row = $statement->fetch();
           if (is_array($row)) {
                   foreach ($row as $k => $v) {
                           $this->$k = $v;
                   }
           }
           return is_array($row);
       }
}

?>
