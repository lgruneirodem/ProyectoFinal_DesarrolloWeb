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
    <title>Registro PL</title>
    <link rel="stylesheet" href="css/styleLogIn.css?version=51">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link href='https://css.gg/chevron-up.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2&display=swap" rel="stylesheet">
</head>
<header>
<a href="index.php"><img class="logo" src="images/crow3.JPG" alt="Logo PL"><a>
    <h1>Pantalla de Registro</h1>
</header>
<body>
    <?php
        if($_POST['username']=='' && $_POST['password']==''&& $_POST['repassword']==''){
            echo ' 
            <p> Debes llenar los campos</p>';
        }
        elseif($_POST['password'] !== $_POST['repassword']){
            echo ' 
            <p> Las contraseñas no coinciden</p>';
        }
        elseif(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repassword'])){
            
            $esIgual=FALSE;
            $Username = $_POST['username'];
            $Password = $_POST['password'];
            $RePassword = $_POST['repassword'];
            $ficheroUsuarios = fopen("database/usuarios.csv", "r");

            if ($ficheroUsuarios !== FALSE){   
                $numLinea = 1;
                while (($arrayLinea = fgetcsv($ficheroUsuarios, 1000, ","))){
                    
                    if($Username==$arrayLinea[0]){
                        $esIgual =TRUE;
                    }
                    
                }
                fclose($ficheroUsuarios);
            }
            if($esIgual== TRUE){
                echo '<p> Este usuario ha sido creado anteriormente</p>';
            }
            else{
                $ficheroComentarios = fopen("database/usuarios.csv", "a");
                $lineaNueva = [$_POST['username'], $_POST['password']];
                fputcsv($ficheroComentarios, $lineaNueva);
                fclose($ficheroComentarios);

                $ficheroUsuarios = fopen("database/usuarios.csv", "r");
                if ($ficheroUsuarios !== FALSE){   
                    $numLinea = 1;
                    while (($arrayLinea = fgetcsv($ficheroUsuarios, 1000, ","))){
                        $numLinea++;
                    }
                    fclose($ficheroUsuarios);
                    echo '<p> Usuario creado correctamente</p>'; 
                }else{
                    echo 'No se ha podido leer el fichero';
                }
            }
        
        }
        echo
        '<p class="explicacion">Pulsa el botón para regresar a la pantalla anterior</p><br>
        <button class="botonVolver"><a href='.$_SESSION['paginaActual'].'>Regresar</a></button>';
        
        
        
    ?>
</body>
<footer id="footer">
    <p>Trabajo realizado por:</p>
    <p>Pablo González - Github: <a href="https://github.com/pgonzalezs1999">pgonzalezs1999</a></p>
    <p>Leticia Gruñeiro - Github: <a href="https://github.com/lgruneirodem">lgruneirodem</a></p>
    </footer>
</html>


