<?php

include_once(ROOT.'php/model/MFormation.php');
include_once(ROOT.'php/model/MChapter.php');
include_once(ROOT.'php/model/MClass.php');

Class Formation extends Controller {

	var $layout;

    function index() {
        if(!isset($_SESSION['id'])) {
            header('Location:'.WEBROOT.'User');
            return;
        }
        $this->render('formation');
    }

    function view($id){
    	if(!isset($_SESSION['id'])) {
            header('Location:'.WEBROOT.'User');
            return;
        }
        $MFormation = new MFormation();
        $MChapter = new MChapter();
        $MClass = new MClass();
        $d['formation'] = $MFormation->SelectFormationById($id);
        if ($d['formation'] == null) {
            echo "erreur 404";
        }else{
            $d['chapter'] = $MChapter->SelectChapters($id);
            $chapters = $d['chapter'];
            //var_dump($chapters);
            if (isset($chapters)) {
                foreach ($chapters as $chapter) {
                    var_dump($chapter);
                    $d['class'][$chapter['id_chapter']] = $MClass->SelectClassByChapterId($chapter['id_chapter']);
                    var_dump($d['class']);
                }
            }
            $this->set($d);
            $this->render('formation');
            return;
        }
        
    }
}
?>