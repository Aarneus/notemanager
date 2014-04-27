<?php
someloader('some.application.controller');


class GMAPController extends SomeController {
	
	public function display() {
		?>
		<ul>
		<li><a href="index.php?app=gmap&view=e1">Example 1</a></li>
		<li><a href="index.php?app=gmap&view=e2">Example 2</a></li>
		<li><a href="index.php?app=gmap&view=e3">Example 3</a></li>
		
		</ul>
		<?php 
	}
	
	public function e1() {
		$view= $this->getView('examples');
		$view->e1();
	}
	
	public function e2() {
		$view= $this->getView('examples');
		$view->e2();
	}
	
	public function e3() {
		$view= $this->getView('examples');
		$view->e3();
	}
	
	
}


$controller = new GMAPController();
$controller->execute();