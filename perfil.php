<?php
session_start();
include_once('conexao.php'); // Inclui a conexão com o banco de dados

// Variáveis para controlar mensagens de sucesso ou erro
$mensagem = '';

// Verifica se a ação é de atualização
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        // Pegando os dados enviados via POST
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

        // Validar os dados recebidos
        if (empty($nome) || empty($email)) {
            $mensagem = 'Por favor, preencha todos os campos obrigatórios.';
        } else {
            // Se a senha não for fornecida, mantemos a senha atual do banco
            if (empty($senha)) {
                $sql = "SELECT senha FROM usuario WHERE userID = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$_SESSION['idUL']]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $senha = $user['senha']; // Mantém a senha atual
            }

            // Preparar a consulta para atualizar os dados no banco
            $sql = "UPDATE usuario SET userNome = ?, userEmail = ?, senha = ? WHERE userID = ?";
            
            // Preparando a consulta com o PDO
            $stmt = $conn->prepare($sql);  // Usando $conn ao invés de $pdo
            $stmt->execute([$nome, $email, $senha, $_SESSION['idUL']]);  // Assume que o user_id está armazenado na sessão

            // Verifica se a atualização foi bem-sucedida
            if ($stmt->rowCount()) {
                $_SESSION['nomeUL'] = $nome;
                $_SESSION['emUL'] = $email;
                $mensagem = 'Atualização realizada com sucesso!';
            } else {
                $mensagem = 'Nenhuma alteração foi feita.';
            }
        }
    }

    // Verifica se a ação é de exclusão
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $sql = "DELETE FROM usuario WHERE userID = ?";
        
        // Preparando e executando a consulta para deletar o usuário
        $stmt = $conn->prepare($sql);  // Usando $conn ao invés de $pdo
        $stmt->execute([$_SESSION['idUL']]);

        if ($stmt->rowCount()) {
            session_destroy(); // Finaliza a sessão após exclusão
            header("Location: index.php"); // Redireciona para a página de login após exclusão
        } else {
            $mensagem = 'Erro ao excluir conta.';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/perfil.css">
    <title>RAIZ EMPREENDEDORA</title>
</head>
<body>
<header>
    <a href="home.php"><img class="imgH" src="img/logo2.png"></a>
</header>

<main class="main-content">
    <div class="card">
        <div class="card__img"><svg xmlns="http://www.w3.org/2000/svg" width="100%"><rect fill="#ffffff" width="540" height="450"></rect><defs><linearGradient id="a" gradientUnits="userSpaceOnUse" x1="0" x2="0" y1="0" y2="100%" gradientTransform="rotate(222,648,379)"><stop offset="0" stop-color="#ffffff"></stop><stop offset="1" stop-color="#ae87bb"></stop></linearGradient><pattern patternUnits="userSpaceOnUse" id="b" width="300" height="250" x="0" y="0" viewBox="0 0 1080 900"><g fill-opacity="0.5"><polygon fill="#444" points="90 150 0 300 180 300"></polygon><polygon points="90 150 180 0 0 0"></polygon><polygon fill="#AAA" points="270 150 360 0 180 0"></polygon><polygon fill="#DDD" points="450 150 360 300 540 300"></polygon><polygon fill="#999" points="450 150 540 0 360 0"></polygon><polygon points="630 150 540 300 720 300"></polygon><polygon fill="#DDD" points="630 150 720 0 540 0"></polygon><polygon fill="#444" points="810 150 720 300 900 300"></polygon><polygon fill="#FFF" points="810 150 900 0 720 0"></polygon><polygon fill="#DDD" points="990 150 900 300 1080 300"></polygon><polygon fill="#444" points="990 150 1080 0 900 0"></polygon><polygon fill="#DDD" points="90 450 0 600 180 600"></polygon><polygon points="90 450 180 300 0 300"></polygon><polygon fill="#666" points="270 450 180 600 360 600"></polygon><polygon fill="#AAA" points="270 450 360 300 180 300"></polygon><polygon fill="#DDD" points="450 450 360 600 540 600"></polygon><polygon fill="#999" points="450 450 540 300 360 300"></polygon><polygon fill="#999" points="630 450 540 600 720 600"></polygon><polygon fill="#FFF" points="630 450 720 300 540 300"></polygon><polygon points="810 450 720 600 900 600"></polygon><polygon fill="#DDD" points="810 450 900 300 720 300"></polygon><polygon fill="#AAA" points="990 450 900 600 1080 600"></polygon><polygon fill="#444" points="990 450 1080 300 900 300"></polygon><polygon fill="#222" points="90 750 0 900 180 900"></polygon><polygon points="270 750 180 900 360 900"></polygon><polygon fill="#DDD" points="270 750 360 600 180 600"></polygon><polygon points="450 750 540 600 360 600"></polygon><polygon points="630 750 540 900 720 900"></polygon><polygon fill="#444" points="630 750 720 600 540 600"></polygon><polygon fill="#AAA" points="810 750 720 900 900 900"></polygon><polygon fill="#666" points="810 750 900 600 720 600"></polygon><polygon fill="#999" points="990 750 900 900 1080 900"></polygon><polygon fill="#999" points="180 0 90 150 270 150"></polygon><polygon fill="#444" points="360 0 270 150 450 150"></polygon><polygon fill="#FFF" points="540 0 450 150 630 150"></polygon><polygon points="900 0 810 150 990 150"></polygon><polygon fill="#222" points="0 300 -90 450 90 450"></polygon><polygon fill="#FFF" points="0 300 90 150 -90 150"></polygon><polygon fill="#FFF" points="180 300 90 450 270 450"></polygon><polygon fill="#666" points="180 300 270 150 90 150"></polygon><polygon fill="#222" points="360 300 270 450 450 450"></polygon><polygon fill="#FFF" points="360 300 450 150 270 150"></polygon><polygon fill="#444" points="540 300 450 450 630 450"></polygon><polygon fill="#222" points="540 300 630 150 450 150"></polygon><polygon fill="#AAA" points="720 300 630 450 810 450"></polygon><polygon fill="#666" points="720 300 810 150 630 150"></polygon><polygon fill="#FFF" points="900 300 810 450 990 450"></polygon><polygon fill="#999" points="900 300 990 150 810 150"></polygon><polygon points="0 600 -90 750 90 750"></polygon><polygon fill="#666" points="0 600 90 450 -90 450"></polygon><polygon fill="#AAA" points="180 600 90 750 270 750"></polygon><polygon fill="#444" points="180 600 270 450 90 450"></polygon><polygon fill="#444" points="360 600 270 750 450 750"></polygon><polygon fill="#999" points="360 600 450 450 270 450"></polygon><polygon fill="#666" points="540 600 630 450 450 450"></polygon><polygon fill="#222" points="720 600 630 750 810 750"></polygon><polygon fill="#FFF" points="900 600 810 750 990 750"></polygon><polygon fill="#222" points="900 600 990 450 810 450"></polygon><polygon fill="#DDD" points="0 900 90 750 -90 750"></polygon><polygon fill="#444" points="180 900 270 750 90 750"></polygon><polygon fill="#FFF" points="360 900 450 750 270 750"></polygon><polygon fill="#AAA" points="540 900 630 750 450 750"></polygon><polygon fill="#FFF" points="720 900 810 750 630 750"></polygon><polygon fill="#222" points="900 900 990 750 810 750"></polygon><polygon fill="#222" points="1080 300 990 450 1170 450"></polygon><polygon fill="#FFF" points="1080 300 1170 150 990 150"></polygon><polygon points="1080 600 990 750 1170 750"></polygon><polygon fill="#666" points="1080 600 1170 450 990 450"></polygon><polygon fill="#DDD" points="1080 900 1170 750 990 750"></polygon></g></pattern></defs><rect x="0" y="0" fill="url(#a)" width="100%" height="100%"></rect><rect x="0" y="0" fill="url(#b)" width="100%" height="100%"></rect></svg></div>
    <div class="card__avatar"><img id="imagem" class="ava" src=""></div>
        <div class="card__title"><?php echo isset($_SESSION['nomeUL']) ? $_SESSION['nomeUL'] : 'Não encontrado!'; ?></div>
        <div class="card__subtitle"><?php echo isset($_SESSION['emUL']) ? $_SESSION['emUL'] : 'Email não encontrado'; ?></div>

        <!-- Formulário de edição -->
        <form id="edit-form" method="POST" style="display: none; margin-top: 45px;">
            <input type="text" name="nome" value="<?php echo $_SESSION['nomeUL'] ?? ''; ?>" required>
            <input type="email" name="email" value="<?php echo $_SESSION['emUL'] ?? ''; ?>" required>
            <input type="password" name="senha" placeholder="Nova senha">
            <input type="hidden" name="action" value="update">
            <button class="card__btn2" type="submit">Atualizar</button>
        </form>

        <div class="card__wrapper">
            <button class="card__btn" id="edit-btn">Editar</button>
            <button class="card__btn card__btn-solid" id="delete-btn">Excluir</button>
        </div>
    </div>
</main>

<div id="alert-box" style="display: none;">
    <div class="alert-content">
        <p>Tem certeza de que deseja excluir sua conta?</p>
        <form method="POST" action="perfil.php">
            <input type="hidden" name="action" value="delete">
            <button type="submit" id="confirm-delete">Sim</button>
        </form>
        <button id="cancel-delete">Não</button>
    </div>
</div>

<footer>
    <p class="pop">EDITAR PERFIL</p>
</footer>

<script src="per.js"></script>
</body>
</html>
