<?php
//Con estes php nos queremos conectar a la base de datos 
$servername = "localhost"; //Guardamos la ip del servidor donde esta nuestra base de datos
$dBUsername = "root"; //Guardamos el nombre de usuario en una variable con el que accederemos a la base de datos
$dBPassword = ""; //Guardamos la contraseña del usuario
$dBName = "loginsystemtut"; //Guardamos el nombre de la base de datos al que nos conectaremos 

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName); //Con la variable $conn nos permite conectarnos a la base de datos

if (!$conn) {
    die("Error al conectarse con el servidor: ".mysqli_connect_error()); //Con esto hacemos que si no se puede conectar a la base de datos nos salte un error
}