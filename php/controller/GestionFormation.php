<?php

include_once(ROOT . 'php/model/MFormation.php');
include_once(ROOT . 'php/model/MChapter.php');
include_once(ROOT . 'php/model/MClass.php');
include_once(ROOT . 'php/model/MUser.php');
include_once(ROOT . 'php/model/MExpert.php');
include_once(ROOT . 'php/model/MClass.php');


Class GestionFormation extends Controller
{

    var $layout;


    function index()
    {
        if (!isset($_SESSION['id'])) {
            header('Location:' . WEBROOT . 'User');
            return;
        }
        $MFormation = new MFormation();
        $d['formations'] = $MFormation->SelectFormation($_SESSION['email']);
        $this->set($d);
        $this->render('gestionCours');
    }


    function gestionfor()
    {

        if (empty($_POST['titlef']) || empty($_POST['diff']) || empty($_POST['requireskill']) || empty($_POST['description']) ||
            empty($_POST['keywords'])
        ) {

            header('Location:' . WEBROOT . 'GestionFormation');
        } else {

            $title = $_POST['titlef'];
            $diff = $_POST['diff'];
            $requireskill = $_POST['requireskill'];
            $description = $_POST['description'];
            $keywords = $_POST['keywords'];
            $MFormation = new MFormation();
            $MUser = new MUser();
            $MExpert = new MExpert();

            $id_user = $MUser->SelectUserId($_SESSION['email']);
            $id_expert = $MExpert->SelectExpertId($id_user[0]['id_user']);

            $checkTitle = $MFormation->SelectFormationTitle($_SESSION['email'], $title);
            if ($checkTitle[0]['COUNT(title)'] == 0) {
                $maxsize = 2097152;
                $extensions_valides = array('gif', 'png', 'jpg', 'jpeg');
                $filename = $_FILES['imag']['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $extension_upload = strtolower(substr(strrchr($_FILES['imag']['name'], '.'), 1));

                if ($_FILES['imag']['error'] > 0) {
                    echo 'error';
                } else if (($_FILES['imag']['size'] >= $maxsize) || ($_FILES["imag"]["size"] == 0)) {
                    echo 'erreur size';
                } else if (!in_array($ext, $extensions_valides)) {
                    echo 'erreur extension';
                } else {
                    $fichier = 'img/formation/' . $title . ".$extension_upload";
                    $resultat = move_uploaded_file($_FILES['imag']['tmp_name'], $fichier);
                    if ($resultat) {
                        $MFormation->InsertFormation($id_expert[0]['id_expert'], $title, $description, $fichier, $requireskill, $diff, $keywords);
                        $_SESSION['imageFormation'] = $fichier;

                        if ($extension_upload !== 'gif') {
                            $MUser->compress_image($fichier, $fichier, 50);
                        }
                        header('Location:' . WEBROOT . 'GestionFormation');
                    }
                }
            } else {

                $this->showMessage("Vous avez déjà une formation avec ce titre");
            }
        }
    }//gestionfor


    function modifyFormations($id)
    {

        if (empty($_POST['titlef']) || empty($_POST['diff']) || empty($_POST['requireskill']) || empty($_POST['description']) ||
            empty($_POST['keywords'])
        ) {

            header('Location:' . WEBROOT . 'GestionFormation');
        } else {
            $title = $_POST['titlef'];
            $diff = $_POST['diff'];
            $requireskill = $_POST['requireskill'];
            $description = $_POST['description'];
            $keywords = $_POST['keywords'];
            $MFormation = new MFormation();
            $MUser = new MUser();
            $MExpert = new MExpert();

            $id_user = $MUser->SelectUserId($_SESSION['email']);
            $id_expert = $MExpert->SelectExpertId($id_user[0]['id_user']);
            $checkTitle = $MFormation->SelectFormationTitleExceptId($id, $title);
            if ($checkTitle[0]['COUNT(title)'] == 0) {
                $maxsize = 2097152;
                $extensions_valides = array('gif', 'png', 'jpg', 'jpeg');
                $filename = $_FILES['imag']['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $extension_upload = strtolower(substr(strrchr($_FILES['imag']['name'], '.'), 1));
                if ($_FILES['imag']['name'] == '' && $_FILES['imag']['type'] == '') {
                    $fichier = $_SESSION['imageFormation'];
                    $MFormation->UpdateFormation($id_expert[0]['id_expert'], $title, $description, $fichier, $requireskill, $diff, $keywords, $id);
                    header('Location:' . WEBROOT . 'GestionFormation');
                } else {
                    if ($_FILES['imag']['error'] > 0) {
                        echo 'error';
                    } else if (($_FILES['imag']['size'] >= $maxsize) || ($_FILES["imag"]["size"] == 0)) {
                        echo 'erreur size';
                    } else if (!in_array($ext, $extensions_valides)) {
                        echo 'erreur extension';
                    } else {
                        $fichier = 'img/formation/' . $title . ".$extension_upload";
                        $resultat = move_uploaded_file($_FILES['imag']['tmp_name'], $fichier);
                        if ($resultat) {
                            $MFormation->UpdateFormation($id_expert[0]['id_expert'], $title, $description, $fichier, $requireskill, $diff, $keywords, $id);
                            echo "the upload is okay";
                            if ($extension_upload !== 'gif') {
                                $MUser->compress_image($fichier, $fichier, 50);
                            }
                            header('Location:' . WEBROOT . 'GestionFormation');
                        }
                    }
                }
            } else {

                //header('Location:' . WEBROOT . 'GestionFormation');
                echo 'This title is already used';
            }
        }
    }

    function addChapter($id)
    {
        $MChapter = new MChapter();
        $nameChapter = $_POST['nameChapter'];
        $descriptionChapter = $_POST['descriptionChapter'];
        if (empty($nameChapter) || empty($descriptionChapter)) {
            echo "Veuillez entrer un nom et une description";
        } else {
            $MChapter->InsertChapter($id, $nameChapter, $descriptionChapter);
        }
    }

    function updateClass()
    {
        if ($_POST['iclID']) {
            $MClass = new MClass();
            $title = $_POST['title'];
            $description = $_POST['description'];
            $video = $_POST['video'];
            $idClass = $_POST['iclID'];

            if (empty($title)) {
                echo "Veuillez inscrire un titre";
            } else {
                if ($_FILES['cours']['name'] !== '' && $_FILES['cours']['type'] !== '') {
                    $maxsize = 2097152;
                    $extensions_valides = array('pdf');
                    $filename = $_FILES['cours']['name'];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    $extension_upload = strtolower(substr(strrchr($_FILES['cours']['name'], '.'), 1));
                    if ($_FILES['cours']['error'] > 0) {
                        echo 'error';
                    } else if (($_FILES['cours']['size'] >= $maxsize) || ($_FILES["cours"]["size"] == 0)) {
                        echo 'erreur size';
                    } else if (!in_array($ext, $extensions_valides)) {
                        echo 'erreur extension';
                    } else {
                        $fichier = 'img/doc/' . $idClass . ".$extension_upload";
                        $resultat = move_uploaded_file($_FILES['cours']['tmp_name'], $fichier);
                        if ($resultat) {
                            $MClass->addDoc($fichier, $_SESSION['email']);
                            echo 'uploaded !';
                        }
                    }
                }
                if (!empty($video)) {
                    $MClass->addVideo($video, $idClass);
                }

                if (!empty($description)) {
                    $MClass->addDescription($description, $idClass);
                }

                    $MClass->addTitle($title, $idClass);


            }
        } else {
            echo "Selectionnez une classe !";
        }
    }

    function deleteFormations($id)
    {

        $MFormation = new MFormation();
        $MFormation->DeleteFormation($id);
        header('Location:' . WEBROOT . 'GestionFormation');
    }

    function updateFormations($id)
    {

        $MFormation = new MFormation();
        $d['editFormation'] = $MFormation->SelectFormationById($id);
        $this->set($d);
        $this->render('editFormation');
    }

    function editFormations($id)
    {

        $MFormation = new MFormation();
        $MUser = new MUser();
        $MChapter = new MChapter();
        $id_user = $MUser->SelectUserId($_SESSION['email']);
        $id_user = $id_user[0]['id_user'];
        $verifFormation = $MFormation->SelectFormationById($id, $id_user);
        if ($verifFormation == null) {
            echo "Vous n'avez pas les permissions pour éditer cette formation";
        }
        else{
            $d['FormationInfo'] = $verifFormation;
            $d['ChapterInfo'] = $MChapter->SelectChapters($id);
            $this->set($d);
            $this->render('editFormationContent');
        }

    }
}

?>