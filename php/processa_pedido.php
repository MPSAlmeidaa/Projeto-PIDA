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
        $sql_consulta = "SELECT formato_pedido FROM pedidos";
        $resultado = $conecta->query($sql_consulta);

        if ($resultado->num_rows > 0) {
            // Exibir pedidos
            while ($linha = $resultado->fetch_assoc()) {
                echo "<li>" . $linha["formato_pedido"] . "</li>";
            }
        } else {
            echo "<li>Nenhum pedido encontrado.</li>";
        }

       
        $conecta->close();
        header("Location: vendas.php");
        exit();
        ?>