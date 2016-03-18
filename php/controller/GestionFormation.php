<?php

include_once(ROOT.'php/model/MFormation.php');
include_once(ROOT.'php/model/MChapter.php');
include_once(ROOT.'php/model/MClass.php');
include_once(ROOT.'php/model/MUser.php');

Class GestionFormation extends Controller {

var $layout;


    function index() {
        if(!isset($_SESSION['id'])) {
            header('Location:'.WEBROOT.'User');
            return;
        }
        $this->render('gestionCours');
    }

  
 function gestionfor() {
  
        if (empty($_POST['titlef']) || empty($_POST['diff']) || empty($_POST['requireskill'])|| empty($_POST['description']) || 
        	empty($_POST['image']) || empty($_POST['keywords']) ) {
            
            header('Location:'.WEBROOT.'GestionFormation');
        } else {
        	
            $title = $_POST['titlef'];
            $diff = $_POST['diff'];
            $image = '/FaceMOOC/img/avatar.png';
            $requireskill = $_POST['requireskill'];
            $description = $_POST['description'];
            $keywords = $_POST['keywords'];
            $MFormation = new MFormation();
            $MUser= new MUser();

            $id_exp=$MUser->SelectUserId($_SESSION['email']);
            $id_expert=$id_exp[0]['id_user'];
            $checkTitle = $MFormation->SelectFormationTitle($_SESSION['email'],$title);
            var_dump($checkTitle[0]);
            if($checkTitle[0]['COUNT(title)']==0){
            	
            	echo 'nada';

            	$holaa=$MFormation->InsertFormation(2, $title, $description,$image, $requireskill, $diff, $keywords);
            	var_dump($holaa);
            }
            else{
            	
         		echo 'This title is already used';
            }
            

            
			
        }
    }


    
}

?>