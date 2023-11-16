<?php

    if(!empty($_SESSION['Usuario'])){
        echo "
        <h2>
        Mucho gusto: 
            <strong> {$_SESSION['Name']} {$_SESSION['Lastname']} </strong>
        </h2>
        ";

    }
    
?>


<h1>Bienvenidos a libros GT</h1>

