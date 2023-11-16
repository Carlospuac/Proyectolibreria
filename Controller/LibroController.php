<?php

namespace Controller;
use Model\LibroModel;

class LibroController {

    public function CrearLibro() {
        if ( !empty( $_POST[ 'NombreLibro' ] ) && !empty( $_POST[ 'IdAutor' ] ) && !empty( $_POST[ 'idCategoria' ] ) && !empty( $_POST[ 'precio' ] ) && !empty( $_POST[ 'Cantidad' ] ) && !empty( $_POST[ 'Anio' ] ) && !empty( $_POST[ 'Desc' ] ) ) {

            $NombreLibro = strClean( $_POST[ 'NombreLibro' ] );
            $IdAutor = strClean( $_POST[ 'IdAutor' ] );
            $IdCategoria = strClean( $_POST[ 'idCategoria' ] );
            $precio = strClean( $_POST[ 'precio' ] );
            $Cantidad = strClean( $_POST[ 'Cantidad' ] );
            $Anio = strClean( $_POST[ 'Anio' ] );
            $Desc = strClean( $_POST[ 'Desc' ] );

            $datos = array (
                'NombreLibro' => $NombreLibro,
                'IdAutor' => $IdAutor,
                'IdCategoria' => $IdCategoria,
                'precio' => $precio,
                'Cantidad' => $Cantidad,
                'Anio' => $Anio,
                'Desc' => $Desc,
            );
            $respuesta = LibroModel::GuardarLibro( $datos );
            return $respuesta;
        }
    }

    public function ListaLibros($descripcionlimitada){
       
        $respuesta = LibroModel::MostrarLibros($descripcionlimitada);
        return $respuesta;
        
    }

    public function VerLibro(){
        $idlibro = $_GET['idLibro'];
        $VerLibro = LibroModel::Verlibroparaeditar($idlibro);
        return $VerLibro;
        

    }

    public function ActualizarLibro(){
        if( !empty( $_POST[ 'NombreLibro' ] ) && !empty( $_POST[ 'IdAutor' ] ) && !empty( $_POST[ 'idCategoria' ] ) && !empty( $_POST[ 'precio' ] ) && !empty( $_POST[ 'Cantidad' ] ) && !empty( $_POST[ 'Anio' ] ) && !empty( $_POST[ 'Desc' ] ) && !empty( $_POST[ 'ID' ] ) ) {

            $NombreLibro = strClean( $_POST[ 'NombreLibro' ] );
            $IdAutor = strClean( $_POST[ 'IdAutor' ] );
            $IdCategoria = strClean( $_POST[ 'idCategoria' ] );
            $precio = strClean( $_POST[ 'precio' ] );
            $Cantidad = strClean( $_POST[ 'Cantidad' ] );
            $Anio = strClean( $_POST[ 'Anio' ] );
            $Desc = strClean( $_POST[ 'Desc' ] );
            $id = strClean( $_POST[ 'ID' ] );

            $datos = array (
                'NombreLibro' => $NombreLibro,
                'IdAutor' => $IdAutor,
                'IdCategoria' => $IdCategoria,
                'precio' => $precio,
                'Cantidad' => $Cantidad,
                'Anio' => $Anio,
                'Desc' => $Desc,
                'ID' => $id,
            );
            $respuesta = LibroModel::Actualizarlibro( $datos );
            if ( $respuesta == true ) {
                header( 'location: Index.php?action=Libreria' );
            }
            return $respuesta;
        }
    }

    public function BorraLibro(){
        if (!empty($_GET['idLibro'])){
            
            $libro = LibroModel::BorrarRegistro($_POST['idLibro']);
            if($libro == true){
                header("Location: index.php?action=Libreria");
            }
        }
    }

}
?>