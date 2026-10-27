<?php
session_start();

if (!isset($_SESSION['usuario'], $_SESSION['cor'])) {
    header('Location: 15d_login.php');
    exit();
}

$cor = $_SESSION['cor'];

if (!preg_match('/^#[0-9a-fA-F]{6}$/', $cor)) {
    header('Location: 15d_login.php');
    exit();
}

$usuario = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="pt-br"><head>
    <meta charset="UTF-8">
    <title>Meu perfil</title>
</head>
<body style="background-color: <?= htmlspecialchars($cor, ENT_QUOTES, 'UTF-8') ?>;">
    <h1>Bem-vindo, <?= $usuario ?>!</h1>
    <p>Você está na sua página de perfil.</p>
    <a href="15d_logout.php">Sair</a>
</body>
</html>