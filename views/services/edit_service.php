<h1 class="page-name">Editar servicio</h1>
<p class="page-details">Cambia los datos para editar el servicio</p>

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

<?php include_once __DIR__ . '/../templates/alerts.php' ?>

<form method="POST" class="form">
    <?php include_once __DIR__ . '/form.php' ?>
    <div class="container-submit">
        <input type="submit" class="button-change" value="Guardar">
    </div>
</form>