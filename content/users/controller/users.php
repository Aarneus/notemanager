<?php
someloader('some.application.controller');
someloader('some.database.row');
someloader('notemanager.rbac');

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
                    
                    // Show the deletion link if the user has permission to delete acoounts or is the owner of the account
                    $access_delete = false;
                    if (RBAC::hasAccess('deleteaccount')) {
                        $access_delete = true;
                    }
                    else if (SomeFactory::getUser()->getId() == $user->id) {
                        $access_delete = true;
                    }
                    $view->access_delete = $access_delete;
                    
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
            
            
            if (RBAC::hasAccess('deleteaccount') || SomeFactory::getUser()->getId() == $id) {
            
                $view = $this->getView('delete');

                // Delete the account if the id is specified
                if ($id != -1) {
                    $user = SomeRow::getRow('user');
                    $user->id = $id;
                    if ($user->read()) {

                        $confirmed = false;
                        if (SomeRequest::getInt('confirm', -1) == 1) {
                            
                            $owners = SELECT::from('owner', array('user_id' => $user->id));
                            foreach ($owners as $owner) {
                                $owner->delete();
                            }
                            
                            $user->delete();
                            
                            if (SomeFactory::getUser()->getId() == $user->id) {
                                $logout = SomeFactory::getUser();
                                $logout->setUsername('');
                                $logout->setPassword('');
                                $logout->setHomepage('');
                                $logout->setEmail('');
                                $logout->setUserrole('');
                                $logout->setId(0);
                            }
                            
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
                    $view->access_delete = true;
                    
                }
                else {
                    $view = $this->getView('login');
                }
                $view->display('default');
            }
        }
        
        
        
	public function display() {
            
            if (SomeFactory::getUser()->getId() > 0) {
                $this->users();
            }
            else {
                $this->login();
            }
            
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
                        $view = $this->getView('account');
                        $view->notification = true;
                        $view->access_delete = true;
                        $view->user_name = $user->username;
                        $view->user_id = $user->id;
                        $view->user_email = $user->email;
                        $view->user_homepage = $user->homepage;
                        $view->user_role = $user->userrole;
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
            $user->setUserrole('');
            $user->setId(0);
            
            $view = $this->getView('login');
            $view->notification = true;
            $view->display();
        }
        
        
        
        
        
        public function modify() {
            
            if (RBAC::hasAccess('modifyaccount')) {
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
                
                $this->account();
                
                
            }
        }
        
        
        
        
        public function users() {
            $view = $this->getView('users');
            $view->display();
        }
        
                
	
}