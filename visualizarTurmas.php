<!DOCTYPE html>
<html lang="pt-br">

<?php
session_start();
include_once("./phpfiles/connect.php");
if(!$_SESSION['email'])
    header('Location: home.php'); 
?>

<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="./estilos/estiloVisualizacaoTurma.css">
    <title>Visualizar Registros</title>
</head>
<body>
<img src="./imgs/sua-escola-e-uma-empresa.png" alt="">
    <div class="princ">
    <h1>Visualizar Turma</h1>
    <div class="table">
    <table border="1">
        <tr class="table-head">
            <th>Turma</th>
            <th>Descrição</th>
            <th>Quantidade de vagas</th>
            <th>Professor</th>
            <th>Opções</th>
        </tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <?php
            $query = "SELECT * FROM turma";
            $info = mysqli_query($connect, $query);
            while ($dados = $info->fetch_array()) {
            ?>
        <tr>
        <td><?php echo $dados["turma"] ?></td>
        <td><?php echo $dados["descricao"] ?></td>
        <td><?php echo $dados["qtvagas"] ?></td>
        <td><?php echo $dados["professor"] ?></td>
        <td>
        <a href="editaTurma.php?registro=turma&turma=<?php echo $dados["turma"]?>"><img class="opcoes" src="./imgs/editar.png" alt=""></a>
        <a href="visualizacaoTurmaComAlunos.php?registro=turma&turma=<?php echo $dados["turma"]?>"><img class="opcoes" src="./imgs/aluna.png" alt=""></a>
        <a href="./phpfiles/deletaRegistro.php?registro=turma&turma=<?php echo $dados["turma"]?>" ><img class="opcoes" src="./imgs/x.png" alt=""></a>
    </td>
        </tr>
        <?php } ?>
    </table>
    <a class="bt-voltar" href="visualizacaoRegistros.php"><button class="bt-voltar">Voltar</button></a>
    </div>
</div>
</body>
</html>