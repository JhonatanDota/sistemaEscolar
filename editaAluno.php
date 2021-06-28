<!DOCTYPE html>
<html lang="pt-br">

<?php
session_start();
include_once("./phpfiles/connect.php");
if(!$_SESSION['email'])
    header('Location: home.php'); 

$matricula = $_GET['matricula'];
?>

<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="./estilos/estiloEditaAluno.css">
    <title>Visualizar Registros</title>
</head>
<body>
<img src="./imgs/sua-escola-e-uma-empresa.png" alt="">
    <div class="princ">
    <h1>Visualizar Alunos</h1>
    <form action="./phpfiles/editaRegistro.php?registro=aluno&matricula=<?php echo $matricula ?>" method="POST">
    <ul>
    <?php
            $query = "SELECT * FROM aluno WHERE matricula = '$matricula'";
            $info = mysqli_query($connect, $query);
            while ($dados = $info->fetch_array()) {
            ?>
        <li class="list">Nome: <input name="nome" type="text" value=<?php echo $dados['nome'] ?>> </li>
        <li class="list">Cidade: <input name="cidade" type="text" value=<?php echo $dados['cidade'] ?>> </li>
        <li class="list">Bairro: <input name="bairro" type="text" value=<?php echo $dados['bairro'] ?>> </li>
        <li class="list">Rua: <input name="rua" type="text" value=<?php echo $dados['rua'] ?>> </li>
        <li class="list">Numero: <input name="numero" type="number" value=<?php echo $dados['numero'] ?>> </li>
    </ul>
    <?php } ?>
    <button type="submit">ENVIAR</button>
    </form>
    <a class="bt-voltar" href="visualizacaoRegistros.php"><button class="bt-voltar">Voltar</button></a>
    
</div>
    
</body>
</html>