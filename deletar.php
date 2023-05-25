<?php
$host = 'localhost';
$username = 'root';
$senha = '';
$banco = 'estoque';

$conn = new mysqli($host, $username, $senha, $banco);

// Verifica se o ID do usuário foi fornecido via parâmetro na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Constrói a consulta SQL para excluir o registro
    $sql = "DELETE FROM cadastro_usuario WHERE ID = '$id'";

    // Executa a consulta
    if ($conn->query($sql) === TRUE) {
        // Registro excluído com sucesso
        echo "Registro excluído com sucesso.";
    } else {
        // Erro ao excluir o registro
        echo "Erro ao excluir o registro: " . $conn->error;
    }
} else {
    // ID do usuário não fornecido
    echo "ID do usuário não fornecido.";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

