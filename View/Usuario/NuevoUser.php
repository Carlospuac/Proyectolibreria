<?php

use Controller\UsuarioController;

$usuario = new UsuarioController();
?>

<h1>Crear Usuario</h1>

<div class='form-group'>

    <form method='POST'>

        <div class='row'>
            <div class='col-6 col-sm-2'>
                <label class='col-form-label mt-4'>Nombres</label>
            </div>
            <div class='col-6 col-sm-4'>
                <input type='text' class='form-control mt-4' placeholder='' name='Name' required>
            </div>
        </div>

        <div class='row'>
            <div class='col-6 col-sm-2'>
                <label class='col-form-label mt-4'>Apellido</label>
            </div>
            <div class='col-6 col-sm-4'>
                <input type='text' class='form-control mt-4' placeholder='' name='Lastname' required>
            </div>
        </div>

        <div class='row'>
            <div class='col-6 col-sm-2'>
                <label class='col-form-label mt-4'>Correo</label>
            </div>
            <div class='col-6 col-sm-4'>
                <input type='email' class='form-control mt-4' placeholder='' name='Email' required>
            </div>
        </div>

        <div class='row'>
            <div class='col-6 col-sm-2'>
                <label class='col-form-label mt-4'>Usuario</label>
            </div>
            <div class='col-6 col-sm-4'>
                <input type='text' class='form-control mt-4' placeholder='' name='User' required>
            </div>
        </div>

        <div class='row'>
            <div class='col-6 col-sm-2'>
                <label class='col-form-label mt-4'>Rol</label>
            </div>
            <div class='col-6 col-sm-4'>
                <input type='text' class='form-control mt-4' placeholder='' name='RolUsuario' required>
            </div>
        </div>

        <div class='row'>
            <div class='col-6 col-sm-2'>
                <label class='col-form-label mt-4'>Password</label>
            </div>
            <div class='col-6 col-sm-4'>
                <input type='text' class='form-control mt-4' placeholder='' name='Pass' required>
            </div>
        </div>

        <div class='row'>
            <div class='col-12 col-sm-7'>
                <button type='submit' class='btn btn-primary btn-lg mt-4'>Registrar</button>
            </div>

        </div>

    </form>

</div>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = $usuario->CrearUsuario();
    if ($resultado == false) {
        echo "<div class='alert alert-danger mt-5' role='alert'> Error en los datos </div>";
    }
}
?>