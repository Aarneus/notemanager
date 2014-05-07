<?php
someloader('some.application.controller');
someloader('some.database.row');
someloader('access.rbac');

class SomeControllerUsers extends SomeController {

	public function __construct() {
            parent::__construct();
	}
        
        
        
        public function account() {
            $view = $this->getView('account');
            
            $id = SomeRequest::getInt('id', null, 'get');
            $user = SomeFactory::getUser();
            
            
            if (is_null($id) && $user->getId() > 0) {
                $id = $user->getId();
            }
            
            if (!is_null($id)) {
                $user = SomeRow::getRow('user');
                $user->id = $id;
                
                if ($user->read()) {
                    $view->user_name = $user->username;
                    $view->user_id = $user->id;
                    $view->user_email = $user->email;
                    $view->user_homepage = $user->homepage;
                    $view->user_role = $user->userrole;
                    $view->display();
                }
                
            }
            
        }
	
        
        
        
        public function createaccount() {
            $view = $this->getView('create');
            
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
                $user->create();
                
                if ($user->id > 0) {
                    $view->notification = true;
                }
                
            }
            
            
            
            $view->display();
        }
        
        
        
        public function deleteaccount() {
            $id = SomeRequest::getInt('id', -1);
            
            if (RBAC::hasAccess('deleteaccount')) {
            
                $view = $this->getView('delete');

                // Delete the account if the id is specified
                if ($id != -1) {
                    $user = SomeRow::getRow('user');
                    $user->id = $id;
                    if ($user->read()) {

                        $confirmed = false;
                        if (SomeRequest::getInt('confirm', -1) == 1) {
                            $user->delete();
                            $confirmed = true;
                        }


                    }
                }

                // The view contains the notification and confirmation window, the page below those is displayed separately
                $view->user_id = $user->id;
                $view->user_name = $user->username;
                $view->delete_confirmed = $confirmed;
                $view->display('default');

                if (!$confirmed) {
                    $view = $this->getView('account');
                    $view->user_name = $user->username;
                    $view->user_id = $user->id;
                    $view->user_email = $user->email;
                    $view->user_homepage = $user->homepage;
                    $view->user_role = $user->userrole;
                }
                else {
                    $view = $this->getView('login');
                }
                $view->display('default');
            }
        }
        
        
        
	public function display() {
            $this->login();
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