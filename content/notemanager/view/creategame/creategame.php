<?php
someloader('some.application.view');
someloader('some.database.row');

class SomeViewCreateGame extends SomeView {

	public function display($tmpl=null) {
            $model = $this->getModel();
            
            $this->game_id = $model->id;
            $this->game_name = $model->name;
            $this->notification = $model->notification;
            $this->games = $model->games;
            
            parent::display($tmpl);
            
	}

}