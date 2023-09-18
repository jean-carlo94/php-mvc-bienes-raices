<?php

function conectarDB() : mysqli{    
    $db = new mysqli('localhost', $_ENV["USER_BD"], $_ENV["PASS_BD"] ,$_ENV["BD_NAME"] );
    if (!$db) {
        echo "no se conecto";
        exit;
    }
    return $db;
}