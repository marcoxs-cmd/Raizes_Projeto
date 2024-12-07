<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de FAQ</title>
    <link rel="stylesheet" href="css/faq-list.css">
</head>
<body>
    <!-- Header -->
    <header>
    <a href="home.php"><img class="imgH" src="img/logo2.png"></a>
    </header>

    <!-- Conteúdo Principal -->
    <main>            
            <!-- Tabela para Listagem de FAQ -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tópico</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?php
require_once("conexao.php");
session_start();

try {
    // Consulta para obter os dados do FAQ
    $sql = "SELECT forumID, topicoForum FROM forum";
    $result = $conn->query($sql);

    // Verifica se há registros
    if ($result->rowCount() > 0) {
        // Exibe os dados usando fetch(PDO::FETCH_ASSOC)
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['forumID']) . "</td>
                    <td>" . htmlspecialchars($row['topicoForum']) . "</td>
                    <td><a href='detalhe.php?id=" . urlencode($row['forumID']) . "'>Ver</a></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Nenhum FAQ encontrado.</td></tr>";
    }
} catch (Exception $e) {
    echo "<tr><td colspan='3'>Erro ao buscar os dados. Por favor, tente novamente mais tarde.</td></tr>";
}
// O PDO fecha automaticamente quando o script termina, portanto não é necessário usar $conn->close().
?>


                </tbody>
            </table>
        
    </main>

    <!-- Footer -->
    <footer>
        <p class="pop">LISTA DE FAQS</p>
    </footer>
</body>
</html>
