<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $host = "r1.tec.br";
    $usuario = "r1tecb51_tarde";
    $senha = "TurmadaTarde";
    $banco = "r1tecb51_tarde";

    $conn = new mysqli($host, $usuario, $senha, $banco);

    if ($conn->connect_error) {
        die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
    }

    $sql = "SELECT usuCodigo, usuNome, usuEmail, usuSenha FROM usuario";
    $retorno = $conn->query($sql);
    $usuEncontrados = $retorno->num_rows;

    if ($retorno->num_rows > 0) {
        echo "- Tabela de usuarios -";
        ?>
        <table border="1">
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Email</td>
                <td>Senha</td>
            </tr>
            <?php
            while ($dadosUsuario = $retorno->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $dadosUsuario["usuCodigo"] . "</td>";
                echo "<td>" . $dadosUsuario["usuNome"] . "</td>";
                echo "<td>" . $dadosUsuario["usuEmail"] . "</td>";
                echo "<td>" . $dadosUsuario["usuSenha"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "Nao a registros no banco de dados";
        }
        ?>
    </table>
    <?
        echo "Foram encontrados ". $usuEncontrados. " usuarios.";
    ?>
</body>

</html>