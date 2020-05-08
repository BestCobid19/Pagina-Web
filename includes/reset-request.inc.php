<?php


require("class.phpmailer.php");
require("class.smtp.php");

if (isset($_POST["reset-request-submit"])) {

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "www.reycorona.epizy.com/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    require 'dbh.inc.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "Eso ha sido un error";
        exit();
    } else {
         mysqli_stmt_bind_param($stmt, "s", $userEmail);
         mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "Eso ha sido un error";
        exit();
    } else {
         $hashedToken = password_hash($token, PASSWORD_DEFAULT);
         mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
         mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    //Email

    // Datos de la cuenta de correo utilizada para enviar v�a SMTP
    $smtpHost = "smtp.gmail.com";  // Dominio alternativo brindado en el email de alta 
    $smtpUsuario = "reyproyectocorona@gmail.com";  // Mi cuenta de correo
    $smtpClave = "coronadosporunpoder2020";  // Mi contrase�a

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Port = 587; 
    $mail->IsHTML(true); 
    $mail->CharSet = "utf-8";

    // VALORES A MODIFICAR //
    $mail->Host = $smtpHost; 
    $mail->Username = $smtpUsuario; 
    $mail->Password = $smtpClave;

    $mail->From = "reyproyectocorona@gmail.com"; // Email desde donde env�o el correo.
    $mail->FromName = "reycorona";
    $mail->AddAddress($to); // Esta es la direcci�n a donde enviamos los datos del formulario

    $mail->Subject = "Renueva tu contraseña para reycorona"; // Este es el titulo del email.
    $mensajeHtml = nl2br("hola");
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';
    $mail->Body = "
    <html> 

    <body> 

    <h1>Hemos recibido una petición para renovar la contraseña. El link para renovarla es el siguiente.</h1>

    <p>Aquí está tu link para renovar la contraseña<br>
    <p>$message</p>


    </body> 

    </html>

    <br />"; // Texto del email en formato HTML

    $mail->AltBody = "{$to} \n\n "; // Texto sin formato HTML
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $estadoEnvio = $mail->Send(); 
    if($estadoEnvio == true){
        header("Location: ../reset-password.php?reset=success");
    } else {
        header("Location: ../reset-password.php?reset=error");
    }
// FIN - VALORES A MODIFICAR //

    //$subject = 'Renueva tu contraseña para reycorona';

    //$message = '<p>Hemos recibido una petición para renovar la contraseña. El link para renovarla es el siguiente.</p>';
    //$message .= '<p>Aquí está tu link para renovar la contraseña: <br>';
    //$message .= '<a href="' . $url . '">' . $url . '</a></p>';

    //$headers = "From: Proyecto Corona <reyproyectocorona@gmail.com>\r\n";
    //$headers .= "Reply-to: reyproyectocorona@gmail.com\r\n";
     //$headers .= "Content-type: text/html\r\n";

    //mail($to, $subject, $message, $headers);
    //$retval = mail($to, $subject, $message, $headers);
    //if ( $retval == true) {
    //    header("Location: ../reset-password.php?correoenviado");;
    //} else {
    //    header("Location: ../reset-password.php?erroralenviarelcorreo");;
    //}

   // header("Location: ../reset-password.php?reset=success");
} else {
    header("Location: ../index.php");
}
