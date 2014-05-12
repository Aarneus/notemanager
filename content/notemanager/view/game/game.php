<?php
someloader('some.application.view');
someloader('some.database.row');

class SomeViewGame extends SomeView {

	public function display($tmpl=null) {
            $model = $this->getModel();
            $this->game = $model->game;
            $this->notes = $model->notes;
            $this->owners = $model->owners;
           
               
            parent::display($tmpl);
	}

}