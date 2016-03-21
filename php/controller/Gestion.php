<?php
include(ROOT . 'php/model/MUser.php');

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
        $MUser = new MUser();
        if (empty($_POST['email']) || empty($_POST['firstname']) || empty($_POST['lastname'])) {
            header('Location:' . WEBROOT);
        } else {
            $MUser->updateAccount($_POST['email'], $_POST['firstname'], $_POST['lastname'], $_SESSION['email']);
            $_SESSION['email'] = $_POST['email'];
            var_dump('yo1');
        }
        if (isset($_FILES['avatar'])) {
            $maxsize = 2097152;
            $extensions_valides = array('gif', 'png', 'jpg', 'jpeg');
            $filename = $_FILES['avatar']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $extension_upload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
            if ($_FILES['avatar']['error'] > 0) {
                echo 'error';
            } else if (($_FILES['avatar']['size'] >= $maxsize) || ($_FILES["avatar"]["size"] == 0)) {
                echo 'erreur size';
            } else if (!in_array($ext, $extensions_valides)) {
                echo 'erreur extension';
            } else {
                $UserId = $MUser->SelectUserId($_SESSION['email']);
                $fichier = ROOT . 'img/avatar/' . $UserId[0]['id_user'] . ".$extension_upload";
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $fichier);
                if ($resultat) {
                    $MUser->addAvatar($fichier, $_SESSION['email']);
                    $_SESSION['avatar'] = $UserId[0]['id_user'] . ".$extension_upload";
                    echo 'uploaded !';
                    if ($extension_upload !== 'gif') {
                        $MUser->compress_image($fichier, $fichier, 50);
                    }
                }
            }
        }
header('Location:' . WEBROOT.'Gestion');
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
                } else {
                    echo "C'est déjà votre mot de passe actuel !";
                }
            } else {
                echo "Les deux mots de passe ne sont pas identiques";
            }
        } else {
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