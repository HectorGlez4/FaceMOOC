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

}

?>