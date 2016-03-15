<?php
include(ROOT.'php/model/MUser.php');

Class Home extends Controller {

    var $layout;

    function index() {
        $this->layout = 'home';
        $this->render('home');
    }

    function view($id) {
        return;
    }

}

?>