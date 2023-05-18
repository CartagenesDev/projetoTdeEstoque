

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro usuário</title>
    <link rel="stylesheet"  type="text/css" href="style_cadastro.css"/>
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
                <h2 class="titulo_produto">Cadastrar Produto</h2>                
                <form action="conexaoProduto.php" method="POST">                    
                    <div class="cadastro-produto">                       
                        <label>Nome:</label><br/>
                        <input type="text" name="produto" id="produto" required>                 
                       
                    </div>
                    <div class="cadastro-produto">                       
                        <label>Unidade:</label><br/>
                        <input type="text" name="unidade" id="unidade" required>              
                       
                    </div>
                    <div class="cadastro-produto">                       
                        <label>Valor:</label><br/>
                        <input type="text" name="valor" id="valor"required>                 
                       
                    </div>
                    <div class="botao-cadastro-produto">
                        <input class="botao-c" type="submit" name="submit">
                    </div>
                   

                  

                </form>
         
            </div>

        </div>
        <script src="script.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>
