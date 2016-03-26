<?php

include_once(ROOT.'php/model/MFormation.php');
include_once(ROOT.'php/model/MChapter.php');
include_once(ROOT.'php/model/MClass.php');
include_once(ROOT.'php/model/MUser.php');
include_once(ROOT.'php/model/MComment.php');



Class Classes extends Controller {
	var $layout;

    function index($id) {
        if(!isset($_SESSION['id'])) {
            header('Location:'.WEBROOT.'User');
            return;
        }
        $MClass = new MClass();
        $MUser = new MUser();
        $MComment = new MComment();
        $MFormation = new MFormation();

        $d['userInfo'] = $MUser->SelectUserEmail($_SESSION['email']);
        $d['formation'] = $MClass->SelectInfoByJoin('f.*', $id);
        $d['chapter'] = $MClass->SelectInfoByJoin('ch.*', $id);
        $d['currentclass'] = $MClass->SelectClass($id);
        $idFormation= $MFormation->SelectIdFormationByClass($id);
        $d['commentInfo']=$MComment->SelectComment($idFormation[0]['id_formation']);

        
        if ($d['currentclass'] == null) {
            require(ROOT.'php/view/error.php');
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