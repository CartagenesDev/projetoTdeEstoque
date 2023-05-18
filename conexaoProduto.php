<?php
    $host = 'localhost';
    $username = 'root';
    $senha = '';
    $banco = 'estoque';

    $conn = new mysqli($host,$username, $senha,$banco);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }
    
    $nomeProduto = $_POST['produto'];
    $unidade = $_POST['unidade'];
    $valor = $_POST['valor'];

    $sql = "INSERT INTO cadastro_produtos (nomeProduto, unidadeProduto, valorProduto) VALUES ('$nomeProduto', '$unidade', $valor)";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
?>