<?php
$nome_servidor = "localhost";
$nome_usuario = "mpsalmeida";
$senha = "1@2#3$4%5&6€"; 
$nome_banco = "padaria";

$conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);

if ($conecta->connect_error) {
    die("Conexão falhou: " . $conecta->connect_error . "<br>");
}
echo "Conexão realizada com sucesso <br>";

$nome_usuario = $_POST['nome'];
$senha = $_POST['senha'];

$sql = "INSERT INTO dados (nome, senha) VALUES ('$nome_usuario', '$senha')";

if ($conecta->query($sql) === TRUE) {
    echo "Novos registros criados com sucesso<br>";
} else {
    echo "Erro: " . $sql . "<br>" . $conecta->error . "<br>";
}

$sql_verifica = "SELECT * FROM dados WHERE nome = '$nome_usuario' AND senha = '$senha'";
$resultado = $conecta->query($sql_verifica);

if ($resultado->num_rows > 0) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Login realizado com sucesso');
        window.location.href='index.php';
    </script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');
        window.location.href='index.php';
    </script>";
}

$conecta->close();
?>
