<!DOCTYPE html>
<html lang="pt-br">

<?php
session_start();
if(!$_SESSION['email'])
    header('Location: home.php'); 
?>

<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="./estilos/estiloEscolhaCadastro.css">
    <title>Escolha de Cadastro</title>
</head>
<body>
<img src="./imgs/sua-escola-e-uma-empresa.png" alt="">
    <div class="princ">
    <h1>Escolha seu Cadastro</h1>
    <a href="cadastroAluno.php"><button >Aluno</button></a>
    <a href="cadastroTurma.php"><button>Turma</button></a> 
    <a href="vinculacaoTurma.php"><button>Vinculação de Turma</button></a> 
    <a class="right" href="visualizacaoRegistros.php"><button class="button right visualiza">Visualizar Registros</button></a>
    <a class="right" href="./phpfiles/logout.php"><button class="button right sair">Sair</button></a>
</div>
    
</body>
</html>