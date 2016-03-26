<?php
include(ROOT . 'php/model/MUser.php');
include(ROOT . 'php/model/MExpert.php');

Class User extends Controller
{

    var $layout;

    function index()
    {
        if (isset($_SESSION['id'])) {
            header('Location:' . WEBROOT . 'index');
            return;
        }
        $this->render('user');
    }

    function login()
    {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            header('Location:' . WEBROOT);
        } else {
            $MUser = new MUser();
            $connect = $MUser->SelectUserEmailPassword($_POST['email'], $_POST['password']);
            $avatar = $MUser->SelectUserAvatar($_POST['email']);
            if ($avatar[0]['avatar'] == '') {
                $avatar = WEBROOT.'img/avatar.png';
            } else {
                $avatar = $avatar[0]['avatar'];
            }

            if ($connect) {
                $MExpert = new MExpert();
                session_start();
                $_SESSION['id'] = 1;
                $_SESSION['avatar'] = $avatar;
                $_SESSION['email'] = $_POST['email'];
                $idExpert = $MExpert->SelectExpertIdByEmail($_SESSION['email']);
                if ($idExpert) {
                    $_SESSION['id_expert'] = 1;
                }
                
                header('Location:' . WEBROOT . 'Home');
            } else {
//                header('Location:' . WEBROOT . 'index');
                $this->showMessage("Email ou mot de passe incorrecte");
            }
        }
    }

    function inscription()
    {
        if (!isset($_SESSION['id'])) {
            $this->render('signin');
        }
        else {
            header('Location:' . WEBROOT . 'index');
        }
    }

    function recupmdp()
    {
        if (!isset($_SESSION['id'])) {
            $this->render('recupmdp');
            }
        else {
            header('Location:' . WEBROOT . 'index');
        }
    }

    function signin()
    {
        if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['firstname']) || empty($_POST['lastname'])) {
            header('Location:' . WEBROOT . 'User/inscription');
        } else {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordconf = $_POST['passwordconf'];
            $status = $_POST['status'];
            $MUser = new MUser();
            $checkMail = $MUser->SelectUserEmail($email);
            if (!$checkMail) {
                if ($password == $passwordconf) {
                    $avatar = WEBROOT.'img/avatar.png';
                    $MUser->InsertUser($email, $password, $_POST['firstname'], $_POST['lastname'], $avatar);
                    session_start();
                    $_SESSION['id'] = 1;
                    $_SESSION['avatar'] = $avatar;
                    $_SESSION['email'] = $email;
                    $_SESSION['firstname'] = $_POST['firstname'];
                    $_SESSION['lastname'] = $_POST['lastname'];
                    $_SESSION['id_expert'] = 0;
                    if ($status !== 'Etudiant') {
                        $MExpert = new MExpert();
                        $idUser = $MUser->SelectUserId($_SESSION['email']);
                        $MExpert->InsertExpert($idUser[0]['id_user'],'','');
                        $_SESSION['id_expert'] = 1;
                    }
                    header('Location:' . WEBROOT . 'Home');
                } else {
                    $this->showMessage("Mots de passe non identiques");
                }
            } else {
                $this->showMessage("Email déjà utilisé");
            }
        }
    }

    function logout()
    {
        session_destroy();
        header('Location:' . WEBROOT . 'index');
    }

    function view($id)
    {
        return;
    }

    function recoverPassword()
    {
        require ROOT . 'PHPMailer/PHPMailerAutoload.php';
        require ROOT . 'PHPMailer/class.phpmailer.php';
        if (empty($_POST['email'])) 
        {
            header('Location:' . WEBROOT . 'User/recupmdp');
        } 
        else 
        {
            $MUser = new MUser();
            $checkMail = $MUser->SelectUserEmail($_POST['email']);
            $codeRecup = rand(10000000, 99999999);
            if (!$checkMail) {
                echo "Cet email n'a pas de compte sur ce site";
            } 
            else 
            {
                $userMail = $_POST['email'];
                $char = 'abcdefghijklmnopqrstuvwxyz0123456789';
                $token = str_shuffle($char);
                $token = substr($token, 0);
                //echo $token;
                $MUser->UpdateCodeRecup($userMail, $codeRecup);
                /*var_dump($userMail);
                var_dump($codeRecup);
                var_dump($test);*/
                $MUser->UpdateToken($userMail, $token);
                $body = "
                    <h1>Réinitialisation du mot de passe</h1>
                    <hr />
                    <p>Bonjour, vous avez oublié votre mot de passe ? Pas de soucis.</p>
                    <p>Suivez ce lien : </p>
                    <a href='http://facemooc.esy.es/User/codemdp/".$token."'>Cliquez ici</a>
                    <p>et veuillez saisir le code suivant</p>
                    <h2>".$codeRecup."</h2>
                    <hr />
                    <p>Ce message a été généré automatiquement. Merci de ne pas y répondre.</p>
                ";
                $mailer = new PHPMailer();
                $mailer->CharSet = "utf-8";
                $mailer->IsHTML(true);
                // De qui vient le message, e-mail puis nom
                $mailer->From = "noreply@FaceMOOC.com";
                $mailer->FromName = "Noreply - FaceMOOC";

                // Définition du sujet/objet
                $mailer->Subject = "FaceMOOC - Changement de mot de passe";
                $mailer->AddAddress($userMail);
                //$mailer->Subject ="Subject: =?UTF-8?B?".base64_encode("Réinitialisation du mot de passe | Zenetude")."?=";
                $mailer->Body = $body;
                if (!$mailer->Send())
                {
                    echo "Erreur lors de l'envoie du mail";
                }
                else
                {
                    echo "Un email vous a été envoyé à cette adresse";
                }


                /*          $mail = new PHPMailer();
                            $mail->isSMTP();
                            $mail->SMTPDebug = 2;
                            $mail->SMTPAuth = true;
                            $mail->SMTPSecure = "ssl";
                            $mail->Host = "smtp.gmail.com";
                            $mail->Port = 465;
                            $mail->Username = "linyyoazz@gmail.com";
                            $mail->Password = "";
                            $mail->setFrom("linyyoazz@gmail.com", "Linda");
                            $mail->Subject = "Récuperation de mot de passe";
                            $mail->msgHTML('Bonjour');
                            $address = "marvyn.duvauchelle@gmail.com";
                            $mail->addAddress($address, "Marvyn");
                            if(!$mail->Send())
                                echo "Erreur lors de l'envoie du mail";
                            else
                                echo "Un email vous a été envoyé à cette adresse";*/
            }
        }  
    }

    function codeMdp($token){
        $d['token'] = $token;
        $this->set($d);
        $this->render('codemdp');
    }

    function controlCode($token){
        $MUser = new MUser();
        $tokenVerif = $MUser->SelectUserToken($token);
        if (!$token || !$tokenVerif) {
            echo require(ROOT.'php/view/error.php');
        }
        else
        {
            $codeForm = $_POST['code'];
            $codeForm = crc32($codeForm);
            $codeVerif = $MUser->SelectUserCode($codeForm);
            if (!$codeVerif) {
                echo "Le code ne correspond pas";
            }
            else
            {
                $d['token'] = $token;
                $this->set($d);
                $this->render('formRecupMdp');
            }
        }
    }

    function newPassword($token){
        if (empty($_POST['newMdp']) && empty($_POST['newMdpVerif'])) {
            echo "Les champs doivent être remplis !";
        }
        else
        {
            $newMdp = $_POST['newMdp'];
            $newMdpVerif = $_POST['newMdpVerif'];
            if ($newMdp != $newMdpVerif) {
                echo "Les mot de passe ne correspondent pas !";
            }
            else
            {
                $MUser = new MUser();
                //var_dump($token);
                $userMail = $MUser->SelectUserEmailByToken($token);
                $userMail = $userMail[0]['email'];
                //var_dump($userMail);
                $MUser->UpdatePasswordByEmail($userMail, $newMdp);
                //var_dump($test);
                $MUser->DropCodeToken($userMail);
                echo "Votre mot de passe à bien été modifié, vous allez être redirigé sur la page de connexion";
                sleep(5);
                header('Location:' . WEBROOT . 'User');
            }
        }
    }
}

?>