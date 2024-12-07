<?php
session_start();

// Defina o caminho da imagem com base no tipo de acesso
$imagemAcesso = "img/default.png"; // Imagem padrão, caso nenhuma correspondência seja encontrada

if (isset($_SESSION['acessoUL'])) {
    switch ($_SESSION['acessoUL']) {
        case 'aluno':
            $imagemAcesso = "img/alu.png";
            break;
        case 'mentor':
            $imagemAcesso = "img/men.png";
            break;
        case 'investidor':
            $imagemAcesso = "img/inv.png";
            break;
        case 'adm':
            $imagemAcesso = "img/adm.png";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="img/logo.png">
    <link rel="stylesheet" href="css/home.css">
    <title>Inicial</title>
</head>
<body>

    <header>
        <a href="index.php"><img class="imgH" src="img/logo2.png" alt="Logo"></a>
    </header>

    <main class="main-content">
        <div class="cards">
            <?php
            // Exibir cards com base no tipo de acesso
            if ($_SESSION['acessoUL'] === 'aluno') {
                echo '
                <div class="card" data-url="cursos.php" tabindex="0">
                    <img class="imgC" src="img/curso2.png" alt="Cursos">
                    <p class="heading">Cursos</p>
                </div>
                
                <div class="card" data-url="projeto.php" tabindex="0">
                    <img class="imgC" src="img/proj.png" alt="Projeto">
                    <p class="heading">Projeto</p>
                </div>
                
                <div class="card" data-url="perfil.php" tabindex="0">
                    <img class="imgC" src="img/perfil2.png" alt="Perfil">
                    <p class="heading">Perfil</p>
                </div>

            <div class="card" data-url="faq.php" tabindex="0">
                <img class="imgC" src="img/faq3.png" alt="FAQ">
                <p class="heading">FAQ</p>
            </div>';
                
            }

            if ($_SESSION['acessoUL'] === 'mentor') {
                echo '
                <div class="card" data-url="cursos.php" tabindex="0">
                    <img class="imgC" src="img/curso2.png" alt="Cursos">
                    <p class="heading">Cursos</p>
                </div>
                
                <div class="card" data-url="projeto-list.php" tabindex="0">
                    <img class="imgC" src="img/proj.png" alt="Projeto">
                    <p class="heading">Projetos</p>
                </div>
                
                <div class="card" data-url="perfil.php" tabindex="0">
                    <img class="imgC" src="img/perfil2.png" alt="Perfil">
                    <p class="heading">Perfil</p>
                </div>

            <div class="card" data-url="faq.php" tabindex="0">
                <img class="imgC" src="img/faq3.png" alt="FAQ">
                <p class="heading">FAQ</p>
            </div>';
            }

            if ($_SESSION['acessoUL'] === 'investidor') {
                echo '
                <div class="card" data-url="cursos.php" tabindex="0">
                    <img class="imgC" src="img/curso2.png" alt="Cursos">
                    <p class="heading">Cursos</p>
                </div>
                
                <div class="card" data-url="projeto-list.php" tabindex="0">
                    <img class="imgC" src="img/proj.png" alt="Projeto">
                    <p class="heading">Projetos</p>
                </div>
                
                <div class="card" data-url="perfil.php" tabindex="0">
                    <img class="imgC" src="img/perfil2.png" alt="Perfil">
                    <p class="heading">Perfil</p>
                </div>

            <div class="card" data-url="faq.php" tabindex="0">
                <img class="imgC" src="img/faq3.png" alt="FAQ">
                <p class="heading">FAQ</p>
            </div>';
            }

            if ($_SESSION['acessoUL'] === 'adm') {
                echo '
                <div class="card" data-url="cursos.php" tabindex="0">
                    <img class="imgC" src="img/curso2.png" alt="Cursos">
                    <p class="heading">Cursos</p>
                </div>
                
                <div class="card" data-url="config.php" tabindex="0">
                    <img class="imgC" src="img/proj.png" alt="Projeto">
                    <p class="heading">Config.</p>
                </div>
                
                <div class="card" data-url="perfil.php" tabindex="0">
                    <img class="imgC" src="img/perfil2.png" alt="Perfil">
                    <p class="heading">Perfil</p>
                </div>

            <div class="card" data-url="faq.php" tabindex="0">
                <img class="imgC" src="img/faq3.png" alt="FAQ">
                <p class="heading">FAQ</p>
            </div>';
            }
            ?>
        </div>
        <!-- Div de informações opcional -->
        <div class="info-container" style="display: none;"></div>
    </main>

    <footer>
        <p class="pop">
            <?php 
            echo isset($_SESSION['nomeUL']) 
                ? $_SESSION['nomeUL'] . ' <img class="futer" src="' . $imagemAcesso . '""> ' . $_SESSION['acessoUL'] 
                : ''; 
            ?>
        </p>
    </footer>

    <script src="spp.js"></script>

</body>
</html>
