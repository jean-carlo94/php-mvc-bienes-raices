<?php

function conectarDB() : mysqli{
	$user = getenv('USER');
    $db = new mysqli('localhost', $user , $_ENV["PASS"] ,$_ENV["BD"] );
    if (!$db) {
        echo "no se conecto";
        exit;
    }
    return $db;
}