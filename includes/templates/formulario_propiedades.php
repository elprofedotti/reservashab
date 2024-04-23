<fieldset>
            <legend>Informacion General</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" placeholder="Titulo Propiedad" name="propiedad[titulo]" value="<?php echo s($propiedad->titulo); ?>" >

            <label for="precio">Precio:</label>
            <input type="number" id="precio" placeholder="Precio Propiedad" name="propiedad[precio]" value="<?php echo s($propiedad->precio); ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg image/png" name="propiedad[imagen]">
            <?php if($propiedad->imagen):?>
                <img src="../../imagenes/<?php echo $propiedad->imagen?>" alt="Imagen de la propiedad" class="imagen-small">
            <?php endif; ?>

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion); ?></textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion Propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" placeholder="Ej: 3" min="1" max="9" name="propiedad[habitaciones]" value="<?php echo s($propiedad->habitaciones); ?>">

            <label for="wc">Baños:</label>
            <input 
                type="number" 
                id="wc" 
                placeholder="Ej: 3" 
                min="1" 
                max="9" 
                name="propiedad[wc]" 
                value="<?php echo s($propiedad->wc); ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" name="propiedad[estacionamiento]" value="<?php echo s($propiedad->estacionamiento); ?>">
        </fieldset>
        
        <fieldset>
            <legend>Vendedor</legend>
            
            <select name="propiedad[vendedores_id]" id="vendedor">
                <option value="">--Seleccione un vendedor --</option>
                <?php foreach($vendedores as $vendedor) : ?>
                    <option 
                        <?php
                            //evaluo si se habia seleccionado ya un vendedor, y en ese caso
                            //agrego selected para que quede seleccionado el option
                             echo $propiedad->vendedores_id===$vendedor->id ? 'selected':''; 
                        ?>
                        value="<?php echo s($vendedor->id);?>">
                        <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido) ; ?>
                    </option>


                <?php endforeach;?>
            </select>
        </fieldset>