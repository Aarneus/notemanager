<?php
someloader('some.application.view');
someloader('some.database.row');
someloader('notemanager.browse');

class SomeViewGames extends SomeView {

	public function display($tmpl=null) {
            
            $model = $this->getModel();
            $this->games = $model->games;
            
            parent::display($tmpl);
	}

}