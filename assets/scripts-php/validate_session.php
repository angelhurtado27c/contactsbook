<?php

include "session_start.php";

if ( !isset($_SESSION["name"]) ) {
    // Obtener ruta para llegar a "/"
    function path_to_root( $offset = 0 ) {
        $level = substr_count($_SERVER['PHP_SELF'], "/") - 1 - $offset;
        $path = "";
        for( $l = 0; $l < $level; $l++ )
            $path .= "../";
        return $path;
    }

    $root = path_to_root();
    header( "Location:".$root."index.php" );
}