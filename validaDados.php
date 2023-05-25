<?php
$host = 'localhost';
$username = 'root';
$senha = '';
$banco = 'estoque';

$conn = new mysqli($host, $username, $senha, $banco);

$email = $_POST['email'];
$senha1 = $_POST['senha'];

$sql = "SELECT * FROM cadastro_usuario WHERE email = '$email'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    // O email existe no banco de dados
    $row = $resultado->fetch_assoc();

    // Verifique a senha
    if ($senha1 == $row['senha']) {
        
        if ($row['ser_admin'] == 1) {
            // O usuário é um administrador
            // Realize as ações específicas de administrador, como cadastrar usuários
            header("Location: administrador.php");
            exit();
        } else {
            // O usuário não é um administrador
            // Realize as ações padrão, redirecionar para a página do usuário normal, por exemplo
            header("Location:home.php");
            exit();
        }
       
    } else {
        // A senha está incorreta
        echo "Nome de usuário ou senha inválidos.";
    }
} else {
    // O email não existe no banco de dados
    echo "Nome de usuário ou senha inválidos.";
}
?>

<a href="index.php"><input type="button" name="voltar" value="Voltar"></a>