<?php
// Conexão com BD
$servername = "Localhost";
$username = "root";
$password = "";
$dbname = "exercicio";

// Efetiva a conexão de fato
$conn = new mysqli($servername, $username, $password, $dbname );

// Verifica a conexão com BD
if ($conn->connect_error) {
    die("Falha na conexão: " .$conn->connect_error);
}

// Consulta para listar os clientes da tabela clientes (READ)
$sql = "SELECT id, nome, email FROM clientes";
$result = $conn->query($sql);

// Exibindo os resultados (Cadastros armzenados na tabela)
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    // Títulos das colunas da tabela
    echo "<tr>   <th>ID</th>  <th>Nome</th> <th>Email</th>    </tr>";

    // Linhas da tabela usando: fetch_assoc() - Método nativo do PHP que retorna em linha os registros "Array associativo" (Como: id, nome, email)
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum cliente encontrado";
}
// Encerra a conexão
$conn->close();
?>