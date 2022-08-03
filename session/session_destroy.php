<?php

session_set_cookie_params( [
    "lifetime" => -1,
    "path" => "/",
    "domain" => "",
    "secure" => false,
    "httponly" => true,
    "samesite" => "Strict"
] );

session_start();
session_destroy();

header( "Location:../index.php" );