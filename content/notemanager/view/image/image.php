<?php
someloader('some.application.view');
someloader('some.database.row');

class SomeViewImage extends SomeView {

	public function display($tmpl=null) {
            $model = $this->getModel();
            $this->note_id = $model->id;
            $this->note_title = $model->title;
            $this->game_id = $model->game_id;
            $this->game_name = $model->game_name;
            $this->image_url = $model->image;
            $this->notification = $model->notification;
            parent::display($tmpl);
            
	}

}