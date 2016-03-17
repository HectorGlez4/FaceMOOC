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
        if (empty($_POST['email']) || empty($_POST['password'])){
            header('Location:'.WEBROOT);
        }
        else {
            $MUser = new MUser();
            $connect = $MUser->SelectUserEmailPassword($_POST['email'], $_POST['password']);
            if ($connect) {
                session_start();
                $_SESSION['id'] = 1;
                $_SESSION['email'] = $_POST['email'];
                header('Location:' . WEBROOT . 'Home');
            } else {
                header('Location:' . WEBROOT . 'index');
            }
        }
    }

    function inscription() {
        $this->render('signin');
    }

    function recupmdp() {
        $this->render('recupmdp');
    }

    function changepass()
    {

        if (empty($_POST['password']) || empty($_POST['password_new']) || empty($_POST['password_confirm'])) {
            header('Location:' . WEBROOT);
        } else {
            $MUser = new MUser();
            $old_password = $MUser->SelectUserPassword($_POST['password']);
            $password = $_POST["password"];
            $password_new = $_POST["password_new"];
            $password_confirm = $_POST["password_confirm"];
            if ($password == $old_password) {
                if ($password_new == $password_confirm) {
                    if ($old_password !== $password_new) {
                        $MUser->UpdateUser($password_new, $_SESSION['email']);
                    } else {
                        echo "That was your old password";
                    }
                } else {
                    echo "The password does not match";
                }
            } else {
                echo "That is not your correct password... man";
            }
        }
    }


    function signin()
    {
        if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['firstname']) || empty($_POST['lastname'])) {
            header('Location:'.WEBROOT.'User/inscription');
        } else {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordconf = $_POST['passwordconf'];
            $MUser = new MUser();
            $checkMail = $MUser->SelectUserEmail($email);
            if (!$checkMail) {
                if ($password == $passwordconf) {
                    $MUser->InsertUser($email, $password, $_POST['firstname'], $_POST['lastname']);
                        session_start();
                        $_SESSION['id'] = 1;
                        $_SESSION['email'] = $email;
                        $_SESSION['firstname'] = $_POST['firstname'];
                        $_SESSION['lastname'] = $_POST['lastname'];
                    header('Location:' . WEBROOT . 'Home');
                } else {
                    echo "Mots de passe non identiques";
                }
            } else {
                echo "Email déjà utilisé";
            }
        }
    }

    function mailmdp()
    {
        if (empty($_POST['email'])) {
            header('Location:' . WEBROOT . 'User/recupmdp');
        } else {
            $MUser = new MUser();
            $checkMail = $MUser->SelectUserEmail($_POST['email']);
            if ($checkMail) {
                $MUser->recoverPassword($_POST['email']);
            }
            else {
                echo "Cet email n'a pas de compte sur ce site";
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