<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "raizes";

try {
    // Estabelece a conexão com o banco de dados
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Define o modo de erro como exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "<h2 style='color:red'>Erro:<br>" . $e->getMessage() . "</h2>";
}
?>
