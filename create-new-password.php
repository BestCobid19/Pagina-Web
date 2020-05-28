<?php
include('header.php');
?>
<div class="text-right container marginBot social-button">
    <a href="#" target="_blank"><img src="img/instagram.png" alt="instagram" width="25px" class="logosRedes"></a>
    <a href="https://www.youtube.com/channel/UC1U7M-rvlfWJ6mZcGQ33Mbw/videos" target="_blank"><img src="img/youtube.png" alt="youtube" width="25px" class="logosRedes"></a>
    <a href="https://twitter.com/opsoms" target="_blank"><img src="img/twitter.png" alt="twitter" width="25px" class="logosRedes"></a>
</div>
<div class="inicio_sesion, container">
    <div class="texto centrar">
        <?php
         $selector = $_GET["selector"]; //cogemos el selector 
         $validator = $_GET["validator"]; //cogemos el validator

         if (empty($selector) || empty($validator)) { //comprobamos si el selector o el validator estan vacios da errror
            echo "No hemos podido validar su solicitud!";
         } else {
             if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                
                ?>
                <!--este es el form donde pondremos nuestra nueva contraseña -->
                <form action="includes/reset-password.inc.php" method="post">
                   <input type="hidden" name="selector" value="<?php echo $selector ?>">
                   <input type="hidden" name="validator" value="<?php echo $validator ?>">
                   <p>Nueca contraseña</p>
                   <input type="password" name="pwd" placeholder="Nueva Contraseña">
                   <p>Repite la contraseña</p>
                   <input type="password" name="pwd-repeat" placeholder="Repita la Nueva Contraseña">
                   <button type="submit" name="reset-password-submit">Renovar</button>
                </form>

                <?php
             }
         }
        ?>
    </div>
</div>

<?php
include('footer.php');
?>