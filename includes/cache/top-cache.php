<?php
$url = $_SERVER["SCRIPT_NAME"];
$break = explode('/', $url);
$file = $break[count($break) - 1];
$cachefile = 'cached-'.substr_replace($file ,"",-4).'.html';
$cachetime = 18000;

// Servimos de la cache si es menor que $cachetime
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->";
    readfile($cachefile);
    exit;
}
ob_start(); 
?>