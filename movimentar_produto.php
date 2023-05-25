
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentar</title>
    <link rel="stylesheet"  type="text/css" href="style_movim.css"/>
</head>
<body>
    <header class="cabecalho"> 
        <div>
            <h1 class="titulo-principal">Inventory Control</h1>
            <h3 class="sub-titulo">Soluções inteligentes para o seu Negócio.</h3>
        </div>    
        
        <nav class="menu-button">
            <a href="index.php"><button class="botao" href="#">Sair</button></a>
        </nav>       
    
        </header>
        
        <div class="tela-login">            
            <div>
                <h2 class="titulo_produto">Movimentar Produto</h2>  
                              
                <form action="movimentar_produto.php" method="POST">                    
                   <!-- <div class="cadastro-produto">                       
                        <label>Código:</label><br/>
                        <input type="text" required>                       
                    </div>-->
                    <div class="cadastro-produto">                       
                        <label>Nome:</label><br/>
                        <input type="text" name="nomeProduto" required>              
                       
                    </div>
                    <div class="cadastro-produto">                       
                        <label>quantidade:</label><br/>
                        <input type="text" name="quantidade">                 
                       
                    </div>
                    <!--<div class="cadastro-produto">                       
                        <label>tipo:</label><br/>
                        <input type="text" required>                      
                    </div>
                    <div class="cadastro-produto">                       
                        <label>movimentação:</label><br/>
                        <input type="text" required>                 
                       
                    </div>-->
                    <div class="cadastro-produto">                       
                        <label>Valor:</label><br/>
                        <input type="text" name="valor">                 
                       
                    </div>
                    <div class="botao-cadastro-produto">
                        <button class="botao-c" type="submit">Buscar</button>
                    </div>
                    <div class="botao-cadastro-produto">
                        <button class="botao-c" type="submit">Movimentar</button>
                    </div>
                    

                  

                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nomeProduto = $_POST['nomeProduto'];

                    // Realize a validação e sanitização dos dados, se necessário

                    // Conexão com o banco de dados
                    $host = 'localhost';
                    $username = 'root';
                    $senha = '';
                    $banco = 'estoque';

                    $conn = new mysqli($host, $username, $senha, $banco);
                    if ($conn->connect_error) {
                        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
                    }

                    // Consulta SQL para buscar o produto pelo nome
                    $sql = "SELECT * FROM cadastro_produtos WHERE nomeProduto = '$nomeProduto'";
                    $resultado = $conn->query($sql);                   

                    if ($resultado->num_rows > 0) {
                        // Exiba os resultados da consulta
                        while ($row = $resultado->fetch_assoc()) {
                            // Acessar os dados do produto
                            $idProduto = $row['codProduto'];
                            $nomeProduto = $row['nomeProduto'];
                            $quantidade = $row['unidadeProduto'];
                            $preco = $row['valorProduto'];

                            // Faça o que desejar com os dados, como exibição na página ou processamento adicional
                            echo "<p>ID: $idProduto</p>";
                            echo "<p>Nome: $nomeProduto</p>";
                            echo "<p>Quantidade: $quantidade</p>";
                            echo "<p>Preço: $preco</p>";
                        }
                    } else {
                        echo "Nenhum produto encontrado com o nome: $nomeProduto";
                    }

                    // Feche a conexão com o banco de dados
                    $conn->close();
                }
                ?>
            
            </div>

        </div>
        <script src="script.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>