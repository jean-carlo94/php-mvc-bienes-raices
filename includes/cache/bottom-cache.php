<?php
// Crea el archivo de cache
$cached = fopen($cachefile, 'w');
fwrite($cached, ob_get_contents());
fclose($cached);
ob_end_flush(); // Envia la salida al navegador
?>