<?php

namespace Controller;

use Model\UsuarioModel;

class UsuarioController
{

    public function CrearUsuario()
    {
        if (!empty($_POST['Name']) && !empty($_POST['Lastname']) && !empty($_POST['Email']) && !empty($_POST['RolUsuario']) && !empty($_POST['User']) && !empty($_POST['Pass'])) {

            $Name = strClean($_POST['Name']);
            $Lastname = strClean($_POST['Lastname']);
            $Email = strClean($_POST['Email']);
            $Usuario = strClean($_POST['User']);
            $RolUsuario = strClean($_POST['RolUsuario']);
            $Pass = strClean($_POST['Pass']);

            $Pass = password_hash($Pass, PASSWORD_ARGON2ID);

            $datos = array(
                'Name' => $Name,
                'Lastname' => $Lastname,
                'Email' => $Email,
                'usuario' => $Usuario,
                'RolUsuario' => $RolUsuario,
                'Pass' => $Pass,
            );
            $respuesta = UsuarioModel::GuardarUsuario($datos);
            if ($respuesta == true) {
                header('location: Index.php?action=Login');
            }
            return $respuesta;
        }
    }

    public function login()
    {

        $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (!empty($token) && !empty($_POST['User']) && !empty($_POST['Pass'])) {
            $usuario = strClean($_POST['User']);
            $password = strClean($_POST['Pass']);

            $datos = array(
                'Usuario' => $usuario,
            );
            $respuesta = UsuarioModel::Login($datos);
            $resultado = password_verify($password, $respuesta['Contrasenia']);

            if ($resultado == true) {
                $_SESSION['Name'] = $respuesta['Nombre'];
                $_SESSION['Lastname'] = $respuesta['Apellido'];
                $_SESSION['Usuario'] = $respuesta['Usuario'];
                $_SESSION['RolUsuario'] = $respuesta['Rol'];
                $_SESSION['Id'] = $respuesta['idUsuario'];
                header("location: index.php?action=Inicio&id={$respuesta['idUsuario']}");
            } else {
                return 'error';
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header("location: index.php?action=Inicio");
    }
}
