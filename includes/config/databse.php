<?php

function conectarDB() : mysqli{
    $db = new mysqli('localhost',$_ENV["USER"],$_ENV["PASS"],$_ENV["BD"]);
    if (!$db) {
        echo "no se conecto";
        exit;
    }
    return $db;
}