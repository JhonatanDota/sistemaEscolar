<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./estilos/estiloCadastroUsuario.css">
</head>

<body>
<img src="./imgs/sua-escola-e-uma-empresa.png" alt="">
    <div class="princ">
    <form action="./phpfiles/cadastro.php<?php echo '?input=usuario' ?>" method="POST">
        <h1>Cadastro</h1>
        <span id="msg">KK</span>
        <div class="campo1">
            <label class="label" for="">Digite seu Nome</label><input type="text" name="nome" id="nome" class="inp inp_email" autocomplete="nope"
                placeholder="Digite seu Nome"><br>
            <label class="label em lab2" for="">Digite seu Email</label><input type="email" name="email" class="inp inp_email em email"
                placeholder="Digite seu Email"><br>
            <label class="label inp2" for="">Confirme seu Email</label><input type="email" autocomplete="nope"
                class="inp inp2 inp_email email" placeholder="Digite seu email">
        </div>
        <div class="campo2">
            <label class="label" for="">Digite sua Senha</label><input type="password" name="pass" 
                class="inp inp_pass" placeholder="Digite uma senha"><br>
            <label class="label inp2" for="">Confirme sua Senha</label><input type="password" 
                class="inp inp2 inp_pass" placeholder="Digite novamente">
        </div>
        <input class="button" type="submit" value="Cadastrar" onclick="return verificaCampos()">
    </form>
    <a href="home.php"><button class="button b2">Voltar</button></a>
</div>
</body>
<script>
    const email = document.getElementsByClassName("email")
    const senha = document.getElementsByClassName("inp_pass")
    const nome = document.getElementById("nome")
    const msg = document.getElementById("msg")
    
    const verificaCampos = () => {
        if (email[0].value == "" || senha[0].value == "") {
            msg.innerText = "Digite nos campos"
            msg.style.opacity = '100%'
            return false
        }
        else if(nome.value == ""){
            msg.innerHTML = "Digite um Nome"
            msg.style.opacity = '100%'
            return false
        }
        else if(email[1].value == "" || senha[1].value == ""){
            msg.innerHTML = "Digite as validações"
            msg.style.opacity = '100%'
            return false
        }
        else if(email[0].value != email[1].value){
            msg.innerText = "Os Emails não coincidem"
            msg.style.opacity = '100%'
            return false
        }
        else if(senha[0].value.length < 8){
            msg.innerText = "Senha deve conter no mí­nimo 8 caracters"
            msg.style.opacity = '100%'
            return false
        }
        else if(senha[0].value != senha[1].value){
            msg.innerText = "As senhas não coincidem"
            msg.style.opacity = '100%'
            return false
        }
        else
            return true
    }
</script>
</html>