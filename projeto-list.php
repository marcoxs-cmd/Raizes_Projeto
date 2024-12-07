<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Projetos</title>
    <link rel="stylesheet" href="css/pro-list.css">
</head>
<body>
    <!-- Header -->
    <header>
        <a href="home.php"><img class="imgH" src="img/logo2.png" alt="Logo"></a>
    </header>

    <!-- Conteúdo Principal -->
    <main>            
        <!-- Tabela para Listagem de Projetos -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            <?php
            require_once("conexao.php");
            session_start();

            try {
                // Consulta para obter os dados da tabela projeto
                $sql = "SELECT projetoID, projetoTitulo, projetoDescricao FROM projeto";
                $result = $conn->query($sql);

                // Verifica se há registros
                if ($result->rowCount() > 0) {
                    // Exibe os dados usando fetch(PDO::FETCH_ASSOC)
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['projetoID']) . "</td>
                                <td>" . htmlspecialchars($row['projetoTitulo']) . "</td>
                                <td>" . htmlspecialchars($row['projetoDescricao']) . "</td>
                                <td><a href='detalheP.php?id=" . urlencode($row['projetoID']) . "'>Ver Detalhes</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum projeto encontrado.</td></tr>";
                }
            } catch (Exception $e) {
                echo "<tr><td colspan='4'>Erro ao buscar os dados. Por favor, tente novamente mais tarde.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </main>

    <!-- Footer -->
    <footer>
        <p class="pop">LISTA DE PROJETOS</p>
    </footer>
</body>
</html>
