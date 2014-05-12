<?php
someloader('some.application.view');
someloader('some.database.row');

class SomeViewDeleteNote extends SomeView {

	public function display($tmpl=null) {
            $model = $this->getModel();
            
            $this->note_id = $model->id;
            $this->game_id = $model->game_id;
            $this->note_title = $model->title;
            $this->delete_confirmed = $model->delete_confirmed;
            
            parent::display($tmpl);
            
	}

}