<a href="/reservation">
    <div class="title">
        <h1 class="web-title">La barbería<span class="copy">&copy;</span></h1>
    </div>
</a>

<h1 class="page-name">Reservaciones</h1>

<div class="user-bar">
    <a class="button-crud" href="/user">Perfil</a>
    <a class="button-crud" href="/user/edit">Editar perfil</a>
    <a class="button-crud" href="/user/reservations">Reservaciones</a>
</div>

<h3 class="page-details">Puedes ver y cancelar tus reservaciones</h3>

<?php foreach($reservations as $reservation) {
    $total = 0;
    if($reservation->userId == $id)  { ?> 
        <div class="container-all">
            <div class="container-res">
                <div class="container-info">
                    <p class="name-res">
                        <?php echo $name_last; ?>
                    </p>
                    <p class="date-res">
                        <?php echo $reservation->date; ?>
                    </p>
                </div>
                <div class="info-res">
                    <p class="services-select">Servicios seleccionados</p>
                    <?php foreach($services as $service) {
                        if($service->reservationId == $reservation->id) { 
                            foreach($list_services as $li_service) {
                                if($service->serviceId == $li_service->id) { ?>
                                    <p class="ser-name"><?php echo $li_service->name; ?></p>
                                    <p class="ser-price"><span class="price">Precio: </span>$<?php echo $li_service->price; ?></p>
                                    <?php $total += (int) $li_service->price;?>
                            <?php }
                            }     
                        }
                    } ?>
                    <p class="prod-select">Productos extra agregados</p>
                    <?php foreach($products as $product) {
                        if($product->reservationId == $reservation->id) { 
                            foreach($list_products as $li_product) {
                                if($product->productId == $li_product->id) { ?>
                                    <p class="ser-name"><?php echo $li_product->name; ?></p>
                                    <p class="ser-price"><span class="price">Precio: </span><?php echo $li_product->price; ?></p>
                                    <?php $total += (int) $li_product->price;?>
                            <?php }
                            }     
                        }
                    } ?>
                    <p class="total">Total a pagar: $<?php echo $total ?></p>
                </div>
               
            </div>
            <form action="/user/reservations" method="POST">
                <input type="hidden" id="id" name="id" value="<?php echo $reservation->id; ?>">
                <input type="submit" class="button-delete" value="Cancelar">
            </form>
        </div>
        
<?php  }
 } ?>

 <a href="/reservation" class="button-change">Nueva reservación</a>