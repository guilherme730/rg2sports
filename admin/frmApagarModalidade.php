<?php
    session_start();
    include ("../banco/conexao.php");

    if (isset($_POST['apagarModalidade'])) {
        $Modalidade_id = mysqli_real_escape_string($conexao, $_POST['apagarModalidade']);

        $sql = "DELETE FROM modalidades WHERE idModalidade = '$Modalidade_id'";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            header('Location: listarModalidades.php');
            exit;
        } else {
            header('Location: index.php');
            exit;
        }
    }


?>