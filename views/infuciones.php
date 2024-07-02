<?php
/*  $serieSeleccionada = isset($_GET['ser'])  ? $_GET['ser']  : FALSE; */
  
require_once "libraries/productos.php";

$claseseleccionada = $_GET['clas'] ?? FALSE;

$productos = catalogo_x_clases($claseseleccionada);


$miTituloPrincipal = $claseseleccionada ? ucwords(str_replace("_"," ",$claseseleccionada)) : FALSE
?>
<h1 class="text-center my-5">Cafe <?= $miTituloPrincipal  ?></h1>



<div class="row">

    <?php    if(count($productos))  {   ?> 
    <?php foreach ($productos as $infuciones) { ?>
    
    <div class="col-4">
        <div class="card mb-3">
            <img src="img/<?=$infuciones['portada'] ?>" class="card-img-top" alt="<?=$infuciones['clase'] ?>">
            <div class="card-body">
                <p class="fs-6 m-0 fw-bold text-danger"><?=$infuciones['clase'] ?> - <?=$infuciones['nacionalidad'] ?>   
                <h5 class="card-title"><?=$infuciones['nombre'] ?></h5>
                <p class="card-text"><?=($infuciones['sensaciones']) ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Notas: <?=$infuciones['notas'] ?></li>
                <li class="list-group-item">Varietal: <?=$infuciones['varietal'] ?></li>
                <li class="list-group-item">Nacionalidad: <?=$infuciones['nacionalidad'] ?></li>
            </ul>
            <div class="card-body">
                <p class="fs-3 mb-3 fw-bold text-danger text-center">$<?=$infuciones['precio'] ?></p>
                <a href= "index.php?sec=productos&id=<?= $infuciones['id'] ?>"class="btn btn-danger w-100 fw-bold" >VER MÁS</a>
            </div>

        </div>
    </div>

    <?php } ?>

    <?php }else { ?>
         <div class="col-12">
             <h2 class="text-center text-danger mb-5">No se encontraron Productos</h2>
         </div>
    <?php } ?>
</div>