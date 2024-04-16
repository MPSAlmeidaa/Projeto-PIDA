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

        // Consultar pedidos do banco de dados
        $sql_consulta = "SELECT * FROM pedidos";
        $resultado = $conecta->query($sql_consulta);

        


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

            <li><a class="btn-link" href="pedidos.php">Pedidos</a></li>
            
            <li><a class="btn-link" href="index.php">Sair</a></li>
      
            
        </ul>
    </nav>
    <div class="page-heading contact-heading header-text" style="height: 600px; background-image: url(assets/imagens/padoca.jpg);">
        <div class="container">    
        <div class="row">
                <div class="col-md-12">
                    <div class="text-content"> 
               
              <?php
                if ($resultado->num_rows > 0) {
                echo "<h2>Lista de Pedidos Vendidos</h2>";
                echo "<ul>";
                while ($linha = $resultado->fetch_assoc()) {
                    echo "<li>{$linha['descricao']} - {$linha['quantidade']} unidades - R$ {$linha['preco']}</li>";
                }
                echo "</ul>";
                } else {
                    echo "<p>Nenhum pedido encontrado.</p>";
                }
              ?>
              
                
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

