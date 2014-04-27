<?php
someloader('some.application.controller');

class SomeControllerQuoteRest extends SomeController {

	public function __construct() {
		parent::__construct();
	}
	
	public function display() {
		
		$model = $this->getModel('quotes');
		
		$quotes = $model->getQuotes()->getQuotes();
		echo json_encode(array("errors" => 0, "payload" => $quotes));
		
	}
	
	public function create() {
		if (!SomeAuth::_(SomeFactory::getUser(),'quotes.edit')) {
			//SomeFactory::getApplication()->redirect("index.php?app=login","You have no permission to create <a href='index.php?app=quotes'>quote</a>");
			echo json_encode(array("error" => 1, "message" => "You have no permission to create a quote."));
			return true;
		}
		
		
		$model = $this->getModel('quote');
		// @TODO error handling
		$model->save();
		$quote = $model->getQuote();
		echo json_encode(array("errors" => 0, "payload" => $quote));
	}
	
	public function update() {
		if (!SomeAuth::_(SomeFactory::getUser(),'quotes.edit')) {
			SomeFactory::getApplication()->redirect("index.php?app=login","You have no permission to edit <a href='index.php?app=quotes'>quote</a>");
		}
		
		$model = $this->getModel('quote');
		// @TODO error handling
		$model->save();
		$quote = $model->getQuote();
		echo json_encode(array("errors" => 0, "payload" => $quote));
	}
	
	public function read() {
		$model = $this->getModel('quote');
		// @TODO error handling
		$quote = $model->getQuote();
		echo json_encode(array("errors" => 0, "payload" => $quote));
	}
	
	public function delete() {
		if (!SomeAuth::_(SomeFactory::getUser(),'quotes.delete')) {
			SomeFactory::getApplication()->redirect("index.php?app=login","You have no permission to delete <a href='index.php?app=quotes'>quote</a>");
		}
		$model = $this->getModel('quote');
		$model->delete();
		$this->quotes();
	}
	
	public function quotes() {
		if (!SomeAuth::_(SomeFactory::getUser(),'quotes.list')) {
			//SomeFactory::getApplication()->redirect("index.php?app=login","You have no permission to list <a href='index.php?app=quotes'>quotes</a>");
			echo json_encode(array("error" => 1, "message" => "You have no permission to list quotes."));
			return true;
		}
		$model = $this->getModel('quotes');
		
		$quotes = $model->getQuotes()->getQuotes();
		echo json_encode(array("errors" => 0, "payload" => $quotes));
	}
}