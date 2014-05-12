<?php
someloader('some.application.view');
someloader('some.database.row');
someloader('notemanager.browse');

class SomeViewUsers extends SomeView {

	public function display($tmpl=null) {
            
            $model = $this->getModel();
            $this->users = $model->users;
            parent::display($tmpl);
            
	}

}