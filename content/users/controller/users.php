<?php
someloader('some.application.controller');
someloader('some.database.row');

class SomeControllerUsers extends SomeController {

	public function __construct() {
            parent::__construct();
	}
	
        
        public function createaccount() {
            $view = $this->getView('create');
            
            $username = SomeRequest::getString('username', '', 'post');
            
            // Handle received data from form
            if ($username != '') {
                $password = SomeRequest::getString('password', '', 'post');
                $email = SomeRequest::getString('email', null, 'post');
                $homepage = SomeRequest::getString('homepage', null, 'post');
                
                $user = SomeFactory::getUser();
                
                $user->setId(null);
                $user->setPassword($password);
                $user->setUsername($username);
                $user->setEmail($email);
                $user->setHomepage($homepage);
                $user->setUserrole('member');
                $user->create();
                
                if ($user->getId() > 0) {
                    $view->notification = true;
                }
                
            }
            
            
            
            $view->display();
        }
        
        
        
	public function display() {
            $view = $this->getView('login');
            $view->display();
	}
        
        
        public function login() {
            $view = $this->getView('login');
            
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
                        //$view = $this->getView('account');
                        //$view->notification = true;
                    }
                }
                
                
            }
            $view->display();
        }
        
        
        public function logout() {
            $user = SomeFactory::getUser();
            $user->setUsername('');
            $user->setPassword('');
            $user->setHomepage('');
            $user->setEmail('');
            $user->setUserrole('guest');
            $user->setId(0);
            
            $view = $this->getView('login');
            $view->notification = true;
            $view->display();
        }
                
	
}