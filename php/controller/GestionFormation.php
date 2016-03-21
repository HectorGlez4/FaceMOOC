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
        	 empty($_POST['keywords']) ) {
            
            header('Location:'.WEBROOT.'GestionFormation');
        } else {
        	
            $title = $_POST['titlef'];
            $diff = $_POST['diff'];
            $requireskill = $_POST['requireskill'];
            $description = $_POST['description'];
            $keywords = $_POST['keywords'];
            $MFormation = new MFormation();
            $MUser= new MUser();

            $id_exp=$MUser->SelectUserId($_SESSION['email']);
            $id_expert=$id_exp[0]['id_user'];
                        //var_dump($id_exp);

            $checkTitle = $MFormation->SelectFormationTitle($_SESSION['email'],$title);
            $id_formation= $MFormation->SelectFormationId($_SESSION['email']);
            var_dump($id_formation);
            //var_dump($checkTitle[0]);
            if($checkTitle[0]['COUNT(title)']==0){
//
            
            if($_FILES['imag']['name'] != null && $_FILES['imag']['size'] > 0){

             if ($_FILES['imag']['error'] > 0) {
                echo 'error';
            } 

else {
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

                 $fichier = ROOT . 'img/formation/' . $filename . ".$extension_upload";
                $resultat = move_uploaded_file($_FILES['imag']['tmp_name'], $fichier);
                if ($resultat){
                      
                    $MFormation->InsertFormation($id_expert, $title, $description, $fichier, $requireskill, $diff, $keywords);


                echo "the upload is okay";
            } 
}
}           
   } else{
    echo "nada";
   }            
        
                
                
           } else{
            	
         		echo 'This title is already used';
            }
            

            
		
        }	
      
    }//gestionfor


function deleteFormations($id){

$MFormation = new MFormation();
$MFormation->DeleteFormation($id);

}   

}

?>