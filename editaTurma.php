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
    <link rel="stylesheet" href="./estilos/estiloEditaTurma.css">
    <title>Visualizar Registros</title>
</head>
<body>
<img src="./imgs/sua-escola-e-uma-empresa.png" alt="">
    <div class="princ">
    <h1>Visualizar Alunos</h1>
    <form action="./phpfiles/editaRegistro.php?registro=turma&turma=<?php echo $turma ?>" method="POST">
    <ul>
    <?php
            $query = "SELECT * FROM turma WHERE turma = '$turma'";
            $info = mysqli_query($connect, $query);
            while ($dados = $info->fetch_array()) {
            ?>
        <li class="list">Descrição: <input name="descricao" type="text" value=<?php echo $dados['descricao'] ?>> </li>
        <li class="list">Vagas: <input name="vaga" type="number" value=<?php echo $dados['qtvagas'] ?>> </li>
        <li class="list">Professor: <input name="professor" type="text" value=<?php echo $dados['professor'] ?>> </li>
    </ul>
    <?php } ?>
    <button type="submit">ENVIAR</button>
    </form>
    <a class="bt-voltar" href="visualizacaoRegistros.php"><button class="bt-voltar">Voltar</button></a>
    
</div>
    
</body>
</html>