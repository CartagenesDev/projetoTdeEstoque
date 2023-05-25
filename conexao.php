<?php
$host = 'localhost';
$username = 'root';
$senha = '';
$banco = 'estoque';

$conn = new mysqli($host,$username, $senha,$banco);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obter os dados do formulário
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];
//verifica se o campo checkbox administador oi marcado
//? 1 : 0: É conhecido como operador ternário. Se a expressão anterior for avaliada 
//como verdadeira (ou seja, o checkbox está marcado), o valor atribuído à variável 
//$ser_admin será 1. Caso contrário, se a expressão for falsa (o checkbox não está marcado), 
//o valor atribuído será 0
$ser_admin = isset($_POST['ser_admin']) && $_POST['ser_admin'] == 'on'? 1 : 0;

// Verifica se o usuário já está cadastrado como administrador
if ($ser_admin) {
    $sql = "SELECT * FROM cadastro_usuario WHERE email = '$email' AND ser_admin = 1";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        // Usuário já cadastrado como administrador
        echo "Usuário já cadastrado como administrador.";
        exit();
    }
}   

// Preparar a consulta SQL para inserir os dados no banco de dados
$sql = "INSERT INTO cadastro_usuario (nome_usuario, email, senha, ser_admin) VALUES ('$usuario', '$email', '$senha', '$ser_admin')";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Control</title>
    <style>

* {
    margin: 0;
    padding: 0; 
    box-sizing:border-box;
    text-decoration: none;
    
}


body {
    background: url(icon\ principal.jpg) no-repeat;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-size: cover;
    background-position: center;
  
}
.cabecalho{
    display: flex;   
    align-items:center;
    justify-content:space-between;
    position: fixed;
    top: 0;
    left: 0;
    padding: 10px 100px;
    width: 100%; 
    z-index: 99;
    background: #585e91;
   
    
}
.sub-titulo {
    margin-left: 40px;
    margin-top: 0px;
    color: rgb(245, 245, 250);
}
.menu-button {

    position: relative;
    font-size: 1em;
    color: rgb(158, 89, 89);
    font-weight: 500;
    margin-right: 100px;
    display: flex;
    gap: 30px;
    
}
.menu-button .botao {
    width: 130px;
    height: 50px;
    background: transparent;
    border: 2px solid;
    border-radius: 6px;
    cursor:pointer;
    font-size: 1em;
    color: rgb(252, 245, 245);
    font-weight: 500;
    margin-left: 40px;
    transition: .5s;
}
.tela-login {
    position: relative;
    width: 400px;
    height: 420px;
    background: transparent;
    border: 2px solid rgba(216, 211, 211, 0.5);
    border-radius: 20px;
    backdrop-filter: blur(30px);
    box-shadow: 0 0 30px #1f1b1b80;
    display: flex;
    justify-content: center;
    align-items: center;    
    overflow: hidden;
    transform: scale(1);
    transition: transform .5s ease, height .2s ease;    
}
footer {     
    position:absolute;
    bottom: 0;
    width: 100%;
    height: 2.5rem;
    justify-content: center;
    font-size: 15px;    
    width: 670px;
    margin: auto;
    padding: 3px;
    border-radius: 10px;
    display: flex;
    text-align: center;
    
}




    </style>
   
</head>
<body>
    <header class="cabecalho"> 
    <div>
        <h1 class="titulo-principal">Inventory Control</h1>
        <h3 class="sub-titulo">Soluções inteligentes para o seu Negócio.</h3>
    </div>    
    
    <nav class="menu-button">
        <button class="botao" href="#">Sair</button>
    </nav>       

    </header>  
    
    <div class="tela-login">
        
        <div class="titulo logar">   

               
            <?php
                $query = "SELECT * FROM cadastro_usuario WHERE email = '$email'";
                $result = $conn->query($query);
                
                if ($result->num_rows > 0) {
                    // Usuário já cadastrado, exibir mensagem ou realizar ações adequadas
                    echo "Usuário já cadastrado.";
                } else {
                

                    if ($conn->query($sql) === TRUE) {
                        echo "Dados inseridos com sucesso!";
                    } else {
                        echo "Erro ao inserir dados: " . $conn->error;
                    }

                    // Fechar a conexão com o banco de dados
                    $conn->close();
                }    
            ?>        

    
        </div>

        <a href="cadastrousuario.php"><button>Cadastar novo usuario</button></a>
        <a href="home.php"><input name="btvoltar" type="button" id="btvoltar" value="Voltar"></a>

    </div>
   
    <footer>
        <p>Todos os direios reservados a CartagenesDEV &copy; 2023</p>
    </footer>

    
    
</body>

</html>






