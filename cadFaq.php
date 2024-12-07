<?php
try {
    if (isset($_POST["nome"]) && isset($_POST["descricao"]) && isset($_POST["modulo"]) && isset($_POST["anexos"])) {
        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $modulo = $_POST["modulo"];
        $anexos = $_POST["anexos"]; // Certifique-se de que a variável anexos está definida
        
        // Conexão com o banco de dados
        require_once("conexao.php");
        
        // Consulta preparada para inserir usuário
        $sql = "INSERT INTO forum (topicoForum, descricaoForum, modulo, ForumArquivo) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nome, $descricao,$modulo, $anexos]);
        
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
