<?php
include('header.php');
?>
<div class="text-right container marginBot social-button">
    <a href="#" target="_blank"><img src="img/instagram.png" alt="instagram" width="25px" class="logosRedes"></a>
    <a href="https://www.youtube.com/channel/UC1U7M-rvlfWJ6mZcGQ33Mbw/videos" target="_blank"><img src="img/youtube.png" alt="youtube" width="25px" class="logosRedes"></a>
    <a href="https://twitter.com/opsoms" target="_blank"><img src="img/twitter.png" alt="twitter" width="25px" class="logosRedes"></a>
</div>


<div class="inicio_sesion">
   
     <h1 class="bordeBot">Iniciar sesión</h1>   
    
    
    <div class="texto centrar">
        <form action="includes/login.inc.php" method="post">
        <?php 
            if (isset($_GET['error'])){ //Con esto hacemos que si no ha completado los campos salga un error
                if ($_GET['error'] == "emptyfields") {
                    echo '<p class="bg-danger">Completa todos los campos</p>';
                }
                else if ($_GET['error'] == "wrongpwd") { //Con esto mostramos un error si la contraseña o el usuario estan mal
                    echo '<p class="bg-danger">Contraseña o Usuario incorrectos</p>';
                }

                else if ($_GET['error'] == "sqlerror") { //Error si no se conecta con la base de datos
                    echo '<p class="bg-danger">Error con la base de datos</p>';
                }
            }
          ?>
            <div class="bloque">
                <input type="text" name="mailuid" placeholder="Correo/Usuario">
            </div>
            <div class=" bloque">
                <input type="password" name="pwd" placeholder="Contraseña">
            </div>
            <div>
                <button type="submit" class="logboton" name="login-submit">Iniciar sesión</button>    
            </div>
        </form>
        <?php
        if (isset($_GET["newpwd"])){ //al cambiar la contraseña verifica que los campos están bien y te manda un mensaje
            if ($_GET["newpwd"] == "passwordupdated"){
                echo '<p class="signupsuccess">Tu contraseña ha sido cambiada con éxito</p>';
            }
        }
        ?>
        <a href="reset-password.php">¿Has olvidado tu contraseña?</a><br>
        <p>¿No tienes cuenta?</p><a href="signup.php"> Regístrate aquí</a> 
    </div>
</div>

<?php
include('footer.php');
?>