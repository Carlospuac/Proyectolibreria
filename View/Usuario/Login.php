<?php

use Controller\UsuarioController;

$usuario = new UsuarioController();
?>

<h1>Iniciar Sesion</h1>

<div class='form-group'>

    <form method='POST'>

        <input type='hidden' name='token' value="<?php echo $_SESSION['token'] ?? ''; ?>">

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
                <label class='col-form-label mt-4'>Password</label>
            </div>
            <div class='col-6 col-sm-4'>
                <input type='password' class='form-control mt-4' placeholder='' name='Pass' required>
            </div>
        </div>

        <div class='row'>
            <div class='col-12 col-sm-7'>
                <button type='submit' class='btn btn-primary btn-lg mt-4'>Iniciar Sesion</button>
            </div>
        </div>

    </form>
    <?php

    $resultado = $usuario->login();
    if ($resultado == 'error') {
        echo "<div class='alert alert-danger mt-5' role='alert'>
                        Error en los datos
                     </div>";
    }

    ?>

</div>