<?php

$host = "r1.tec.br";
$usuario = "r1tecb51_tarde";
$senha = "TurmadaTarde";
$banco = "r1tecb51_tarde";

$conn = new mysqli($host, $usuario, $senha, $banco);

$email = $_POST["usuEmail"];
$senha = $_POST["usuSenha"];

$sql = "select * from usuario where usuEmail = '$email' and usuSenha = '$senha'";

$exe = $conn->query($sql);

if($exe->num_rows > 0){
    session_start();
    $dados = $exe->fetch_assoc();

    $_SESSION['Codigo'] = $dados['usoCodigo'];
    $_SESSION['Nome'] = $dados['usoNome'];

    header("location: login.html");
}
else{
    header("location: login.html");
}

?>