<?php

namespace Controller;
use Model\AutorModel;

class AutorController {
    public function AgragarAutor() {
        if ( !empty( $_POST[ 'Name' ] ) && !empty( $_POST[ 'LastName' ] ) ) {
            $Name = strClean( $_POST[ 'Name' ] );
            $LastName = strClean( $_POST[ 'LastName' ] );
            $datos = array(
                'Name' => $Name,
                'LastName'=> $LastName,
            );

            $respuesta = AutorModel::GuardarAutor( $datos );

            if ( $respuesta == true ) {
                header( 'location: Index.php?action=Inicio' );
            }
        }
    }

    public function MostrarAutor() {

        $respuesta = AutorModel::ListAutor();
        return $respuesta;

    }

}
