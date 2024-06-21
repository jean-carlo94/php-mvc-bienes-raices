<?php
    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)){
        $inicio = false;
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienes Raíces</title>
        <link rel="stylesheet" href="../public/css/app.css">
    </head>
    <body>
        <header class="header <?php echo ($inicio ? 'inicio':''); ?> ">
            <div class="contenedor contenido-header">
                <div class="barra">
                    <a href="/">
                        <img src="../public/img/logo.svg" alt="Logotipo de Bienes Raíces">
                    </a>
                    <div class="mobile-menu">
                        <img src="../public/img/barras.svg" alt="icono menu responsive">
                    </div>
                    <div class="derecha">
                        <img class="dark-mode-boton" src="../public/img/dark-mode.svg">
                        <nav class="navegacion">
                            <a href="/nosotros">Nosotros</a>
                            <a href="/propiedades">Anuncios</a>
                            <a href="/blog">Blog</a>
                            <a href="/contacto">Contacto</a>
                            <?php if($auth): ?>
                                <a href="/logout">Cerrar Sesión</a>
                            <?php endif;?>
                        </nav>
                    </div>
                </div><!-- BARRA -->
                <?php if($inicio): ?>
                        <h1>Venta De Casas y Departamentos Exclusivos de Lujo</h1>
                <?php endif; ?>
            </div>
        </header>

        <?php echo $contenido; ?>

        <footer class="footer seccion">
            <div class="contenedor contenedor-footer">
                <nav class="navegacion">
                    <a href="/nosotros">Nosotros</a>
                    <a href="/propiedades">Anuncios</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>
                </nav>
            </div>
            <p class="copyright">Todos los derechos Reservados <?php echo date('Y'); ?> &copy;</p>
        </footer>

        <script src="../public/js/bundle.min.js"></script>
    </body>
</html>