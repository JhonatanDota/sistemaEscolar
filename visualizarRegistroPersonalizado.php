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
    <title>Visualizar Registros</title>
</head>
<body>
<img src="./imgs/sua-escola-e-uma-empresa.png" alt="">
    <div class="princ">
    <h1>Visualizar Alunos</h1>
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
        <?php
             $nome = $_POST['nome'];
             $sexo = $_POST['sexo'];
             $cidade = $_POST['cidade'];

            $query = "";

            if(($_POST['nome']) && ($_POST['sexo']) && ($_POST['cidade'])){
                $nome = $_POST['nome'];
                $sexo = $_POST['sexo'];
                $cidade = $_POST['cidade'];

                $query = "SELECT * FROM aluno WHERE nome LIKE '%$nome%' AND sexo = '$sexo' AND cidade = '$cidade'";
                $queryData = "SELECT DATE_FORMAT(datanascimento, '%d/%m/%Y') as data FROM aluno WHERE nome LIKE '%$nome%' AND sexo = '$sexo' AND cidade = '$cidade'";

            }else if(($_POST['nome']) && ($_POST['sexo'])){
                $query = "SELECT * FROM aluno WHERE nome LIKE '%$nome%' AND sexo = '$sexo'";
                $queryData = "SELECT DATE_FORMAT(datanascimento, '%d/%m/%Y') as data FROM aluno WHERE nome LIKE '%$nome%' AND sexo = '$sexo'";
            }else if(($_POST['nome']) && ($_POST['cidade'])){
                $query = "SELECT * FROM aluno WHERE nome LIKE '%$nome%' AND cidade = '$cidade'";
                $queryData = "SELECT DATE_FORMAT(datanascimento, '%d/%m/%Y') as data FROM aluno WHERE nome LIKE '%$nome%' AND cidade = '$cidade'";
            }else if(($_POST['sexo']) && ($_POST['cidade'])){
                $query = "SELECT * FROM aluno WHERE sexo = '$sexo' AND cidade = '$cidade'";
                $queryData = "SELECT DATE_FORMAT(datanascimento, '%d/%m/%Y') as data FROM aluno WHERE sexo = '$sexo' AND cidade = '$cidade'";
            }else if(($_POST['nome'])){
                $query = "SELECT * FROM aluno WHERE nome LIKE '%$nome%'";
                $queryData = "SELECT DATE_FORMAT(datanascimento, '%d/%m/%Y') as data FROM aluno WHERE nome LIKE '%$nome%'";
            }else if(($_POST['sexo'])){
                $query = "SELECT * FROM aluno WHERE sexo = '$sexo'";
                $queryData = "SELECT DATE_FORMAT(datanascimento, '%d/%m/%Y') as data FROM aluno WHERE sexo = '$sexo'";
            }else if(($_POST['cidade'])){
                $query = "SELECT * FROM aluno WHERE cidade = '$cidade'";
                $queryData = "SELECT DATE_FORMAT(datanascimento, '%d/%m/%Y') as data FROM aluno WHERE cidade = '$cidade'";
            }else
                echo "Não a registriso";

            if($query != ""){
            $dataFormatada = mysqli_query($connect, $queryData);
            $info = mysqli_query($connect, $query);
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
        <td><?php echo $dados["idturma"] ?></td>

        </tr>
        <?php }} ?>
    </table>
    <a class="bt-voltar" href="selecaoRegistroPersonalizado.php"> <button class="bt-voltar">Voltar</button></a>
    </div>
</div>
    
</body>
</html>