<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid ">

        <i class="fa-solid fa-book fa-shake fa-2xl"></i>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="Index.php?action=Inicio">Home
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>

                <li class="nav-item">
                        <a class="nav-link" href="index.php?action=Catalogo">Catalogo Libros</a>
                </li>


                <?php
                if (!empty($_SESSION['Usuario']) && ($_SESSION['RolUsuario']== "a" )  ) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=Libreria">Libros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=CrearAutor">Ingresar Autor</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=Crearcategoria">Crear Categoria</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=IngreLibro">Ingresar Libro</a>
                    </li>
                <?php
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=Contacto">contacto</a>
                </li>

            </ul>

            <div class="dropstart">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Usuarios <i class="fa-solid fa-user fa-lg" style="color: #ffffff;"></i></button>
                <ul class="dropdown-menu">
                    <?php
                    if (!empty($_SESSION['Usuario'])) {
                    ?>
                        <li><a class="dropdown-item" href="Index.php?action=Logout">Log out <i class="fa-solid fa-user-tie" style="color: #ffffff;"></i> </a></li>
                    <?php
                    } else {
                    ?>
                        <li><a class="dropdown-item" href="Index.php?action=Login">Log In <i class="fa-solid fa-user-tie" style="color: #ffffff;"></i> </a></li>

                    <?php
                    }
                    ?>

                    <li><a class="dropdown-item" href="Index.php?action=Crear"> Crear Usuario <i class="fa-solid fa-user-plus" style="color: #ffffff;"></i></a></li>


                </ul>
            </div>
        </div>
    </div>

</nav>