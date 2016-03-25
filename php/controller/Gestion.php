<?php
/**
 * Controlleur de la gestion de compte
 *
**/

include(ROOT . 'php/model/MUser.php');
include(ROOT . 'php/model/MExpert.php');

/**
 * Class du controlleur des formations
 *
**/
Class Gestion extends Controller
{

    var $layout;

    /**
     * Fonction gérant l'affichage sur la page d'accueil du controlleur
     *
    **/
    function index()
    {
        // Si l'utilisateur n'est pas connecté, 
        //il est redirigé vers la page de connexion
        if (!isset($_SESSION['id'])) {
            header('Location:' . WEBROOT . 'index');
            return;
        }
        // Création des objets
        $MUser = new MUser();
        $MExpert = new MExpert();
        // Utilisation des méthodes des objets
        // les données retourner par les méthodes sont stockées dans le tableau $d
        $userId = $MUser->SelectUserId($_SESSION['email']);
        $userId = $userId[0]['id_user'];
        $d['expertGestion'] = $MExpert->SelectExpertById($userId);
        $d['userGestion'] = $MUser->SelectGestionUser($_SESSION['email']);
        // Toutes les données stockées dans le tablea $d
        // sont envoyées vers la vu formation.php
        $this->set($d);
        $this->render('gestion');
    }

    /**
     * Fonction gérant la mise à jour du compte
     * après l'envoi du formulaire 
     *
    **/
    function updateaccount()
    {
        // Création des objets
        $MUser = new MUser();
        $MExpert = new MExpert();
        // Si les champs sont vides, aucun changement est effectué
        if (empty($_POST['email']) || empty($_POST['firstname']) || empty($_POST['lastname'])) {
            header('Location:' . WEBROOT);
        } 
        // Sinon on met à jour les champs dans la base de donnée
        else 
        {
            $MUser->updateAccount($_POST['email'], $_POST['firstname'], $_POST['lastname'], $_SESSION['email']);
            $_SESSION['email'] = $_POST['email'];
        }
        // Si le nom de l'image et son type ne sont pas vides
        // l'image est insérée dans la base de données
        if ($_FILES['avatar']['name'] !== '' && $_FILES['avatar']['type'] !== '') {
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
                $fichier = 'img/avatar/' . $UserId[0]['id_user'] . ".$extension_upload";
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $fichier);
                if ($resultat) {
                    $MUser->addAvatar($fichier, $_SESSION['email']);
                    $_SESSION['avatar'] = "img/avatar/" . $UserId[0]['id_user'] . ".$extension_upload";
                    echo 'uploaded !';
                    if ($extension_upload !== 'gif') {
                        $MUser->compress_image($fichier, $fichier, 50);
                    }
                }
            }
        }
        // Si l'utilisateur est un enseignant, 
        // on envoie à la vue l'adresse et le téléphone de l'enseignant
        if ($_SESSION['id_expert'] == 1) {
            $idExpert = $MExpert->SelectExpertIdByEmail($_SESSION['email']);
            $MExpert->UpdateExpert($_POST['address'], $_POST['phone'], $idExpert[0]['id_expert']);
        }
            header('Location:' . WEBROOT . 'Gestion');
    }

    /**
     * Fonction gérant la mise à jour du mot de passe
     * après l'envoi du formulaire 
     *
    **/
    function changepass()
    {
        // Si les champs sont vides, aucun changement est effectué
        if (empty($_POST['password']) || empty($_POST['password_new']) || empty($_POST['password_confirm'])) {
            header('Location:' . WEBROOT);
        } 
        // Sinon les tests pour le changements de mot de passe s'effectuent
        else 
        {
            $MUser = new MUser();
            $old_password = $MUser->SelectUserPassword($_SESSION['email']);

            $password = $_POST["password"];
            $password = md5($password);
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