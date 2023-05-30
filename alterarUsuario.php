
<?php


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuario</title>
    <!--<link rel="stylesheet"  type="text/css" href="style.css"/>-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <Style>
        * {
            margin: 0;
            padding: 0; 
            box-sizing:border-box;
            text-decoration: none;
            
        }
        body {
            background: url(icon\ principal.jpg) no-repeat; 
            background: #e2e4ee;
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
        .menu-button .botao:hover {
            background-color: white;
            color: black;
            border: none;
        }

        .corpo {           
            width: auto;
            height: auto;
            display: flex;
            align-content: flex-end;
            margin: 0px;
            
            

        }

        td {
            
            border: 1px solid black;  
            font-size: 40px;
            background-color: white;
            text-align: center;
            

        }

        th {
            font-size: 30px;    
        }

        caption {
            font-size: 40px;
            font-weight: 400;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
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



    </Style>
   
</head>
<body>
    <form action="index.php">
        <header class="cabecalho"> 
            <div>
            <h1 class="titulo-principal">Inventory Control</h1>
            <h3 class="sub-titulo">Soluções inteligentes para o seu Negócio.</h3>
            </div>    
                <nav class="menu-button" >
                	<button class="botao">Sair</button>
            	</nav> 
        </header>  
    </form>
    <div class="corpo">
        <table>        
            <caption>IFORMAÇÕES</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>admin</th>
                    <th>Ações</th>
                
                </tr>
            </thead>
            <tbody>

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
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        // Constrói a consulta SQL para excluir o registro
                        $sql = "DELETE FROM cadastro_usuario WHERE ID = '$id'";

                        // Executa a consulta
                        if ($conn->query($sql) === TRUE) {
                            // Registro excluído com sucesso
                            //echo "Registro excluído com sucesso.";
                            //script javascript para colocar uma tela adicional de confirmação mas biblioteca sweetalert
                            echo "<script> swal('Dados excluidos com sucesso');</script>";
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
                    $sql = "SELECT * FROM cadastro_usuario";
                    $resultado = $conn->query($sql);
                    
                    if ($resultado->num_rows > 0) {
                        echo "<tr>";
                        echo "<td>ID</td>";
                        echo "<td>nome_usuario</td>";
                        echo "<td>email</td>";
                        echo "<td>senha</td>";
                        echo "<td>ser_admin</td>";
                        echo "<td>acão</td>";
                        // Exibir cada registro de usuário na tabela
                        while ($row = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['ID']}</td>";
                            echo "<td>{$row['nome_usuario']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>{$row['senha']}</td>";
                            echo "<td>{$row['ser_admin']}</td>";
                            echo "<td><a href='alteraUser.php?id={$row['ID']}'>Alterar</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Nenhum registro encontrado</td></tr>";
                    }
                    
                    // Fechar a conexão com o banco de dados
                    $conn->close();
            ?>

            </tbody>
        </table>
        <!--<?=($deletado=== TRUE)?"<script> swal('Hello world!');</script>":"";?>-->
    </div>    


    <footer>
        <p>Todos os direios reservados a CartagenesDEV &copy; 2023</p>
    </footer>
    
</body>
</html> 

