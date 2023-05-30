<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet"  type="text/css" href="style.css"/>
    <style>
        .rodape {
            display: flex;
            flex-direction: center;
        }
    </style>
</head>
<body>
    <form action="index.php">
        <header class="cabecalho-home"> 
            <div>
                <h1 class="titulo-principal">Inventory Control</h1>
                <h3 class="sub-titulo">Soluções inteligentes para o seu Negócio.</h3>
            </div>    
                <nav class="menu-button-sair" >
                    <button class="botao-sair" type="submit" >Sair</button>
                </nav> 
        </header>  
    </form>
    
    
    <div class="tela-login-home">
        <div>
            
                
                <h2 class="sub-titulo-home">MENU</h2>
                
                <div class="entrada-dados-home">
                    <a href="cadastrousuario.php"><button class="botao-logar">Cadastrar Usuario</button></a>
                </div>  
                <div class="entrada-dados-home">
                    <a href="cadastro.php"><button class="botao-logar">Cadastrar Produto</button>
                </div>
                <div class="entrada-dados-home">
                    <a href="deletarUsuario.php"><button class="botao-logar">Deletar Usuario</button>
                </div>
                <div class="entrada-dados-home">
                    <a href="deletarProduto.php"><button class="botao-logar">Deletar Produto</button>
                </div>            

        </div>

     
    </div>


    <footer >
        <p class="rodape">Todos os direios reservados a CartagenesDEV &copy; 2023</p>
    </footer>
    
</body>
</html> 
