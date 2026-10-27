<!-- Passar id via URL -->
<!-- http://localhost/php-basicos/12_atualizar.php?id=1-->

<?php
// Credenciais para acesso
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exercicio";

// Acessando de fato (BD exercicio)
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando conexão
if ($conn->connect_error) {
    die("Falha na conexão: " .$conn->connect_error);
}

// Inicializa a variável "$cliente" vazia
$cliente = null;

// Verifica se um ID foi passado via URL para edição
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id='$id'";
    $result = $conn->query($sql);

    // Se há um cliente no id passado ele encontra
    if($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
    } else {
        // Quando não encontrar
        echo "Cliente não encontrado.";
    }
}

    // Verifica se o formulário foi enviado (Quando localizou)
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recebe os valores enviados pelo formulário (Alterações)
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        // Sql de atualização
        $sql = "UPDATE clientes SET nome='$nome', email='$email' WHERE id='$id'";

        // Mensagem (Feedback para o usuário)
        if($conn->query($sql) === TRUE) {
            echo "<p>Cliente atualizado com sucesso!!</p>";
        } else {
            echo "<p>Erro ao atualizar: " .$conn->error . "</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cliente</title>
</head>
<body>
    <form action="" method="post">
        <!-- Campo escondido que guarda o id para o POST saber qual registro alterar. "??" Operador de Coalescência, significa: Use o valor da esquerda senão existir use o da direita no caso '' vazio ou nulo -->
        <input type="hidden" name="id" value="<?php echo $cliente['id'] ?? ''; ?>">

        <label for="nome">Nome:</label>
        <!-- Se houver nome pega nome, senão deixa vazio -->
        <input type="text" name="nome" value="<?php  echo isset($cliente['nome']) ? $cliente['nome'] : ''; ?>" required><br>

        <label for="email">Email:</label>
        <!-- Se houver email pega email, senão deixa vazio -->
        <input type="email" name="email" value="<?php  echo isset($cliente['email']) ? $cliente['email'] : ''; ?>" required><br>

        <!-- Botão de atualização -->
         <button type="submit">Atualizar</button>
    </form>
</body>
</html>



