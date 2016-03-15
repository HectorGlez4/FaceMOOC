<?php
include(ROOT.'php/model/MUser.php');

Class Home extends Controller {

    var $layout;

    function index() {
        if(!isset($_SESSION['id'])) {
            header('Location:'.WEBROOT.'User');
            return;
        }
        $this->render('home');
    }

    function view($id) {
        return;
    }

}

?>