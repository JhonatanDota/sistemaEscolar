<?php
session_start();
include_once('connect.php');

$registro = $_GET['registro'];


if($registro == 'aluno'){
$matricula = $_GET['matricula'];
mysqli_query($connect,"DELETE FROM aluno WHERE matricula = '$matricula'");
header('Location: ../visualizarAlunos.php');

}else if($registro == 'turma'){

$turma = $_GET['turma'];
mysqli_query($connect,"DELETE FROM turma WHERE turma = '$turma' AND turma != 0");
header('Location: ../visualizarTurmas.php');
}
