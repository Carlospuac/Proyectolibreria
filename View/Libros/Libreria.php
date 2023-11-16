<?php
use Controller\LibroController;

$Libros = new LibroController();
$Listado = $Libros->ListaLibros();

?>

<h1>Listado Libros</h1>

<table class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio</th>
            <th scope="col">cantidad</th>
            <th scope="col">AnioPublicacion</th>
            <th scope="col">Categoria</th>
            <th scope="col">Autor</th>
            <th scope="col">Modificiar</th>
            <th scope="col">Elmininar</th>

        </tr>
    </thead>
    <tbody>
        <?php
        foreach($Listado as $row => $item){
            echo "
            <tr class='table-primary table-active'>
            <td> {$item['idlibro']}</td>
            <td> {$item['NombreLibro']}</td>
            <td> {$item['Descripcion']}</td>
            <td> {$item['Precio']}</td>
            <td> {$item['Cantidad']}</td>
            <td> {$item['Aniopublicacion']}</td>
            <td> {$item['NomCategoria']}</td>
            <td> {$item['Autor']}</td>
            <td> <a href='Index.php?action=Modificar&idLibro={$item['idlibro']}'> Modificar </a></td>
            <td> <a href='Index.php?action=Eliminar&idLibro={$item['idlibro']}'>Eliminar </a></td>
        </tr>";

        }
        
        ?>
    </tbody>
</table>