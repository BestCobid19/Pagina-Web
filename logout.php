<?php //destruimos la sesion y lo mandamos al Index.php
session_start();
session_destroy();

header('location:index.php');

?>