<?php
someloader('some.application.view');
someloader('notemanager.browse');

class SomeViewAccount extends SomeView {

	public function display($tmpl=null) {
            
            $owners = SELECT::from('owner', array('user_id' => $this->user_id));
            foreach ($owners as $owner) {
                $game = SomeRow::getRow('game');
                $game->id = $owner->game_id;
                $game->read();
                $this->games[$game->id] = $game->name;
            }
            
            parent::display($tmpl);
	}

}