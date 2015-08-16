<?php

    //obtenir extension d'une image
    function get_ext($file) {
        return strtolower(substr(strrchr($file['name'], '.'), 1));
    }

?>