<?php
someloader('some.application.view');
someloader('some.database.row');

class SomeViewGame extends SomeView {

	public function display($tmpl=null) {
            
            $gamerow = SomeRow::getRow('game');
            $gamerow->id = $this->id;
            
            $this->game = null;
            $this->notes = null;
            if ($gamerow->read()) {
                $this->game = $gamerow;
                
                $noterow = SomeRow::getRow('note');
                $this->notes = SELECT::from('note', array('game_id' => $this->id));
               
                parent::display($tmpl);
            }
            
            else {
                parent::display('error');
            }
	}

}