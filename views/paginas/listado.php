        <div class="contenedor-anuncios">
            <?php foreach($propiedades as $propiedad ): ?>
            <div class="anuncio">
                <img loading="lazy" src="<?php echo "imagenes/".$propiedad->imagen; ?>" alt="anuncio"> 
                <!-- <picture>
                    <source srcset="build/public/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/public/img/anuncio1.jpeg" type="image/jpeg">
                    <img loading="lazy" src="build/public/img/anuncio1.jpg" alt="anuncio"> 
                </picture> -->

                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad->titulo;?></h3>
                    <p><?php echo limitar_cadena($propiedad->descripcion,50,'...');?></p>
                    <p class="precio">$<?php echo $propiedad->precio;?></p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="public/img/icono_wc.svg" alt="icono_wc">
                            <p><?php echo $propiedad->wc;?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="public/img/icono_estacionamiento.svg" alt="icono_estacionamiento">
                            <p><?php echo $propiedad->estacionamiento;?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="public/img/icono_dormitorio.svg" alt="icono_habitaciones">
                            <p><?php echo $propiedad->habitaciones;?></p>
                        </li>
                    </ul>
                    <a href="propiedad?id=<?php echo $propiedad->id;?>" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div> <!--.contenido-anuncio-->
            </div> <!--.anuncio-->
            <?php endforeach;?>
        </div> <!--.contenedor-anuncios-->