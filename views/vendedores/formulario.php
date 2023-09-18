    <fieldset>
        <legend>Informacion General</legend>

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre Vendedor" value="<?php echo s($vendedor->nombre); ?>">
        
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" placeholder="Apellido Vendedor" value="<?php echo s($vendedor->apellido); ?>">
       
        <label for="telefono">Telefono</label>
        <input type="number" id="telefono" name="telefono" placeholder="Telefono Vendedor" value="<?php echo s($vendedor->telefono); ?>">
       
        <label for="imagen">imagen</label>
        <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png" name="imagen">
        <?php if($vendedor->imagen): ?>
            <img src="/imagenes/<?php echo $vendedor->imagen;?>" class="imagen-small">
        <?php endif;?>
    </fieldset>