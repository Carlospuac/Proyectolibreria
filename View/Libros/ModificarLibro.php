<?php

use Controller\LibroController;
use Controller\CategoriaController;
use Controller\AutorController;

$libro = new LibroController();

$registro = $libro->VerLibro();

$categoria = new CategoriaController();

$autor = new AutorController();



?>


<h1>Modificar Libro</h1>


<div class='form-group'>

    <form method='POST'>

        <div class='row'>
            <div class='col-6 col-sm-2'>
                <label class='col-form-label mt-4'>Nombre Libro</label>
            </div>
            <div class='col-6 col-sm-4'>
                <input type='text' class='form-control mt-4' name='NombreLibro' value="<?php echo $registro['NombreLibro']; ?>">
            </div>
        </div>
        <div class='row'>
            <div class='col-6 col-sm-2'>
                <label class='col-form-label mt-4'>Autor</label>
            </div>
            <div class='col-6 col-sm-4'>
                <select class='form-select mt-4' name='IdAutor'>
                    <?php
                    foreach ($autor->MostrarAutor() as $row => $item) {
                        if ($registro['FkAutor'] == $item['idAutor']) {
                            echo "<option value='{$item['idAutor']}' selected> {$item['Nombres']} {$item['Apellidos']}  </option>";
                        } else {
                            echo "<option value='{$item['idAutor']}'> {$item['Nombres']} {$item['Apellidos']}  </option>";
                        }
                    }

                    ?>

                </select>
            </div>
        </div>

        <div class='row'>
            <div class='col-6 col-sm-2'>
                <label class='col-form-label mt-4'>Categoria</label>
            </div>
            <div class='col-6 col-sm-4'>
                <select class='form-select mt-4' name='idCategoria'>
                    <?php
                    foreach ($categoria->MostrarCategoria() as $row => $item) {
                        if ($registro['FkCategoria'] == $item['idCategoria']) {
                            echo "<option value='{$item['idCategoria']}' selected> {$item['NomCategoria']} </option>";
                        } else {
                            echo "<option value='{$item['idCategoria']}'> {$item['NomCategoria']}  </option>";
                        }
                    }

                    ?>

                </select>
            </div>
        </div>

        <div class='row'>
            <div class='col-6 col-sm-2'>
                <label class='col-form-label mt-4'>precio</label>
            </div>
            <div class='col-6 col-sm-4'>
                <input type='text' class='form-control mt-4' name='precio' value="<?php echo $registro['Precio']; ?>">
            </div>
        </div>

        <div class='row'>
            <div class='col-6 col-sm-2'>
                <label class='col-form-label mt-4'>Cantidad</label>
            </div>
            <div class='col-6 col-sm-4'>
                <input type='text' class='form-control mt-4' name='Cantidad' value="<?php echo $registro['Cantidad']; ?>">
            </div>
        </div>

        <div class='row'>
            <div class='col-6 col-sm-2'>
                <label class='col-form-label mt-4'>Año de publicacion</label>
            </div>
            <div class='col-6 col-sm-4'>
                <input type='text' class='form-control mt-4' name='Anio' value="<?php echo $registro['AnioPublicacion']; ?>">
            </div>
        </div>

        <div class='row'>
            <div class='col-6 col-sm-2'>
                <label class='form-label mt-4'>Descripcion</label>
            </div>
            <div class='col-6 col-sm-4'>
                <textarea class='form-control mt-4' name='Desc' rows='3'> <?php echo $registro['Descripcion']; ?> </textarea>
            </div>
        </div>

        <input type="hidden" name="ID" value="<?php echo $registro['idLibro']; ?>" >

        <div class='row'>
            <div class='col-12 col-sm-7'>
                <button type='submit' class='btn btn-primary btn-lg mt-4'>Actualizar Libro</button>
            </div>
        </div>

    </form>
</div>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = $libro->ActualizarLibro();
    if ($resultado == false) {
        echo "<div class='alert alert-danger mt-5' role='alert'> Error en los datos </div>";
    }
} 

?>