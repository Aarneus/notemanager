<?php
someloader('some.application.controller');
someloader('some.database.row');
someloader('notemanager.rbac');
someloader('notemanager.browse');

class SomeControllerNoteManager extends SomeController {

	public function __construct() {
            parent::__construct();
	}
        
        
        public function creategame() {
            
            if (RBAC::hasAccess('create')) {
                $view = $this->getView('creategame');
                $model = $this->getModel('game');
                $model->createGame();
                $model->getGames();
                $view->setModel($model);
                $view->display('default');
            }
        }
        
        
        
        public function editnote() {
            
            $id = SomeRequest::getInt('id', '');
            
            if (RBAC::hasAccess('edit', $id)) {
                $model = $this->getModel('note');
                $model->editNote();
                $view = $this->getView('editnote');
                $view->setModel($model);
                $view->display('default');
            }
            
        }
        
        
        
        
        public function deletegame() {
            
            $id = SomeRequest::getInt('id', -1);
            
            if (RBAC::hasAccess('delete', $id)) {
            
                $view = $this->getView('deletegame');
                $model = $this->getModel('game');
                $deleted = $model->deleteGame($id);
                $view->setModel($model);
                
                $view->display('default');

                if (!$deleted) {
                    $view = $this->getView('game');
                    $model =$this->getModel('game');
                    $model->getGameData($id);
                    $view->setModel($model);
                }
                else {
                    $model = $this->getModel('game');
                    $model->getGames();
                    $view = $this->getView('games');
                    $view->setModel($model);
                }
                $view->display('default');
            }
        }
        
        
        
        
        
        public function deletenote() {
            
            $id = SomeRequest::getInt('id', -1);
            
            if (RBAC::hasAccess('edit', $id)) {

                $view = $this->getView('deletenote');

                $model = $this->getModel('note');
                $model->deleteNote($id);
                $view->setModel($model);
                
                $game_id = $model->game_id;

                // The view contains the notification and confirmation window, the page below those is displayed separately
                $view->display('default');
                
                $view = $this->getView('game');
                $model = $this->getModel('game');
                $model->getGameData($game_id);
                $view->setModel($model);
                $view->display('default');
            }
        }
        
	
	public function display() {
            
            if (RBAC::hasAccess('read')) {
                $view = $this->getView('games');
                $model = $this->getModel('game');
                $model->getGames();
                $view->setModel($model);
                $view->display('default');
            }
	}
        
        
        public function game() {
            $id = SomeRequest::getInt('id');
            if (RBAC::hasAccess('read', $id)) {
                $view = $this->getView('game');
                $model = $this->getModel('game');
                $model->getGameData($id);
                $view->setModel($model);

                $view->display('default');
            }
        }
        
        
        public function image() {
            
            
            $view = $this->getView('image');
            $model = $this->getModel('note');
            $model->getNoteData();
            $view->setModel($model);
            
            if (RBAC::hasAccess('edit', $model->game_id)) {
                $model->loadImage($model->id);
            }
                
            if (RBAC::hasAccess('read', $model->game_id)) {
                $view->display('default');
            }
        }
        
        
        public function setsecret() {
            
            
            $id = SomeRequest::getInt('note_id', null);
            $secret = SomeRequest::getString('secret', null);

            if (!(is_null($id) || is_null(secret))) {
                $model = $this->getModel('note');
                $model->getNoteData();
                
                if (RBAC::hasAccess('edit', $model->game_id)) {
                    $secret = ($secret == 'true') ? 'TRUE' : 'FALSE';
                    $model->setSecret($id, $secret);
                }
                
            }
            
            
        }
        
        
        
	
}