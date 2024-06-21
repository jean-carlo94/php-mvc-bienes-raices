<?php

function conectarDB() : mysqli{    
    $db = new mysqli($_ENV["DB_HOST"], $_ENV["DB_USER"], $_ENV["DB_PASS"] ,$_ENV["BD_NAME"] );
    if (!$db) {
        echo "no se conecto";
        exit;
    }
    return $db;
}