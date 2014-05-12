<?php
someloader('some.application.view');
someloader('some.database.row');

class SomeViewDelete extends SomeView {

    public function display($tmpl=null) {
        $model = $this->getModel();
        $this->delete_confirmed = $model->delete_confirmed;
        $this->user_id = $model->id;
        $this->user_name = $model->username;


        parent::display($tmpl);

    }

}