<?php
session_start();

// Verificar se o usuário já está autenticado
if (isset($_SESSION['usuario']) && $_SESSION['senha'] === true) {
    // Se já estiver autenticado, redirecione para a página principal ou outra página segura
    header("Location: pedidos.php");
    exit();
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar as credenciais do usuário 
    $nome_usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Exemplo simples de autenticação 
    if ($nome_usuario == "usuario" && $senha == "senha") {
        // Autenticação bem-sucedida, iniciar a sessão
        session_start();

        // Armazenar informações do usuário na sessão
        $_SESSION['usuario'] = true;
        $_SESSION['nome_usuario'] = $nome_usuario;

        // Redirecionar para a página segura após o login
        header("Location: pedidos.php");
        exit();
    } else {
        // Credenciais inválidas, exibir mensagem de erro (substitua isso com sua lógica de tratamento de erros)
        $erro = "Credenciais inválidas. Tente novamente.";
    }
}
?>

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
      <?php
        // Exibir mensagem de erro (se houver)
        if (isset($erro)) {
        echo "<p style='color: red;'>$erro</p>";
        }
      ?>    
          
        
    </header>
    
    
    <div class="page-heading contact-heading header-text" style="height: 450px; background-image: url(assets/imagens/padaria.jpg);">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
                <h2 align="center">LOGIN</h2><br><br><br>
              
              <form align="center" action="php/login.php" method="post">
                    <label for="usuário">Usuário:</label>
                    <input type="usuário" id="usuário" name="usuário" placeholder="usuário" required>
                    
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="senha" required>
                    
                   <input type="submit" value="Entrar">
                   <p><h4>Não tem uma conta?</h4> <a class="btn-link" href="cadastro.php">Crie uma agora</a></p>
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
