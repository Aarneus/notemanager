<?php
someloader('some.application.model');

class SomeModelPlugins extends SomeModel {

	public function __construct(array $options=array()) {
		parent::__construct($options);
	}

}