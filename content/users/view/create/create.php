<?php
someloader('some.application.view');

class SomeViewCreate extends SomeView {

    public function display($tmpl=null) {
        $model = $this->getModel();
        $this->notification = $model->notification;
            
        parent::display($tmpl);
            
    }

}