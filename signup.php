
<?php
include('header.php');
?>
<div class="text-right container marginBot social-button">
    <a href="#" target="_blank"><img src="img/instagram.png" alt="instagram" width="25px" class="logosRedes"></a>
    <a href="https://www.youtube.com/channel/UC1U7M-rvlfWJ6mZcGQ33Mbw/videos" target="_blank"><img src="img/youtube.png" alt="youtube" width="25px" class="logosRedes"></a>
    <a href="https://twitter.com/opsoms" target="_blank"><img src="img/twitter.png" alt="twitter" width="25px" class="logosRedes"></a>
</div>
<div class="jumbotron jumbotron-fluid jumbotron1">
    <div class="container">
        <h1 class="display-4 bordeBot">Regístrese</h1>
    </div>
</div>

<div class="container">
    <div class="texto centrar">
        <form action="includes/signup.inc.php" method="post">

          <?php 
            if (isset($_GET['error'])){
                if ($_GET['error'] == "emptyfields") {
                    echo '<p class="signuperror">Completa todos los campos</p>';
                }
                else if ($_GET['error'] == "invaliduidmail") {
                    echo '<p class="signuperror">Usuario y email inconorrectos</p>';
                }
                else if ($_GET['error'] == "invaliduid") {
                    echo '<p class="signuperror">Usuario incorrecto</p>';
                }
                else if ($_GET['error'] == "invalidmail") {
                    echo '<p class="signuperror">Email incorrecto</p>';
                }
                else if ($_GET['error'] == "passwordcheck") {
                    echo '<p class="signuperror">Contraseña incorrecta</p>';
                }
                else if ($_GET['error'] == "usertaken") {
                    echo '<p class="signuperror">Username is alredy taken!</p>';
                }
            }
          ?>
            <div class="bloque">
                <input type="text" name="uid" placeholder="Usuario">
            </div>
            <div class="bloque">
                <input type="email" name="mail" placeholder="Correo electrónico">
            </div>
            
            <div class="bloque">
                <input type="password" name="pwd" placeholder="Contraseña">
            </div>
            <div class="bloque">
                <input type="password" name="pwd-repeat" placeholder="Confirmar contraseña">
            </div>
            <div>
                <button type="submit" class="logboton" name="signup-submit">Registro</button>    
            </div>
        </form>
    </div>
</div>

<?php
include('footer.php');
?>