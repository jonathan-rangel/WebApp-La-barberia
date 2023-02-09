<h1 class="page-name">Productos</h1>
<p class="page-details">Administrar los productos</p>

<div class="bar">
<div class="name-container">
    <p>Hola, <?php echo $name ?? ''; ?></p>
</div>

    <a class="button-logout" href="/logout">Cerrar sesión</a>
</div>

<div class="services-bar">
    <a class="button-crud" href="/admin">Ver reservaciones</a>
    <a class="button-crud" href="/services">Ver servicios</a>
    <a class="button-crud" href="/products">Ver productos</a>
    <a class="button-crud" href="/services/add">Agregar servicio</a>
    <a class="button-crud" href="/products/add">Agregar producto</a>
</div>

<ul class="services">
    <?php foreach($products as $product) { ?>
        <li>
            <p>Nombre del producto: <span><?php echo $product->name; ?></span></p>
            <p>Precio:<span>$<?php echo $product->price; ?></span></p>
            <p>Imagen del producto:</p>
            <div style="background-image: url('<?php echo $product->image; ?>'); height: 50rem; width: 50rem; background-size: cover; background-position: center center; background-repeat: no-repeat" ></div>
            
            <p>Descripción: <span><?php echo $product->description; ?></span></p>

            <div class="actions">
                <a class="boton" href="/products/edit?id=<?php echo $product->id; ?>">Editar</a>

                <form action="/products/delete" method="POST">
                    <input type="hidden" name="id" value="<?php echo $product->id; ?>">

                    <input type="submit" value="Eliminar" class="button-delete">
                </form>
            </div>
        </li>
    <?php } ?> 
</ul>

<script src="/src/js/product.js"></script>