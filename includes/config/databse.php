<?php

function conectarDB() : mysqli{
    $db = new mysqli('localhost','','','');
    if (!$db) {
        echo "no se conecto";
        exit;
    }
    return $db;
}