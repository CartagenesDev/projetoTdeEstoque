
<?php


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuario</title>
    <link rel="stylesheet"  type="text/css" href="style.css"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <Style>



        .corpo {
            display: flex;
            margin-top: 20px;

        }

        td {
            
            border: 2px solid black;    
        }

        table {
            border: 1px black;
        }



    </Style>
   
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
    <div class="corpo">
        <table>
        
            <caption>Informações</caption>
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
                    } else {
                        // ID do usuário não fornecido
                        echo "ID do usuário não fornecido.";
                    }
                
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
                            echo "<td><a href='deletarUsuario.php?id={$row['ID']}'>Excluir</a></td>";
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
    <div>

    </div>


    <footer>
        <p>Todos os direios reservados a CartagenesDEV &copy; 2023</p>
    </footer>
    
</body>
</html> 

