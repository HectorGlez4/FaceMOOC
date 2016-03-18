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
        $page = 1;
        /*if (isset($_GET['p'])) {
            $page = $_GET['p'];
        }*/
        $d['page'] = $MFormation->SelectFormationsPage($page);
        $d['countFormations'] = $MFormation->CountFormations();
        $d['perPage'] = $MFormation->NbResults;
        $this->set($d);
        $this->render('home');
    }

    function view($id) {
        if(!isset($_SESSION['id'])) {
            header('Location:'.WEBROOT.'User');
            return;
        }
        $MUser = new MUser();
        $MFormation = new MFormation();
        $d['userInfo'] = $MUser->SelectUserEmail($_SESSION['email']);
        $d['page'] = $MFormation->SelectFormationsPage($id);
        $d['countFormations'] = $MFormation->CountFormations();
        $d['perPage'] = $MFormation->NbResults;
        $this->set($d);
        $this->render('home');
        return;
    }

}

?>