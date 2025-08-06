<?php
    session_start();
    include("../banco/conexao.php");
 
    if (isset($_POST['editarModalidade'])) {
        $modalidade_id = mysqli_real_escape_string($conexao, trim($_POST['idModalidade']));
        $nomeModalidade = mysqli_real_escape_string($conexao, trim($_POST['nomeModalidade']));
        $textoModalidade = mysqli_real_escape_string($conexao, trim($_POST['textoModalidade']));
        $professorModalidade = mysqli_real_escape_string($conexao, trim($_POST['professorModalidade']));
       
        $sql = "UPDATE modalidades SET nomeModalidade = '$nomeModalidade', textoModalidade = '$textoModalidade', professorModalidade = '$professorModalidade'";
        $sql .= " WHERE idModalidade = '$modalidade_id'";
 
        mysqli_query($conexao, $sql);
 
        if(mysqli_affected_rows($conexao) > 0) {
            header('Location: listarModalidades.php');
            exit;
        } else {
            header('Location: index.php');
            exit;
        }
    }
 
?>