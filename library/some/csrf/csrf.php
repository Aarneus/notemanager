<?php
/**
 * 
 * @author Hannu Lohtander
 * @package wo2009
 * @subpackage library
 */

/**
 * 
 * @author munbuntu
 * @package wo2009
 * @subpackage library
 */

class SomeCSRF {
	
	
	public static function newToken() {
		$token = md5(uniqid(rand(), TRUE));
		// to session, with name csrftoken
		$session = SomeFactory::getSession();
		$session->set('csrftoken',$token);
		$session->set('csrftokentime',time());
		return $token;
	}
	
	public static function isValid($token) {
		$session = SomeFactory::getSession();
		$csrftoken = $session->get('csrftoken','sadfasgagsagsadfsaf');
		// time is not used $csrftokentime = $session->get('csrftokentime',0);
		if ($csrftoken === $token) {
			return true;
		}
		return false;
	}
	
	
}