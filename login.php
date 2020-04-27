<?php
include('header.php');
?>


<form class="inicio_sesion" action="index.php">
    <div class="contenedor">
        <div class="bloque">
            <h1>Login</h1>
            <div class="txtb">
                <input type="email" class="bloque" name="mail" placeholder="Correo electrónico">
            </div>
            <div class="txtb">
                <input type="password" class="bloque" name="password" placeholder="Contraseña">
            </div>
            <input type="submit" class="logboton" value="Login">
            <div class="texto-inferior">
                ¿No tienes cuenta? <a href="registro.php">Regístrate</a>
            </div>
            <div>
            ¿Has olvidado tu contraseña? <a href="recupera_contraseña.php">Recupérala</a>
            </div>
        </div>
    </div>
</form>



<?php
include('footer.php');
?>