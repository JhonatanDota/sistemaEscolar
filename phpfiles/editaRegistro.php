<?php
session_start();
include_once('connect.php');

$registro = $_GET['registro'];

if ($registro == 'aluno') {
    $matricula = $_GET['matricula'];
    $query = 1;

    if (isset($_POST['turmaAtribuida'])) {
        $turma = $_POST['turmaAtribuida'];
        $queryTurma = mysqli_query($connect, "SELECT * FROM aluno WHERE idturma = '$turma'");
        $queryVagas = mysqli_query($connect, "SELECT qtvagas FROM turma WHERE turma = '$turma'");
        $qtVagas = null;

        while ($dados = mysqli_fetch_assoc($queryVagas)) {
            $qtVagas = $dados['qtvagas'];
        }

        if (mysqli_num_rows($queryTurma) <  $qtVagas || $turma == 0){
            echo $qtVagas;
            $query = "UPDATE aluno SET
            idturma = '$turma', datamodificacao = CURRENT_TIMESTAMP
            WHERE matricula = '$matricula'";

        }else {
            header('Location: turmaCheia.php');
            return;
        }

    } else {

        $nome = $_POST['nome'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];

        $query = "UPDATE aluno SET
        nome = '$nome', cidade = '$cidade', bairro = '$bairro', rua = '$rua', numero = '$numero',datamodificacao = CURRENT_TIMESTAMP
        WHERE matricula = '$matricula'";
    }

    mysqli_query($connect, $query);

    header('Location: ../visualizarAlunos.php');
} else if ($registro == 'turma') {
    $turma = $_GET['turma'];

    $desc = $_POST['descricao'];
    $vagas = $_POST['vaga'];
    $professor = $_POST['professor'];

    $query = "UPDATE turma SET
descricao = '$desc', qtvagas = '$vagas', professor = '$professor'
WHERE turma = '$turma' AND turma != 0";

    mysqli_query($connect, $query);

    header('Location: ../visualizarTurmas.php');
}
