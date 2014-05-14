<?php
someloader('some.application.model');
someloader('notemanager.browse');

class SomeModelAccount extends SomeModel {
    
    public $id = -1;
    public $username = '';
    public $password = '';
    public $email = '';
    public $homepage = '';
    public $userrole = '';
    public $games = null;
    
    public $access_delete = false;
    public $notification = false;
    public $delete_confirmed = false;
    
    public $users = null;
    


    public function __construct(array $options=array()) {
        parent::__construct($options);
    }

    
    /**
     * Creates a new account according to data received from the form
     */
    public function createAccount() {
         $username = SomeRequest::getString('username', '', 'post');

        // Handle received data from form
        if ($username != '') {
            $password = SomeRequest::getString('password', '', 'post');
            $email = SomeRequest::getString('email', null, 'post');
            $homepage = SomeRequest::getString('homepage', null, 'post');

            $user = SomeRow::getRow('user');

            $user->id = null;
            $user->password = $password;
            $user->username = $username;
            $user->email = $email;
            $user->homepage = $homepage;
            $user->userrole = 'member';
            
            // First created user becomes Admin automatically
            $this->getUsers();
            if (!is_array($this->users)) {
                $user->userrole = 'admin';
            }
            
            $user->create();

            if ($user->id > 0) {
                $this->notification = true;
            }

        }
    }
    
    
    
    /**
     * 
     * Deletes an account if the id is specified
     */
    public function deleteAccount($id) {
        
        if ($id != -1) {
            $user = SomeRow::getRow('user');
            $user->id = $id;
            if ($user->read()) {

                $confirmed = false;
                if (SomeRequest::getInt('confirm', -1) == 1) {

                    $owners = SELECT::from('owner', array('user_id' => $user->id));
                    if (is_array($owners)) {
                        foreach ($owners as $owner) {
                            $owner->delete();
                        }
                    }

                    $user->delete();

                    if (SomeFactory::getUser()->getId() == $user->id) {
                        $this->logout();
                    }

                    $confirmed = true;
                }


            }
        }

        $this->id = $user->id;
        $this->username = $user->username;
        $this->delete_confirmed = $confirmed;
    
        return $confirmed;
    }
    
    
    
    
    
    /**
     * Loads data related to the viewed account from the database
     */
    public function getAccountData($id) {
        
        $this->id = $id;
        
        $user = SomeRow::getRow('user');
        $user->id = $id;
        
        if ($user->read()) {
            $this->username = $user->username;
            $this->email = $user->email;
            $this->homepage = $user->homepage;
            $this->userrole = $user->userrole;
        }
        
        else {
            return false;
        }
        
        // Show the deletion link if the user has permission to delete acoounts or is the owner of the account
        $this->access_delete = false;
        if (RBAC::hasAccess('deleteaccount')) {
            $this->access_delete = true;
        }
        else if (SomeFactory::getUser()->getId() == $user->id) {
            $this->access_delete = true;
        }
        
        $owners = SELECT::from('owner', array('user_id' => $user->id));
        
        if (is_array($owners)) {
            foreach ($owners as $owner) {
                $game = SomeRow::getRow('game');
                $game->id = $owner->game_id;
                $game->read();
                $this->games[$game->id] = $game->name;
            }
        }
        
        return true;
    }

    
    
    
    /**
    * Loads a list of all users
    */
    public function getUsers() {
        $this->users = SELECT::from('someuser', null, 'user');
    }
    
    
    /**
     * 
     * Logs in with the data from the form
     */
    public function login() {
        $username = SomeRequest::getString('username', '', 'post');
            
        // Handle received data from form
        if ($username != '') {
            $password = SomeRequest::getString('password', '', 'post');

            $row = SomeRow::getRow('user');
            $row->username = $username;

            if ($row->readFromUsername()) {
                if (strcmp($password, trim($row->password)) == 0) {
                    $user = SomeFactory::getUser();
                    $user->id = $row->id;
                    $user->read();
                    $this->notification = true;
                    
                    return true;
                }
            }
        }
        
        return false;
    }
    
    
    /**
     * Logs the current user out
     */
    public function logout() {
        $user = SomeFactory::getUser();
            $user->setUsername('');
            $user->setPassword('');
            $user->setHomepage('');
            $user->setEmail('');
            $user->setUserrole('');
            $user->setId(0);
    }
    
    
    /**
     * Modifies the current user role of the specified user (usually from admin to member or vice versa
     */
    public function modify() {
        $id = SomeRequest::getInt('id', -1, 'get');
        $to = SomeRequest::getString('to', '', 'get');

        if ($id != -1 && $to != '') {
            $user = SomeRow::getRow('user');
            $user->id = $id;

            if ($user->read()) {
                $user->userrole = $to;
                $user->update();
            }
        }
    }
    
    
    
   
    

}