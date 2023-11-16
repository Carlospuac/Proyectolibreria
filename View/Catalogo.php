<?php

use Controller\LibroController;

$libro = new LibroController();

$descripcionlimitada = false;
 
$registro = $libro->ListaLibros($descripcionlimitada);

?>

<h1>Catalogo Libros</h1>

<div class='row row-cols-1 row-cols-md-4 g-4"'>

    <?php foreach ($registro as $row => $item) {  ?>

    <div class='col-3 card-group '>
        <div class='card mb-4'>
            <div class='card-header'>
                <?php echo $item['NombreLibro']; ?>
            </div>

            <svg xmlns='http://www.w3.org/2000/svg' class='d-block user-select-none' width='100%' height='200'
                aria-label='Placeholder: Image cap' focusable='false' role='img' preserveAspectRatio='xMidYMid slice'
                viewBox='0 0 318 180' style='font-size:1.125rem;text-anchor:middle'>
                <rect width='100%' height='100%' fill='#868e96'></rect>
                <text x='50%' y='50%' fill='#dee2e6' dy='.3em'>Image cap</text>
            </svg>

            <div class='card-body'>
                <p class='card-text'><?php echo $item['Descripcion']; ?> ....</p>
            </div>

            <ul class='list-group list-group-flush'>
                <li class='list-group-item'>Autor: <?php echo $item['Autor']; ?></li>
                <li class='list-group-item'>Categoria: <?php echo $item['NomCategoria']; ?></li>

            </ul>

            <div class='card-body'>
                <a href='index.php?action=Catalogo' class='card-link'>mostrar Mas</a>
                <a href='#' class='card-link'>Another link</a>
            </div>

            <div class='card-footer text-muted'>
             Q <?php echo $item['Precio']; ?>
            </div>

        </div>
    </div>
    <?php } ?>

</div>