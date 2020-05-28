<?php
//Deslogueamos al usuario de la web
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");