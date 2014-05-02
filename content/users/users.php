<?php
defined('SOME_PATH') or die('Unauthorized access');
include(PATH_CONTENT.DS.'controller'.DS.'users.php');
$controller = new SomeControllerUsers();
$controller->execute();
?>