<?php
session_start();

if (!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])) {
    echo "<script> 
            alert('Esta página só pode ser acessada por usuário logado');
            window.location.href = 'index.php';
          </script>";
}

$nome_usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

?>
<?php
       
        $nome_servidor = "localhost";
        $nome_usuario = "mpsalmeida";
        $senha = "1@2#3$4%5&6€"; 
        $nome_banco = "padaria";

        $conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);

        if ($conecta->connect_error) {
            die("Conexão falhou: " . $conecta->connect_error);
        }

        // Verificar se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obter dados do formulário
            $descricao = $_POST["descricao"];
            $quantidade = $_POST["quantidade"];
            $preco = $_POST["preco"];

            // Formatar o pedido
            $formato_pedido = "Pedido: $descricao - $quantidade unidades - R$$preco";

            // Inserir o novo pedido no banco de dados
            $sql_inserir = "INSERT INTO pedidos (descricao, quantidade, preco, formato_pedido) VALUES ('$descricao', $quantidade, $preco, '$formato_pedido')";

            if ($conecta->query($sql_inserir) === TRUE) {
                echo "<li>$formato_pedido</li>";
                echo "<li>Pedido adicionado com sucesso.</li>";
            } else {
                echo "<li>Erro ao adicionar pedido: " . $conecta->error . "</li>";
            }
        }

        // Consultar pedidos do banco de dados
        
        $conecta->close();
        
        

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padaria do Seu Zé</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" ><h1>Padaria do Seu Zé</h1></a>
    </header>
    
    <nav>
        
        <ul>

            <li><a class="btn-link" href="index.php">Sair</a></li>
            
            
        </ul>
    </nav>
    
    <div class="page-heading contact-heading header-text" style="height: 500px; background-image: url(assets/imagens/padoca.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">    
                        <h2 aling="center">Lista de Pedidos</h2>
    

    <!-- Formulário para adicionar novo pedido -->
    <form   method="post">
        <label for="descricao">Descrição do Pedido:</label>
        <input type="text" id="descricao" name="descricao" required>

        <label for="quantidade">Quantidade:</label>
        <input type="text" id="quantidade" name="quantidade" required>

        <label for="preco">Preço:</label>
        <input type="text" id="preco" name="preco" required>

        <button action="processa_pedido.php" type="submit">Adicionar Pedido</button>
        <button  type="submit"><a class="btn-link" href="vendas.php">Ver Vendas</a></button>
    </form><br><br><br><br><br><br><br><br><br><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        &copy; 2023 Padaria do Seu Zé
    </footer>
</body>
</html>

