<?php
require_once("conexao.php");

if (isset($_GET['id'])) {
    $forumID = $_GET['id'];

    // Consulta para obter o arquivo e o nome do tópico
    $sql = "SELECT ForumArquivo, topicoForum FROM forum WHERE forumID = :forumID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':forumID', $forumID, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $arquivo = $row['ForumArquivo'];
        $topico = $row['topicoForum'];

        // Detectando o tipo MIME do arquivo
        $finfo = new finfo(FILEINFO_MIME_TYPE); 
        $tipoArquivo = $finfo->buffer($arquivo); // Detecta o tipo MIME do conteúdo binário

        // Definindo cabeçalhos para o download
        header('Content-Type: ' . $tipoArquivo);  // Tipo MIME detectado
        header('Content-Disposition: attachment; filename="' . $topico . '"'); // Nome do arquivo

        // Envia o arquivo para o navegador
        echo $arquivo;
    } else {
        echo "Arquivo não encontrado.";
    }
}

$conn = null; // Fechar a conexão com o banco
?>
