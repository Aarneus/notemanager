<?php
someloader('some.application.view');
someloader('some.database.row');

class SomeViewDeleteGame extends SomeView {

	public function display($tmpl=null) {
            
            $model = $this->getModel();
            $this->game_id = $model->id;
            $this->game_name = $model->name;
            $this->delete_confirmed = $model->delete_confirmed;
           
            parent::display($tmpl);
            
	}

}