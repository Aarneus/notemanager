<?php
someloader('some.application.view');
someloader('some.database.row');

class SomeViewGames extends SomeView {

	public function display($tmpl=null) {
            
            $gamerow = SomeRow::getRow('game');
            $this->games = $gamerow->browse();
            
            parent::display($tmpl);
	}

}