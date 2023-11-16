<?php

namespace Model;

use Model\ConexionModel;

class CategoriaModel {

    public static function GuardarCategoria( $datos ) {
        try {
            $stmt = ConexionModel::conectar()->prepare( 'INSERT INTO categoria (NomCategoria) VALUES (:cat)' );
            $stmt->bindParam( ':cat', $datos[ 'Categoria' ], \PDO::PARAM_STR );

            return $stmt->execute()? true: false;
        } catch( \Throwable $th ) {
            return false;
        }
    }

    public static function ListaCategoria() {
        $stmt = ConexionModel::conectar()->prepare( 'SELECT * FROM categoria' );
        $stmt->execute();
        return $stmt->fetchAll();

    }

}

?>