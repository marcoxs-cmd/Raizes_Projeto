<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="img/logo.png">
    <link rel="stylesheet" href="css/projeto.css">
    <title>RAIZ EMPREENDEDORA</title>
</head>
<body>
<header>
        <a href="home.php"><img class="imgH" src="img/logo2.png"></a>
    </header>

    <main class="main-content">
    <section>            
        <div class="branco">
            <form class="form" action="cadProjeto.php" method="post">
                <!-- <p class="regis">ENVIEI SEU PROJETO</p> -->
                <div class="input-wrapper">
                    <input type="text" placeholder="NOME DO PROJETO" name="nome" class="nome" required>
                </div>
                <div class="input-wrapper">
                    <textarea placeholder="DESCRIÇÃO BREVE" name="descricao" class="des" required></textarea>
                </div>
                <div class="input-wrapper">
                    <input type="text" placeholder="INDICADORES" name="indicadores" class="ind" required>
                </div>
                <div class="input-wrapper">
    <button type="button" class="upload-button" onclick="document.getElementById('file-upload').click()">ANEXOS</button>
    <input type="file" name="anexos" class="ax" multiple id="file-upload" style="display: none;" required>
</div>

                <div class="button-wrapper">
                    <button class="button">MANDAR</button>
                    <button type="reset" class="button">LIMPAR</button>
                </div>
            </form>

            <div class="list-button-wrapper">
    <a href="projeto-list.php"><button class="button2">LISTAR</button></a>
</div>

            <script>
    const fileUpload = document.getElementById("file-upload");
    const uploadButton = document.querySelector(".upload-button");

    fileUpload.addEventListener("change", () => {
        if (fileUpload.files.length > 0) {
            uploadButton.classList.add("selected"); // Adiciona a classe quando há arquivos selecionados
        } else {
            uploadButton.classList.remove("selected"); // Remove a classe se nenhum arquivo estiver selecionado
        }
    });
</script>

            <!-- Divs para feedback -->
            <div class="alert-success"></div>
            <div class="alert"></div>
        </div>
    </section>
    </main>    

    <footer>
        <p class="pop">PROJETO</p>
    </footer>
</body>
</html>