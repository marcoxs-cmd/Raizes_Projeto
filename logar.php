<?php

require_once("conexao.php");
session_start();

try {
    if(isset($_POST["email"]) && isset($_POST["senha"])){
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $sql = "SELECT * FROM usuario WHERE userEmail='$email' AND senha='$senha'";
        $dados = $conn->query($sql);
        if($registros = $dados->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['idUL'] = $registros['userID'];
            $_SESSION['nomeUL'] = $registros['userNome'];
            $_SESSION['acessoUL'] = $registros['acesso'];
            $_SESSION['emUL'] = $registros['userEmail'];
            // Retorna um JSON indicando que o login foi bem-sucedido
            echo json_encode(['success' => true]);
        }
        else {
            // Retorna um JSON indicando que o login falhou
            echo json_encode(array("success" => false, "message" => "E-mail ou senha inválido. Digite novamente!"));
        }
    } 
} catch(Exception $e) {
    // Retorna um JSON com a mensagem de erro
    echo json_encode(array("success" => false, "message" => $e->getMessage()));
}

$conn = null;

?>