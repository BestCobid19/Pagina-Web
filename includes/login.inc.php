<?php 

if (isset($_POST['login-submit'])) { //Cogemos lo que nos envia el from login-submite

    require 'dbh.inc.php'; //Llamamos al php que se conecta a la base de datos
    

    $mailuid = $_POST['mailuid']; //Guardamos el Nombre o email que nos envia el usuario    
    $password = $_POST['pwd']; //Guardamos la contraseña que nos llega

    if (empty($mailuid) || empty($password)) { //Comprobamos que algun parametro este en blanco
        header("Location: ../login.php?error=emptyfields");
        exit();
    }else {
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;"; //comprobamos que este user o email exista en nuestra base de datos
        $stmt = mysqli_stmt_init($conn); //Empezamos un nueco stmt que nos comprueba que estemos conectados a la base de datos
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../login.php?error=sqlerror");
            exit();
        }else {

            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid); //Enviamos el mailuid a la base de datos para comprobar que exista
            mysqli_stmt_execute($stmt); //Ejecutmanos el stmt en la base de datos
            $result = mysqli_stmt_get_result($stmt); //Mustra si ha habido algun error
            if ($row = mysqli_fetch_assoc($result)) { //Comprobamos si hay algo dentro del resultado esto significa que ya tenemos el nombre de ususario
                $pwdCheck = password_verify($password, $row['pwdUsers']); //Comprobamos que la contraseña sea correcta
                if ($pwdCheck == false){
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdCheck == true) {
                    session_start(); //iniciamos su sesion y guradamos su informacion en variables
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    $_SESSION['username'] = $_POST['mailuid'];;
                    
                    
                    header("Location: ../index.php");
                    
                   
                    exit();
                }else {
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                }
            }else{
                header("Location: ../login.php?error=nouser");
                exit();
            }

        }
        
    }

}
else{
    header("Location: ../index.php");
    exit();
}