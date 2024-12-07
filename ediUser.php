<?php
include('conexao.php'); // Inclui a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $userId = $_POST['userId'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // SQL para atualizar os dados no banco de dados
    $sql = "UPDATE usuario SET userNome = ?, userTelefone = ? WHERE userID = ?";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $phone, $userId]);

    // Redirecionar após atualização (opcional)
    header('Location: perfil.php'); // Aqui você pode redirecionar para uma página de perfil
    exit;
}
?>
