<?php
include('header.php');
?>
<link rel="stylesheet" href="css/registro.css">
<form action="index.php" class="registro">
    <h1>Regístrese</h1>

<div class="txtb">
    <input type="text" placeholder="Usuario" >
</div>

<div class="txtb">
    <input type="email" placeholder="Correo electrónico">
</div>

<div class="txtb">
    <input type="password" placeholder="Contraseña">
</div>

<div class="txtb">
    <input type="password" placeholder="Repita la contraseña">
</div>

<input type="submit" class="regbtn" value="Registrarse">

<div class="bottom-text">
    ¿Has perdido la contraseña? <a href="#">Recupérala</a>
</div>


</form>
<script src="js/registro.js"></script>
<?php
include('footer.php');
?>