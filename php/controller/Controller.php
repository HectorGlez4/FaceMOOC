<?php

Class Controller {

	var $vars = array();

    function set($d) {
        $this->vars = array_merge($this->vars,$d);
    }

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