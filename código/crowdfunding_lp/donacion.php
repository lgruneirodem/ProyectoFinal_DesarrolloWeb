<!DOCTYPE html>
    <?php
    session_start();
    if (!isset($_SESSION['username'])){
        echo'<script type="text/javascript">
        alert("Debes iniciar sesión para poder donar");
        </script>';
        //header("Location: index.php");
    }
    ?>
<html>
<head>
    <title>Crowdfundings Leticia y Pablo</title>
    <link rel="stylesheet" href="css/styleDonacion.css?version=51">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link href='https://css.gg/chevron-up.css' rel='stylesheet'>
    <meta charset="UTF-8">
</head>
<header>
    <a href="index.php"><img class="logo" src="images/crow3.JPG" alt="Desastre de la palma"></a>
    <h1>Realizar donación</h1>
</header>
<body>
    <div class="contenedorFormulario">
    <?php
        if($_SESSION['paginaActual'] == "crowd1.php")
        {
            echo '<h2>Gracias por apoyar a La Palma</h2>';
        }
        else if($_SESSION['paginaActual'] == "crowd2.php")
        {
            echo '<h2>Gracias por apoyar a Bohol</h2>';
        }
    ?>
        <div class="columnasFormulario">
            <div class="columnaFormulario">
                <h3>Rellena el formulario para completar la ayuda</h3>
                <form name ="FormularioDonacion" action="RegistroDonaciones.php" method="post">
                Escribe la cantidad para donar:<br><br><input class="inputDinero" type="text" name="Dinero"/>
                <br><br>
                <input class="botonForm" type="submit" value="Enviar" name="botonDonacion"/>
            </form>
            </div>
        </div>
    </div>
</body>
<footer id="footer">
    <p>Trabajo realizado por:</p>
    <p>Pablo González - Github: <a href="https://github.com/pgonzalezs1999">pgonzalezs1999</a></p>
    <p>Leticia Gruñeiro - Github: <a href="https://github.com/lgruneirodem">lgruneirodem</a></p>
    <button class="regreso ratonMano"><i class="gg-chevron-up" onclick="regresar()"></i></button>
</footer>
<script src="js/donacion.js"></script>
<script src="js/crowd1.js"></script>
</html>