<?php
someloader('some.application.view');

class SomeViewCreate extends SomeView {

	public function display($tmpl=null) {
		parent::display($tmpl);
	}

}