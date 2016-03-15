<?php
include(ROOT.'php/model/MUser.php');

Class User extends Controller {

    var $layout;

    function index() {
        if(isset($_SESSION['id'])) {
            header('Location:'.WEBROOT.'index');
            return;
        }
        $this->render('user');
    }

    function login() {
        if (empty($_POST)){
            header('Location:'.WEBROOT);
        }
        else {
            $MUser = new MUser();
            $connect = $MUser->SelectUserEmailPassword($_POST['email'], $_POST['password']);
            if ($connect) {
                session_start();
                $_SESSION['id'] = 1;
                header('Location:' . WEBROOT . 'Home');
            } else {
                header('Location:' . WEBROOT . 'index');
            }
        }
    }

    function inscription() {
        $this->render('signin');
    }

    function signin()
    {
        if (empty($_POST)) {
            header('Location:'.WEBROOT);
        } else {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordconf = $_POST['passwordconf'];
            $MUser = new MUser();
            $checkMail = $MUser->SelectUserEmail($email);
            if (!$checkMail) {
                if ($password == $passwordconf) {
                    $MUser->InsertUser($_POST['email'], $_POST['password'], $_POST['firstname'], $_POST['lastname']);
                        session_start();
                        $_SESSION['id'] = 1;
                        header('Location:' . WEBROOT . 'Home');
                } else {
                    echo "Mots de passe non identiques";
                }
            } else {
                echo "Email déjà utilisé";
            }
        }
    }

    function logout() {
        session_destroy();
        header('Location:'.WEBROOT.'index');
    }

    function view($id) {
        return;
    }

}

/*marvyn.duvauchelle@gmail.com*/

?>