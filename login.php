<?php
include('header.php');
?>
<div class="text-right container marginBot social-button">
    <a href="#" target="_blank"><img src="img/instagram.png" alt="instagram" width="25px" class="logosRedes"></a>
    <a href="https://www.youtube.com/channel/UC1U7M-rvlfWJ6mZcGQ33Mbw/videos" target="_blank"><img src="img/youtube.png" alt="youtube" width="25px" class="logosRedes"></a>
    <a href="https://twitter.com/opsoms" target="_blank"><img src="img/twitter.png" alt="twitter" width="25px" class="logosRedes"></a>
</div>
<div class="inicio_sesion">
    <h1 class="display-4 bordeBot">LogIn</h1>
    <div class="texto centrar">
        <form action="includes/login.inc.php" method="post">
            <div class="bloque">
                <input type="text" name="mailuid" placeholder="Correo/Usuario">
            </div>
            <div class=" bloque">
                <input type="password" name="pwd" placeholder="Contraseña">
            </div>
            <div>
                <button type="submit" class="logboton" name="login-submit">LogIn</button>    
            </div>
        </form>
    </div>
</div>

<?php
include('footer.php');
?>