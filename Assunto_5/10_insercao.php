<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de clientes</title>
</head>
<body>
    <!-- HTML Para cadastro de Nome e e-mail -->
     <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <button type="submit">Cadastrar</button>

     </form>

    <!--Lógica de conexão e inserção  -->
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "exercicio";

        // Tenta criar uma conexão com o banco de dados
        $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                // Se falhar mostra o erro
                die("Falha na conexão" .$conn->connect_error);
            }
        // Insere o registro no BD
        $sql = "INSERT INTO clientes (nome, email) VALUES ('$nome', '$email')";

        // FeedBack visual (Para usuário saber se deu certo a inserção)
        if($conn->query($sql) === TRUE) {
            echo"<p style='color: darkgreen'>Cliente cadastrado com sucesso!</p> ";
        } else {
            echo"<p style='color: red'>Erro ao cadastrar!</p> ";
        }

    }

    ?>

</body>
</html>