<a href="/reservation">
    <div class="title">
        <h1 class="web-title">La barbería<span class="copy">&copy;</span></h1>
    </div>
</a>


<div class="bar">
    <div class="name-container">
        <p>Hola, <?php echo $name_last ?? ''; ?></p>
    </div>
    <?php if($id !== 0) { ?>
        <div class="container-user">
        <a href="/user">
            <i class="fas fa-user-cog icon-user"></i>
        </a> 
    </div>
    <?php } ?>
    
  

    <a class="button-logout" href="/logout">Cerrar sesión</a>
</div>

<div id="app">
    <!-- <nav class="tabs">
        <button class="current-tab" type="button" data-step='1'>Servicios</button>
        <button type="button" data-step='2'>Reservación</button>
        <button type="button" data-step='3'>Productos</button>
        <button type="button" data-step='4'>Resumen</button>
        <button type="button" data-step='5'>Comentarios</button>
    </nav> -->

    <nav class="tabs">
        <div class="underline"></div>
        <div class="underline"></div>
        <div class="underline"></div>
        <a onClick="ul(0)" data-step='1'>Servicios</a>
        <a onClick="ul(1)" data-step='2'>Reservación</a>
        <a onClick="ul(2)" data-step='3'>Productos</a>
        <a onClick="ul(3)" data-step='4'>Resumen</a>
        <a onClick="ul(4)" data-step='5'>Comentarios</a>
    </nav>

    <div class="section" id="step-1">
        <h2>Servicios</h2>
        <p class="text-align">Elige tus servicios</p>
        <div id="services" class="list-services"></div>
    </div>
    <div class="section" id="step-2">
        <h2>Reservación</h2>
        <p class="text-align">Elige la fecha y la hora de tu reservación</p>

        <form action="" class="form">
            <div class="field">
                <label for="name">Nombre y apellido</label>
                <input type="text" id="name" placeholder="Tu nombre" disabled value="<?php echo $name_last;?>">
            </div>
            <div class="field">
                <label for="date">Fecha</label>
                <?php 
                    if($id === 0) { ?>
                        <input type="date" id="date" disabled min="<?php echo date ('Y-m-d'); ?>">
                <?php    } else { ?>
                            <input type="date" id="date" min="<?php echo date ('Y-m-d'); ?>">
                <?php } ?>
                
                
            </div>
            <div class="field">
                <label for="time">Hora</label>
                <?php 
                    if($id === 0) { ?>
                        <input type="time" id="time" name="time" disabled>
                <?php    } else { ?>
                            <input type="time" id="time" name="time">
                <?php } ?>
            </div>
            <input type="hidden" id="id" value="<?php echo $id; ?>">
        </form>
    </div>
    <div class="section" id="step-3">
        <h2>Productos extra</h2>
        <p class="text-align">Elige algún producto para comprar</p>
        <div id="products" class="list-products"></div>
    </div>
    <div class="section content-sum" id="step-4">
        <h2>Resumen de la reservación</h2>
        <p class="text-align">Verifica que tus datos sean correctos</p>
    </div>
    <div class="section" id="step-5">
        <h2>Comentarios</h2>
        <nav class="type-comments">
            <button class="button-comment current-comment" type="button" data-step='6'>Todos los comentarios</button>
            <button class="button-comment" type="button" data-step='7'>Tus comentarios</button>
        </nav>
        <div id="comments" class="list-comments"></div>
            
    </div>

    <div class="pagination">
        <button id="previous" class="button-pagers"><i class="fas fa-long-arrow-alt-left icon-pager"></i></button>
        <button id="next" class="button-pagers"><i class="fas fa-long-arrow-alt-right icon-pager"></i></button>
    </div>
</div>

<?php $script = "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script src='build/js/app.js'></script>"; ?>