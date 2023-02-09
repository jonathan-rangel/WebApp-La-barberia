<h1 class="page-name">Servicios</h1>
<p class="page-details">Administrar los servicios</p>

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
    <?php foreach($services as $service) { ?>
        <li>
            <p>Nombre del servicio: <span><?php echo $service->name; ?></span></p>
            <p>Precio:<span>$<?php echo $service->price; ?></span></p>
            <p>Descripción: <span><?php echo $service->description; ?></span></p>

            <div class="actions">
                <a class="button-change" href="/services/edit?id=<?php echo $service->id; ?>">Editar</a>

                <form action="/services/delete" method="POST">
                    <input type="hidden" name="id" value="<?php echo $service->id; ?>">

                    <input type="submit" value="Eliminar" class="button-delete">
                </form>
            </div>
        </li>
    <?php } ?> 
</ul>