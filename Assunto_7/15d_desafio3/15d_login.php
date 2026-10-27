<?php
session_start();
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $cor = $_POST['cor'] ?? '#ffffff';

    // Aceita somente uma cor hexadecimal no formato #RRGGBB.
    if (!preg_match('/^#[0-9a-fA-F]{6}$/', $cor)) {
        $cor = '#ffffff';
    }
    
    $conn = new mysqli('localhost', 'root', '', 'exercicio');

    if ($conn->connect_error) {
        die('Falha na conexão: ' . $conn->connect_error);
    }

    // Os ? são preenchidos com valores por bind_param.
    $stmt = $conn->prepare(
        'SELECT usuario FROM usuarios WHERE usuario = ? AND senha = ?'
    );

    if (!$stmt) {
        die('Erro ao preparar a consulta: ' . $conn->error);
    }

    $stmt->bind_param('ss', $usuario, $senha);

    if (!$stmt->execute()) {
        die('Erro ao consultar o usuário: ' . $stmt->error);
    }

    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($usuarioEncontrado);
        $stmt->fetch();

        session_regenerate_id(true);
        $_SESSION['usuario'] = $usuarioEncontrado;
        $_SESSION['cor'] = $cor;

        header('Location: 15d_perfil.php');
        exit();
    }

    $erro = 'Usuário ou senha incorretos!';

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Entrar</h1>

    <?php if ($erro !== ''): ?>
        <p style="color: red;">
            <?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?>
        </p>
    <?php endif; ?>

    <form method="post" action="">
        <p>
            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario" id="usuario" required>
        </p>
        
        <p>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
        </p>
    
        <p>
            <label>Cor de fundo:</label>
            <input type="color" name="cor" value="#ffffff" required>
        </p>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>

