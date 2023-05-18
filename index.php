<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Control</title>
    <link rel="stylesheet"  type="text/css" href="style.css"/>
   
</head>
<body>
    <header class="cabecalho"> 
    <div>
        <h1 class="titulo-principal">Inventory Control</h1>
        <h3 class="sub-titulo">Soluções inteligentes para o seu Negócio.</h3>
    </div>    
    
    <nav class="menu-button">
        <button class="botao" href="#">Entrar</button>
    </nav>       

    </header>  
    
    <div class="tela-login">
        <span class="icone-fechar"><ion-icon name="close"></ion-icon></span>
        <div class="titulo logar">
            <h2>Login</h2>            
            <form action="validaDados.php" method="POST">
                <div class="entrada-dados">
                    <span class="icone"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>  
                <div class="entrada-dados">
                    <span class="icone"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="senha" required>
                    <label>Senha</label>
                </div>
                <div class="lembrar_dados">
                <label><input type="checkbox" name="lembrar">Lembre-me</label>
                    <a href="#">Esqueceu sua senha?</a>
                </div>
                <button class="botao-logar" type="submit">Logar</button>
                <div class="registre-se">
                    
                </div>

            </form> 
        </div>
    </div>
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js">
    </script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <footer>
        <p>Todos os direios reservados a CartagenesDEV &copy; 2023</p>
    </footer>

    
    
</body>
</html> 