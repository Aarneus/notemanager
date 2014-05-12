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
                $model = $this->getModel('account');
                if ($model->getAccountData($id)) {
                    $view->setModel($model);
                    $view->display();
                }
            }
            
        }
	
        
        
        
        public function createaccount() {
            $view = $this->getView('create');
            $model = $this->getModel('account');
            $model->createAccount();
            $view->setModel($model);
            $view->display();
        }
        
        
        
        public function deleteaccount() {
            $id = SomeRequest::getInt('id', -1);
            
            
            if (RBAC::hasAccess('deleteaccount') || SomeFactory::getUser()->getId() == $id) {
            
                $view = $this->getView('delete');

                $model = $this->getModel('account');
                $deleted = $model->deleteAccount($id);

                // The default view contains the notification and confirmation window, the page below those is displayed separately
                $view->setModel($model);
                $view->display('default');

                if (!$deleted) {
                    $view = $this->getView('account');
                    $model = $this->getModel('account');
                    $model->getAccountData($id);
                    $view->setModel($model);
                    
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
            
            $model = $this->getModel('account');
            $view->setModel($model);
            
            
            if ($model->login()) {
                $view = $this->getView('account');
                $model = $this->getModel('account');
                $model->getAccountData(SomeFactory::getUser()->getId());
                $view->setModel($model);
            }
            
            $view->display();
        }
        
        
        public function logout() {
            
            $model = $this->getModel('account');
            $model->logout();
            $model->notification = true;
            
            $view = $this->getView('login');
            $view->setModel($model);
            $view->display();
        }
        
        
        
        
        
        public function modify() {
            
            if (RBAC::hasAccess('modifyaccount')) {
                $model = $this->getModel('account');
                $model->modify();
                
                $this->account();
                
            }
        }
        
        
        
        
        public function users() {
            $view = $this->getView('users');
            $model = $this->getModel('account');
            $model->getUsers();
            $view->setModel($model);
            $view->display();
        }
        
                
	
}