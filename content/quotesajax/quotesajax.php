<?php
/**********
MYSQL

CREATE TABLE `quotes` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`thequote` TEXT NOT NULL ,
`bywhom` TEXT NOT NULL ,
`whenyear` TEXT NOT NULL
) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_swedish_ci;


POSTGRE

CREATE TABLE quotes (
    id SERIAL,
    thequote text,
    bywhom text,
    whenyear text
);

***********************************************/
defined('SOME_PATH') or die('Unauthorized access');


$language=SomeFactory::getLanguage();
$language->load("quotes");

include(PATH_CONTENT . DS . 'classes' . DS . 'quote.php');
include(PATH_CONTENT . DS . 'classes' . DS . 'quotes.php');

/*
 * Lets create permission rules
 */

$SomeRbac = SomeRbac::getInstance();

$SomeRbac->addActions('manager',array('quotes.edit'));
$SomeRbac->addActions('admin',array('quotes.edit','quotes.delete','quotes.list'));


$SomeRbac->addActions('guest',array('quotes.list'));
$SomeRbac->addActions('registered',array('quotes.list'));
$SomeRbac->addActions('admin',array('quotes.list'));
$SomeRbac->addActions('manager',array('quotes.list'));


if (SomeRequest::getInt("ajax") == 1) {
	// used in quotesajax example
	include(PATH_CONTENT.DS. 'controller' . DS . 'ajax.php');
	$controller = new SomeControllerQuoteAjax();
	$controller->execute();
	if (SomeRequest::getCmd("view") != '') {
		$app = SomeFactory::getApplication();
		$app->setTemplate('extension');
	} else {
		$app = SomeFactory::getApplication();
		$app->setTemplate('dhtmlexamples');
	}
} else if (SomeRequest::getInt("rest") == 1) { 
	// used in angular example
	include(PATH_CONTENT.DS. 'controller' . DS . 'rest.php');
	$controller = new SomeControllerQuoteRest();
	$controller->execute();
	$app = SomeFactory::getApplication();
	$app->setTemplate('extension');

} else {
	// runs as quotes application
	include(PATH_CONTENT.DS. 'controller' . DS . 'controller.php');
	$controller = new SomeControllerQuote();
	$controller->execute();
}