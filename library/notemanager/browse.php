<?php


/**
 * A helper class for database queries
 */
class SELECT {
    
    
    /**
     * A list method that returns the list of keys of the rows from the specified table which match the conditionals
     * @return an array of rows (primary keys) that fill the conditions
     */
    public static function from($table, $conditions=null, $rowname=null) {
        
        if (is_null($rowname)) {
            $rowname = $table;
        }
        
        $row = SomeRow::getRow($rowname);
        $key = $row->getPrimary();
        $sql = "SELECT ".$key." FROM ".$table;

        if (is_array($conditions)) {
            $sql = $sql." WHERE ";
            foreach ($conditions as $k => $v) {
                $sql = $sql.$k."=".$v." AND ";
            }
            $sql = substr($sql, 0, strlen($sql) - 5);
        }

        $database = SomeFactory::getDBO();
        $statement = $database->prepare($sql);

        $statement->execute();

        //result as an associative array
        $array = null;
        do {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if (is_array($result)) {
                $row = SomeRow::getRow($rowname);
                $row->$key = $result[$key];
                $row->read();
                $array[] = $row;
            }
        } while($result != false);

        return $array;

        
    }
    
    
    
    
}




?>
