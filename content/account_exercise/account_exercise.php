<?php
defined('SOME_PATH') or die('Unauthorized access');
/**
* @package content
* @subpackage account
*/

#
# this is account content module bootstrap
# 


// DO login and logout

/*
$session = SomeFactory::getSession();
$session->set(key,value);
$value = $session->get(key);
$session->clear(key);

*/

$credentials = array(
    'username' => 'test',
    'password' => 'testpw'
);

$view = SomeRequest::getVar('view','default');


switch ($view) {
	case 'login': {
	    dologin($credentials);
	} break;
	case 'logout': {
	    dologout();
	}
	break;
	break;
	default: 
	    doform("Please login.");

}

$user = SomeFactory::getUser();

echo "<h2>Just Test Code: Dumping User Object</h2>";
echo "<pre>";
var_dump($user);
var_dump(new SomeUser());
echo "</pre>";

function dologin($credentials) {
    $username = SomeRequest::getString('username');
    $pw       = SomeRequest::getString('pw');
    if ($username == $credentials['username'] && $pw == $credentials['password']) {
        $session = SomeFactory::getSession();
        $session->set("loggedin","$username");
        $user = SomeFactory::getUser();
        $user->setUsername($username);
        $user->setPassword($pw);
        
        SomeFactory::getApplication()->redirect("index.php?app=account_exercise",'You have logged in!');
    } else {
        doform("Wrong credentials. Please login");
    } 
}

function dologout() {
    $session = SomeFactory::getSession();
    $session->clear("loggedin");
    $user = SomeFactory::getUser();
    $user->setUsername("");
    $user->setPassword("");
   SomeFactory::getApplication()->redirect("index.php?app=account_exercise",'You have logged out!'); 
}

function doform($msg) {
    $sysmessage = SomeFactory::getApplication()->getSysMessage();
    $session = SomeFactory::getSession();
    $loggedin = $session->get("loggedin",null);
    if ($loggedin) {
        ?>
        <h1><?php echo $sysmessage ?></h1>
        <form action="index.php?app=account_exercise&view=logout" method="POST">

        <input type="submit" value="Logout" />
        </form>
        <?php
    } else {
        ?>
        <h1><?php if ($sysmessage) echo $sysmessage; else echo $msg; ?></h1>
        <form action="index.php?app=account_exercise&view=login" method="POST">
        Username: <input type="text" name="username" value="" /><br />
        Password: <input type="password" name="pw" value="" /><br />
        <input type="submit" value="Login" />
        </form>
        <?php
    }

}
