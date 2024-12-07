<?php
require_once("conexao.php");

if (isset($_GET['id'])) {
    $projetoID = $_GET['id'];

    // Consulta para obter os detalhes do projeto com o ID fornecido
    $sql = "SELECT projetoID, projetoTitulo, projetoDescricao, projetoIndicadores, projetoArquivo FROM projeto WHERE projetoID = :projetoID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':projetoID', $projetoID, PDO::PARAM_INT);
    $stmt->execute();

    // Verifica se o projeto foi encontrado
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Projeto não encontrado.";
        exit;
    }
} else {
    echo "ID do projeto não fornecido.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Projeto</title>
    <link rel="stylesheet" href="css/pro-list.css"> <!-- Seu arquivo CSS -->
</head>
<body>

<!-- Header -->
<header>
    <a href="home.php"><img class="imgH" src="img/logo2.png" alt="Logo"></a>
</header>

<!-- Conteúdo Principal -->
<main>
    <div class="branco">
        
        <!-- Exibição dos detalhes do projeto -->
        <table>
            <tr>
                <th>ID</th>
                <td><?php echo htmlspecialchars($row['projetoID']); ?></td>
            </tr>
            <tr>
                <th>Título</th>
                <td><?php echo htmlspecialchars($row['projetoTitulo']); ?></td>
            </tr>
            <tr>
                <th>Descrição</th>
                <td><?php echo nl2br(htmlspecialchars($row['projetoDescricao'])); ?></td>
            </tr>
            <tr>
                <th>Indicadores</th>
                <td><?php echo nl2br(htmlspecialchars($row['projetoIndicadores'])); ?></td>
            </tr>
            <tr>
                <th>Arquivo</th>
                <td>
                    <?php
                    if ($row['projetoArquivo']) {
                        // Gerar link para download ou exibição do arquivo
                        echo "<a href='download.php?id=" . urlencode($row['projetoID']) . "'>Baixar Arquivo</a>";
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
    <p>DETALHES DO PROJETO</p>
</footer>

</body>
</html>

<?php
$conn = null; // Fechar a conexão com o banco
?>
