<?php
someloader('some.application.view');
someloader('some.database.row');
someloader('notemanager.browse');

class SomeViewUsers extends SomeView {

	public function display($tmpl=null) {
            
            $this->users = SELECT::from('someuser', null, 'user');
            
            parent::display($tmpl);
            
	}

}