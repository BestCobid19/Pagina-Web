<?php
include('header.php');
?>


<form class="inicio_sesion" action="index.php">
    <div class="contenedor">
        <div class="bloque">
            <h1>Registro</h1>
            <div class="txtb">
                <input type="text" class="bloque" name="usuario" placeholder="Usuario">
            </div>
            <div class="txtb">
                <input type="email" class="bloque" name="mail" placeholder="Correo electrónico">
            </div>
            <div class="txtb">
                <input type="password" class="bloque" name="password" placeholder="Contraseña">
            </div>
            <div class="txtb">
                <input type="password" class="bloque" name="password" placeholder="Repita la Contraseña">
            </div>
            <input type="submit" class="logboton" value="Login">
            <div class="texto-inferior">
                ¿Has olvidado tu contraseña? <a href="#">Recupérala</a>
            </div>
        </div>
    </div>
</form>



<?php
include('footer.php');
?>