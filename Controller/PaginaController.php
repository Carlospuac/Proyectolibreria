<?php

namespace Controller;
use Model\EnlacesModel;

class PaginaController {

    public function PaginaInicio() {
        require_once( 'View/Template.php' );
    }

    public function enlacesPagina() {
        if ( isset( $_GET[ 'action' ] ) ) {

            $enlace = $_GET[ 'action' ];
        } else {
            $enlace = 'Inicio';
        }
        $respuesta = EnlacesModel::enlacesPagina( $enlace );

        require_once( $respuesta );
    }

}

?>