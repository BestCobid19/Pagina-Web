<?php 
    require "header.php";
?>

<?php
    if(isset($_SESSION['userId'])){
        header("Location: indexLogin.php");
    }else{
        header ("Location: indexNoLogin.php");
    }
?>