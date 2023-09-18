<main class="contenedor seccion">
        <h1>Contacto</h1>
        <?php
            if($mensaje):?>
            <p class="alerta exito"><?php echo $mensaje?></p>
        <?php
            endif;
        ?>
        <picture>
            <source srcset="img/destacada3.webp" type="image/webp">
            <source srcset="img/destacada3.jpeg" type="image/jpeg">
            <img loading="lazy" src="img/destacada3.jpg" alt="Imagen Contacto"> 
        </picture>

        <h2>Llene el Formulario de Contacto</h2>

        <form class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Informacion Personal</legend>

                <label for="nombre">nombre</label>
                <input id="nombre" name="nombre" type="text" placeholder="Tu nombre" required> 

                <label for="mensaje">Tu Mensaje</label>
                <textarea id="mensaje" name="mensaje" type="text" placeholder="Tu Mensaje" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Infomacion sobre la propiedad</legend>

                <label for="opciones">Vende o compra</label>
                <select id="opciones" name="tipo" required>
                    <option value="" disabled selected> -- Seleccione -- </option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input id="presupuesto" type="number" name="presupuesto" placeholder="Tu Precio o Presupuesto" required> 

                
            </fieldset>

            <fieldset>
                <legend>Infomacion sobre la propiedad</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto" name="contacto" type="radio" value="telefono" id="contactar-telefono" required>

                    <label for="contactar-email">Email</label>
                    <input name="contacto" name="contacto" type="radio" value="email" id="contactar-email" required>
                </div>
                <div id="contactoctr"></div>
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>