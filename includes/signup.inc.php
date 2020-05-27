<?php
if (isset($_POST['signup-submit'])) { //Aqui seleccionamos el from que nos envia el php signup y nos lo envia en el metodo POST

    require 'dbh.inc.php'; //Aqui llamamos al php con el que nos conectaremos a la base de datos
    //Aqui guardaremos lo que nos llega del signup.php y lo vamos guardando en una variable
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    
    //Una vez nos llegue la informacion pondremos unas condiciones
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) { //Primero comprobamos que los campos esten completos
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email); //Si falta algun campo nos saltara un error
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidmailuid&uid");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //Comprobamos que el email y el usuario sea valido
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) { //Limitamos los caracteres que puede utilizar el usuario para elegir su nombre de usuariuo
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    else if ($password !== $passwordRepeat) { //comprobamos que las dos contraseñas coinciden
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else {

        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?"; //Comprobamos si el usuario ya existe en nuestra base de datos
        $stmt = mysqli_stmt_init($conn); //Comprobamos el estado de la base de datos
        if (!mysqli_stmt_prepare($stmt, $sql)) { //Comprobamos que la base de datos este operativa y el usuario no existe
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt, "s", $username); //Cogemos la informacion que nos envia el usuario y se la mandamos a la variable $stmt. La s significa como se la mandamos "String" ponemos s porque es un texto basico, ponemos una s porque solo comprobamos un parametro
            mysqli_stmt_execute($stmt); //Ejecutamos la informacion del usuario dentro de la base de datos
            mysqli_stmt_store_result($stmt); //Almacena lo que optubimos en la variable stmt
            $resultCheck = mysqli_stmt_num_rows($stmt); //Comprobamos cuantos resultados tiene la variable stmt
            if ($resultCheck > 0){ //Si el resultado es mayor de uno nos saldra un error de que el usuario esta en uso
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            }
            else {

                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)"; //Insertamos los valores que queremos meter en la base de datos
                $stmt = mysqli_stmt_init($conn); //Empezamos un nuevo stmt
                if (!mysqli_stmt_prepare($stmt, $sql)) { //Comprobamos que la base de datos funcione 
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT); //Ciframos la contrseña

                     mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd); //Cogemos la informacion que nos envia el usuario y se la mandamos a la variable $stmt. La s significa como se la mandamos "String" ponemos s porque es un texto basico, ponemos una sss porque son 3 parametro
                     mysqli_stmt_execute($stmt); //Ejecutamos la informacion del usuario dentro de la base de datos
                     header("Location: ../signup.php?signup=succes");
                 exit();
                }
            }
        }

    }
    mysqli_stmt_close($stmt); //Cerramos el stmt
    mysqli_close($conn); //Cerramos
}
else {
    header("Location: ../signup.php");
    exit();
}