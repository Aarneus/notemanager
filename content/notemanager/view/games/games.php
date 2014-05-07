<?php
someloader('some.application.view');
someloader('some.database.row');
someloader('notemanager.browse');

class SomeViewGames extends SomeView {

	public function display($tmpl=null) {
            
            $this->games = SELECT::from('game');
            
            parent::display($tmpl);
	}

}