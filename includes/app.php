<?php
declare ( strict_types = 1);
ini_set('display_errors', 1);

require 'funciones.php';
require 'config/databse.php';
require __DIR__.'/../vendor/autoload.php';

//Conectar a la Base de datos
$db = conectarDB();
use Model\ActiveRecord;

ActiveRecord::setDB($db);