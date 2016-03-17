<?php
include(ROOT.'php/model/MUser.php');

Class Gestion extends Controller
{

    var $layout;

    function index()
    {
        if (!isset($_SESSION['id'])) {
            header('Location:' . WEBROOT . 'index');
            return;
        }
        $this->render('gestion');
    }
}

?>