<?php

namespace Model;

use Model\ConexionModel;

class LibroModel
{

    public static function GuardarLibro($datos)
    {
        try {
            $stmt = ConexionModel::conectar()->prepare('INSERT INTO libro (NombreLibro,Descripcion,Precio,Cantidad,AnioPublicacion,FkCategoria,FkAutor) VALUES (:lib,:descp,:prec,:canti,:anio,:cat,:autor )');

            $stmt->bindParam(':lib', $datos['NombreLibro'], \PDO::PARAM_STR);
            $stmt->bindParam(':descp', $datos['Desc'], \PDO::PARAM_STR);
            $stmt->bindParam(':prec', $datos['precio'], \PDO::PARAM_STR);
            $stmt->bindParam(':canti', $datos['Cantidad'], \PDO::PARAM_STR);
            $stmt->bindParam(':anio', $datos['Anio'], \PDO::PARAM_STR);
            $stmt->bindParam(':cat', $datos['IdCategoria'], \PDO::PARAM_STR);
            $stmt->bindParam(':autor', $datos['IdAutor'], \PDO::PARAM_STR);

            return $stmt->execute() ? true : false;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function MostrarLibros()
    {
 
        $stmt = ConexionModel::conectar()->prepare("SELECT idlibro,NombreLibro, Descripcion, Precio, Cantidad, Aniopublicacion, categoria.NomCategoria,  CONCAT(autor.Nombres, ' ',autor.Apellidos) AS Autor from libro INNER JOIN categoria ON libro.FkCategoria = categoria.idCategoria INNER JOIN autor ON libro.FkAutor = autor.IdAutor  order by idlibro asc ;");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function Verlibroparaeditar($idlibro)
    {
        $stmt = ConexionModel::conectar()->prepare('SELECT * FROM libro  WHERE idlibro = :ID;');
        $stmt->bindParam(':ID', $idlibro, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function Actualizarlibro($datos)
    {
        try {
            $stmt = ConexionModel::conectar()->prepare("UPDATE libro SET 
            NombreLibro = :lib, Descripcion = :descr,Precio = :prec ,Cantidad = :can ,AnioPublicacion = :anio,FkCategoria = :cat,FkAutor = :autor WHERE idLibro = :id ;");
            $stmt->bindParam(':lib', $datos['NombreLibro'], \PDO::PARAM_STR);
            $stmt->bindParam(':descr', $datos['Desc'], \PDO::PARAM_STR);
            $stmt->bindParam(':prec', $datos['precio'], \PDO::PARAM_STR);
            $stmt->bindParam(':can', $datos['Cantidad'], \PDO::PARAM_INT);
            $stmt->bindParam(':anio', $datos['Anio'], \PDO::PARAM_INT);
            $stmt->bindParam(':cat', $datos['IdCategoria'], \PDO::PARAM_INT);
            $stmt->bindParam(':autor', $datos['IdAutor'], \PDO::PARAM_INT);
            $stmt->bindParam(':id', $datos['ID'], \PDO::PARAM_INT);

            return $stmt->execute() ? true : false;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function BorrarRegistro($id)
    {
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM libro WHERE idLibro = :id;");
        $stmt->bindParam(':id', $id, \PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }
}
