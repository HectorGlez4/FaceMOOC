<?php
include_once(ROOT.'php/model/MUser.php');
include_once(ROOT.'php/model/MFormation.php');

Class Abonnements extends Controller {

    var $layout;

    function index() {
        if(!isset($_SESSION['id'])) {
            header('Location:'.WEBROOT.'User');
            return;
        }
        $MFormation = new MFormation();
        $page = 1;
        $d['page'] = $MFormation->SelectFormationsAbonnementPage($_SESSION['email'], $page);
        $d['countFormations'] = $MFormation->CountFormationsAbonnements("",$_SESSION['email']);
        $d['perPage'] = $MFormation->NbResults;
        $this->set($d);
        $this->render('abonnements');
    }

    function view() {

    }

}

?>