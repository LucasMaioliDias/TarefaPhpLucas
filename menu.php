<?php


session_start();

if(!isset($_SESSION['usuario'])){
    header('location: login.php?erro=true');
    exit;
}else{
    echo"<h1>login Realizado!!!</h1>";
}
?>

