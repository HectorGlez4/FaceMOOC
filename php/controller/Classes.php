<?php
/**
 * Controlleur des classes
 * Envoie les donner à afficher à la vue class.php
 *
**/

include_once(ROOT.'php/model/MFormation.php');
include_once(ROOT.'php/model/MChapter.php');
include_once(ROOT.'php/model/MClass.php');
include_once(ROOT.'php/model/MUser.php');
include_once(ROOT.'php/model/MComment.php');


/**
 * Class du controlleur des classes contenu dans les chapitres
 *
**/
Class Classes extends Controller {
    var $layout;

    /**
     * Fonction gérant l'affichage sur la page d'accueil du controlleur
     *
     * @param int $id
     *      ID de la personne connectée
    **/
    function index($id) {
        // Si l'utilisateur n'est pas connecté, 
        //il est redirigé vers la page de connexion
        if(!isset($_SESSION['id'])) {
            header('Location:'.WEBROOT.'User');
            return;
        }
        // Création des objets
        $MClass = new MClass();
        $MUser = new MUser();
        // Utilisation des méthodes des objets
        // les données retourner par les méthodes sont stockées dans le tableau $d
        $MComment = new MComment();
        $MFormation = new MFormation();

        $d['userInfo'] = $MUser->SelectUserEmail($_SESSION['email']);
        $d['formation'] = $MClass->SelectInfoByJoin('f.*', $id);
        $d['chapter'] = $MClass->SelectInfoByJoin('ch.*', $id);
        $d['currentclass'] = $MClass->SelectClass($id);
        $idFormation= $MFormation->SelectIdFormationByClass($id);
        //cambie esta funcion y la cree en tu Mclass, esta funcion es la consulta de el comentario con inner join
        //con user, asi sabremos quien lo comento :D te amo Linda <3 jaja
        $d['commentInfo']=$MClass->SelectComment1($idFormation[0]['id_formation']);
        $d['comments'] = $MComment->SelectComment($id);
        // Si la classe courrante n'existe pas, on affiche la page d'erreur 404
        if ($d['currentclass'] == null) {
            require(ROOT.'php/view/error.php');
        }
        // Sinon les chapitres de la class courrante, 
        //ainsi qu'elle même sont envoyés à la vue
        else{
            $chapters = $d['chapter'];
            //var_dump($chapters);
            foreach ($chapters as $chapter) {
                //var_dump($chapter);
                $d['class'][$chapter['id_chapter']] = $MClass->SelectClassByChapterId($chapter['id_chapter']);
                //var_dump($d['class']);
            }
            // Toutes les données stockées dans le tablea $d
            // sont envoyées vers la vu class.php
            $this->set($d);
            $this->render('class');
        }
    }


}
?>