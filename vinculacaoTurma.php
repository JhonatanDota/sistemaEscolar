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
    <link rel="stylesheet" href="./estilos/estiloVisualizacaoAlunos.css">
    <title>Introduzir Aluno</title>
</head>
<body>
<img src="./imgs/sua-escola-e-uma-empresa.png" alt="">
    <div class="princ">
    <h1>Introduzir Aluno</h1>
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
            <th>Turma</th>
            <th>Turma Desejada</th>
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
        <td></td>
        <td></td>
        <?php
            $queryData = "SELECT DATE_FORMAT(datanascimento, '%d/%m/%Y') as data FROM aluno";
            $dataFormatada = mysqli_query($connect, $queryData);
            $query = "SELECT * FROM aluno";
            $queryTurma = "SELECT turma FROM turma";
            $info = mysqli_query($connect, $query);
            $infoTurma = mysqli_query($connect, $queryTurma);

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
        <td>Turma:<?php echo $dados["idturma"] ?></td>
        <td><form action="./phpfiles/editaRegistro.php?registro=aluno&matricula=<?php echo $dados["matricula"]?>" method="POST">
            <select name="turmaAtribuida" >
            <option value="">Selecione</option>
        <?php while ($dadosTurma = $infoTurma->fetch_array()) { ?>
            <option value="<?php echo $dadosTurma['turma'] ?>"><?php echo $dadosTurma['turma'] ?></option>
        <?php } mysqli_data_seek($infoTurma, 0);?>
        </select>
        <input type="submit">
        </form>
    </td>
        </tr>
        <?php } ?>
    </table>
    <a class="bt-voltar" href="escolhaCadastro.php"><button class="bt-voltar">Voltar</button></a>
    </div>
</div>
    
</body>
</html>