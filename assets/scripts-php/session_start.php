<?php

session_set_cookie_params( [
    "lifetime" => 0,
    "path" => "/",
    "domain" => "",
    "secure" => false,
    "httponly" => true,
    "samesite" => "Strict"
] );

session_start();