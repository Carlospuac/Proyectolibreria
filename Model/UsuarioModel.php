<?php

namespace Model;

use Model\ConexionModel;

class UsuarioModel
 {
    public static function GuardarUsuario( $datos )
 {
        try {
            $stmt = ConexionModel::conectar()->prepare( "INSERT INTO usuario (Nombre,Apellido,Correo,Usuario,Rol,Contrasenia) values
            (:Nom,:Apell,:Email,:user,:Rol,:pass )" );
            $stmt->bindParam( ':Nom', $datos[ 'Name' ], \PDO::PARAM_STR );
            $stmt->bindParam( ':Apell', $datos[ 'Lastname' ], \PDO::PARAM_STR );
            $stmt->bindParam( ':Email', $datos[ 'Email' ], \PDO::PARAM_STR );
            $stmt->bindParam( ':user', $datos[ 'usuario' ], \PDO::PARAM_STR );
            $stmt->bindParam( ':Rol', $datos[ 'RolUsuario' ], \PDO::PARAM_STR );
            $stmt->bindParam( ':pass', $datos[ 'Pass' ], \PDO::PARAM_STR );

            return $stmt->execute()  ? true : false;
        } catch ( \Throwable $th ) {
            return false;
        }
    }

    public static function Login( $datos ) {
        $stmt = ConexionModel::conectar()->prepare( 'SELECT * from usuario where Usuario = :user' );
        $stmt->bindParam( ':user', $datos[ 'Usuario' ], \PDO::PARAM_STR );
        $stmt->execute();

        return $stmt->fetch();

    }
}

?>