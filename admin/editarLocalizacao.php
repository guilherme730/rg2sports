<?php
    session_start();
    include("../banco/conexao.php");
 
    if (isset($_POST['editarLocalizacao'])) {
        $localizacao_id = mysqli_real_escape_string($conexao, trim($_POST['idLocalizacao']));
        $enderecoLocalizacao = mysqli_real_escape_string($conexao, trim($_POST['enderecoLocalizacao']));
        $telefoneLocalizacao = mysqli_real_escape_string($conexao, trim($_POST['telefoneLocalizacao']));
        $emailLocalizacao = mysqli_real_escape_string($conexao, trim($_POST['emailLocalizacao']));
        $instagramLocalizacao = mysqli_real_escape_string($conexao, trim($_POST['instagramLocalizacao']));
         $horarioLocalizacao = mysqli_real_escape_string($conexao, trim($_POST['horarioLocalizacao']));
         $mapaEmbedLocalizacao = mysqli_real_escape_string($conexao, trim($_POST['mapaEmbedLocalizacao']));
       
        $sql = "UPDATE localizacao SET enderecoLocalizacao = '$enderecoLocalizacao', telefoneLocalizacao = '$telefoneLocalizacao', emailLocalizacao = '$emailLocalizacao', instagramLocalizacao = '$instagramLocalizacao', horarioLocalizacao = '$horarioLocalizacao', mapaEmbedLocalizacao = '$mapaEmbedLocalizacao'";
        $sql .= " WHERE idLocalizacao = '$localizacao_id'";
 
        mysqli_query($conexao, $sql);
 
        if(mysqli_affected_rows($conexao) > 0) {
            header('Location: listarLocalizacao.php');
            exit;
        } else {
            header('Location: index.php');
            exit;
        }
    }
 
?>
 