<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Resultado Cadastro</title>
  <link rel="stylesheet" href="../estilos/estiloposcadastro.css">
</head>

<body>
<img src="../imgs/sua-escola-e-uma-empresa.png" alt="">
  <div class="princ">
    <p id="msg"></p>
    <a href="../escolhaCadastro.php"><button id="button">Voltar</button></a>
  </div>
</body>

</html>
<?php
include_once("connect.php");
$inputType = $_GET['input'];

// Dados Aluno
if ($inputType == "aluno") {
  $nome = $_POST['nome'];
  $sexo = $_POST['sexo'];
  $data = $_POST['data'];
  $cidade = $_POST['cidade'];
  $bairro = $_POST['bairro'];
  $rua = $_POST['rua'];
  $numero = $_POST['numero'];
  $complemento = $_POST['complemento'];
} else if ($inputType == "turma") {
  //Dados Turma
  $desc = $_POST['descricao'];
  $vagas = $_POST['vagas'];
  $professor = $_POST['professor'];
} else {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
}

//Verifica qual cadastro foi feito
if ($inputType == "aluno") {
  mysqli_query($connect, "INSERT INTO aluno(nome,sexo,datanascimento,cidade,bairro,rua,
      numero,complemento,idturma) VALUES ('$nome','$sexo','$data','$cidade','$bairro','$rua','$numero','$complemento',0)");
?>
  <script>
    document.getElementById('msg').innerHTML = "Cadastrado com sucesso!"
  </script>
<?php
} else if ($inputType == "turma") {
  mysqli_query($connect, "INSERT INTO turma(descricao,qtvagas,professor) 
    VALUES ('$desc','$vagas','$professor')");
?>
  <script>
    document.getElementById('msg').innerHTML = "Cadastrado com sucesso!"
  </script>
  <?php
} else if ($inputType == "usuario") {
  //Verifica se o E-MAIL já consta no banco
  $emailVerifica = mysqli_query($connect, "SELECT * FROM cadastrados WHERE email = '$email'");

  if (mysqli_num_rows($emailVerifica) == 1) {
  ?> <script>
      document.getElementById('msg').innerHTML = "Email já cadastrado!"
    </script> <?php
            } else {
              mysqli_query($connect, "INSERT INTO cadastrados(email,senha,nome) 
    VALUES ('$email','$pass','$nome')");
              ?>
    <script>
      document.getElementById('msg').innerHTML = "Cadastrado com Sucesso!"
    </script>
  <?php
            }
  } else {
  ?>
  <script>
    document.getElementById('msg').innerHTML = "Erro no Cadastro!"
  </script>
<?php
          }
?>