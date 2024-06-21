<main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad->titulo; ?></h1>
        <img loading="lazy" src="<?php echo "imagenes/".$propiedad->imagen; ?>" alt="anuncio"> 
        <div class="resumen-propiedad">
            <p class="precio"><?php echo $propiedad->precio; ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="public/img/icono_wc.svg" alt="icono_wc">
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="public/img/icono_estacionamiento.svg" alt="icono_estacionamiento">
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="public/img/icono_dormitorio.svg" alt="icono_habitaciones">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>

            </ul>

            <p><?php echo $propiedad->descripcion; ?></p>
        </div>
</main>