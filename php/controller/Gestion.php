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
        $MUser = new MUser();
        $d['userGestion'] = $MUser->SelectGestionUser($_SESSION['email']);
        $this->set($d);
        $this->render('gestion');
    }

    function updateaccount()
    {
        if (empty($_POST['email']) || empty($_POST['firstname']) || empty($_POST['lastname'])) {
            header('Location:' . WEBROOT);
        } else {
            $MUser = new MUser();
            $MUser->updateAccount($_POST['email'], $_POST['firstname'], $_POST['lastname'], $_SESSION['email']);
            $_SESSION['email'] = $_POST['email'];
            header('Location:' . WEBROOT);
        }

/*        if (isset($_FILES['avatar'])) {
            if (isset($_FILES['student_avatar'])) {
                //$accountView->showMessage("on passe par la");
                $maxsize = 2097152;
                $extensions_valides = array('gif', 'png', 'jpg', 'jpeg');
                $filename = $_FILES['student_avatar']['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $extension_upload = strtolower(substr(strrchr($_FILES['student_avatar']['name'], '.'), 1));

                if ($_FILES['student_avatar']['error'] > 0) {
                    //$accountView -> showMessage("C'est l'erreur 1.");
                    //$erreur += 1;
                    echo 'error';
                } else if (($_FILES['student_avatar']['size'] >= $maxsize) || ($_FILES["student_avatar"]["size"] == 0)) {
                    //$accountView -> showMessage("Le poids de l'avatar est trop lourd (max : 2 Mo).");
                    $erreur += 1;
                    echo 'erreur size';
                } else if (!in_array($ext, $extensions_valides)) {
                    //$accountView -> showMessage("Mauvaise extension pour l'avatar.");
                    $erreur += 1;
                    echo 'erreur extension';
                } else {
                }
            }*/
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