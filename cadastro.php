<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanchonete D'Almeidas</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" ><h1>Lanchonete D'Almeidas</h1></a>
        
          
        
    </header>
    
    <div class="page-heading contact-heading header-text" style="height: 450px; background-image: url(assets/imagens/padaria.jpg);">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
                <h2>Cadastro</h2>

                <form action="php/processo_cadastro.php" method="post">
                    <?php
                 if(isset($_post["erro"])){
                    $erro = $_post["erro"];
                 }
                  ?>
                    <!-- Campos do formulário -->
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>

                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>

                    <!-- Outros campos conforme necessário -->

                    <button type="submit">Cadastrar</button>
                </form><br><br><br><br><br><br><br><br><br><br>
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

