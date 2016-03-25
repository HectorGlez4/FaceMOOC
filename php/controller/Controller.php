<?php
/**
 * Controlleur principal
 * Ici on défini les méthodes principales utilisé par les autres controlleurs
 *
**/

Class Controller {
    // Déclaration du tableau stockant l'ensemble des données envoyé vers les vues
	var $vars = array();

    /**
     * Fonction instanciant le tableau
     *
    **/ 
    function set($d) {
        $this->vars = array_merge($this->vars,$d);
    }

    /**
     * Fonction envoyant le tableau vers la vue $filename
     *
    **/
    function render($filename) {
        global $content;
        $content = $this->vars;
        //extract($this->vars);
        ob_start();
        require(ROOT.'php/view/'.$filename.'.php');
        $content_for_layout = ob_get_clean();
        if ($this->layout == false) {
            echo $content_for_layout;
        } else {
            require(ROOT.'php/view/'.$this->layout.'.php');
        }
    }

    public function showMessage($msg, $send = "", $redirection = "")
    {
        // Les messages d"erreurs ci-dessus s'afficheront si Javascript est désactivé
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');

        $retour['msg'] = $msg;
        $retour['send'] = $send;
        $retour['redirection'] = $redirection;
        echo json_encode($retour);

    }

}

?>