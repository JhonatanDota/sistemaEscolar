<?php
session_start();
include_once("connect.php");

$email = $_POST["email"];
$senha = $_POST["pass"];

$query = mysqli_query($connect,"SELECT * FROM cadastrados WHERE email = '$email' and senha = '$senha'");

if(mysqli_num_rows($query) === 1){
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    header('Location: ../escolhaCadastro.php');
}else
    header('Location: ../home.php');
