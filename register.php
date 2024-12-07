<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="img/logo.png">
    <link rel="stylesheet" href="css/register.css">
    <title>Raiz Empreendedora</title>
</head>

<body>

    <section>            
        <div class="branco">
            <form class="form" action="cadUsuario.php" method="post">
                <p class="regis">CADASTRAR-SE</p>
                <div class="input-wrapper">
                    <input type="text" placeholder="NOME" name="nome" class="nome" required>
                </div>
                <div class="input-wrapper">
                    <input type="text" placeholder="E-MAIL" name="email" class="email" required>
                </div>
                <div class="input-wrapper">
                    <input type="password" placeholder="SENHA" name="senha" class="senha" required>
                </div>
                <div class="input-wrapper">
                    <input type="text" placeholder="TELEFONE" name="telefone" class="telefone">
                </div>
                <div class="button-wrapper">
                    <button class="button">REGISTRAR</button>
                    <a href="index.php" class="button">CANCELAR</a>
                </div>
            </form>

            <!-- Divs para feedback -->
            <div class="alert-success"></div>
            <div class="alert"></div>
        </div>
    </section>

    <script src="regis.js"></script>
</body>
</html>
