<?php
// Conexão com o banco de dados 
$nome_servidor = "localhost";
$nome_usuario = "mpsalmeida";
$senha = "1@2#3$4%5&6€"; 
$nome_banco = "padaria";

$conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);

if ($conecta->connect_error) {
    die("Conexão falhou: " . $conecta->connect_error);
}

// Recupera os dados do formulário
$nome = $_POST['nome'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha para maior segurança

// Insere os dados no banco de dados
$sql = "INSERT INTO dados (nome, senha) VALUES ('$nome', '$senha')";

if ($conecta->query($sql) === TRUE) {
    echo "<script>
            alert('Cadastro realizado com sucesso!');
            window.location.href = 'index.php'; 
          </script>";
    header("Location: ../index.php");
} else {
    echo "Erro ao cadastrar: " . $conecta->error;
}

// Fecha a conexão com o banco de dados
$conecta->close();
?>


