<?php

/**
 * Controlleur des formations
 *
**/

include_once(ROOT.'php/model/MFormation.php');
include_once(ROOT.'php/model/MChapter.php');
include_once(ROOT.'php/model/MClass.php');
include_once(ROOT.'php/model/MComment.php');

/**
 * Class du controlleur des formations 
 *
**/
Class Formation extends Controller {

	var $layout;

    /**
     * Fonction gérant l'affichage sur la page d'accueil du controlleur
     *
    **/
    function index() {
        // Si l'utilisateur n'est pas connecté, 
        //il est redirigé vers la page de connexion
        if(!isset($_SESSION['id'])) {
            header('Location:'.WEBROOT.'User');
            return;
        }
        $this->render('formation');
    }

    /**
     * Fonction gérant l'affichage en fonction de la formation sélectionnée
     *
     * @param int $id
     *      ID de la formation sélectionnée
    **/
    function view($id){
        // Si l'utilisateur n'est pas connecté, 
        //il est redirigé vers la page de connexion
    	if(!isset($_SESSION['id'])) {
            header('Location:'.WEBROOT.'User');
            return;
        }
        // Création des objets
        $MFormation = new MFormation();
        $MChapter = new MChapter();
        $MComment = new MComment();
        $MClass = new MClass();
        // Utilisation des méthodes des objets
        // les données retourner par les méthodes sont stockées dans le tableau $d
        $d['formation'] = $MFormation->SelectFormationById($id);
        $d['comments'] = $MComment->SelectComment($id);
        // Si la formation sélectionnée n'existe pas,
        // on affiche la page d'erreur 404
        if ($d['formation'] == null) {
            echo require(ROOT.'php/view/error.php');
        }
        // Sinon on affiche les chapitres et les classes des chapitres
        // de la formation concernée
        else{
            $d['chapter'] = $MChapter->SelectChapters($id);
            $chapters = $d['chapter'];
            //var_dump($chapters);
            if (isset($chapters)) {
                foreach ($chapters as $chapter) {
                    //var_dump($chapter);
                    $d['class'][$chapter['id_chapter']] = $MClass->SelectClassByChapterId($chapter['id_chapter']);
                   // var_dump($d['class']);
                }
            }
            // Toutes les données stockées dans le tablea $d
            // sont envoyées vers la vu formation.php
            $this->set($d);
            $this->render('formation');
            return;
        }
        
    }
}
?>