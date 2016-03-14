<?php
include(ROOT.'php/model/MUser.php');

Class User extends Controller {

    var $models = array('User');
    var $layout;

    function index() {
        $this->layout = 'user';
        $mus = new MUser();
        $d['user'] = $mus->SelectUser("marvyn.duvauchelle@gmail.com", "marvyn");
        $this->set($d);
        $this->render('user');
    }

    function view($id) {
        return;
    }

}

?>