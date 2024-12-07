<?php
require_once("conexao.php");

if (isset($_GET['id'])) {
    $forumID = $_GET['id'];

    // Consulta para obter os detalhes do FAQ com o ID fornecido
    $sql = "SELECT forumID, topicoForum, descricaoForum, modulo, ForumArquivo FROM forum WHERE forumID = :forumID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':forumID', $forumID, PDO::PARAM_INT);
    $stmt->execute();

    // Verifica se o FAQ foi encontrado
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "FAQ não encontrado.";
        exit;
    }
} else {
    echo "ID do FAQ não fornecido.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do FAQ</title>
    <link rel="stylesheet" href="css/faq-list.css"> <!-- Seu arquivo CSS -->
</head>
<body>

<!-- Header -->
<header>
<a href="home.php"><img class="imgH" src="img/logo2.png"></a>
</header>

<!-- Conteúdo Principal -->
<main>
    <div class="branco">
        
        <!-- Exibição dos detalhes do FAQ -->
        <table>
            <tr>
                <th>ID</th>
                <td><?php echo htmlspecialchars($row['forumID']); ?></td>
            </tr>
            <tr>
                <th>Título</th>
                <td><?php echo htmlspecialchars($row['topicoForum']); ?></td>
            </tr>
            <tr>
                <th>Descrição</th>
                <td><?php echo nl2br(htmlspecialchars($row['descricaoForum'])); ?></td>
            </tr>
            <tr>
                <th>Módulo</th>
                <td><?php echo nl2br(htmlspecialchars($row['modulo'])); ?></td>
            </tr>
            <tr>
                <th>Arquivo</th>
                <td>
                    <?php
                    if ($row['ForumArquivo']) {
                        // Se o arquivo for um binário, pode ser necessário salvar ou exibir
                        // Um exemplo simples seria gerar um link para download
                        echo "<a href='download.php?id=" . urlencode($row['forumID']) . "'>Baixar Arquivo</a>";
                    } else {
                        echo "Nenhum arquivo anexado.";
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
</main>

<!-- Footer -->
<footer>
    <p>DETALHES</p>
</footer>

</body>
</html>

<?php
$conn = null; // Fechar a conexão com o banco
?>
