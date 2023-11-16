<?php

use Controller\LibroController;

$libro = new LibroController();

$registro = $libro->VerLibro();

?>


<h1>Eliminar Libro</h1>

<div class='form-group'>

    <form method='POST'>

        <div class='row'>
            <div class='col-6 col-sm-2'>
                <label class='col-form-label mt-4'>Nombre Libro</label>
            </div>
            <div class='col-6 col-sm-4'>
                <input type='text' readonly="" class='form-control mt-4' name='NombreLibro' value="<?php echo $registro['NombreLibro']; ?> " disabled="">
            </div>
        </div>

        <div class='row'>
            <div class='col-6 col-sm-2'>
                <label class='form-label mt-4'>Descripcion</label>
            </div>
            <div class='col-6 col-sm-4'>
                <textarea class='form-control mt-4' name='Desc' rows='3' disabled> <?php echo $registro['Descripcion']; ?> </textarea>
            </div>
        </div>

        <input type="hidden" name="idLibro" value="<?php echo $registro['idLibro']; ?>">

        <div class='row'>
            <div class='col-6 col-sm-2'>
                <label class='form-label mt-4'>¿Seguro Que quiere Eliminar Libro?</label>
            </div>

            <div class='col-6 col-sm-4'>
                <button type="submit" class="btn btn-outline-warning mt-4 btn-lg">Borrar</button>
            </div>


        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $resultado = $libro->BorraLibro();
        if ($resultado == false) {
            echo "<div class='alert alert-danger mt-5' role='alert'> Error en los datos </div>";
        }
    }

    ?>

</div>