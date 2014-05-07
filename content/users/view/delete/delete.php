<?php
someloader('some.application.view');
someloader('some.database.row');

class SomeViewDelete extends SomeView {

	public function display($tmpl=null) {
            
           
            parent::display($tmpl);
            
	}

}