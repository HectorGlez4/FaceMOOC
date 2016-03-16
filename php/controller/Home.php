<?php
include(ROOT.'php/model/MUser.php');

Class Home extends Controller {

    var $layout;

    function index() {
        if(!isset($_SESSION['id'])) {
            header('Location:'.WEBROOT.'User');
            return;
        }
        $MUser = new MUser();
        $d['userInfo'] = $MUser->SelectUserEmail($_SESSION['email']);
        $this->set($d);
        $this->render('home');
    }

    function view($id) {
        return;
    }

}

?>