<?php
someloader('some.application.view');
someloader('notemanager.browse');

class SomeViewAccount extends SomeView {

	public function display($tmpl=null) {
            
            $model = $this->getModel();
            $this->access_delete = $model->access_delete;
            $this->user_name = $model->username;
            $this->user_id = $model->id;
            $this->user_email = $model->email;
            $this->user_homepage = $model->homepage;
            $this->user_role = trim($model->userrole);
            $this->games = $model->games;
            $this->notification = $model->notification;
            
            parent::display($tmpl);
	}

}