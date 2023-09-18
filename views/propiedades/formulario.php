        <fieldset>
            <legend>Informacion General</legend>
            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo s($propiedad->titulo); ?>">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo s($propiedad->precio); ?>">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png" name="imagen">
            <?php if($propiedad->imagen): ?>
                <img src="/imagenes/<?php echo $propiedad->imagen;?>" class="imagen-small">
            <?php endif;?>
            <label for="descripcion">Descripcion</label>
            <textarea type="number" id="descripocion" name="descripcion"><?php echo s($propiedad->descripcion); ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion de la propieadad</legend>
            <label for="habitaciones">Habitaciones</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="EJ: 3" min="1" max="9" value="<?php echo s($propiedad->habitaciones); ?>">
            <label for="wc">Baños</label>
            <input type="number" id="wc" name="wc" placeholder="EJ: 3" min="1" max="9" value="<?php echo s($propiedad->wc); ?>">
            <label for="estacionamiento">Estacionamiento</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="EJ: 3" min="1" max="9" value="<?php echo s($propiedad->estacionamiento); ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select id="vendedor" name="vendedores_id">
                <option value="1">--Seleccione--</option>
                <?php foreach($vendedores as $vendedor):?>
                    <option <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : '' ?> value="<?php echo s($vendedor->id); ?>"><?php echo s($vendedor->nombre) ." ". s($vendedor->apellido); ?></option>
                <?php endforeach;?>
            </select>
        </fieldset>