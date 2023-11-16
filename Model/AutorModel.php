<?php
namespace Model;
use Model\ConexionModel;

class AutorModel {

    public static function GuardarAutor( $datos ) {
        try {
            $stmt = ConexionModel::conectar()->prepare( 'INSERT INTO autor (Nombres,Apellidos) VALUES (:name,:lastname)' );
            $stmt->bindParam( ':name', $datos[ 'Name' ], \pdo::PARAM_STR );
            $stmt->bindParam( ':lastname', $datos[ 'LastName' ], \PDO::PARAM_STR );

            return $stmt->execute() ? true : false;
        } catch( \Throwable $th ) {
            return false;
        }
    }

    public static function ListAutor() {

        $stmt = ConexionModel::conectar()->prepare( 'SELECT * FROM autor ' );
        $stmt->execute();
        return $stmt->fetchAll();

    }

}

?>