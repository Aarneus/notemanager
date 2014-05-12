<?php
someloader('some.application.view');
someloader('some.database.row');

class SomeViewEditNote extends SomeView {

	public function display($tmpl=null) {
            
            $model = $this->getModel();
            $this->note_title = $model->title;
            $this->note_body = $model->body;
            $this->note_secret = $model->secret;
            $this->note_tags = $model->tags;
            $this->note_id = $model->id;
            $this->notification = $model->notification;
            $this->new = $model->new;
            $this->game_name = $model->game_name;
            $this->game_id = $model->game_id;
            
            parent::display($tmpl);
            
	}

}