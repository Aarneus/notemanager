<?php
defined('SOME_PATH') or die('Unauthorized access');
include(PATH_CONTENT.DS.'controller'.DS.'jqplugins.php');
$controller = new SomeControllerJqplugins();
$controller->execute();

// optionally change template
// $app = SomeFactory::getApplication();
// $app->setTemplate('dhtmlexamples');