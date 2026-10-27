<!-- Passar id via URL -->
<!-- http://localhost/php-basicos/13_exclusao.php?id=5-->

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exercicio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if($conn->connect_error) {
    die("Falha na conexão: " .$conn->connect_error);
}

// Verifica se o id foi passado via URL (id a ser excluído)
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL de exclusão
    $sql = "DELETE FROM clientes WHERE id='$id'";

    // Mensagem (Feedback para usuário)
    if($conn->query($sql) === TRUE) {
        echo "<p>Cliente excluído com sucesso!</p>";
    } else {
        echo "<p>Erro ao excluir cliente.</p>";
    }
}

// Fecha conexão
$conn->close();

?>


