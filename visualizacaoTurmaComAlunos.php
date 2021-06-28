<!DOCTYPE html>
<html lang="pt-br">

<?php
session_start();
include_once("./phpfiles/connect.php");
if(!$_SESSION['email'])
    header('Location: home.php'); 
$turma = $_GET['turma'];
?>

<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="./estilos/estiloVisualizacaoTurmaComAluno.css">
    <title>Visualizar Registros</title>
</head>
<body>
<img src="./imgs/sua-escola-e-uma-empresa.png" alt="">
    <div class="princ">
    <h1>Turma <?php echo $turma ?></h1>
    
    <div class="table">
    <table border="1">
        <tr class="table-head">
            <th>Matricula</th>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Data Nascimento</th>
            <th>Cidade</th>
            <th>Bairro</th>
            <th>Rua</th>
            <th>Número</th>
            <th>Complemento</th>          
        </tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <?php
            $turma = $_GET['turma'];
            $query = "SELECT * FROM aluno WHERE idturma = '$turma'";
            $queryData = "SELECT DATE_FORMAT(datanascimento, '%d/%m/%Y') as data FROM aluno";
            $info = mysqli_query($connect, $query);
            $dataFormatada = mysqli_query($connect, $queryData);
            while ($dados = $info->fetch_array()) {
                $data = $dataFormatada->fetch_array()
            ?>
        <tr>
        <td><?php echo $dados["matricula"] ?></td>
        <td><?php echo $dados["nome"] ?></td>
        <td><?php echo $dados["sexo"] ?></td>
        <td><?php echo $data["data"] ?></td>
        <td><?php echo $dados["cidade"] ?></td>
        <td><?php echo $dados["bairro"] ?></td>
        <td><?php echo $dados["rua"] ?></td>
        <td><?php echo $dados["numero"] ?></td>
        <td><?php echo $dados["complemento"] ?></td>
        </tr>
        <?php } ?>
    </table>
    <a class="bt-voltar" href="visualizacaoRegistros.php"><button class="bt-voltar">Voltar</button></a>
    </div>
</div>
    
</body>
</html>