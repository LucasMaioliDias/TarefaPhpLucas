<?php
session_start();
if (isset($_POST['btncadastrar'])) {
    $usuario = $_POST['txtlogin'];
    $senha = $_POST['txtsenha'];
    $banco = new PDO('mysql:host=localhost;dbname=php', 'root', 'etec');
    $query = $banco->prepare("SELECT * FROM tblogin WHERE nmusuario = :usuario AND nrsenha = :senha");
    $query->bindParam(':usuario', $usuario);
    $query->bindParam(':senha', $senha);
    $query->execute();
    $flag = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($flag) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        header('Location: menu.php');
        exit();
    } else {
        echo '<h1>Usuário ou senha inválidos. Tente novamente</h1>';
    }
}
?>
