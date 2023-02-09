<div class="field">
    <label for="name">Nombre del producto</label>
    <input type="text" id="name" name="name" placeholder="Agrega el nombre al producto" value="<?php echo $product->name; ?>">
</div>
<div class="field">
    <label for="price">Precio del producto</label>
    <input type="number" min="1" id="price" name="price" placeholder="Agrega el precio al producto" value="<?php echo $product->price; ?>">
</div>
<div class="field">
    <label for="image">URL de la imagen</label>
    <input type="text" id="image" name="image" placeholder="Agrega la URL de imagen del producto" value="<?php echo $product->image; ?>">
</div>
<div class="field">
    <label for="description">Descripción del producto</label>
    <textarea rows="6" cols="50" placeholder="Agrega las especifiaciones del producto (Máximo de 300 caracteres)" id="description" name="description"><?php echo $product->description; ?></textarea>
</div>