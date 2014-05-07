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
                
                $this->notes = SELECT::from('note', array('game_id' => $this->id));
                
                $owners = SELECT::from('owner', array('game_id' => $this->id));
                foreach ($owners as $owner) {
                    $user = SomeRow::getRow('user');
                    $user->id = $owner->user_id;
                    $user->read();
                    $this->owners[$user->id] = $user->username;
                }
               
                parent::display($tmpl);
            }
            
            else {
                parent::display('error');
            }
	}

}