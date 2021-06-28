<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
if(!$_SESSION['email'])
    header('Location: home.php'); 
?>

<head>
    <meta charset="UTF-8">
    <title>Cadastro Aluno</title>
    <link rel="stylesheet" href="./estilos/estiloSelecaoRegistroPersonalizado.css">
</head>

<body>
<img src="./imgs/sua-escola-e-uma-empresa.png" alt="">
    
    <div class="princ">
     <form action="visualizarRegistroPersonalizado.php"  method="POST">
     <div class="quadro">
        <h1 class="titulo">Visualizar Personalizado</h1>
        <span id="msg">.</span>
        <span>Nome (ou que tenha no nome) <input id="nome" type="text" autocomplete="off" name="nome"> </span> 
        <span>Sexo
        <select id="sexo" name="sexo">
        <option value="">Selecione</option>
        <option value="M">Masculino</option>
        <option value="F">Feminino</option>
        <option value="O">Outro</option>
        </select>
        </span> 
        <span>Cidade <input type="text" name="cidade"></span> 
        <input class="button" type="submit" value="Pesquisar" >
        </div>
    </form>
    <a href="visualizacaoRegistros.php"class="button"><button class="button" id="btn">Voltar</button></a>
</div>
</body>
</html>