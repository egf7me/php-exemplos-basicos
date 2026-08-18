<?php

// Verifica se formulário foi enviado ($_SERVER)
// Variável natina de PHP
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe a senha enviada
    $senha = $_POST['senha'];

    if($senha == '12345') {
        // Redireciona para página de boas vindas
        header("Location:4b_bem_vindo.php");
        exit();
    } else {
        $erro = "Senha incorreta. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang = "pt-br">
<head>
    <meta charset = "UTF-8">
    <title>Página de Login</title>
</head>
<body>
    <h2>Digite a senha</h2>
    <form action="" method="POST">
        <label for = "">senha:</label>
        <input type="password" name="senha" required><br>
        <button type="submit">entrar</button>
    </form>


    <?php
        // Exibe a mensagem de erro
        if (isset($erro)) {
            echo "<p style='color: red';>$erro</
            p>";
        }
    ?>
</body>
</html>