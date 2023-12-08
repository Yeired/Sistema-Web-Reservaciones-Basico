<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Inicio</title>
</head>
<body>
<header>
            <div class="navbar">
                <div class="logo enlace"><a href="index.php">ADMIN</a></div>
                <ul class="link">
                    <li class="enlace"><a href="reservacionesAdmin.php">Reservaciones</a></li>
                    <li class="enlace"><a href="clientesAdmin.php">Clientes</a></li>
                    <li class="enlace"><a href="empleadosAdmin.php">Empleados</a></li>
                </ul>
                <a href="index.php" class="action_btn">Pagina principal</a>
                <div class="toggle_btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
                <div class="dropdown_menu open">
                    <li class="enlace"><a href="reservacionesAdmin.php">Reservaciones</a></li>
                    <li class="enlace"><a href="clientesAdmin.php">Clientes</a></li>
                    <li class="enlace"><a href="empleadosAdmin.php">Empleados</a></li>
                    
                    <li><a href="index.php" class="action_btn">Pagina principal</a></li>
            </div>
        </header>
        <script>
            const toggleBtn = document.querySelector('.toggle_btn');
            const toggleBtnIcon = document.querySelector('.toggle_btn i');
            const dropDownMenu = document.querySelector('.dropdown_menu');

            toggleBtn.onclick = function(){
                dropDownMenu.classList.toggle('open')
                const isOpen = dropDownMenu.classList.contains('open')

                toggleBtnIcon.classList = isOpen
                ? 'fa-solid fa-xmark':'fa-solid fa-bars'
            }
        </script>
    <div id="nav-placeholder"></div>
    <?php
        session_start();
        $pagina = "cerrarSesion.php";
        $method = "post";
        $name = "cerrar";
        $cerrar = "CerrarSesion";
        $submit = "submit";
        if (isset($_SESSION['usuario'])) {
            echo "<STRONG>Usuario activo: " . $_SESSION['usuario']."<STRONG>";
            echo "<form action=".$pagina." method=".$method."><input value=".$cerrar." name=".$name." type=".$submit."></form>";
            }else {
                echo "<STRONG>No has iniciado sesion</STRONG>";
            }
    ?>
</body>
</html>