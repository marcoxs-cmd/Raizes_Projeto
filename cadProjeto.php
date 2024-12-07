<?php
try {
    if (isset($_POST["nome"]) && isset($_POST["descricao"]) && isset($_POST["indicadores"]) && isset($_POST["anexos"])) {
        $nome = $_POST["nome"]; // Nome do projeto
        $descricao = $_POST["descricao"]; // Descrição do projeto
        $indicadores = $_POST["indicadores"]; // Indicadores do projeto
        $arquivo = $_POST["anexos"]; // Arquivo associado ao projeto
        
        // Conexão com o banco de dados
        require_once("conexao.php");
        
        // Consulta preparada para inserir na tabela `projeto`
        $sql = "INSERT INTO projeto (projetoTitulo, projetoDescricao, projetoIndicadores, projetoArquivo) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nome, $descricao, $indicadores, $arquivo]);
        
        // Retorna resposta de sucesso em JSON
        echo json_encode(['success' => true, 'message' => 'Projeto cadastrado com sucesso!']);
    } else {
        // Retorna resposta de erro em JSON
        echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios!']);
    }
} catch (Exception $e) {
    // Em caso de erro, exibir mensagem em formato JSON
    echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar projeto: ' . $e->getMessage()]);
}

// Fechar conexão com o banco de dados
$conn = null;
?>
