<?php
include('header.php');
?>
<div class="text-right container marginBot social-button">
    <a href="#" target="_blank"><img src="img/instagram.png" alt="instagram" width="25px" class="logosRedes"></a>
    <a href="https://www.youtube.com/channel/UC1U7M-rvlfWJ6mZcGQ33Mbw/videos" target="_blank"><img src="img/youtube.png" alt="youtube" width="25px" class="logosRedes"></a>
    <a href="https://twitter.com/opsoms" target="_blank"><img src="img/twitter.png" alt="twitter" width="25px" class="logosRedes"></a>
</div>
<div class="inicio_sesion">
    <h1 class="display-4 bordeBot">Renueva tu contraseña</h1>
    <div class="texto centrar">
        <p>Un e-mail le será enviado con las instrucciones para saber como renovar su contraseña.</p>
        <form action="includes/reset-request.inc.php" method="post">
            <input type="text" name="email" placeholder="Correo electrónico">
            <button type="submit" name="reset-request-submit">Enviar</button>
        </form>
        <?php
        if (isset($_GET["reset"])){ //comprobamos que ha puesto su mail y le manda un mensaje para que revise su correo
            if ($_GET["reset"] == "success"){
                echo '<p class="signupsuccess">Revisa tu e-mail!</p>';
            }
        }
        ?>
    </div>
</div>

<?php
include('footer.php');
?>