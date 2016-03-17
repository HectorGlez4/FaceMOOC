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

    function changepass()
    {
        if (empty($_POST['password']) || empty($_POST['password_new']) || empty($_POST['password_confirm'])) {
            header('Location:' . WEBROOT);
        } else {
            $MUser = new MUser();
            $old_password = $MUser->SelectUserPassword($_SESSION['email']);

            $password = $_POST["password"];
            $password_new = $_POST["password_new"];
            $password_confirm = $_POST["password_confirm"];
            if ($old_password[0]['password'] == $password) {
                if ($password_new == $password_confirm) {
                    if ($password_new != $old_password[0]['password']) {
                        $MUser->changePass($password_new, $_SESSION['email']);
                        echo "Mot de passe change";
                    }
                    else {
                        echo "C'est déjà votre mot de passe actuel !";
                    }
                }
                else {
                    echo "Les deux mots de passe ne sont pas identiques";
                }
            }
            else {
                echo "Votre ancien mot de passe est incorrect";
            }
        }
    }












        /*{
            $MUser = new MUser();
            $old_password = $MUser->SelectUserPassword($_SESSION['email']);
            var_dump($_SESSION['email']);
            $password = $_POST["password"];
            $password_new = $_POST["password_new"];
            $password_confirm = $_POST["password_confirm"];
            var_dump($old_password[0],$password);
            if ($old_password = $password) {
                 if ($password_new = $password_confirm) {
                    echo 'les 2 mots de passe sont OK';
                   /* else if ($old_password !== $password_new) {
                        $MUser->changePass($password_new, $_SESSION['email']);
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
    }*/
}

?>