<?php

namespace Controller;

Use Model\CategoriaModel;

class CategoriaController {

    public function CrearCategoria() {
        if ( !empty( $_POST[ 'Cat' ] ) );
        {
            $Categoria = strClean( $_POST[ 'Cat' ] );

            $datos = array(
                'Categoria' => $Categoria,
            );
            $Respuesta = CategoriaModel::GuardarCategoria( $datos );

            if ( $Respuesta ) {
                header( 'Location: index.php?action=Inicio' );
            }
        }
    }

    public function MostrarCategoria() {
        $Categoria = CategoriaModel::ListaCategoria();
        return $Categoria;

    }

}

?>