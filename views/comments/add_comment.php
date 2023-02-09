<a href="/reservation">
    <div class="title">
        <h1 class="web-title">La barbería <span class="copy">&copy;</span></h1>
    </div>
</a>

<div class="bar">
<div class="name-container">
    <p>Hola, <?php echo $name_last ?? ''; ?></p>
</div>

    <a class="boton" href="/logout">Cerrar sesión</a>
</div>

<h2 class="page-details">Agregar comentario</h2>
<p class="text-align">Puedes agregar un comentario sobre lo que te parece La barbería&copy;</p>

<?php include_once __DIR__ . '/../templates/alerts.php' ?>

<form method="POST" class="form">
    <div class="field">
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" disabled value="<?php echo $name_last; ?>">
    </div>
    <div class="field">
        <label for="date">Fecha</label>
        <input type="date" id="date" name="date" disabled value="<?php echo date('Y-m-d', strtotime('-6 hours'));?>">
    </div>
    <div class="field">
        <label for="comment_details">Comentario</label>
        <textarea rows="6" cols="50" id="comment_details" name="comment_details"></textarea>
    </div>
    <div class="container-submit">
        <input type="submit" class="button-change" value="Añadir">
    </div>
</form>