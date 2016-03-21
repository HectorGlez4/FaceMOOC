<?php

include_once(ROOT.'php/model/MFormation.php');
include_once(ROOT.'php/model/MChapter.php');
include_once(ROOT.'php/model/MClass.php');

Class Classes extends Controller {
	var $layout;

    function index($id) {
        if(!isset($_SESSION['id'])) {
            header('Location:'.WEBROOT.'User');
            return;
        }
        $MClass = new MClass();
        $d['formation'] = $MClass->SelectInfoByJoin('f.*', $id);
        $d['chapter'] = $MClass->SelectInfoByJoin('ch.*', $id);
        $d['currentclass'] = $MClass->SelectClass($id);
        if ($d['currentclass'] == null) {
            echo "erreur 404";
        }
        else{
            $chapters = $d['chapter'];
            //var_dump($chapters);
            foreach ($chapters as $chapter) {
                //var_dump($chapter);
                $d['class'][$chapter['id_chapter']] = $MClass->SelectClassByChapterId($chapter['id_chapter']);
                //var_dump($d['class']);
            }
            $this->set($d);
            $this->render('class');
        }
    }
}
?>