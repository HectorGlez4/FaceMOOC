<?php

include_once(ROOT.'php/model/MFormation.php');

Class Formation extends Controller {

	var $layout;

    function index() {
        if(!isset($_SESSION['id'])) {
            header('Location:'.WEBROOT.'User');
            return;
        }
        $this->render('formation');
        $this->set($d);
    }

    function view($id){
        $MFormation = new MFormation();
        $d['formation'] = $MFormation->SelectFormationById($id);
        $this->set($d);
        $this->render('formation');
        return;
    }
}
?>