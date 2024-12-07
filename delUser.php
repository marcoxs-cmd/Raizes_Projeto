<?php
include('conexao.php'); // Inclui a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $userId = $_POST['userId'];

    // SQL para excluir os dados no banco de dados
    $sql = "DELETE FROM usuario WHERE userID = ?";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId]);

    // Redirecionar após exclusão (opcional)
    header('Location: index.php'); // Redireciona para a página de login após exclusão
    exit;
}
?>
