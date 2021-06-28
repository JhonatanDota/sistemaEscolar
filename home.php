<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="./estilos/estiloHome.css">
</head>

<body>
    <img src="./imgs/sua-escola-e-uma-empresa.png" alt="">
    <div class="princ">
        <p class="letreiro">Sistema de Horas</p>
        <p class="letreiro letcor">Login</p>
        <span id="msg">-</span>
        <form action="./phpfiles/login.php" method="POST" >
            <label class="letreiro2" for="email">Email</label><input name="email" class="input" required type="text" autocomplete="off"><br>
            <label class="letreiro2" for="password">Senha</label><input name="pass" class="input" required type="password" autocomplete="off"><br>
            <input class="button" value="Entrar" type="submit" onclick="return validaEmail()">
        </form>
        <div id="links">
            <a class="lik" href="cadastroUsuario.php">Cadastrar</a><br>
        </div>
    </div>
    <div class="princ noticias">
        <p>
        Este é um sistema escolar que dá permissão aos usuários cadastrados
         criar turmas, introduzir alunos em turmas, editar, deletar, fazer pesquisas personalizadas
         e visualizar alunos contidos em uma turma.
         
         <p class="aviso">
         <span id="aviso">Avisos</span>: todos os alunos recém cadastrados farão parte de uma pseudo turma 
         "0", para que futuramente sejam vinculados a alguma turma. A turma "0" não pode ser apagada nem editada.
         
         <p> 
             Para se apagar qualquer turma a mesma não pode conter nenhum aluno vinculado.
         </p>
        </p>
    
        </p>
    </div>
</body>
    <script>
        const email = document.getElementsByClassName("input")[0];
        const passw = document.getElementsByClassName("input")[1];
        const msg = document.getElementById("msg");
        const validaEmail = () =>{
            if(email.value.indexOf("@") === -1 || email.value.indexOf(".") === -1 || email.value.indexOf(" ") != -1 ){
            msg.innerText = "Digite um email válido"
            msg.style.opacity = '100%'
            return false
            }
            if(passw.value == ""){
            msg.innerText = "Digite uma senha"
            msg.style.opacity = '100%'
                return false
            }
        }
        <?php ?>
    </script>
</html>