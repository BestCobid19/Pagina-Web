<?php 
    require "header.php";
?>

<?php
    if(isset($_SESSION['userId'])){ //Si esta logueado lo mandamos a indexLogin
        header("Location: indexLogin.php");
    }else{ //Y si no esta logueado lo mandamos a IndexNoLogin
        header ("Location: indexNoLogin.php");
    }
?>