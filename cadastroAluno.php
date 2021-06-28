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
    <link rel="stylesheet" href="./estilos/estilocadastro.css">
</head>

<body>
<img src="./imgs/sua-escola-e-uma-empresa.png" alt="">
    
    <div class="princ">
     <form action="./phpfiles/cadastro.php<?php echo '?input=aluno' ?>"  method="POST">
     <div class="quadro">
        <h1 class="titulo">Cadastro Aluno</h1>
        <span id="msg">.</span>
        <span>Nome <input id="nome" type="text" autocomplete="off" name="nome"> </span> 
        <span>Sexo
        <select id="sexo" name="sexo">
        <option value="">Selecione</option>
        <option value="M">Masculino</option>
        <option value="F">Feminino</option>
        <option value="O">Outro</option>
        </select>
        </span> 
        <span>Data Nascimento <input id="data" type="date" name="data" min="1900-01-01" max="2030-12-31"> </span>
        <span>Cidade <input type="text" name="cidade"></span> 
        <span>Bairro <input type="text" name="bairro"></span>
        <span>Rua <input type="text" name="rua"></span> 
        <span>Número <input type="number" name="numero"></span> 
        <span>Complemento <input type="text" name="complemento"></span> 

        <input class="button" type="submit" value="Cadastrar" onclick="return verificaCampos()">
        </div>
    </form>
    <a href="escolhaCadastro.php"class="button"><button class="button" id="btn">Voltar</button></a>
</div>
</body>
<script>
    const sexo = document.getElementById("sexo")
    const nome = document.getElementById("nome")
    const msg = document.getElementById("msg")
    const data = document.getElementById("data")

    const verificaCampos = () => {
        if(nome.value == ""){
            msg.innerHTML = "Digite um Nome"
            msg.style.opacity = '100%'
            return false
        }
        else if(sexo.value == ""){
             msg.innerHTML = "Selecione um Sexo"
            msg.style.opacity = '100%'
            return false
        }
        else if(data.value == ""){
             msg.innerHTML = "Selecione uma data"
            msg.style.opacity = '100%'
            return false
        }
        else
            return true
    }
</script>
</html>