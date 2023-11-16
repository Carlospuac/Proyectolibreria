<?php

namespace Model;

class EnlacesModel
 {
    public static function enlacesPagina( $enlace )
 {
        $modulo = match ( $enlace ) {
            'Inicio' => 'View/Inicio.php',
            'Login' => 'View/Usuario/Login.php',
            'Logout' => 'View/Usuario/Logout.php',
            'Crear' => 'View/Usuario/NuevoUser.php',
            'CrearAutor'=> 'View/Libros/AutorCrear.php',
            'Crearcategoria'=>'View/Libros/CrearCategoria.php',
            'IngreLibro'=>'View/Libros/Crearlibro.php',
            'Modificar'=>'View/Libros/ModificarLibro.php',
            'Libreria'=>'View/Libros/Libreria.php',
            'Eliminar'=> 'View/Libros/EliminarLibro.php',
            'Catalogo'=> 'View/Catalogo.php',
            
            default => 'View/Error.php'
        }
        ;
        return $modulo;
    }
}

?>