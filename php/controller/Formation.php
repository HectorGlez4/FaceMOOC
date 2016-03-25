<?php

include_once(ROOT . 'php/model/MFormation.php');
include_once(ROOT . 'php/model/MChapter.php');
include_once(ROOT . 'php/model/MClass.php');
include_once(ROOT . 'php/model/MInscription.php');
include_once(ROOT . 'php/model/MUser.php');

Class Formation extends Controller
{

    var $layout;

    function index()
    {
        if (!isset($_SESSION['id'])) {
            header('Location:' . WEBROOT . 'User');
            return;
        }
        $this->render('formation');
    }

    function view($id)
    {
        if (!isset($_SESSION['id'])) {
            header('Location:' . WEBROOT . 'User');
            return;
        }
        $MFormation = new MFormation();
        $MChapter = new MChapter();
        $MClass = new MClass();
        $MUser = new MUser();
        $MInscription = new MInscription();
        $idUser = $MUser->SelectUserId($_SESSION['email']);
        $d['checkSub'] = $MInscription->SelectInscriptionByIds($id, $idUser[0]['id_user']);
        $d['formation'] = $MFormation->SelectFormationById($id);
        if ($d['formation'] == null) {
            echo require(ROOT . 'error/error_404.html');
        } else {
            $d['chapter'] = $MChapter->SelectChapters($id);
            $chapters = $d['chapter'];
            if (isset($chapters)) {
                foreach ($chapters as $chapter) {
                    $d['class'][$chapter['id_chapter']] = $MClass->SelectClassByChapterId($chapter['id_chapter']);
                }
            }
            $this->set($d);
            $this->render('formation');
            return;
        }

    }

    function subscribe($id)
    {
        $MInscription = new MInscription();
        $MUser = new MUser();
        $idUser = $MUser->SelectUserId($_SESSION['email']);
        date_default_timezone_set('Europe/Paris');
        $checkSub = $MInscription->SelectInscriptionByIds($id, $idUser[0]['id_user']);
        var_dump($checkSub);
        if (!$checkSub) {
            $MInscription->InsertInscription($id, $idUser[0]['id_user'], date("Y-m-d H:i:s"));
            echo "je m'abonne";
            header('Location:' . WEBROOT . 'Formation/view/' . $id);
        } else {
            $MInscription->DeleteInscription($checkSub[0]['id_inscription']);
            //echo "je me desabonne";
            header('Location:' . WEBROOT . 'Formation/view/' . $id);
        }
    }
}

?>