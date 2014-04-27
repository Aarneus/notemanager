<?php
someloader('some.application.view');

class SomeViewPlugins extends SomeView {

	public function display($tmpl='navi') {
		$this->showIndex($tmpl);
	}
	
	public function showIndex($tmpl='navi') {
		parent::display($tmpl);
	}
	
	
	public function accordion() {
		$model = $this->getModel();
		parent::display('accordion');
	}
	
	public function autocomplete() {
		$model = $this->getModel();
		parent::display('autocomplete');
	}
	
	public function colorpicker() {
		$model = $this->getModel();
		parent::display('colorpicker');
	}
	
	public function carousel() {
		$model = $this->getModel();
		parent::display('carousel');	
	}
	
	public function validation() {
		$model = $this->getModel();
		parent::display('validation');	
	}

}