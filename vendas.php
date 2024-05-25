<?php
session_start();

$nome_servidor = "localhost";
$nome_usuario = "mpsalmeida";
$senha = "1@2#3$4%5&6€"; 
$nome_banco = "padaria";

$conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);

if ($conecta->connect_error) {
    die("Conexão falhou: " . $conecta->connect_error);
}

$sql_consulta = "SELECT * FROM pedidos";
$resultado = $conecta->query($sql_consulta);

$lanches = [];
$bebidas = [];
$sobremesas = [];

while ($linha = $resultado->fetch_assoc()) {
    switch ($linha['categoria']) {
        case 'Lanches':
            $lanches[] = $linha;
            break;
        case 'Bebidas':
            $bebidas[] = $linha;
            break;
        case 'Sobremesas':
            $sobremesas[] = $linha;
            break;
    }
}

$conecta->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanchonete D'Almeidas - Vendas</title>
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
            <li><a class="btn-link" href="pedidos.php">Pedidos</a></li>
            <li><a class="btn-link" href="index.php">Sair</a></li>
        </ul>
    </nav>

    <div class="page-heading contact-heading header-text" style="height: 600px; background-image: url('assets/imagens/padoca.jpg');">
        <div class="container">    
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h2>Lista de Pedidos Vendidos</h2>
                        <h3>Lanches</h3>
                        <ul>
                            <?php
                            foreach ($lanches as $pedido) {
                                echo "<li>{$pedido['descricao']} - {$pedido['quantidade']} unidades - R$ {$pedido['preco']} - {$pedido['venda_data']}</li>";
                            }
                            ?>
                        </ul>
                        <h3>Bebidas</h3>
                        <ul>
                            <?php
                            foreach ($bebidas as $pedido) {
                                echo "<li>{$pedido['descricao']} - {$pedido['quantidade']} unidades - R$ {$pedido['preco']} - {$pedido['venda_data']}</li>";
                            }
                            ?>
                        </ul>
                        <h3>Sobremesas</h3>
                        <ul>
                            <?php
                            foreach ($sobremesas as $pedido) {
                                echo "<li>{$pedido['descricao']} - {$pedido['quantidade']} unidades - R$ {$pedido['preco']} - {$pedido['venda_data']}</li>";
                            }
                            ?>
                        </ul>
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
