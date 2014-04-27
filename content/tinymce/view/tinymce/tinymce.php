<?php
someloader('some.application.view');

class SomeViewTinymce extends SomeView {
	
	public function display($tmpl='large') {
		parent::display($tmpl);
	}
	
	public function large() {
		parent::display('large');
	}
	
	public function small() {
		parent::display('small');
	}
	
	public function posted() {
		parent::display('posted');
	}
	


}