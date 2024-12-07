<?php
try {
    if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["telefone"])) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $telefone = $_POST["telefone"]; // Certifique-se de que a variável telefone está definida
        
        // Conexão com o banco de dados
        require_once("conexao.php");
        
        // Consulta preparada para inserir usuário
        $sql = "INSERT INTO usuario (userNome, userEmail, userTelefone, senha) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nome, $email, $telefone, $senha]);
        
        // Retorna resposta de sucesso em JSON
        echo json_encode(['success' => true, 'message' => 'Cadastro feito com sucesso!']);
    } else {
        // Retorna resposta de erro em JSON
        echo json_encode(['success' => false, 'message' => 'Volte para a página de cadastro!']);
    }
} catch (Exception $e) {
    // Em caso de erro, exibir mensagem em formato JSON
    echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar usuário: ' . $e->getMessage()]);
}

// Fechar conexão com o banco de dados
$conn = null;
?>
