<?php
session_start();

if (!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])) {
    echo "<script> 
            alert('Esta página só pode ser acessada por usuário logado');
            window.location.href = 'index.php';
          </script>";
    exit();
}

$nome_usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

$nome_servidor = "localhost";
$nome_usuario = "mpsalmeida";
$senha = "1@2#3$4%5&6€"; 
$nome_banco = "padaria";

$conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);

if ($conecta->connect_error) {
    die("Conexão falhou: " . $conecta->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descricao = $_POST["descricao"];
    $quantidade = $_POST["quantidade"];
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];

    $formato_pedido = "Pedido: $descricao - $quantidade unidades - R$$preco";

    $sql_inserir = "INSERT INTO pedidos (descricao, quantidade, preco, categoria, formato_pedido) VALUES ('$descricao', $quantidade, $preco, '$categoria', '$formato_pedido')";

    if ($conecta->query($sql_inserir) === TRUE) {
        echo "<p>Pedido adicionado com sucesso.</p>";
    } else {
        echo "<p>Erro ao adicionar pedido: " . $conecta->error . "</p>";
    }
}

$conecta->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanchonete D'Almeidas - Pedidos</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#"><h1>Lanchonete D'Almeidas</h1></a>
            </div>
        </nav>
    </header>
    
    <nav>
        <ul>
            <li><a class="btn-link" href="index.php">Sair</a></li>
        </ul>
    </nav>
    
    <div class="page-heading contact-heading header-text" style="height: 500px; background-image: url('assets/imagens/padoca.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h2 align="center">Lista de Pedidos</h2>

                        <form method="post">
                            <label for="descricao">Descrição do Pedido:</label>
                            <input type="text" id="descricao" name="descricao" required>
                            <label for="quantidade">Quantidade:</label>
                            <input type="text" id="quantidade" name="quantidade" required>
                            <label for="preco">Preço:</label>
                            <input type="text" id="preco" name="preco" required>
                            <label for="categoria">Categoria:</label>
                            <select id="categoria" name="categoria">
                                <option value="Lanches">Lanches</option>
                                <option value="Bebidas">Bebidas</option>
                                <option value="Sobremesas">Sobremesas</option>
                            </select>
                            <button type="submit">Adicionar Pedido</button>
                            <button><a class="btn-link" href="vendas.php">Ver Vendas</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        &copy; 2024 Lanchonete D'Almeidas
    </footer>
</body>
</html>
