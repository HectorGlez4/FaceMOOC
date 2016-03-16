<?php
include_once(ROOT.'php/model/MUser.php');
include_once(ROOT.'php/model/MFormation.php');

Class Home extends Controller {

    var $layout;

    function index() {
        if(!isset($_SESSION['id'])) {
            header('Location:'.WEBROOT.'User');
            return;
        }
        $MUser = new MUser();
        $MFormation = new MFormation();
        $d['userInfo'] = $MUser->SelectUserEmail($_SESSION['email']);
        $d['formations'] = $MFormation->SelectFormationsPage(1);
        $this->set($d);
        $this->render('home');
    }

    function view($id) {
        return;
    }

}

?>