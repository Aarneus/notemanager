<?php
someloader('some.application.controller');

class SomeControllerJqplugins extends SomeController {

	public function __construct() {
		parent::__construct();
	}
	
	public function display() {
		$model = $this->getModel('plugins');
		$view = $this->getView('plugins');
		$view->setModel($model);
		$view->showIndex();
	}
	
	public function accordion() {
		$model = $this->getModel('plugins');
		$view = $this->getView('plugins');
		$view->setModel($model);
		$view->accordion();
	}
	
	public function autocomplete() {
		$model = $this->getModel('plugins');
		$view = $this->getView('plugins');
		$view->setModel($model);
		$view->autocomplete();
	}
	
	public function colorpicker() {
		$model = $this->getModel('plugins');
		$view = $this->getView('plugins');
		$view->setModel($model);
		$view->colorpicker();
	}

	public function carousel() {
		$model = $this->getModel('plugins');
		$view = $this->getView('plugins');
		$view->setModel($model);
		$view->carousel();
	}
	
	public function validation() {
		$model = $this->getModel('plugins');
		$view = $this->getView('plugins');
		$view->setModel($model);
		$view->validation();
	}
	
}