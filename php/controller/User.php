<?php
include(ROOT.'php/model/MUser.php');

Class User extends Controller {

    var $models = array('MUser');
    var $layout;

    function index() {
        $this->layout = 'user';
        $mus = new MUser();
        $d['user'] = $mus->SelectUser("marvyn.duvauchelle@gmail.com", "marvyn");
        $this->set($d);
        $this->render('user');
    }

    function login() {
        if (empty($_POST)){
            header('Location:'.WEBROOT);
        }
        else {
            $MUser = new MUser();
            $connect = $MUser->SelectUser($_POST['email'], $_POST['password']);
            if ($connect) {
                session_start();
                header('Location:' . WEBROOT . 'Home/index');
            } else {
                header('Location:' . WEBROOT . 'index');
            }
        }

    }

    function view($id) {
        return;
    }

}

?>