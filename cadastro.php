<?php

$host = "r1.tec.br";
$usuario = "r1tecb51_tarde";
$senha = "TurmadaTarde";
$banco = "r1tecb51_tarde";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se os dados foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['usuNome'];
    $email = $_POST['usuEmail'];
    $senha = $_POST['usuSenha'];

    // Usar prepared statements para evitar SQL Injection
    $stmt = $conn->prepare("INSERT INTO usuario (usuNome, usuEmail, usuSenha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha); // "sss" indica que são tres strings

    // Executar a query
    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        header("location: login.html");
    }

    // Fechar a declaração e a conexão
    $stmt->close();
}

$conn->close();
?>