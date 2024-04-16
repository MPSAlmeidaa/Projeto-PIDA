<?php
session_start();

$nome_servidor = "localhost";
$nome_usuario = "mpsalmeida";
$senha = "1@2#3$4%5&6€"; 
$nome_banco = "padaria";

$conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);
if ($conecta->connect_error === true) {
    die("Conexão falhou: " . $conecta->connect_error . "<br>");
}

$nome_usuario ;
$senha ;

$sql = "SELECT * FROM dados WHERE nome = '$nome_usuario' AND senha = '$senha'";
$resultado = $conecta->query($sql);
if ($resultado->num_rows > 0) {
    $_SESSION['usuario'] = $nome_usuario;
    $_SESSION['senha'] = $senha;
    header("Location: ../pedidos.php");
} else {
    session_unset();
    session_destroy();
    echo "<script> 
            alert('Email ou senha incorretos');
            window.location.href = '../index.php';
          </script>";
}

$conecta->close();
?>


