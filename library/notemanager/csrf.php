<?php



/**
 * Class for using the Synchronizer Token Pattern to proof the app against Cross-Site Request Forgery
 */
class CSRF {
    
    /**
     * Called when logging in, creates a token and stores it in the session
     */
    public static function generateToken() {
        $token = time() . mt_rand(2^10, 2^20) . mt_rand(2^10, 2^20) . mt_rand(2^10, 2^20);
        $_SESSION['csrf_token'] = $token;
    }
    
    /**
     * Returns true if the received token is the same one
     */
    public static function checkToken() {
        $token = SomeRequest::getVar('token', '', 'GET');
        $original = $_SESSION['csrf_token'];
        return $original === $token;
    }
    
    /**
     * Returns the token
     */
    public static function getToken() {
        return $_SESSION['csrf_token'];
    }
    
    
    
    /**
     * Removes token from session
     */
    public static function removeToken() {
        $_SESSION['csrf_token'] = null;
    }
    
    
    
}



?>
