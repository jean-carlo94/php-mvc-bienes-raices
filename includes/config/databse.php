<?php

function conectarDB() : mysqli{
    $db = new mysqli('localhost','root','Taziturno1j@1586','bienesraces_crud');
    if (!$db) {
        echo "no se conecto";
        exit;
    }
    return $db;
}