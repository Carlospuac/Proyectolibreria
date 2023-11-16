<?php

use Controller\CategoriaController;

$NuevaCat = new CategoriaController();

?>


<h1>Crear Categoria</h1>


<div class="form-group">

    <form method="POST">


        <div class="row">
            <div class="col-6 col-sm-2">
                <label class="col-form-label mt-4">Categoria</label>
            </div>
            <div class="col-6 col-sm-4">
                <input type="text" class="form-control mt-4" placeholder="" name="Cat" required>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-7">
                <button type="submit" class="btn btn-primary btn-lg mt-4">Crear</button>
            </div>
        </div>

    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $resultado = $NuevaCat->CrearCategoria();
            if($resultado == false){
                echo "<div class='alert alert-danger mt-5' role='alert'>
                        Error en los datos
                     </div>";
            }
        }
        ?>



</div>