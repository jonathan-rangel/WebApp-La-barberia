<a href="/reservation">
    <div class="title">
        <h1 class="web-title">La barbería<span class="copy">&copy;</span></h1>
    </div>
</a>

<h1 class="page-name">Editar perfil</h1>

<div class="user-bar">
    <a class="button-crud" href="/user">Perfil</a>
    <a class="button-crud" href="/user/edit">Editar perfil</a>
    <a class="button-crud" href="/user/reservations">Reservaciones</a>
</div>

<h3 class="page-details">Cambia los datos de tu perfil</h3>

<?php include_once __DIR__ . '/../templates/alerts.php' ?>

<form method="POST" class="form">
    <p>Datos personales</p>
    <div class="field">
        <label for="name">Tu nombre</label>
        <input type="text" id="name" name="name" value="<?php echo $user->name; ?>">
    </div>
    <div class="field">
        <label for="last_name">Tu apellido</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $user->last_name; ?>">
    </div>
    <div class="field">
        <label for="phone_number">Tu número de teléfono</label>
        <input type="number" id="phone_number" name="phone_number" value="<?php echo $user->phone_number; ?>">
    </div>
    <p>Datos de acceso</p>
    <div class="field">
        <label for="email">Tu correo electrónico</label>
        <input type="email" id="email" name="email" value="<?php echo $user->email; ?>">
    </div>

    <div class="container-submit">
        <input type="submit" class="button-change" value="Guardar">
    </div>
    

</form>

