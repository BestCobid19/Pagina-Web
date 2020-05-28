<?php

if (isset($_POST["reset-password-submit"])){ //Comprobamos si el reset de password es válido

    $selector = $_POST["selector"]; //cogemos el selector
    $validator = $_POST["validator"]; // cogemos el validator
    $password = $_POST["pwd"]; //cogemos la contraseña 
    $passwordRepeat = $_POST["pwd-repeat"]; //cogemos la contraseña repetida

    if (empty($password) || empty($passwordRepeat)){ //si la contraseña o la contraseña repetida estan vacías te llevan de nuevo al login
        header("Location: ../login.php?newpwd=empty");
        exit();
    } else if ($password != $passwordRepeat) { //si la contraseña no es igual a la contraseña repetida te lleva de nuevo al login
        header("Location: ../login.php?newpwd=pwdnotsame");
        exit();
    }

    $currentDate = date("U"); //fecha actual

    require 'dbh.inc.php'; //requiere la base de datos

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?"; //selecciona de la base de datos el pwdreset donde el pwdreset selector sea? y el reset expires también
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Eso ha sido un error";
        exit();
    } else {
         mysqli_stmt_bind_param($stmt, "ss", $selector,$currentDate); 
         mysqli_stmt_execute($stmt);

         $result = mysqli_stmt_get_result($stmt);
         if (!$row = mysqli_fetch_assoc($result)) {
            echo "Necesitas reenviar tu solicitud.";
            exit();
         } else {

            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]); //vamos a comprobar si el token es válido

            if ($tokenCheck === false){ //si el token es falso da error
                echo "Necesitas reenviar tu solicitud";
                exit();
            } elseif ($tokenCheck === true) { //si el token es true coge el email
                
                $tokenEmail = $row['pwdResetEmail'];
                $sql = "SELECT * FROM users WHERE emailUsers=?;"; //selecciona todo de usuarios donde el email sea ?
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    echo "Eso ha sido un error!";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail); //comprueba el token del mail
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)){
                        echo "Eso ha sido un error!";
                        exit();
                    } else {
                        
                        $sql = "UPDATE users SET pwdUsers=? WHERE emailUsers=?"; //actualiza users 
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)){
                         echo "Eso ha sido un error!";
                            exit();
                        } else {
                        $newPwdHash = password_hash($password, PASSWORD_DEFAULT); //cambia la password 
                        mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail); //comprueba el tokenmail y el hash de la password
                        mysqli_stmt_execute($stmt);

                        $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                         $stmt = mysqli_stmt_init($conn);
                         if (!mysqli_stmt_prepare($stmt, $sql)){
                             echo "Eso ha sido un error!";
                             exit();
                         } else {
                             mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                             mysqli_stmt_execute($stmt);
                             header("Location: ../login.php?newpwd=passwordupdated");
                         }
                        }
                    }
                }
            }

         }
    }

} else { //si no cumple las condiciones vuelve al index
    header("Location: ../index.php");
}
