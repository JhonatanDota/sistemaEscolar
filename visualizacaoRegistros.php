<!DOCTYPE html>
<html lang="pt-br">

<?php
session_start();
if(!$_SESSION['email'])
    header('Location: home.php'); 
?>

<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="./estilos/estiloVisualicacao.css">
    <title>Visualizar Registros</title>
</head>
<body>
<img src="./imgs/sua-escola-e-uma-empresa.png" alt="">
    <div class="princ">
    <h1>Visualizar Registros</h1>
    <a href="visualizarAlunos.php"><button>Alunos</button></a>
    <a href="visualizarTurmas.php"><button>Turmas</button></a>
    <a href="selecaoRegistroPersonalizado.php"><button class="bt-especial">Personalizado</button></a>
    <a class="bt-voltar" href="escolhaCadastro.php"><button class="bt-voltar">Voltar</button></a>
</div>
    
</body>
</html>