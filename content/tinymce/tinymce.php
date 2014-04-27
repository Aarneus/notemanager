<?php
someloader('some.application.controller');


class TinyMCEController extends SomeController {
	
	public function display() {
		?>
		<ul>
		<li><a href="index.php?app=tinymce&view=large">Lots of editing options</a></li>
		<li><a href="index.php?app=tinymce&view=small">Few editing options</a></li>
		<li>jQuery example in Quotes app form</li>
		
		</ul>
		<?php 
	}
	
	public function large() {
		$view= $this->getView('tinymce');
		$view->large();
	}
	
	public function small() {
		$view= $this->getView('tinymce');
		$view->small();
	}
	
	public function posted() {
		$view= $this->getView('tinymce');
		$view->posted();
	}
	
	
}


$controller = new TinyMCEController();
$controller->execute();