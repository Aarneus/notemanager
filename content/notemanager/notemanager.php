<?php
defined('SOME_PATH') or die('Unauthorized access');
include(PATH_CONTENT.DS.'controller'.DS.'controller.php');
$controller = new SomeControllerNoteManager();
$controller->execute();
?>