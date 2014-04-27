<?php
someloader('some.application.view');

class SomeViewExamples extends SomeView {
	
	public function display($tmpl='e1') {
		parent::display($tmpl);
	}
	
	public function e1() {
		parent::display('e1');
	}
	
	public function e2() {
		parent::display('e2');
	}
	
	public function e3() {
		parent::display('e3');
	}

}