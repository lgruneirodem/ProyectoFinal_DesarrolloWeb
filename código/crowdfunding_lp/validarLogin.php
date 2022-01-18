<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="es">
<head>
    <!-- http://localhost/Pablo/crowdfunding_lp/crowdfunding_lp/validarLogin.php -->
    <meta charset="utf-8">
    <link rel="icon" href="images/icono.jpg">
    <meta proprty="twitter:card" content="summary">
    <meta name="author" content="Pablo Gonzalez y Leticia Gruneiro">
    <title>Login PL</title>
    <link rel="stylesheet" href="css/styleLogIn.css?version=51">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link href='https://css.gg/chevron-up.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2&display=swap" rel="stylesheet">
</head>
<header>
<a href="index.php"><img class="logo" src="images/crow3.JPG" alt="Logo PL"><a>
    <h1>Pantalla de Login</h1>
</header>
<body>
    <?php
        $esCorrecto = FALSE;
        if($_SESSION['cerrarSesion'] == TRUE)
        {
            session_destroy();
            echo '<p class="explicacion">Sesión cerrada correctamente<br></p>';
        }else if($_POST['username']=='' && $_POST['password']==''){
            echo '<p> Debes llenar los campos<br></p>';
        }

        else if(isset($_POST['username']) && isset($_POST['password']))
        {
            $intentoUsername = $_POST['username'];
            $intentoPassword = $_POST['password'];

            $ficheroUsuarios = fopen("database/usuarios.csv", "r");
            if ($ficheroUsuarios !== FALSE)
            {
                $numLinea = 1;
                while (($arrayLinea = fgetcsv($ficheroUsuarios, 1000, ",")))
                {
                    if($arrayLinea[0] == $intentoUsername && $arrayLinea[1] == $intentoPassword)
                    {
                        $esCorrecto = TRUE;
                    }
                    $numLinea++;
                }
                fclose($ficheroUsuarios);
            }
            else
            {
                echo 'No se ha podido leer el fichero';
            }
            if($esCorrecto == TRUE)
            {
                $_SESSION['username'] = $intentoUsername;
                echo '<p class="explicacion">Usuario identificado</p>';
            }
            else
            {
                echo '<p class="explicacion">Usuario o contraseña no coinciden<br></p>';
            }
        }
        else
        {
            echo '<p class="explicacion">No se han introducido los datos correctamente<br></p>';
        }

        echo '<p class="explicacion">Pulsa el botón para regresar a la pantalla anterior</p><br>';

        if($_SESSION['paginaActual']=="crowd1.php")
        {
            echo '<button class="botonVolver"><a href=crowd1.php>Regresar</a></button>';
        }
        else if($_SESSION['paginaActual']=="crowd2.php")
        {
            echo '<button class="botonVolver"><a href=crowd2.php>Regresar</a></button>';
        }
        else
        {
            echo '<button class="botonVolver"><a href=index.php>Regresar</a></button>';
        }
    ?>
</body>
<footer id="footer">
    <p>Trabajo realizado por:</p>
    <p>Pablo González - Github: <a href="https://github.com/pgonzalezs1999">pgonzalezs1999</a></p>
    <p>Leticia Gruñeiro - Github: <a href="https://github.com/lgruneirodem">lgruneirodem</a></p>
    </footer>
</html>