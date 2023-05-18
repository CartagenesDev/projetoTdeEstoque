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

// Preparar a consulta SQL para inserir os dados no banco de dados
$sql = "INSERT INTO cadastro_usuario (nome_usuario, email, senha) VALUES ('$usuario', '$email', '$senha')";

// Executar a consulta SQL
if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

<a href="cadastrousuario.php"><button>Volta</button></a>

