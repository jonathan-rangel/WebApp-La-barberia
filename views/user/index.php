<a href="/reservation">
    <div class="title">
        <h1 class="web-title">La barbería<span class="copy">&copy;</span></h1>
    </div>
</a>

<h1 class="page-name">Perfil</h1>

<div class="user-bar">
    <a class="button-crud" href="/user">Perfil</a>
    <a class="button-crud" href="/user/edit">Editar perfil</a>
    <a class="button-crud" href="/user/reservations">Reservaciones</a>
</div>

<p class="text-align">Aquí se muestran los datos de tu perfil</p>

<form class="form">
    <h3>Datos personales</h3>
    <div class="field">
        <p>Tu nombre:</p>
        <p><?php echo $user->name ?></p>
    </div>
    <div class="field">
        <p>Tu apellido:</p>
        <p><?php echo $user->last_name ?></p>
    </div>
    <div class="field">
        <p>Tu numero de teléfono:</p>
        <p><?php echo $user->phone_number ?></p>
    </div>
    <h3>Datos de inicio</h3>
    <div class="field">
        <p>Tu correo electrónico:</p>
        <p><?php echo $user->email ?></p>
    </div>
</form>


