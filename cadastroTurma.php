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
    <link rel="stylesheet" href="./estilos/estilocadastroTurma.css">
</head>

<body>
<img src="./imgs/sua-escola-e-uma-empresa.png" alt="">
    
    <div class="princ">
     <form action="./phpfiles/cadastro.php<?php echo '?input=turma' ?>"  method="POST">
     <div class="quadro">
        <h1 class="titulo">Cadastro Turma</h1>
        <span id="msg">.</span>
        <span>Descricão: <input id="desc" type="text" autocomplete="off" name="descricao"> </span> 
        <span>Quantidade de Vagas: <input id="vagas" type="number" name="vagas"></span> 
        <span>Nome do Professor: <input id="professor" type="text" name="professor"></span>

        <input class="button" type="submit" value="Cadastrar" onclick="return verificaCampos()">
        </div>
    </form>
    <a href="escolhaCadastro.php"class="button"><button class="button" id="btn">Voltar</button></a>
</div>
</body>
<script>
    const desc = document.getElementById("desc")
    const vagas = document.getElementById("vagas")
    const msg = document.getElementById("msg")
    const professor = document.getElementById("professor")

    const verificaCampos = () => {
        if(desc.value == ""){
            msg.innerHTML = "Digite uma Descricão"
            msg.style.opacity = '100%'
            return false
        }
        else if(vagas.value == ""){
             msg.innerHTML = "Digite a Quantidade de Vagas"
            msg.style.opacity = '100%'
            return false
        }
        else if(professor.value == ""){
             msg.innerHTML = "Digite o Nome do Professor"
            msg.style.opacity = '100%'
            return false
        }
        else
            return true
    }
</script>
</html>