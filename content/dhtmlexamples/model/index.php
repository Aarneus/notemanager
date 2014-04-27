<?php
someloader('some.application.model');

class SomeModelIndex extends SomeModel {

	protected $navi = array();
	
	public function __construct(array $options=array()) {
		parent::__construct($options);
		$this->navi = array(
			'docready' => 
				array('Document Ready','index.php?app=dhtmlexamples&view=examples&example=docready'),
			'colors' => 
				array('Colors','index.php?app=dhtmlexamples&view=examples&example=colors'),
			'clickevent' => 
				array('Click Event','index.php?app=dhtmlexamples&view=examples&example=clickevent'),
			'json' => 
				array('JSON','index.php?app=dhtmlexamples&view=examples&example=json'),
				'horizontalmenu' => 
				array('Horizontal Menu','index.php?app=dhtmlexamples&view=horizontalmenu'),
			'tabbar' => 
				array('Tabbar','index.php?app=dhtmlexamples&view=tabbar'),
			// not working with the latest jQuery
			//'ratingplugin' => 
			//	array('Rating Plugin','index.php?app=dhtmlexamples&view=ratingplugin'),
			'selectors' =>
				array('Selectors and more', 'index.php?app=dhtmlexamples&view=examples&example=selectors'),
			'effects' =>
				array('Effects', 'index.php?app=dhtmlexamples&view=examples&example=effects')
				
		);
	}
	
	public function getNavi() {
		return $this->navi;
	}

}