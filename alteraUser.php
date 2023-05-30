<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuario</title>
    <link rel="stylesheet"  type="text/css" href="style.css"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
</head>
<body>
    <form action="index.php">
        <header class="cabecalho-home"> 
            <div>
            </div>    
                <nav class="menu-button-sair" >
                	<button class="botao-sair">Sair</button>
            	</nav> 
        </header>  
    </form>
    <div class="tela-login-home">
        <div>
            <form action="alteraUser.php" method="POST">
            	<h2 class="sub-titulo-home">Alterar Usuario</h2>
                <div class="entrada-dados">
                    <span class="icone"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" id="ID" name="ID" required>
                    <label>ID</label>
                </div> 
                <div class="entrada-dados">
                    <span class="icone"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" id="usuario" name="usuario" required>
                    <label>Usuário</label>
                </div> 

                <div class="entrada-dados"> 
                    <span class="icone"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" id="email"name="email"required>
                    <label>Email</label>
                </div>  
                <div class="entrada-dados">
                    <span class="icone"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" id="senha" name="senha" required>
                    <label>password</label>
                </div>
               

                <input class="botao-logar" id="submit" nome="submit" type="submit" value="Alterar">
                
                
            </form>

        </div>

     
    </div>


    <footer>
        <p>Todos os direios reservados a CartagenesDEV &copy; 2023</p>
    </footer>

    
    <?php

              
                




                $host = 'localhost';
                $username = 'root';
                $senha = '';
                $banco = 'estoque';
                
                $conn = new mysqli($host,$username, $senha,$banco);
                
                    if ($conn->connect_error) {
                        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
                    }
                    // Verifica se o ID do usuário foi fornecido via parâmetro na URL
                    if (isset($_POST['ID'])) {
                        $id = $_POST['ID'];
                        $nome = $_POST['usuario'];
                        $email = $_POST['email'];
                        $senha = $_POST['senha'];
                        // Constrói a consulta SQL para alterar o registro
                        $sql = "call alterar_usuario ($id,'$nome','$email','$senha')";

                        // Executa a consulta
                        if ($conn->query($sql) === TRUE) {
                            // Registro excluído com sucesso
                            //echo "Registro excluído com sucesso.";
                            //script javascript para colocar uma tela adicional de confirmação mas biblioteca sweetalert
                            echo "<script> swal('Dados alterados com sucesso');</script>";
                            $deletado = true;
                        } else {
                            // Erro ao excluir o registro
                            echo "Erro ao excluir o registro: " . $conn->error;
                        }
                    } //else {
                        // ID do usuário não fornecido
                        //echo "ID do usuário não fornecido.";
                    //}
                
                    // Consulta SQL para obter os registros dos usuários
                    //$sql = "SELECT * FROM cadastro_usuario";
                    //$resultado = $conn->query($sql);

                    
    ?>


</body>
</html> 